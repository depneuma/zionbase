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

class AddslideshowController extends Controller
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
        return view('admin.add-slideshow', ['language' => $language]);

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
	 
    protected function addslideshowdata(Request $request)
    {
        
		
		
		 $this->validate($request, [

        		'slide_title' => 'required'

        		
				
				

        	]);
         
		 
				
		
       
	    $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  $pdfsize = $settings[0]->pdf_size;
		  $mp3size = $settings[0]->mp3_size;
	   
		
		$rules = array(
		
		'slide_title' => 'unique:slideshow,slide_title',
		
		'slide_image' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png'
		
		
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
		 

		
	
	
	     $image = Input::file('slide_image');
		 if($image!="")
		 {
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $photo="/post/";
            $path = base_path('images'.$photo.$filename);
			$destinationPath=base_path('images'.$photo);
 
        
               Image::make($image->getRealPath())->resize(1600, 1200)->save($path);
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

			
		$slide_title=$data['slide_title'];
		$slide_sub_title=$data['slide_sub_title'];
		$slide_btn_text=$data['slide_btn_text'];
		$slide_btn_link=$data['slide_btn_link'];
		
		
		$slide_title=$data['slide_title'];
		if(!empty($slide_title))
		{
		   $slidetitle = $slide_title;
		}
		else
		{
		   $slidetitle = "";
		}
		
		if(!empty($slide_sub_title))
		{
		   $slidesub = $slide_sub_title;
		}
		else
		{
		   $slidesub = "";
		}
		
		if(!empty($slide_btn_text))
		{
		   $slidebtn = $slide_btn_text;
		}
		else
		{
		   $slidebtn = "";
		}
		
		
		if(!empty($slide_btn_link))
		{
		   $slidelink = $slide_btn_link;
		}
		else
		{
		   $slidelink = "";
		}
		
		
		
		
		
		$token = $data['token'];
		foreach($data['code'] as $index => $code)
		{
		
		   $slidetitle=$slide_title[$index];
		   $slidesub=$slide_sub_title[$index];
		   $slidebtn=$slide_btn_text[$index];
		
			if($code=='en')
			   {
				   $parent=0;
			   }
			   else
			   {
			   
			       $slideshow = DB::table('slideshow')
		           	->where('token', '=', $token)
					->where('parent', '=', 0)
					->get();
					
					 $slideshow_cnt = DB::table('slideshow')
		           		->where('token', '=', $token)
					->where('parent', '=', 0)
					->count();
					if($slideshow_cnt==0)
					{
					
                       	$parent = $idd;				
					  
					   
					}
					else
					{
					   $parent=$slideshow[0]->id;
					}
					
					
			   }
		
		if(!empty($slidetitle))
		{
		   $slidetito = $slidetitle;
		}
		else
		{
		   $slidetito = "";
		}
		
		if(!empty($slidesub))
		{
		   $slidesoo = $slidesub;
		}
		else
		{
		   $slidesoo = "";
		}
		
		
		if(!empty($slidebtn))
		{
		   $slidebto = $slidebtn;
		}
		else
		{
		   $slidebto = "";
		}
		
		/*DB::insert('insert into gallery (name, image, lang_code, parent) values (?, ?, ?, ?)', [$pagename,$namef,$code,$parent]);*/
		
		$idd = DB::table('slideshow')-> insertGetId(array(
        'slide_title' => $slidetito,
		 'slide_sub_title' => $slidesoo,
		  'slide_btn_text' => $slidebto,
		   'slide_btn_link' => $slidelink,
		   'slide_image' => $namef,
        'lang_code' => $code,
		'token' => $token,
		'parent' => $parent,
			));
		
		
		}
		
		
		
		
		
		/* DB::insert('insert into slideshow (slide_title, slide_sub_title, slide_btn_text, slide_btn_link, slide_image) values (?, ? ,?, ?, ?)', [$slidetitle,$slidesub,$slidebtn,$slidelink,$namef]);*/
		
		
			return back()->with('success', 'Slideshow has been created');
        }
		
		
		
		
    }
}
