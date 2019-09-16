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


class EditeventController extends Controller
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
      $event = DB::select('select * from post where post_id = ?',[$id]);
	  
	   $language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->orderBy('id','asc')
					->get();
	  
      return view('admin.edit-event',['event'=>$event, 'language' => $language]);
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
	
	
	 
	 
	 
	 
    protected function eventdata(Request $request)
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
 
        
               Image::make($image->getRealPath())->resize(870, 490)->save($path);
				
				$namef=$filename;
				
		 }
		 else
		 {
			 $namef=$currentphoto;
		 }
		 
		 
		
		 
		 
		 $post_title=$data['post_title'];
		 
		 $post_seat_space = $data['post_seat_space'];
		
		$post_desc=$data['post_desc'];
		$post_type = $data['post_type'];
		$media_type = $data['media_type'];
		
		
		$post_start_date = $data['post_start_date'];
		$post_end_date = $data['post_end_date'];
		
		
		if(!empty($data['slug']))
		{
		$slug = $data['slug'];
		}
		else
		{
		   $slug = "";
		}
		
		
		
		$post_location = $data['post_location'];
		$post_phone = $data['post_phone'];
		$post_website = $data['post_website'];
		
		$save_website = $data['save_website'];
		
		if(!empty($post_website))
		{
		   $postwebsite = $post_website;
		}
		else
		{
		  $postwebsite = $save_website;
		}
		
		$post_email = $data['post_email'];
		
		
		if(!empty($data['tags']))
		{
		$post_tags=$data['tags'];
		}
		else
		{
		  $post_tags=$data['save_tags'];
		}
		
		
		$post_status = 1;
		
		 
		
		 			
		
		$post_date = date("Y-m-d H:i:s");
		
		
		
		
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$post_title[$index];
		   $postdesc=$post_desc[$index];	
		   	
		   if($code=="en")
			{
			  
			  
			 
			  
			  
			  DB::update('update post set post_title="'.$pagename.'",post_slug="'.$this->clean($slug).'",post_desc="'.htmlentities($postdesc).'",post_tags="'.$post_tags.'",post_type="'.$post_type.'",post_seat_space="'.$post_seat_space.'",post_media_type="'.$media_type.'",post_image="'.$namef.'",post_start_date="'.$post_start_date.'",post_end_date="'.$post_end_date.'",post_location="'.$post_location.'",post_phone="'.$post_phone.'",post_website="'.$postwebsite.'",	post_email="'.$post_email.'",post_date="'.$post_date.'",lang_code="'.$code.'" where post_id = ?', [$post_id]);
			  
			  
			  
			  
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
				     
					 
			
			
			
			
			DB::insert('insert into post (post_title,post_slug,post_desc,post_tags,post_type,token, lang_code, parent,post_seat_space,post_media_type,post_image,post_start_date,post_end_date,post_location,post_phone,post_website,post_email,post_date,post_status) values (?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$pagenamo,$this->clean($slug),htmlentities($postdeco),$post_tags,$post_type,$token,$code,$post_id,$post_seat_space,$media_type,$namef,$post_start_date,$post_end_date,$post_location,$post_phone,$postwebsite,$post_email,$post_date,$post_status]);
			
				 
					 
				 }
				 else
				 {
				   
				   
			
				 
				  DB::update('update post set post_title="'.$pagename.'",post_slug="'.$this->clean($slug).'",post_desc="'.htmlentities($postdesc).'",post_tags="'.$post_tags.'",post_type="'.$post_type.'",post_seat_space="'.$post_seat_space.'",post_media_type="'.$media_type.'",post_image="'.$namef.'",post_start_date="'.$post_start_date.'",post_end_date="'.$post_end_date.'",post_location="'.$post_location.'",post_phone="'.$post_phone.'",post_website="'.$postwebsite.'",	post_email="'.$post_email.'",post_date="'.$post_date.'" where lang_code="'.$code.'" and parent = ?', [$post_id]);
				 
				 
				 
				   
				   
				 }
			
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*DB::update('update post set post_title="'.$post_title.'",post_slug="'.$post_slug.'",post_desc="'.$post_desc.'",post_tags="'.$post_tags.'",post_type="'.$post_type.'",post_seat_space="'.$post_seat_space.'",post_media_type="'.$media_type.'",post_image="'.$namef.'",post_start_date="'.$post_start_date.'",post_end_date="'.$post_end_date.'",post_location="'.$post_location.'",post_phone="'.$post_phone.'",post_website="'.$postwebsite.'",	post_email="'.$post_email.'",post_date="'.$post_date.'" where post_id = ?', [$post_id]);*/
		
			return back()->with('success', 'Event has been updated');
        }
		
		
		
		
    }
}
