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
use Auth;


class EdituserController extends Controller
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
    
	
	public function showform($id) {
      $users = DB::select('select * from users where id = ?',[$id]);
	  $userid = $id;
      return view('admin.edituser',['users'=>$users, 'userid' => $userid]);
   }
	
	
   public function admin_showform($id) {
      $users = DB::select('select * from users where id = ?',[$id]);
	  $userid = $id;
	  
	  
	  $menu_option=array("Dashboard" => 1 ,"Settings" => 2, "Users" => 3, "Gallery" => 4, "Gallery Images" => 5, "Shop" => 6, "Sermons" => 7, "Testimonials" => 8, "Slideshow" => 9, "Blog" => 10, "Pages" => 11, "Events" => 12, "Events Booking" => 13, 'Staff' => 14, 'Newsletter' => 15, 'Donate' => 16, 'Translate' => 17, 'Language' => 18);
      return view('admin.edit_administrator',['users'=>$users, 'userid' => $userid, 'menu_option' =>$menu_option]);
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
            'email' => 'required|string|email|max:255|unique:users'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  protected $fillable = ['name', 'email','password','phone'];
	 
    protected function edituserdata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'name' => 'required',

        		'email' => 'required|email'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['email'] = Input::get('email');
       
		
		$input['name'] = Input::get('name');
		
		$settings = DB::select('select * from settings where id = ?',[1]);
	   
	   $imgsize = $settings[0]->image_size;
		
		
		$rules = array(
        
       
		
        'email'=>'required|email|unique:users,email,'.$id,
		'name' => 'required|regex:/^[\w-]*$/|max:255|unique:users,name,'.$id,
		'photo' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png'
		
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
		  

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$name=$data['name'];
		$email=$data['email'];
		
		
		
		
		$phone=$data['phone'];
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $userphoto="/userphoto/";
			$delpath = base_path('images'.$userphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$userphoto.$filename);
      
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		if(!empty($data['password']))
		{
			$password=bcrypt($data['password']);
			$passtxt=$password;
		}
		else
		{
			$passtxt=$data['savepassword'];
		}
		
		$admin=$data['usertype'];
		
		
		
		
		
		
		
		
		
		if(Auth::user()->id==1)
		{
		   if($id!=1)
		   {
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
		   }
		   else
		   {
			   $menu_value = "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18";
		   }
		
		
		
		
		
		DB::update('update post set post_email="'.$email.'" where post_type="comment" and post_user_id = ?', [$id]);
		
		
		
		DB::update('update users set name="'.$name.'",email="'.$email.'",password="'.$passtxt.'",phone="'.$phone.'",photo="'.$savefname.'",show_menu="'.$menu_value.'" where id = ?', [$id]);
		
		}
		else
		{
			
	    
		
		DB::update('update post set post_email="'.$email.'" where post_type="comment" and post_user_id = ?', [$id]);
		
		
		
		DB::update('update users set name="'.$name.'",email="'.$email.'",password="'.$passtxt.'",phone="'.$phone.'",photo="'.$savefname.'" where id = ?', [$id]);
			
		}
		
		
		
		
			
			
		
		
		
			return back()->with('success', 'Account has been updated');
        }
		
		
		
		
    }
}
