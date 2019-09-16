<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class AddproductController extends Controller
{
    
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function formview()

    {
        $language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->orderBy('id','asc')
					->get();
					
		$category = DB::table('category')
		             ->where('lang_code', '=', 'en')
		            ->orderBy('name','asc')
					->get();			
					
		$category_count = DB::table('category')
		             ->where('lang_code', '=', 'en')
		            ->orderBy('name','asc')
					->count();			
        return view('admin.add-product', ['language' => $language, 'category' => $category, 'category_count' => $category_count]);

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	 /* protected $fillable = ['name', 'email','password','phone']; */
	 
	 
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	} 
	 
    protected function addproductdata(Request $request)
    {
        
		 $data = $request->all();
		
		 
		 
				
		$input['prod_name'] = Input::get('prod_name');
       
		
		$settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		
		
		$rules = array(
		
		'image' => 'required',
		'image.*' => 'image|mimes:jpeg,png,jpg|max:'.$imgsize
		
		
		);
		
		
		$messages = array(
            
            'image' => 'The :attribute field must only be image'
			
        );

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		 
		 
		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		}
		else
		{  
		 

		
	
	
	     
	
	
	
	
	
	
		 

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$prod_name=$data['prod_name'];
		
		$prod_desc=$data['prod_desc'];
		
		
		
		
		
		$token = $data['prod_token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$prod_name[$index];
		   $pagedesc=$prod_desc[$index];
		
			if($code=='en')
			   {
				   $parent=0;
			   }
			   else
			   {
			   
			       $product = DB::table('product')
		           	->where('prod_token', '=', $token)
					->where('parent', '=', 0)
					->get();
					
					 $product_cnt = DB::table('product')
		           		->where('prod_token', '=', $token)
					->where('parent', '=', 0)
					->count();
					if($product_cnt==0)
					{
					
                       	$parent = $idd;				
					  
					   
					}
					else
					{
					   $parent=$product[0]->prod_id;
					}
					
					
			   }
		
		if(!empty($pagename))
		{
		   $pagenamo = $pagename;
		}
		else
		{
		   $pagenamo = "";
		}
		
		if(!empty($pagedesc))
		{
		   $pagedeso = $pagedesc;
		}
		else
		{
		   $pagedeso = "";
		}
		
		
		if(!empty($data['prod_catagory']))
		{
		   $prod_catagory = $data['prod_catagory'];
		}
		else
		{
		   $prod_catagory = "";
		}
		
		if(!empty($data['prod_price']))
		{
		  $prod_price = $data['prod_price'];
		}
		else
		{
		  $prod_price = $data['prod_price'];
		}
		
		if(!empty($data['prod_offer_price']))
		{
		   $prod_offer_price = $data['prod_offer_price'];
		}
		else
		{
		  $prod_offer_price = "";
		}
		
		if(!empty($data['prod_available_qty']))
		{
		   $prod_available_qty = $data['prod_available_qty'];
		}
		else
		{
		   $prod_available_qty = "";
		}
		
		
		if(!empty($data['slug']))
		{
		$slug = $data['slug'];
		}
		else
		{
		   $slug = "";
		}
		
		
		
		/*DB::insert('insert into gallery (name, image, lang_code, parent) values (?, ?, ?, ?)', [$pagename,$namef,$code,$parent]);*/
		
		$idd = DB::table('product')-> insertGetId(array(
		
        'prod_name' => $pagenamo,
		'post_slug' => $this->clean($slug),
		'prod_desc' => $pagedeso,
		'prod_catagory' => $prod_catagory,
		'prod_price' => $prod_price,
		'prod_offer_price' => $prod_offer_price,
		'prod_available_qty' => $prod_available_qty,
		'prod_status' => 1,
		'lang_code' => $code,
		'prod_token' => $token,
		'parent' => $parent,
			));
		
		
		}
		
		
		$picture = '';
			if ($request->hasFile('image')) {
				$files = $request->file('image');
				foreach($files as $file){
					
					$filename = $file->getClientOriginalName();
					$extension = $file->getClientOriginalExtension();
					$picture = time().$filename;
					$destinationPath = base_path('images/media/');
					$file->move($destinationPath, $picture);
					
					
					DB::insert('insert into product_images (prod_token,image) values (?, ?)', [$token,$picture]);
					
				}
			}
		
		
		
		/*DB::insert('insert into testimonials (name, description , image) values (?, ? ,?)', [$name,$desc,$namef]);*/
		
		
			return back()->with('success', 'Product has been created');
        }
		
		
		
		
    }
}
