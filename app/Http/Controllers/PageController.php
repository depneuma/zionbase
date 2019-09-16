<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Mail;
use Auth;
use Crypt;
use URL;
use Cookie;
use Redirect;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	 
	 
	 
    public function avigher_about_us()
    {
       
		
		 $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	   	   
			   
		$did = 1;
		
		if($lang == "en")
		{
		$about_us = DB::table('pages')
		       ->where('page_id', '=', $did)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->get();
			   
			 $about_cnt = DB::table('pages')
		       ->where('page_id', '=', $did)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->count();  
		}
		else
		{
		$about_us = DB::table('pages')
		       ->where('parent', '=', $did)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->get();
			   
			   $about_cnt = DB::table('pages')
		       ->where('parent', '=', $did)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->count();
		}	   		   
			   
			   
			   
	
		$data = array('about_us' => $about_us, 'about_cnt' => $about_cnt);
            return view('about-us')->with($data);
    }
	
	public function avigher_404()
    {
		return view('404');
	}
	
	public function avigher_terms()
    {
       
		$term_id = 8;
		$terms = DB::table('pages')
		       ->where('page_id', '=', $term_id)
			   ->get();
		
		$data = array('terms' => $terms);
            return view('terms-of-use')->with($data);
    }
	
	
	
	public function avigher_privacy()
    {
       
		$privacy_id = 9;
		$privacy = DB::table('pages')
		       ->where('page_id', '=', $privacy_id)
			   ->get();
	
		$data = array('privacy' => $privacy);
            return view('privacy-policy')->with($data);
    }
	
	
	public function avigher_support()
    {
       
		$support_id = 6;
		$support = DB::table('pages')
		       ->where('page_id', '=', $support_id)
			   ->get();
	
		$data = array('support' => $support);
            return view('support')->with($data);
    }
	
	
	public function avigher_faq()
    {
       
		$faq_id = 7;
		$faq = DB::table('pages')
		       ->where('page_id', '=', $faq_id)
			   ->get();
	
		$data = array('faq' => $faq);
            return view('faq')->with($data);
    }
	
	
	
	
	public function sampleview()
	{
		return view('lang');
	}
	
	
	
	
	public function sample($id)
    { 
	    
		
		
		Cookie::queue('lang', $id, 1115);

        /*return back()->withCookie('lang');*/
		
		return Redirect::route('index')->withCookie('lang');
	}
	
	
	public function avigher_viewpage($pid,$id)
	{
	   $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	   
	   $page = DB::table('pages')
		       ->where('post_slug', '=', $id)
			   ->where('lang_code', '=', $lang)
			   ->where('status', '=', 1)
			   ->get();
		$setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$users = DB::select('select * from users where id = ?',[$setid]);	   
		$data = array('page' => $page, 'setting' => $setting, 'users' => $users);	   
	   return view('page')->with($data);
	}
	
	
	public function avigher_contact()
    {
       $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
		$contact_id = 4;
		if($lang == "en")
		{
		$contact = DB::table('pages')
		       ->where('page_id', '=', $contact_id)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->get();
		}
		else
		{
		$contact = DB::table('pages')
		       ->where('parent', '=', $contact_id)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->get();
		}	   
			   
		$setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$users = DB::select('select * from users where id = ?',[$setid]);	   
	
		$data = array('contact' => $contact, 'setting' => $setting, 'users' => $users);
            return view('contact-us')->with($data);
    }
	
	
	
	public function avigher_donate_now()
    {
	$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	   $did = 5;
		
		if($lang == "en")
		{
		$donate = DB::table('pages')
		       ->where('page_id', '=', $did)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->get();
		}
		else
		{
		$donate= DB::table('pages')
		       ->where('parent', '=', $did)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->get();
		}	   	   
			   
			   
			   
		$setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();	   
			   $data = array('donate' => $donate, 'setting' => $setting);
	   return view('donate-now')->with($data);
	}
	
	
	
	public function avigher_howit()
    {
       
		$how_id = 5;
		$how = DB::table('pages')
		       ->where('page_id', '=', $how_id)
			   ->get();
	
		$data = array('how' => $how);
            return view('how-it-works')->with($data);
    }
	
	
	
	
	public function avigher_safety()
    {
       
		$safety_id = 6;
		$safety = DB::table('pages')
		       ->where('page_id', '=', $safety_id)
			   ->get();
	
		$data = array('safety' => $safety);
            return view('safety')->with($data);
    }
	
	
	
	public function avigher_guide()
    {
       
		$guide_id = 7;
		$guide = DB::table('pages')
		       ->where('page_id', '=', $guide_id)
			   ->get();
	
		$data = array('guide' => $guide);
            return view('service-guide')->with($data);
    }
	
	
	
	public function avigher_topages()
    {
       
		$topages_id = 8;
		$topages = DB::table('pages')
		       ->where('page_id', '=', $topages_id)
			   ->get();
	
		$data = array('topages' => $topages);
            return view('how-to-pages')->with($data);
    }
	
	
	
	public function avigher_stories()
    {
       
		$stories_id = 9;
		$stories = DB::table('pages')
		       ->where('page_id', '=', $stories_id)
			   ->get();
	
		$data = array('stories' => $stories);
            return view('success-stories')->with($data);
    }
	
	
	
	public function avigher_donate_payment(Request $request)
	{
	
	   $data = $request->all();
		
		$name = $data['name'];
		$email = $data['email'];
		$phone_no = $data['phone_no'];
		$msg = $data['msg'];
		$amount = $data['amount'];
		$status = "Pending";
		$currency = $data['currency'];
		$paypal_url = $data['paypal_url'];
		$paypal_id = $data['paypal_id'];
		$order_no = $data['order_no'];
		
		$payment_type = $data['payment_type'];
		$token = $data['token'];
		$donate_date = date("Y-m-d H:i:s");
		
		$count = DB::table('donatenow')
		         ->where('token', '=', $token)
				 ->where('orderno', '=', $order_no)
				 ->where('payment_status', '=', $status)
				 ->count();
		
		if($count==0)
		{
		DB::insert('insert into donatenow (	orderno,donate_date,payment_type,name,email,phone,amount,message,token,payment_status) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$order_no,$donate_date,$payment_type,$name,$email,$phone_no,$amount,$msg,$token,$status]);
		}
		else
		{
				DB::update('update donatenow set donate_date="'.$donate_date.'",payment_type="'.$payment_type.'",name="'.$name.'",email="'.$email.'",phone="'.$phone_no.'",amount="'.$amount.'",message="'.$msg.'" where payment_status="'.$status.'" and token="'.$token.'"');
		}
		
		
		
		$ddata = array('name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'amount' => $amount, 'currency' => $currency, 'paypal_url' => $paypal_url, 'paypal_id' => $paypal_id, 'order_no' => $order_no, 'payment_type' => $payment_type);
            return view('payment')->with($ddata);
		
	
	}
	
	
	public function avigher_mailsend(Request $request)
	{
		$data = $request->all();
		
		$name = $data['name'];
		$email = $data['email'];
		$phone_no = $data['phone_no'];
		$msg = $data['msg'];
		
		
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/settings/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		
		
		$datas = [
            'name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'msg' => $msg, 'site_logo' => $site_logo, 'site_name' => $site_name
        ];
		
		Mail::send('contactemail', $datas , function ($message) use ($admin_email,$name,$email)
        {
            $message->subject('Contact Us');
			
            $message->from($admin_email, $name);

            $message->to($admin_email);

        }); 
		
		
		
		
		return redirect()->back()->with('message', 'Your message sent successfully');
		
	}
	
	
	
	
}
