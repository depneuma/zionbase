<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Responsive\Url;
use Mail;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Cookie;

class IndexController extends Controller
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
	 
	
	
	
	
	 
    public function avigher_index()
    {
       
		


		
		$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
		
		
		/*$testimonials = DB::table('testimonials')->orderBy('id', 'desc')->get();*/
        $slideshow = DB::table('slideshow')
		             ->where('lang_code','=',$lang)
		             ->orderBy('id', 'asc')
					 ->get();
		
		$slideshow_cnt = DB::table('slideshow')
		                  ->where('lang_code','=',$lang)
		                 ->orderBy('id', 'asc')
						 ->count();
		
		
		
		$did = 1;
		
		if($lang == "en")
		{
		$about = DB::table('pages')
		       ->where('page_id', '=', $did)
			    ->where('lang_code', '=', $lang)
				->where('status', '=', 1)
			   ->get();
			   
			 $about_cnt = DB::table('pages')
		       ->where('page_id', '=', $did)
			    ->where('lang_code', '=', $lang)
				->where('status', '=', 1)
			   ->count();  
		}
		else
		{
		$about = DB::table('pages')
		       ->where('parent', '=', $did)
			    ->where('lang_code', '=', $lang)
				->where('status', '=', 1)
			   ->get();
			   
			   $about_cnt = DB::table('pages')
		       ->where('parent', '=', $did)
			    ->where('lang_code', '=', $lang)
				->where('status', '=', 1)
			   ->count();
		}	   	
		
		
		
		
		
		$sermons = DB::table('sermons')
		            ->where('lang_code','=',$lang)
					->orderBy('id', 'desc')->take(3)->get();
		
		$sermons_cnt = DB::table('sermons')
		               ->where('lang_code','=',$lang)
					   ->orderBy('id', 'desc')->take(3)->count();
		
		
		$testimonials = DB::table('testimonials')
		                 ->where('lang_code','=',$lang)
						 ->orderBy('id', 'desc')->take(3)->get();
		
		
		$testimonials_cnt = DB::table('testimonials')
		                    ->where('lang_code','=',$lang)
							->orderBy('id', 'desc')->take(3)->count();
		
		$blogs = DB::table('post')
				->where('post_media_type', '=', 'image')
				->where('post_type', '=', 'blog')
				->where('lang_code','=',$lang)
				->orderBy('post_id', 'desc')->take(3)->get();
				
		$blogs_cnt = DB::table('post')
				->where('post_media_type', '=', 'image')
				->where('post_type', '=', 'blog')
				->where('lang_code','=',$lang)
				->orderBy('post_id', 'desc')->take(3)->count();		
				
				
		$staffs = DB::table('post')
				->where('post_media_type', '=', 'image')
				->where('post_type', '=', 'staff')
				->where('lang_code','=',$lang)
				
				->orderBy('post_id', 'desc')
				->take(10)->get();		
				
		$staffs_cnt = DB::table('post')
				->where('post_media_type', '=', 'image')
				->where('post_type', '=', 'staff')
				->where('lang_code','=',$lang)
				
				->orderBy('post_id', 'desc')->take(10)->count();		
											
				$upcoming = DB::table('post')
				            ->where('post_type', '=', 'event')
							->where('post_status', '=', '1')
							->where('lang_code','=',$lang)
							->whereDate('post_start_date', '>', Carbon::now())
							->orderBy('post_start_date', 'asc')
							->take(1)
							->get();
							
							$upcoming_cnt = DB::table('post')
				            ->where('post_type', '=', 'event')
							->where('post_status', '=', '1')
							->where('lang_code','=',$lang)
							->whereDate('post_start_date', '>', Carbon::now())
							->orderBy('post_start_date', 'asc')
							->take(1)
							->count();			
		
		
		$galleryfirst = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(0)->get();
		$galleryfirst_cnt = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(0)->count();
		
		
		$gallerysecond = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(1)->get();
		
		$gallerysecond_cnt = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(1)->count();
		
		$gallerythird = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(2)->get();
		$gallerythird_cnt = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(2)->count();
		
		$galleryfour = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(3)->get();
		$galleryfour_cnt = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(3)->count();
		
		$galleryfive = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(4)->get();
		$galleryfive_cnt = DB::table('gallery_images')->orderBy('imgid', 'desc')->limit(1)->offset(4)->count();
		
      $siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);
		
		 $aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		
		
		
		
		
		
		
		
		 $product_count = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->limit(4)
		->orderBy('prod_id','desc')
		->count();
		
		
		$product = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->limit(4)
		->orderBy('prod_id','desc')
		->get();
		$catagory_txt = 0;	
		
		
		
		
		
		
		
		
		$data = array('product' => $product, 'product_count' => $product_count, 'catagory_txt' => $catagory_txt, 'testimonials' => $testimonials, 'slideshow' => $slideshow, 'about' => $about, 'about_cnt' => $about_cnt, 'sermons' => $sermons, 'galleryfirst' => $galleryfirst, 'gallerysecond' => $gallerysecond, 'gallerythird' => $gallerythird, 'galleryfour' => $galleryfour, 'galleryfive' => $galleryfive, 'testimonials' => $testimonials, 'blogs' => $blogs,'site_setting' => $site_setting,'admin_email' => $admin_email, 'upcoming' => $upcoming, 'staffs' => $staffs, 'slideshow_cnt' => $slideshow_cnt, 'sermons_cnt' => $sermons_cnt, 'testimonials_cnt' => $testimonials_cnt, 'blogs_cnt' => $blogs_cnt, 'staffs_cnt' => $staffs_cnt, 'upcoming_cnt' => $upcoming_cnt, 'galleryfirst_cnt' => $galleryfirst_cnt, 'gallerysecond_cnt' => $gallerysecond_cnt, 'gallerythird_cnt' => $gallerythird_cnt, 'galleryfour_cnt' => $galleryfour_cnt, 'galleryfive_cnt' => $galleryfive_cnt);
            return view('index')->with($data);
    }
	
	
	
	
	
	
	public function avigher_subscribe(Request $request) 
	{
        $data = $request->all();
		$email=$data['email'];
		 $site_logo=$data['site_logo'];
		 
		 $site_url=$data['site_url'];
		 
		 $activated = $data['activated'];
		
		$site_name=$data['site_name'];
		$count = DB::table('newsletter')
		 ->where('email', '=', $email)
		 ->where('activated', '=', $activated)
		 ->count();
		 
	     if($count==0)
		 {
			 DB::insert('insert into newsletter (email,activated) values (?, ?)',[$email,$activated]);
			 $get = DB::table('newsletter')
               ->where('email', '=', $email)
			   ->where('activated', '=', $activated)
                ->get();
				$get_id = $get[0]->id;
			 
			 Mail::send('newsletter', ['email' => $email,
			 'site_logo' => $site_logo, 'site_name' => $site_name, 'activated' => $activated, 'site_url' => $site_url, 'get_id' => $get_id], function ($message)
         {
            $message->subject('Newsletter Subscribe');
			
            $message->from(Input::get('admin_email'), 'Admin');
			
			

            $message->to(Input::get('email'));

        });
			 
		 }
		 else
		 {
			 return redirect()->back()->with('message', 'This email address already subscribed');
		 }
		 
		 return redirect()->back()->with('message', 'You have successfully subscribed to the newsletter. You will receive a confirmation email in few minutes.');	 
		 
        
        
    }
	
	
	public function newsletter_activate($id)
	{
	   
	   $count = DB::table('newsletter')
		 ->where('id', '=', $id)
		 ->where('activated', '=', '0')
		 ->count();
		 
		 if($count == 1)
		 {
		    DB::update('update newsletter set activated="1" where id = ?', [$id]);
		
		 }
		 else
		 {
		    Session::flash('error', 'This email address already subscribed');
			return view('thankyou');
			
		 }
		 
	   /*return redirect()->back()->with('message', 'Your subscription has been confirmed! Thank you!');*/	
	   
	   Session::flash('message', 'Your subscription has been confirmed! Thank you!');
			return view('thankyou');
	}
	
	
	
}
