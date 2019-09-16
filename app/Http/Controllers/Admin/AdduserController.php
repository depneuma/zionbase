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

class AdduserController extends Controller
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

        return view('admin.adduser');

    }
	
	
	
	public function admin_formview()

    {
        $menu_option=array("Dashboard" => 1 ,"Settings" => 2, "Users" => 3, "Gallery" => 4, "Gallery Images" => 5, "Shop" => 6, "Sermons" => 7, "Testimonials" => 8, "Slideshow" => 9, "Blog" => 10, "Pages" => 11, "Events" => 12, "Events Booking" => 13, 'Staff' => 14, 'Newsletter' => 15, 'Donate' => 16, 'Translate' => 17, 'Language' => 18);
		
		$data=array('menu_option' =>$menu_option);
        return view('admin.add_administrator')->with($data);

    }
	
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
	 protected $fillable = ['name', 'email','password','phone'];
	 
	protected function adduserdata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'name' => 'required',

        		'email' => 'required|email',

        		'password' => 'required'
				
				

        	]);
         
		 
				
		$input['email'] = Input::get('email');
		
		$input['name'] = Input::get('name');
       
		
		/* $rules = array('email' => 'unique:users,email');*/
		
		 $data = $request->all();
		$rules = array(
        
       
		
        'email'=>'required|email|unique:users,email',
		'name' => 'required|regex:/^[\w-]*$/|max:255|unique:users,name',
		'photo' => 'max:1024|mimes:jpg,jpeg,png'
		
        );
		
		
		$messages = array(
            
            'email' => 'The :attribute field is already exists',
            'name' => 'The :attribute field must only be letters and numbers (no spaces)'
			
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
            $userphoto="/userphoto/";
            $path = base_path('images'.$userphoto.$filename);
 
        
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
               /* $user->image = $filename;
                $user->save();*/
			$namef=$filename;	
			}
		 else
		 {
			 $namef="";
		 }	
		

		
		 

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$name=$data['name'];
		$email=$data['email'];
		$password=bcrypt($data['password']);
		
		
		$admin=$data['usertype'];
		$gender='';
		
		
		
		
		
		
		
		if(!empty($data['phone']))
		{
			$phone = $data['phone'];
		}
		else
		{
			$phone = "";
		}
		
		$status = 1;
		
		
		if(!empty($data['menu_option'])){
		$menuvalue = "";
		foreach($data['menu_option'] as $menu_option)
		{
			 $menuvalue .=$menu_option.',';
		}			
		
		$menu_value = rtrim($menuvalue,",");
		}
		else
		{
			
			$menu_value = "";
		}
	     
		
		
		
		DB::insert('insert into users (name,email,password,phone,photo,admin,gender,show_menu,status) values (?, ?,?, ?,?,?,?,?,?)', 
		[$name,$email,$password,$phone,$namef,$admin,$gender,$menu_value,$status]);
		
		
			return back()->with('success', 'Account has been created');
        }
		
		
		
		
    }
	 
	 
	 
	 
	 
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
	 
	  
	 
    
}
