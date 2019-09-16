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


class MediasettingsController extends Controller
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
    
	
	public function showform() {
      $msettings = DB::select('select * from settings where id = ?',[1]);
	  $currency=array("USD","CZK","DKK","HKD","HUF","ILS","JPY","MXN","NZD","NOK","PHP","PLN","SGD","SEK","CHF","THB","AUD","CAD","EUR","GBP","AFN","DZD",
							"AOA","XCD","ARS","AMD","AWG","SHP","AZN","BSD","BHD","BDT","INR");
		
		$withdraw=array("paypal","instamojo");
		
	  $data=array('msettings'=>$msettings, 'currency' => $currency, 'withdraw' => $withdraw);
      return view('admin.media-settings')->with($data);
   }
   
   
   
   public function avigher_technologies_bgform()
   {
      $settings = DB::select('select * from settings where id = ?',[1]);
	  $data=array('settings'=>$settings);
	  return view('admin.home-backgrounds')->with($data);
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
            'email' => 'required|string|email|max:255|unique:users'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  protected $fillable = ['name', 'email','password','phone'];
	  
	  
	protected function avigher_editsettings(Request $request)
	{
	
	   $data = $request->all();
	   
	   
	   $settings = DB::select('select * from settings where id = ?',[1]);
	   $imgsize = $settings[0]->image_size;
		
		 $rules = array(
               
		
		'sermon_bg' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png',
		'testimonial_bg' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png'
		
		
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
          
		  
			  $save_sermon=$data['save_sermon'];
			
			
			$image = Input::file('sermon_bg');
			if($image!="")
			{	
				$settingphoto="/settings/";
				$delpath = base_path('images'.$settingphoto.$save_sermon);
			    File::delete($delpath);	
				$filename  = time() . '.' . $image->getClientOriginalExtension();
				
				$path = base_path('images'.$settingphoto.$filename);
				$destinationPath=base_path('images'.$settingphoto);
		  
					/*Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
					
					Input::file('sermon_bg')->move($destinationPath, $filename);
					$savefname=$filename;
			}
			else
			{
				$savefname=$save_sermon;
			}
			
			
			
			
			
			$currentfav = $data['save_testimonial'];
		   $images = Input::file('testimonial_bg');
				if($images!="")
				{	
					$settingphotos="/settings/";
					$delpathes = base_path('images'.$settingphotos.$currentfav);
			        File::delete($delpathes);	
					$filenames  = time() . '.' . $images->getClientOriginalExtension();
					
					$paths = base_path('images'.$settingphotos.$filenames);
					$destinationPaths=base_path('images'.$settingphotos);
			  
						
						
						 Input::file('testimonial_bg')->move($destinationPaths, $filenames);
						$savefav=$filenames;
				}
				else
				{
					$savefav=$currentfav;
				}
					
			
			
			
			
			DB::update('update settings set sermon_bg="'.$savefname.'",testimonial_bg="'.$savefav.'" where id = ?', [1]);
		
			return back()->with('success', 'Background images has been updated');
			
			
			
	   
	    }
	   
	
	
	} 
	  
	  
	 
    protected function editsettings(Request $request)
    {
       
		
		
		
		
         
		 $data = $request->all();
			
         
		
		
		
		 $rules = array(
               
		'site_logo' => 'max:1024|mimes:jpg,jpeg,png',
		'site_favicon' => 'max:1024|mimes:jpg,jpeg,png',
		'site_banner' => 'max:1024|mimes:jpg,jpeg,png'
		
		
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
		
		
		
		
		$mp3_size = $data['mp3_size'];
		$image_size = $data['image_size'];
		$pdf_size = $data['pdf_size'];
		
		
		if($data['mp3_size']!="")
		{
			$mp3size=$mp3_size;
		}
		else
		{
			$mp3size=$data['save_mp3'];
		}
		
		
		if($data['image_size']!="")
		{
			$imagesize=$image_size;
		}
		else
		{
			$imagesize=$data['save_image'];
		}
		
		
		
		if($data['pdf_size']!="")
		{
			$pdfsize = $data['pdf_size'];
		}
		else
		{
			 $pdfsize = $data['save_pdf'];
		}
		
		
		
		
		
		
		
		
		
		
		
		
		DB::update('update settings set mp3_size="'.$mp3size.'",image_size="'.$imagesize.'",pdf_size="'.$pdfsize.'" where id = ?', [1]);
		
			return back()->with('success', 'Media Settings has been updated');
        
		
		}
		
		
    }
}
