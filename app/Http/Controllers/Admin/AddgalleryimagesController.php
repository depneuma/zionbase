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

class AddgalleryimagesController extends Controller
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

        return view('admin.addgalleryimages');

    }
	
	
	
	public function getgallery()

    {

        $gallery = DB::table('gallery')
		           ->where('parent','=',0)
				   ->orderBy('name', 'asc')
				   ->get();

        return view('admin.addgalleryimages', ['gallery' => $gallery]);

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
	 
    protected function addgalleryimages(Request $request)
    {
        
		
		
		 $this->validate($request, [

        		'photo' => 'required'

        		
				
				

        	]);
			
			
			
			
			
			
         
		 
				
		$input['photo'] = Input::get('photo');
		
		
       
		
		/* $rules = array('email' => 'unique:users,email');*/
		
		 $data = $request->all();
         
		  $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
				
		
       
		
		$rules = array(
		
		
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
            $userphoto="/galleryimages/";
            $path = base_path('images'.$userphoto.$filename);
			$destinationPath=base_path('images'.$userphoto);
 
        
                Image::make($image->getRealPath())->resize(600, 600)->save($path);
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
		
		
		$gallery=$data['gallery'];
		
		
		
		DB::insert('insert into gallery_images (gid, galleryimage) values (?, ?)', [$gallery,$namef]);
		
		
			return back()->with('success', 'Gallery image has been created');
        }
		
		
		
		
    }
}
