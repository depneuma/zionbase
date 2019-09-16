<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use URL;
use Auth;
use Mail;

class EventsController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $events = DB::table('post')
		        ->where('post_type', '=' , 'event')
				->where('post_status', '=' , '1')
				->where('parent', '=', 0)
		        ->orderBy('post_id','desc')
				->get();

        return view('admin.events', ['events' => $events]);
    }
	
	
	protected function avigher_events_booking()
    {
	
	    $booking = DB::table('booking')
		          
				   ->orderBy('book_id','desc')
				 ->get();
				 
		$data=array('booking' => $booking);

        return view('admin.events-booking')->with($data);		 
	
	}  
	
	public function booking_destroy($id) {
		
		
      DB::delete('delete from booking where book_id = ?',[$id]);
	   
      return back();
      
   }
	
	
	public function status_booking($sid,$bid) 
	{
	
	    DB::update('update booking set status="'.$sid.'" where book_id = ?',[$bid]);
		
		
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
		
		$booking_count = DB::table('booking')
						   ->where('book_id', '=', $bid)
						   ->where('status', '=', $sid)
						   ->count();
						   
			$bdetails = DB::table('booking')
						   ->where('book_id', '=', $bid)
						   ->where('status', '=', $sid)
						   ->get();	
			$name = $bdetails[0]->name;
			$email = $bdetails[0]->email;
			$phone = $bdetails[0]->phone;
			$msg = $bdetails[0]->message;
			
			$seats = $bdetails[0]->seats;
			$eventid = $bdetails[0]->event_id;
						   
			$getevents = DB::table('post')
						   ->where('post_id', '=', $eventid)
						   ->where('post_type', '=', 'event')
						   ->where('post_status', '=', '1')
						   ->get();			   
						   
			$event_title = $getevents[0]->post_title;
			$event_slug = $getevents[0]->post_slug;
							   		   
		if(!empty($booking_count))
		{
		
		$datas = [
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'phone' => $phone, 'msg' => $msg, 'seats' => $seats, 'event_title' => $event_title, 'event_slug' => $event_slug, 'url' => $url
        ];
		
		Mail::send('admin.bookingemail', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Event Booking Confirmed');
			
            $message->from($admin_email, 'Admin');

            $message->to($email);

        }); 
		
		
		}
		
		return back()->with('message', 'Updated Successfully');
	 
	 
	}
	
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $even_id = $data['even_id'];
	   
	   foreach($even_id as $postt)
	   {
		   
	  
	  
	 
	 
	 
	 $image = DB::table('post')->where('post_id', $postt)->first();
		$orginalfile=$image->post_image;
		
		$audiofile=$image->post_audio;
		
		
		
       $path = base_path('images/post/'.$orginalfile);
	   
	  
	   
	  File::delete($path);
	  
	  
	 DB::delete('delete from post where post_type="comment" and post_comment_type="event" and post_parent = ?',[$postt]); 
	 DB::delete('delete from booking where event_id = ?',[$postt]); 
	 
	 DB::delete('delete from post where parent = ?',[$postt]);   
     DB::delete('delete from post where post_id = ?',[$postt]);
	 
	 
	 
	 
	 
		   
	   }
	   
      return back();
		
	}
	
	
	
	
	
	
	public function destroy($id) {
		
		$image = DB::table('post')->where('post_id', $id)->first();
		$orginalfile=$image->post_image;
		
		$audiofile=$image->post_audio;
		
		
		
       $path = base_path('images/post/'.$orginalfile);
	   
	  
	   
	  File::delete($path);
	  
	  
	  
	  DB::delete('delete from post where post_type="comment" and post_comment_type="event" and post_parent = ?',[$id]);
	  DB::delete('delete from booking where event_id = ?',[$id]);  
	  
	 DB::delete('delete from post where parent = ?',[$id]);  
      DB::delete('delete from post where post_id = ?',[$id]);
	   
      return back();
      
   }
	
}