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

class AddstaffController extends Controller
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
			$stafftype = DB::table('staff_type')
		            ->where('parent', '=', 0)
					->orderBy('name','asc')
					->get();	
					
			$stafftype_cnt = DB::table('staff_type')
		            ->where('parent', '=', 0)
					->orderBy('name','asc')
					->count();			
					
			$data = array('language' => $language, 'stafftype' => $stafftype, 'stafftype_cnt' => $stafftype_cnt); 		
        
		return view('admin.add-staff', $data);

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
	
	
	
	
	 
	 
    protected function addstaffdata(Request $request)
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
 
        
               Image::make($image->getRealPath())->resize(270, 270)->save($path);
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
		
		
		
		$post_desc=$data['post_desc'];
		$post_type = $data['post_type'];
		$media_type = $data['media_type'];
		
		
		
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
		
		if(!empty($post_website))
		{
		   $postwebsite = $post_website;
		}
		else
		{
		  $postwebsite = "";
		}
		
		if(!empty($post_location))
		{
		   $location = $post_location;
		}
		else
		{
		   $location = "";
		}
		
		$post_email = $data['post_email'];
		
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
		    $facebook = "";
		}
		if(!empty($post_twitter))
		{
		   $twitter = $post_twitter;
		}
		else
		{
		    $twitter = "";
		}
		if(!empty($post_gplus))
		{
		   $gplus = $post_gplus;
		}
		else
		{
		    $gplus = "";
		}
		if(!empty($post_youtube))
		{
		   $youtube = $post_youtube;
		}
		else
		{
		    $youtube = "";
		}
		
		
		
		
		$post_status = 1;
		
		$post_date = date("Y-m-d H:i:s");
		
		
		/* slug */
		/*$str_one = strtolower($post_title);
		$str_two = preg_replace("/[^a-z0-9_\s-]/", "", $post_title);
		$str_three = preg_replace("/[\s-]+/", " ", $str_two);
		$post_slug = preg_replace("/[\s_]/", "-", $str_three);*/
		/* end slug */
		
		
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
		
		/*$one = str_replace(" ", "-", $pagenamo);
		$two = str_replace("&", "", $one);
		$three = str_replace("@", "", $two);
		$four = str_replace("!", "", $three);
		$five = str_replace("$", "", $four);
		$six = str_replace("%", "", $five);
		$seven = str_replace("*", "", $six);
		$eight = str_replace("(", "", $seven);
		$nine = str_replace(")", "", $eight);
		$ten = str_replace("=", "", $nine);
		$leven = str_replace("+", "", $ten);
		$leven = str_replace("+", "", $ten);*/
		
		$idd = DB::table('post')-> insertGetId(array(
        'post_title' => $pagenamo,
		 'post_slug' => $this->clean($slug),
		  'post_desc' => htmlentities($postdesco),
		   'post_type' => $post_type,
		    'post_media_type' => $media_type,
			 'post_image' => $namef,
			 'post_location' => $location,
			 'post_phone' => $post_phone,
			 'post_website' => $postwebsite,
			 'post_email' => $post_email,
			 'post_date' => $post_date,
			 'post_status' => $post_status,
			 'post_staff_type' => $post_staff_type,
			 'post_facebook' => $facebook,
			 'post_twitter' => $twitter,
			 'post_gplus' => $gplus,
			 'post_youtube' => $youtube,
			 
				'lang_code' => $code,
				'token' => $token,
				'parent' => $parent,
			));
		
		} 
		
		/*DB::insert('insert into post (post_title, post_slug, post_desc, post_type, post_media_type, post_image, post_location, post_phone, post_website, post_email, post_date, post_status, post_staff_type, post_facebook, post_twitter, post_gplus, post_youtube) values (?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$post_title,$post_slug,$post_desc,$post_type,$media_type,$namef,$location,$post_phone,$postwebsite,$post_email,$post_date,$post_status,$post_staff_type,$facebook,$twitter,$gplus,$youtube]);*/
		
		
			return back()->with('success', 'Staff has been created');
        }
		
		
		
		
    }
}
