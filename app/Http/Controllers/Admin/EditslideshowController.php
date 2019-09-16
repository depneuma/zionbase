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


class EditslideshowController extends Controller
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
	$language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->orderBy('id','asc')
					->get();
      $slideshow = DB::select('select * from slideshow where id = ?',[$id]);
      return view('admin.edit-slideshow',['slideshow'=>$slideshow, 'language' => $language]);
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
            'slide_title' => 'required|string|max:255'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  
	 
    protected function slideshowdata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'slide_title' => 'required'

        		
				
				

        	]);
			
			 $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  $pdfsize = $settings[0]->pdf_size;
		  $mp3size = $settings[0]->mp3_size;
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		
       
		
		$rules = array(
		
		/*'slide_title'=>'required|unique:slideshow,slide_title,'.$id,*/
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
		  

			
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('slide_image');
		 if($image!="")
		 {
             $nimage = DB::table('slideshow')->where('id', $id)->first();
		$orginalfiles=$nimage->slide_image;
			 $npath = base_path('images/post/'.$orginalfiles);
	  File::delete($npath);
			
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            $photo="/post/";
            $path = base_path('images'.$photo.$filename);
			$destinationPath=base_path('images'.$photo);
 
        
               Image::make($image->getRealPath())->resize(1600, 1200)->save($path);
				 /*Input::file('photo')->move($destinationPath, $filename);*/
               /* $user->image = $filename;
                $user->save();*/
				$savefname=$filename;
		 }
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		
		
		$slide_title=$data['slide_title'];
		$slide_sub_title=$data['slide_sub_title'];
		$slide_btn_text=$data['slide_btn_text'];
		$slide_btn_link=$data['slide_btn_link'];
		
		
		/*$save_slide_title = $data['save_slide_title'];
		$save_sub_title = $data['save_sub_title'];
		
		$save_btn_text = $data['save_btn_text'];
		$save_btn_link = $data['save_btn_link'];*/
		
		
		/*if(!empty($slide_title))
		{
		   $slidetitle = $slide_title;
		}
		else
		{
		   $slidetitle = $save_slide_title;
		}
		
		if(!empty($slide_sub_title))
		{
		   $slidesub = $slide_sub_title;
		}
		else
		{
		   $slidesub = $save_sub_title;
		}
		
		if(!empty($slide_btn_text))
		{
		   $slidebtn = $slide_btn_text;
		}
		else
		{
		   $slidebtn = $save_btn_text;
		}*/
		
		
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
		   	
		   if($code=="en")
			{
			  
			  
			DB::update('update slideshow set slide_title="'.$slidetitle.'",slide_sub_title="'.$slidesub.'",slide_btn_text="'.$slidebtn.'",slide_btn_link="'.$slidelink.'",slide_image="'.$savefname.'",lang_code="'.$code.'" where id = ?', [$id]);
			  
			}
			else
			{
			    $counts = DB::table('slideshow')
		            ->where('lang_code', '=', $code)
					 ->where('parent', '=', $id)
					  ->count();
			     if($counts==0)
				 {
						if(!empty($slidetitle))
						{
						   $pagenamo = $slidetitle;
						   $slidesuo = $slidesub;
						   $slidebtoo = $slidebtn;
						}
						else
						{
						   $pagenamo = "";
						   $slidesuo = "";
						   $slidebtoo = "";
						}
				     
					 
					 
				DB::insert('insert into slideshow (slide_title, slide_sub_title, slide_btn_text, slide_btn_link, slide_image, lang_code, token, parent) values (?, ? ,?, ?, ?, ?, ?, ?)', [$pagenamo,$slidesuo,$slidebtoo,$slidelink,$savefname,$code,$token,$id]);	 
					 
					 
				 }
				 else
				 {
				   DB::update('update slideshow set slide_title="'.$slidetitle.'",slide_sub_title="'.$slidesub.'",slide_btn_text="'.$slidebtn.'",slide_btn_link="'.$slidelink.'",slide_image="'.$savefname.'" where lang_code="'.$code.'" and parent = ?', [$id]);
				 }
			
			}
		}
		
		
		
	
		
		
		/*DB::update('update slideshow set slide_title="'.$slidetitle.'",slide_sub_title="'.$slidesub.'",slide_btn_text="'.$slidebtn.'",slide_btn_link="'.$slidelink.'",slide_image="'.$savefname.'" where id = ?', [$id]);*/
		
			return back()->with('success', 'Slideshow has been updated');
        }
		
		
		
		
    }
}
