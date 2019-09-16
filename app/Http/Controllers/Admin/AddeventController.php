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

class AddeventController extends Controller
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
		$data = array('language' => $language);			
        return view('admin.add-event', ['language' => $language]);

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
	
	
	 
	 
	 
    protected function addeventdata(Request $request)
    {
        
		
		
		 $this->validate($request, [

        		'post_title' => 'required'

        		
				
				

        	]);
         
		 
				
		$input['post_title'] = Input::get('post_title');
       $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  $pdfsize = $settings[0]->pdf_size;
		  $mp3size = $settings[0]->mp3_size;
		
		$rules = array(
		
		'post_title' => 'unique:post,post_title',
		
		'photo' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png',
		
		
		
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
            $testimonialphoto="/post/";
            $path = base_path('images'.$testimonialphoto.$filename);
			$destinationPath=base_path('images'.$testimonialphoto);
 
        
               Image::make($image->getRealPath())->resize(870, 490)->save($path);
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
		$post_title=$data['post_title'];
		
		$post_seat_space = $data['post_seat_space'];
		
		if(!empty($data['slug']))
		{
		$slug = $data['slug'];
		}
		else
		{
		   $slug = "";
		}
		
		
		$post_desc=$data['post_desc'];
		$post_type = $data['post_type'];
		$media_type = $data['media_type'];
		
		
		$post_start_date = $data['post_start_date'];
		$post_end_date = $data['post_end_date'];
		
		
		
		$post_location = $data['post_location'];
		$post_phone = $data['post_phone'];
		$post_website = $data['post_website'];
		
		if(!empty($post_website))
		{
		   $postwebsite = $post_website;
		}
		else
		{
		  $postwebsite = "";
		}
		
		$post_email = $data['post_email'];
		
		
		if(!empty($data['tags']))
		{
		$post_tags=$data['tags'];
		}
		else
		{
		  $post_tags="";
		}
		
		
		$post_status = 1;
		
		$post_date = date("Y-m-d H:i:s");
		
		
		
		
		
		
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$post_title[$index];
		   $postdesc=$post_desc[$index];
		   
		   if($code=='en')
			   {
				   $parent=0;
			   }
			   else
			   {
			   
			      $post = DB::table('post')
		           	->where('token', '=', $token)
					->where('parent', '=', 0)
					->get();
					
					 $post_cnt = DB::table('post')
		           		->where('token', '=', $token)
					->where('parent', '=', 0)
					->count();
					if($post_cnt==0)
					{
					
                       	$parent = $idd;				
					  
					   
					}
					else
					{
					   $parent=$post[0]->post_id;
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
		
		
		if(!empty($postdesc))
		{
		   $postdesco = $postdesc;
		}
		else
		{
		   $postdesco = "";
		}
		
		
		
		$idd = DB::table('post')-> insertGetId(array(
        'post_title' => $pagenamo,
		 'post_slug' => $this->clean($slug),
		  'post_desc' => htmlentities($postdesco),
		  'post_tags' => $post_tags,
		   'post_type' => $post_type,
		   'post_seat_space' => $post_seat_space,
		    'post_media_type' => $media_type,
			 'post_image' => $namef,
			 'post_start_date' => $post_start_date,
			 'post_end_date' => $post_end_date,
			 'post_location' => $post_location,
			 'post_phone' => $post_phone,
			 'post_website' => $postwebsite,
			 'post_email' => $post_email,
			 'post_date' => $post_date,
			 'post_status' => $post_status,
			 
			 
				'lang_code' => $code,
				'token' => $token,
				'parent' => $parent,
			));
		
		} 
		
		
	
		/* DB::insert('insert into post (post_title,post_slug,post_desc,post_tags,post_type,post_seat_space,post_media_type,post_image,post_start_date,post_end_date,post_location,post_phone,post_website,post_email,post_date,post_status) values (?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$post_title,$post_slug,$post_desc,$post_tags,$post_type,$post_seat_space,$media_type,$namef,$post_start_date,$post_end_date,$post_location,$post_phone,$postwebsite,$post_email,$post_date,$post_status]);*/
		
		
			return back()->with('success', 'Event has been created');
        }
		
		
		
		
    }
}
