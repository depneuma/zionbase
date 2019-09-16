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

class AddsermonController extends Controller
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
				
				 
        return view('admin.add-sermon')->with($data);

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
	
	
	/*public function clean($string) {
    
	
	
	$string = strtolower($string);
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		$string = preg_replace("/[\s-]+/", " ", $string);
		
		return preg_replace("/[\s_]/", "-", $string);
    } */
	
	
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}
	
	
	
	
	
	 
    protected function addsermondata(Request $request)
    {
        
		
		
		 $this->validate($request, [

        		'name' => 'required'

        		
				
				

        	]);
         
		 
				
		$input['name'] = Input::get('name');
		
		
		$settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  $pdfsize = $settings[0]->pdf_size;
		  $mp3size = $settings[0]->mp3_size;
       
		
		$rules = array(
		
		'name' => 'unique:sermons,name',
		
		'photo' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png',
		'audio_file' => 'max:'.$mp3size.'|mimes:mpga',
		'pdf_file' => 'max:'.$pdfsize.'|mimes:pdf'
		
		
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
            $sermonphoto="/sermonphoto/";
			$big = "/post/";
            $path = base_path('images'.$sermonphoto.$filename);
			$bigpath = base_path('images'.$big.$filename);
			$destinationPath=base_path('images'.$sermonphoto);
 
        
               Image::make($image->getRealPath())->resize(300, 300)->save($path);
			   Image::make($image->getRealPath())->resize(870, 490)->save($bigpath);
				 /*Input::file('photo')->move($destinationPath, $filename);*/
               /* $user->image = $filename;
                $user->save();*/
				$namef=$filename;
		 }
		 else
		 {
			 $namef="";
		 }
	
	
	
	     $music_file = Input::file('audio_file'); 
		 if(isset($music_file))
		 { 
		 $filename = time() . '.' . $music_file->getClientOriginalName();
		
		 $sermonmp3 = base_path('images/mp3/'); 
		 $music_file->move($sermonmp3,$filename); 
		 $mp3name = $filename; 
		 }
		 else
		 {
		    $mp3name = "";
		 }
		 
		 
		 
		 
		 $pdf_file = Input::file('pdf_file'); 
		 if(isset($pdf_file))
		 { 
		 $filenamer = time() . '.' . $pdf_file->getClientOriginalName();
		  
		 $sermonpdf = base_path('images/pdf/'); 
		 $pdf_file->move($sermonpdf,$filenamer); 
		 $pdfname = $filenamer; 
		 }
		 else
		 {
		    $pdfname = "";
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
		
		
		if(!empty($data['slug']))
		{
		$slug = $data['slug'];
		}
		else
		{
		   $slug = "";
		}
		
		
		if(!empty($data['pastor_name']))
		{
		   $pastor = $data['pastor_name'];
		}
		else
		{
		   $pastor = "";
		}
		
		
		$video_url=$data['video_url'];
		if(!empty($video_url))
		{
		   $videourl = $video_url;
		}
		else
		{
		   $videourl = "";
		}
		
		$datesubmit = date("Y-m-d H:i:s");
		
		
		if(!empty($data['tags']))
		{
		$post_tags=$data['tags'];
		}
		else
		{
		  $post_tags="";
		}
		
		
		
		
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $pagename=$name[$index];
		   $postdesc=$desc[$index];
		   
		  
		   
		   if($code=='en')
			   {
				   $parent=0;
				   
				   
			   }
			   else
			   {
			   
			      $post = DB::table('sermons')
		           	->where('token', '=', $token)
					->where('parent', '=', 0)
					->get();
					
					 $post_cnt = DB::table('sermons')
		           		->where('token', '=', $token)
					->where('parent', '=', 0)
					->count();
					if($post_cnt==0)
					{
					
                       	$parent = $idd;				
					  
					   
					}
					else
					{
					   $parent=$post[0]->id;
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
		
		
		
		
		
		
		
		$idd = DB::table('sermons')-> insertGetId(array(
        'name' => $pagenamo,
		 'post_slug' => $this->clean($slug),
		  'description' => htmlentities($postdesco),
		   'post_tags' => $post_tags,
		    'pastor_name' => $pastor,
			 'audio_file' => $mp3name,
			 'video_url' => $videourl,
			 'pdf_file' => $pdfname,
			 'image' => $namef,
			 'submitdate' => $datesubmit,
			 
			 
				'lang_code' => $code,
				'token' => $token,
				'parent' => $parent,
			));
		
		} 
		
		
		
		/* DB::insert('insert into sermons (name, post_slug, post_tags, description , pastor_name, audio_file, video_url, pdf_file, image, submitdate) values (?, ?, ?, ? ,?, ?, ?, ?, ?, ?)', [$name,$post_slug, $post_tags, $desc, $pastor,$mp3name,$videourl,$pdfname,$namef,$datesubmit]); */
		
		
			return back()->with('success', 'Sermon has been created');
        }
		
		
		
		
    }
}
