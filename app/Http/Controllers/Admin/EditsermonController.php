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



class EditsermonController extends Controller
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
      $sermons = DB::select('select * from sermons where id = ?',[$id]);
	  
	  $staff_pastor = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('post_staff_type', '=', 'pastor')
				 ->orderBy('post_id', 'desc')->get();
	   $language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->orderBy('id','asc')
					->get();
      return view('admin.edit-sermon',['sermons'=>$sermons, 'staff_pastor' => $staff_pastor, 'language' => $language]);
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
	 
	 
	 
	 
	 
	 
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}
	 
	  
	 
    protected function sermondata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'name' => 'required'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['name'] = Input::get('name');
       
	   
	   $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  $pdfsize = $settings[0]->pdf_size;
		  $mp3size = $settings[0]->mp3_size;
	   
		
		$rules = array(
		
		/*'name'=>'required|unique:sermons,name,'.$id,*/
		
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
		  

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$name=$data['name'];
		
		
		$currentphoto=$data['currentphoto'];
		$currentmp3=$data['currentmp3'];
		$currentpdf=$data['currentpdf'];
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $sermonphoto="/sermonphoto/";
			$big = "/post/";
			$delpath = base_path('images'.$sermonphoto.$currentphoto);
			$delpathz = base_path('images'.$big.$currentphoto);
			File::delete($delpath);
			File::delete($delpathz);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$sermonphoto.$filename);
			$bigpath = base_path('images'.$big.$filename);
			$destinationPath=base_path('images'.$sermonphoto);
      
                 Image::make($image->getRealPath())->resize(300, 300)->save($path);
				 Image::make($image->getRealPath())->resize(870, 490)->save($bigpath);
				/*Input::file('photo')->move($destinationPath, $filename);*/
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
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
		    $mp3name = $currentmp3;
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
		    $pdfname = $currentpdf;
		 }
		
					
		
		$video_url=$data['video_url'];
		$datesubmit = date("Y-m-d H:i:s");
		
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
		   
		   
		   	
		   if($code=="en")
			{
			  
			  
			  
			  
			  
			  DB::update('update sermons set name="'.$pagename.'",post_slug="'.$this->clean($slug).'",post_tags="'.$post_tags.'",description="'.htmlentities($postdesc).'",pastor_name="'.$pastor.'",	audio_file="'.$mp3name.'",
		video_url="'.$video_url.'",	pdf_file="'.$pdfname.'",image="'.$savefname.'",submitdate="'.$datesubmit.'",lang_code="'.$code.'" where id = ?', [$id]);
		
			  
			  
			}
			else
			{
			    $counts = DB::table('sermons')
		            ->where('lang_code', '=', $code)
					 ->where('parent', '=', $id)
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
						
						
						
						
						
						
						if(!empty($mp3name))
						{
						   $mp3namers = $mp3name;
						}
						else
						{
						   $mp3namers = "";
						}
						
						if(!empty($video_url))
						{
						   $videourll = $video_url;
						}
						else
						{
						  $videourll = "";
						}
						
						if(!empty($pdfname))
						{
						   $pdfnamm = $pdfname;
						}
						else
						{
						    $pdfnamm = "";
						}
						
						
		
			
			DB::insert('insert into sermons (name, post_slug, post_tags, description , pastor_name, token, lang_code, parent, audio_file, video_url, pdf_file, image, submitdate) values (?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?)', [$pagenamo,$this->clean($slug), $post_tags, htmlentities($postdeco), $pastor,$token,$code,$id,$mp3namers,$videourll,$pdfnamm,$savefname,$datesubmit]);
			
			
					 
					 
				 }
				 else
				 {
				   
				 
				 
				 DB::update('update sermons set name="'.$pagename.'",post_slug="'.$this->clean($slug).'",post_tags="'.$post_tags.'",description="'.htmlentities($postdesc).'",pastor_name="'.$pastor.'",	audio_file="'.$mp3name.'",
		video_url="'.$video_url.'",	pdf_file="'.$pdfname.'",image="'.$savefname.'",submitdate="'.$datesubmit.'" where lang_code="'.$code.'" and parent = ?', [$id]);
		
				   
				   
				  
				   
				   
				 }
			
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*DB::update('update sermons set name="'.$name.'",post_slug="'.$post_slug.'",post_tags="'.$post_tags.'",description="'.$desc.'",pastor_name="'.$pastor_name.'",	audio_file="'.$mp3name.'",
		video_url="'.$video_url.'",	pdf_file="'.$pdfname.'",image="'.$savefname.'",submitdate="'.$datesubmit.'" where id = ?', [$id]);*/
		
			return back()->with('success', 'Sermon has been updated');
        }
		
		
		
		
    }
}
