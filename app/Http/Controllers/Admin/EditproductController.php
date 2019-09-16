<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;


class EditproductController extends Controller
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
	
	
	public function one_delete($delete,$id)
	{
	
	
	$image_count = DB::table('product_images')->where('prod_img_id', $id)->count();
		
		if(!empty($image_count))
		{
		$image = DB::table('product_images')->where('prod_img_id', $id)->first();
		
		$orginalfile=$image->image;
		$media="/media/";
       $path = base_path('images'.$media.$orginalfile);
	  File::delete($path);
	  DB::delete('delete from product_images where prod_img_id = ?',[$id]);
	  }
      
	   
      return back();
	
	}
	
	
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	} 
    
	
	public function showform($id) {
	
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
			
			$prod_id = $id;
					
      $product = DB::select('select * from product where prod_id = ?',[$id]);
      return view('admin.edit-product',['product'=>$product, 'language' => $language,  'category' => $category, 'category_count' => $category_count, 'prod_id' => $prod_id]);
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
            'name' => 'required|string|max:255'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  
	 
    protected function productdata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['prod_name'] = Input::get('prod_name');
       
	   $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
	   
		
		$rules = array(
		
		
		
		
		
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
		
		
		
		$token = $data['token'];
		$prod_token_id = $data['prod_token_id'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$prod_name[$index];
		   $pagedesc=$prod_desc[$index];		
		   	
		   if($code=="en")
			{
			  
			  DB::update('update product set prod_name="'.$pagename.'",post_slug="'.$this->clean($slug).'",prod_desc="'.htmlentities($pagedesc).'",prod_catagory="'.$prod_catagory.'",prod_price="'.$prod_price.'",prod_offer_price="'.$prod_offer_price.'",prod_available_qty="'.$prod_available_qty.'",lang_code="'.$code.'"	 where prod_id = ?', [$id]);
			}
			else
			{
			    $counts = DB::table('product')
		            ->where('lang_code', '=', $code)
					 ->where('parent', '=', $id)
					  ->count();
			     if($counts==0)
				 {
						if(!empty($pagename))
						{
						   $pagenamo = $pagename;
						   $pagedeso = $pagedesc;
						}
						else
						{
						   $pagenamo = "";
						   $pagedeso = "";
						}
				     
					 
					 
					 
					 /*$idd = DB::table('product')-> insertGetId(array(
		
        'prod_name' => $pagenamo,
		'prod_desc' => $pagedeso,
		'prod_catagory' => $prod_catagory,
		'prod_price' => $prod_price,
		'prod_offer_price' => $prod_offer_price,
		'prod_available_qty' => $prod_available_qty,
		'prod_status' => 1,
		'lang_code' => $code,
		'prod_token' => $token,
		'parent' => $id,
			));
					 */
					 
					 
				 }
				 else
				 {
				   
				DB::update('update product set prod_name="'.$pagename.'",post_slug="'.$this->clean($slug).'",prod_desc="'.htmlentities($pagedesc).'",prod_catagory="'.$prod_catagory.'",prod_price="'.$prod_price.'",prod_offer_price="'.$prod_offer_price.'",prod_available_qty="'.$prod_available_qty.'" where lang_code="'.$code.'" and parent = ?', [$id]);
				
				 }
			
			}
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
					
					
					DB::insert('insert into product_images (prod_token,image) values (?, ?)', [$prod_token_id,$picture]);
					
				}
			}
		
		
		
		
		
			return back()->with('success', 'Product has been updated');
        }
		
		
		
		
    }
}
