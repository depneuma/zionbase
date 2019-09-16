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

class AddtestimonialController extends Controller
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
        return view('admin.add-testimonial', ['language' => $language]);

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
	 
    protected function addtestimonialdata(Request $request)
    {
        
		
		
		 $this->validate($request, [

        		'name' => 'required'

        		
				
				

        	]);
         
		 
				
		$input['name'] = Input::get('name');
       
		
		$settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		
		
		$rules = array(
		
		'name' => 'unique:testimonials,name',
		
		'photo' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png'
		
		
		);
		
		
		$messages = array(
            
            
			
        );

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		 
		 
		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		}
		else
		{  
		 

		
	
	
	     $image = Input::file('photo');
		 if($image!="")
		 {
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $testimonialphoto="/testimonialphoto/";
            $path = base_path('images'.$testimonialphoto.$filename);
			$destinationPath=base_path('images'.$testimonialphoto);
 
        
               Image::make($image->getRealPath())->resize(100, 100)->save($path);
				 /*Input::file('photo')->move($destinationPath, $filename);*/
               /* $user->image = $filename;
                $user->save();*/
				$namef=$filename;
		 }
		 else
		 {
			 $namef="";
		 }
	
	
	
	
	
	
	
		  $data = $request->all();

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$name=$data['name'];
		
		$desc=$data['desc'];
		
		
		
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$name[$index];
		   $pagedesc=$desc[$index];
		
			if($code=='en')
			   {
				   $parent=0;
			   }
			   else
			   {
			   
			       $testimonials = DB::table('testimonials')
		           	->where('token', '=', $token)
					->where('parent', '=', 0)
					->get();
					
					 $testimonials_cnt = DB::table('testimonials')
		           		->where('token', '=', $token)
					->where('parent', '=', 0)
					->count();
					if($testimonials_cnt==0)
					{
					
                       	$parent = $idd;				
					  
					   
					}
					else
					{
					   $parent=$testimonials[0]->id;
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
		
		
		/*DB::insert('insert into gallery (name, image, lang_code, parent) values (?, ?, ?, ?)', [$pagename,$namef,$code,$parent]);*/
		
		$idd = DB::table('testimonials')-> insertGetId(array(
        'name' => $pagenamo,
		'description' => $pagedeso,
		'image' => $namef,
        'lang_code' => $code,
		'token' => $token,
		'parent' => $parent,
			));
		
		
		}
		
		
		
		
		/*DB::insert('insert into testimonials (name, description , image) values (?, ? ,?)', [$name,$desc,$namef]);*/
		
		
			return back()->with('success', 'Testimonial has been created');
        }
		
		
		
		
    }
}
