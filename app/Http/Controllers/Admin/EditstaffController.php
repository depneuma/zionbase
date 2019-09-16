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


class EditstaffController extends Controller
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
      $staff = DB::select('select * from post where post_id = ?',[$id]);
	  $language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->orderBy('id','asc')
					->get();
					
		$stafftype = DB::table('staff_type')
		            ->where('parent', '=', 0)
					->orderBy('name','asc')
					->get();	
					
			$stafftype_cnt = DB::table('staff_type')
		            ->where('parent', '=', 0)
					->orderBy('name','asc')
					->count();			
      return view('admin.edit-staff',['staff'=>$staff, 'language' => $language, 'stafftype' => $stafftype, 'stafftype_cnt' => $stafftype_cnt]);
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
            'post_title' => 'required|string|max:255'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	
	
	
	
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}
	
	
	
	
	
	
	
	 
    protected function staffdata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'post_title' => 'required'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $post_id=$data['post_id'];
		 $id=$data['post_id'];
        			
		$input['post_title'] = Input::get('post_title');
       $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  
       
		
		$rules = array(
		
		
		'post_title'=>'required',
		'photo' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png',
		
		
		
		);

		
		
		
		$messages = array(
            
            
			
        );

		$validator = Validator::make(Input::all(), $rules, $messages);
		
		

		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			/*return back()->withErrors($validator);*/
			return back()->with('error', 'Invalid file type OR File size is big');
		}
		else
		{  
		  

		
		$currentphoto=$data['currentphoto'];
		
		
       $path = base_path('images/post/'.$currentphoto);
	   
	   
		
		
		
		
		
		$image = Input::file('photo');
         if($image!="")
		 {
            
			 
	         File::delete($path);
	         
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            $testimonialphoto="/post/";
            $path = base_path('images'.$testimonialphoto.$filename);
			$destinationPath=base_path('images'.$testimonialphoto);
 
        
               Image::make($image->getRealPath())->resize(270, 270)->save($path);
				
				$namef=$filename;
				
		 }
		 else
		 {
			 $namef=$currentphoto;
		 }
		 
		 
		
		 
		 
		 $post_title=$data['post_title'];
		 
		
		
		$post_desc=$data['post_desc'];
		$post_type = $data['post_type'];
		$media_type = $data['media_type'];
		
		
		
		
		
		
		$post_location = $data['post_location'];
		$post_phone = $data['post_phone'];
		$post_website = $data['post_website'];
		
		$save_website = $data['save_website'];
		
		
		if(!empty($data['slug']))
		{
		$slug = $data['slug'];
		}
		else
		{
		   $slug = "";
		}
		
		
		
		if(!empty($post_website))
		{
		   $postwebsite = $post_website;
		}
		else
		{
		  $postwebsite = $save_website;
		}
		
		if(!empty($post_location))
		{
		   $location = $post_location;
		}
		else
		{
		   $location = $data['save_location'];
		}
		
		
		
		
		
		$post_staff_type = $data['post_staff_type'];
		$post_facebook = $data['post_facebook'];
		$post_twitter = $data['post_twitter'];
		$post_gplus = $data['post_gplus'];
		$post_youtube = $data['post_youtube'];
		
		
		
		if(!empty($post_facebook))
		{
		   $facebook = $post_facebook;
		}
		else
		{
		    $facebook = $data['save_facebook'];
		}
		if(!empty($post_twitter))
		{
		   $twitter = $post_twitter;
		}
		else
		{
		    $twitter = $data['post_twitter'];
		}
		if(!empty($post_gplus))
		{
		   $gplus = $post_gplus;
		}
		else
		{
		    $gplus = $data['post_gplus'];
		}
		if(!empty($post_youtube))
		{
		   $youtube = $post_youtube;
		}
		else
		{
		    $youtube = $data['post_youtube'];
		}
		
		
		
		
		
		
		
		
		
		$post_email = $data['post_email'];
		
		
		
		
		
		$post_status = 1;
		
		 
		 /* slug */
		/*$str_one = strtolower($post_title);
		$str_two = preg_replace("/[^a-z0-9_\s-]/", "", $str_one);
		$str_three = preg_replace("/[\s-]+/", " ", $str_two);
		$post_slug = preg_replace("/[\s_]/", "-", $str_three);*/
		/* end slug */
		 			
		
		$post_date = date("Y-m-d H:i:s");
		
		
		
		
		
		
		
		
		
		
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$post_title[$index];
		   $postdesc=$post_desc[$index];	
		   	
		   if($code=="en")
			{
			  
			  
			  DB::update('update post set post_title="'.$pagename.'",post_slug="'.$this->clean($slug).'",post_desc="'.htmlentities($postdesc).'",post_type="'.$post_type.'",lang_code="'.$code.'",post_media_type="'.$media_type.'",post_image="'.$namef.'",post_location="'.$location.'",post_phone="'.$post_phone.'",post_website="'.$postwebsite.'",	post_email="'.$post_email.'",post_date="'.$post_date.'",post_staff_type="'.$post_staff_type.'",post_facebook="'.$facebook.'",post_twitter="'.$twitter.'",post_gplus="'.$gplus.'",post_youtube="'.$youtube.'" where post_id = ?', [$post_id]);
			  
			}
			else
			{
			    $counts = DB::table('post')
		            ->where('lang_code', '=', $code)
					 ->where('parent', '=', $post_id)
					  ->count();
			     if($counts==0)
				 {
						if(!empty($pagename))
						{
						   $pagenamo = $pagename;
						}
						else
						{
						   $pagenamo = "";
						}
						
						
						if(!empty($postdesc))
						{
						   $postdeco = $postdesc;
						}
						else
						{
						   $postdeco = "";
						}
				     
					 
			DB::insert('insert into post (post_title, post_slug, post_desc, post_type, token, lang_code, parent, post_media_type, post_image, post_location, post_phone, post_website, post_email, post_date, post_status, post_staff_type, post_facebook, post_twitter, post_gplus, post_youtube) values (?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$pagenamo,$this->clean($slug),htmlentities($postdeco),$post_type,$token,$code,$post_id,$media_type,$namef,$location,$post_phone,$postwebsite,$post_email,$post_date,$post_status,$post_staff_type,$facebook,$twitter,$gplus,$youtube]);		 
					 
				 }
				 else
				 {
				   
				   
				   
				 DB::update('update post set post_title="'.$pagename.'",post_slug="'.$this->clean($slug).'",post_desc="'.htmlentities($postdesc).'",post_type="'.$post_type.'",post_media_type="'.$media_type.'",post_image="'.$namef.'",post_location="'.$location.'",post_phone="'.$post_phone.'",post_website="'.$postwebsite.'",	post_email="'.$post_email.'",post_date="'.$post_date.'",post_staff_type="'.$post_staff_type.'",post_facebook="'.$facebook.'",post_twitter="'.$twitter.'",post_gplus="'.$gplus.'",post_youtube="'.$youtube.'" where lang_code="'.$code.'" and parent = ?', [$post_id]);  
				   
				   
				 }
			
			}
		}
		
		
		
		
		
		/*DB::update('update post set post_title="'.$post_title.'",post_slug="'.$post_slug.'",post_desc="'.$post_desc.'",post_type="'.$post_type.'",post_media_type="'.$media_type.'",post_image="'.$namef.'",post_location="'.$location.'",post_phone="'.$post_phone.'",post_website="'.$postwebsite.'",	post_email="'.$post_email.'",post_date="'.$post_date.'",post_staff_type="'.$post_staff_type.'",post_facebook="'.$facebook.'",post_twitter="'.$twitter.'",post_gplus="'.$gplus.'",post_youtube="'.$youtube.'" where post_id = ?', [$post_id]);*/
		
			return back()->with('success', 'Staff has been updated');
        }
		
		
		
		
    }
}
