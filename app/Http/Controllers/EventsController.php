<?php

namespace Responsive\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use File;
use Image;
use URL;
use Mail;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Cookie;

class EventsController extends Controller
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
    public function avigher_events_view()
    {
     
	    $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	 $events = DB::table('post')
				            ->where('post_type', '=', 'event')
							->where('post_status', '=', '1')
							 ->where('lang_code', '=', $lang)
							/*->whereDate('post_start_date', '>', Carbon::now()->toDateTimeString())
							->orderBy('post_start_date', 'asc')*/
							->whereDate('post_start_date', '>', Carbon::now())
							->orderBy('post_start_date', 'asc')
							->get();
							
							
	$event_count = DB::table('post')
		         	 ->where('post_type', '=', 'event')
					 ->where('post_status', '=', '1')
					  ->where('lang_code', '=', $lang)
					->whereDate('post_start_date', '>', Carbon::now())
							->orderBy('post_start_date', 'asc')
					  ->count();
					  
					  						
	 $data = array('events' => $events, 'event_count' => $event_count);
	    
		return view('events')->with($data);
    }
	
	
	
	
	
	
	
	
	
	public function avigher_events_comment(Request $request)
	{
	
	   $data = $request->all();
		
		$name = $data['name'];
		$email = $data['email'];
		
		$msg = $data['msg'];
		$post_comment_type = $data['post_comment_type'];
		
		
		$post_parent = $data['post_parent'];
		
		$post_type = $data['post_type'];
		
		
		$comment_date = date("Y-m-d H:i:s");
		
		$status = 0;
		
		
		
		
		
		/* slug */
		$str_one = strtolower($name);
		$str_two = preg_replace("/[^a-z0-9_\s-]/", "", $str_one);
		$str_three = preg_replace("/[\s-]+/", " ", $str_two);
		$post_slug = preg_replace("/[\s_]/", "-", $str_three);
		/* end slug */
		
		$post_user_id = $data['post_user_id'];
		
		
		DB::insert('insert into post (	post_title,post_slug,post_desc,post_comment_type,post_type,post_parent,post_email,post_user_id,post_date,post_status) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$name,$post_slug,$msg,$post_comment_type,$post_type,$post_parent,$email,$post_user_id,$comment_date,$status]);
		/*}*/
		
		
		$getevents = DB::table('post')
						   ->where('post_id', '=', $post_parent)
						   ->where('post_type', '=', 'event')
						   ->where('post_status', '=', '1')
						   ->get();
		
		$event_title = $getevents[0]->post_title;
		$event_slug = $getevents[0]->post_slug;
			
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'msg' => $msg, 'event_title' => $event_title, 'event_slug' => $event_slug, 'url' => $url
        ];
		
		Mail::send('commentemail', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Comment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
		
		
		
		return redirect()->back()->with('message', 'Thanks for your comment! It has been approved. To view the event');
		
		
		
	
	}
	
	
	
	
	public function avigher_event_booking(Request $request)
	{
	
	
	$data = $request->all();
		
		$available_seat = $data['available_seat'];
		$booked_seat = $data['booked_seat'];
		
		$booking_seats = $data['booking_seats'];
		$booking_name = $data['booking_name'];
		$booking_phone = $data['booking_phone'];
		$booking_email = $data['booking_email'];
		$booking_message = $data['booking_message'];
		
		$event_id = $data['event_id'];
		$status = 0;
		$datetime = date('Y-m-d H:i:s');
		$bookdate = date("Y-m-d");
		
		
		if($available_seat > $booked_seat)
		{
		   
		   
		   DB::insert('insert into booking (event_id,seats,name,phone,email,message,entrydatetime,bookdate,status) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$event_id,$booking_seats,$booking_name,$booking_phone,$booking_email,$booking_message,$datetime,$bookdate,$status]);
		   
		   $getevents = DB::table('post')
						   ->where('post_id', '=', $event_id)
						   ->where('post_type', '=', 'event')
						   ->where('post_status', '=', '1')
						   ->get();
		
		$event_title = $getevents[0]->post_title;
		$event_slug = $getevents[0]->post_slug;
		   
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'booking_name' => $booking_name,  'booking_phone' => $booking_phone, 'booking_email' => $booking_email, 'booking_message' => $booking_message, 'booking_seats' => $booking_seats, 'event_title' => $event_title, 'event_slug' => $event_slug, 'url' => $url
        ];
		
		Mail::send('eventemail', $datas , function ($message) use ($admin_email,$booking_email)
        {
            $message->subject('Event Booking Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		   
		   
		   
		   return redirect()->back()->with('message', 'Thanks for your booking! Once approved to email confirmation send you');
		   
		   
		}
		else
		{
		   return redirect()->back()->with('message', 'Sorry Seats Fully Booked');
		}		
		
	
	
	
	}
	
	
	
	
	
	
	
	public function avigher_singlepost($pid,$id)
    {
	
	 $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }


	
	$event = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'event')
				 ->where('lang_code', '=', $lang)
				  ->where('post_slug', '=', $id)
				  ->get();
				  
				  
	$single_count = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'event')
				 ->where('lang_code', '=', $lang)
				  ->where('post_slug', '=', $id)
				  ->count();
				  
	$previous =  DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'event')
				 ->whereDate('post_start_date', '>', Carbon::now()->toDateTimeString())
				 ->where('lang_code', '=', $lang)
				 ->where('post_title', '<', $event[0]->post_title)
	             ->max('post_title');
				 
				 
	$previous_link = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'event')
				 ->where('lang_code', '=', $lang)
				  ->where('post_title', '=', $previous)
				  ->get();
				  			 
				 
	$next =  DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'event')
				 ->where('lang_code', '=', $lang)
				 ->whereDate('post_start_date', '>', Carbon::now()->toDateTimeString())
				 ->where('post_title', '>', $event[0]->post_title)
	             ->min('post_title');	
				 
				 
	$next_link = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'event')
				 ->where('lang_code', '=', $lang)
				  ->where('post_title', '=', $next)
				  ->get();			 
				 		 
     $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		if($lang=="en")
		{
		   $gets = $event[0]->post_id;
		}
		else
		{
		   $gets = $event[0]->parent;
		}
		
		$getseat = DB::table('booking')
		         ->where('status', '=', '1')
				 ->where('event_id', '=', $gets)
                 ->get();
				 
				 $viewseat=0;
				 foreach($getseat as $seat)
				 {
				    $viewseat +=$seat->seats;
				 }
   		          $bookseat = $viewseat;
				  		  
				  
	$data = array('event' => $event, 'single_count' => $single_count, 'previous' => $previous, 'previous_link' => $previous_link, 'next_link' => $next_link, 'next' => $next, 'setts' => $setts, 'bookseat' => $bookseat, 'gets' => $gets);
	 return view('events')->with($data);
	
	
	}
	
	 
	
	
}
