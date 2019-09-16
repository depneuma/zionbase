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


class EditgalleryimagesController extends Controller
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
    
	
	
	
	
	
	public function edit($id)

    {
		
		
	 $galleryimages = DB::select('select * from gallery_images where imgid = ?',[$id]);
     

       $gallery = DB::table('gallery')
	              ->where('parent','=',0)
	              ->orderBy('name', 'asc')->get();

        
		
		$data = array('galleryimages'=>$galleryimages, 'gallery'=>$gallery);
            return view('admin.editgalleryimages')->with($data);

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
	 
	  
	 
    protected function editgalleryimagesdata(Request $request)
    {
        
		
		
		$this->validate($request, [

        		/*'photo' => 'required'*/

        		
				
				

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
		  

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $galphoto="/galleryimages/";
			$delpath = base_path('images'.$galphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$galphoto.$filename);
			$destinationPath=base_path('images'.$galphoto);
			
			Image::make($image->getRealPath())->resize(600, 600)->save($path);
      
                /* Image::make($image->getRealPath())->resize(200, 200)->save($path);
				Input::file('photo')->move($destinationPath, $filename);*/
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		$gallery=$data['gallery'];
		
		$imgid=$data['imgid'];
		
		/* DB::insert('insert into users (name, email,password,phone,admin) values (?, ?,?, ?,?)', [$name,$email,$password,$phone,$admin]);*/
		DB::update('update gallery_images set gid="'.$gallery.'",galleryimage="'.$savefname.'" where imgid = ?', [$imgid]);
		
			return back()->with('success', 'Gallery image has been updated');
        }
		
		
		
		
    }
}
