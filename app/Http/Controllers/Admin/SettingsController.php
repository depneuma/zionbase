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


class SettingsController extends Controller
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
      $settings = DB::select('select * from settings where id = ?',[1]);
	  $currency=array("USD","CZK","DKK","HKD","HUF","ILS","JPY","MXN","NZD","NOK","PHP","PLN","SGD","SEK","CHF","THB","AUD","CAD","EUR","GBP","AFN","DZD",
							"AOA","XCD","ARS","AMD","AWG","SHP","AZN","BSD","BHD","BDT","INR");
		
		$payment=array("paypal","stripe","payumoney","cash-on-delivery");
		
	  $data=array('settings'=>$settings, 'currency' => $currency, 'payment' => $payment);
      return view('admin.settings')->with($data);
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
	 
    protected function editsettings(Request $request)
    {
       
		
		
		
		
         
		 $data = $request->all();
			
         
		$site_name=$data['site_name'];
		
		$mp3size=$data['mp3_size'];
		$imgsize=$data['image_size'];
		$pdfsize=$data['pdf_size'];
		
		
		$currency=$data['currency'];
		
		
		
		 $rules = array(
               
		'site_logo' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png',
		'site_favicon' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png',
		'site_banner' => 'max:'.$imgsize.'|mimes:jpg,jpeg,png',
		'site_loading_url' => 'max:'.$imgsize.'|mimes:gif'
		
		
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
		
		$currentlogo=$data['currentlogo'];
		
		
		$image = Input::file('site_logo');
        if($image!="")
		{	
            $settingphoto="/settings/";
			$delpath = base_path('images'.$settingphoto.$currentlogo);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$settingphoto.$filename);
			$destinationPath=base_path('images'.$settingphoto);
      
                /*Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
				
				Input::file('site_logo')->move($destinationPath, $filename);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentlogo;
		}	




		$currentfav = $data['currentfav'];
		
		
		
		$images = Input::file('site_favicon');
        if($images!="")
		{	
            $settingphotos="/settings/";
			$delpaths = base_path('images'.$settingphotos.$currentfav);
			File::delete($delpaths);	
			$filenames  = time() . '.' . $images->getClientOriginalExtension();
            
            $paths = base_path('images'.$settingphotos.$filenames);
			$destinationPaths=base_path('images'.$settingphotos);
      
                Image::make($images->getRealPath())->resize(24, 24)->save($paths);
				
				/* Input::file('site_logo')->move($destinationPath, $filename);*/
				$savefav=$filenames;
		}
        else
		{
			$savefav=$currentfav;
		}
		
		
		
		$currentban = $data['currentban'];
		
		
		$banimages = Input::file('site_banner');
        if($banimages!="")
		{	
            $settingbanphotos="/settings/";
			$delpathes = base_path('images'.$settingbanphotos.$currentban);
			File::delete($delpathes);	
			$banfilenames  = time() . '.' . $banimages->getClientOriginalExtension();
            
            $banpaths = base_path('images'.$settingbanphotos.$banfilenames);
			$destinationbanPaths=base_path('images'.$settingbanphotos);
      
                Image::make($banimages->getRealPath())->resize(1920, 500)->save($banpaths);
				
				/* Input::file('site_logo')->move($destinationPath, $filename);*/
				$savefavs=$banfilenames;
		}
        else
		{
			$savefavs=$currentban;
		}
		
		
		
		
		
		$currentwelcome = $data['currentwelcome'];
		$welcomeban = Input::file('site_welcome_banner');
        if($welcomeban!="")
		{	
            $welphotos="/settings/";
			$delpather = base_path('images'.$welphotos.$currentwelcome);
			File::delete($delpather);	
			$banfilenamer  = time() . '.' . $welcomeban->getClientOriginalExtension();
            
            $banpathr = base_path('images'.$welphotos.$banfilenamer);
			$destinationbanPathr=base_path('images'.$welphotos);
      
                Image::make($welcomeban->getRealPath())->resize(791, 547)->save($banpathr);
				
				/* Input::file('site_logo')->move($destinationPath, $filename);*/
				$savefaver=$banfilenamer;
		}
        else
		{
			$savefaver=$currentwelcome;
		}
		
		
		
		
		
		
		
		$currentloading = $data['save_loading_url'];
		$loadurl = Input::file('site_loading_url');
        if($loadurl!="")
		{	
            $loadphotos="/settings/";
			$delpathee = base_path('images'.$loadphotos.$currentloading);
			File::delete($delpathee);	
			$banfilenamee  = time() . '.' . $loadurl->getClientOriginalExtension();
            
            $banpathe = base_path('images'.$loadphotos.$banfilenamee);
			$destinationbanPathe=base_path('images'.$loadphotos);
      
                /*Image::make($loadurl->getRealPath())->resize(791, 547)->save($banpathe);*/
				
				 Input::file('site_loading_url')->move($destinationbanPathe, $banfilenamee);
				$savefavee=$banfilenamee;
		}
        else
		{
			$savefavee=$currentloading;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		$site_desc=$data['site_desc'];
		$site_keyword=$data['site_keyword'];
		
		
		
		
		if($data['site_desc']!="")
		{
			$desctxt=$site_desc;
		}
		else
		{
			$desctxt=$data['save_desc'];
		}
		
		
		if($data['site_keyword']!="")
		{
			$keytxt=$site_keyword;
		}
		else
		{
			$keytxt=$data['save_key'];
		}
		
		
		
		if($data['site_address']!="")
		{
			$siteaddress=$data['site_address'];
		}
		else
		{
			$siteaddress=$data['save_address'];
		}
		
		
		
		
		
		
		
		
		
		if($data['site_url']!="")
		{
			$mojo_siteurl = $data['site_url'];
		}
		else
		{
			 $mojo_siteurl = $data['save_siteurl'];
		}
		
		
		
		
		
		
		
		
		
		$paypal_id = $data['paypal_id'];
		$paypal_url = $data['paypal_url'];
		
		
		
		
		$fb = $data['site_facebook'];
		
		if($data['site_facebook']!="")
		{
			$facebook = $fb;
		}
		else
		{
			$facebook = $data['save_facebook'];
		}
		
		$twi = $data['site_twitter'];
		
		if($data['site_twitter']!="")
		{
			$twitter = $twi;
		}
		else
		{
			$twitter = $data['save_twitter'];
		}
		
		
		
		
		$gpl = $data['site_gplus'];
		
		if($data['site_gplus']!="")
		{
			$gplus = $gpl;
		}
		else
		{
			$gplus = $data['save_gplus'];
		}
		
		
		
		$pin = $data['site_pinterest'];
		
		if($data['site_pinterest']!="")
		{
			$pinterest = $pin;
		}
		else
		{
			$pinterest = $data['save_pinterest'];
		}
		
		
		
		
		$ins = $data['site_instagram'];
		
		if($data['site_instagram']!="")
		{
			$instagram = $ins;
		}
		else
		{
			$instagram = $data['save_instagram'];
		}
		
		
		$copys = $data['site_copyright'];
		
		if($data['site_copyright']!="")
		{
			$copyrights = $copys;
		}
		else
		{
			$copyrights = $data['save_copyright'];
		}
		
		
		
		
		$site_post = $data['site_post_per'];
		
		if($data['site_post_per']!="")
		{
			$sitepost = $site_post;
		}
		else
		{
			$sitepost = $data['save_post_per'];
		}
		
		
		
		
		$site_sermon = $data['site_sermon_per'];
		
		if($data['site_sermon_per']!="")
		{
			$sitesermon = $site_sermon;
		}
		else
		{
			$sitesermon = $data['save_sermon_per'];
		}
		
		
		
		
		
		
		
		$site_event = $data['site_event_per'];
		
		if($data['site_event_per']!="")
		{
			$siteevent = $site_event;
		}
		else
		{
			$siteevent = $data['save_event_per'];
		}
		
		
		
		
		$header_type = $data['header_type'];
		
		if($data['header_type']!="")
		{ 
		  $headertype = $header_type;
		}
		else
		{
		  $headertype = $data['save_header_type'];
		}
		
		
		
		$payment_opt="";
		foreach($data['payment_opt'] as $with)
		{
			$payment_opt .=$with.",";
		}
		$payment = rtrim($payment_opt,",");
		
		
		$stripe_mode = $data['stripe_mode'];
		$test_publish_key = $data['test_publish_key'];
		$test_secret_key = $data['test_secret_key'];
		$live_publish_key = $data['live_publish_key'];
		$live_secret_key = $data['live_secret_key'];
		
		
		
		
		
		$map_api = $data['site_map_api'];
		
		if($data['site_map_api']!="")
		{ 
		  $mapapi = $map_api;
		}
		else
		{
		  $mapapi = $data['save_map_api'];
		}
		
		$site_loading = $data['site_loading'];
		
		
		$static_banner_heading = $data['static_banner_heading'];
		$static_banner_subheading = $data['static_banner_subheading'];
		
		if(!empty($data['site_shop_per']))
		{
		  $site_shop_per = $data['site_shop_per'];
		}
		else
		{
		  $site_shop_per = "";
		}
		
		
		
		if(!empty($data['site_shipping']))
		{
		  $site_shipping = $data['site_shipping'];
		}
		else
		{
		  $site_shipping = "";
		}
		
		
		
		if(!empty($data['payu_mode']))
		{
		$payu_mode = $data['payu_mode'];
		}
		else
		{
		 $payu_mode = "";
		}
		
		if(!empty($data['merchant_key']))
		{
		$merchant_key = $data['merchant_key'];
		}
		else
		{
		$merchant_key = "";
		}
		
		if(!empty($data['salt_id']))
		{
		$salt_id = $data['salt_id'];
		}
		else
		{
		$salt_id = "";
		}
		
		
		
		if(!empty($data['site_blog'])) { $site_blog = $data['site_blog']; } else { $site_blog = ""; }
		if(!empty($data['site_staff'])) { $site_staff = $data['site_staff']; } else { $site_staff = ""; }
		if(!empty($data['site_testimonial'])) { $site_testimonial = $data['site_testimonial']; } else { $site_testimonial = ""; }
		if(!empty($data['site_gallery'])) { $site_gallery = $data['site_gallery']; } else { $site_gallery = ""; }
		if(!empty($data['site_sermon'])) { $site_sermon = $data['site_sermon']; } else { $site_sermon = ""; }
		if(!empty($data['site_event'])) { $site_event = $data['site_event']; } else { $site_event = ""; }
		if(!empty($data['site_shop'])) { $site_shop = $data['site_shop']; } else { $site_shop = ""; }
		if(!empty($data['site_newsletter'])) { $site_newsletter = $data['site_newsletter']; } else { $site_newsletter = ""; }
		
		DB::update('update settings set site_name="'.$site_name.'",site_desc="'.$desctxt.'",site_keyword="'.$keytxt.'",site_address="'.$siteaddress.'",
		site_facebook="'.$facebook.'",site_twitter="'.$twitter.'",site_gplus="'.$gplus.'",site_pinterest="'.$pinterest.'",site_instagram="'.$instagram.'",site_currency="'.$currency.'",
		site_logo="'.$savefname.'",site_favicon="'.$savefav.'",site_banner="'.$savefavs.'",site_welcome_banner="'.$savefaver.'",header_type="'.$headertype.'",
		static_banner_heading="'.$static_banner_heading.'",static_banner_subheading="'.$static_banner_subheading.'",site_copyright="'.$copyrights.'",	site_post_per="'.$sitepost.'",site_sermon_per="'.$sitesermon.'",site_event_per="'.$siteevent.'",site_shop_per="'.$site_shop_per.'",paypal_id="'.$paypal_id.'",
		paypal_url="'.$paypal_url.'",payment_option="'.$payment.'", stripe_mode="'.$stripe_mode.'", test_publish_key="'.$test_publish_key.'", test_secret_key="'.$test_secret_key.'", live_publish_key="'.$live_publish_key.'", live_secret_key="'.$live_secret_key.'", site_map_api="'.$mapapi.'",site_url="'.$mojo_siteurl.'",site_loading="'.$site_loading.'",site_loading_url="'.$savefavee.'",site_shipping="'.$site_shipping.'",site_blog="'.$site_blog.'",site_staff="'.$site_staff.'",site_testimonial="'.$site_testimonial.'",site_gallery="'.$site_gallery.'",site_sermon="'.$site_sermon.'",site_event="'.$site_event.'",site_shop="'.$site_shop.'",site_newsletter="'.$site_newsletter.'",payu_mode="'.$payu_mode.'",merchant_key="'.$merchant_key.'",salt_id="'.$salt_id.'" where id = ?', [1]);
		
			return back()->with('success', 'Settings has been updated');
        
		
		}
		
		
    }
}
