<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use URL;
use Mail;
use Illuminate\Http\Response;
use Cookie;

class StaffController extends Controller
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
		
		$staff_pastor = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('lang_code', '=', $lang)
				 ->where('post_staff_type', '=', 'pastor')
				 ->orderBy('post_id', 'desc')->get();
				 
				 
		$staff_volunteer = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('post_staff_type', '=', 'volunteer')
				 ->where('lang_code', '=', $lang)
				 ->orderBy('post_id', 'desc')->get();		 
				 
		
		
        $pastor_count = DB::table('post')
		         	  ->where('post_status', '=', '1')
				 	  ->where('post_type', '=', 'staff')
					  ->where('lang_code', '=', $lang)
					   ->where('post_staff_type', '=', 'pastor')
					  ->count();
					  
		$volunteer_count = DB::table('post')
		         	  ->where('post_status', '=', '1')
				 	  ->where('post_type', '=', 'staff')
					  ->where('lang_code', '=', $lang)
					  ->where('post_staff_type', '=', 'volunteer')
					  ->count();
					  
		$staff_count = DB::table('staff_type')
		         	  
					  ->where('parent', '=', 0) 
					  ->count();	
					  
		$staff = DB::table('staff_type')
		         	  
					  ->where('parent', '=', 0) 
					   
					  ->get();			  
					  		  			  
		$staff_counts ="";
      
		
		$data = array('staff_pastor' => $staff_pastor, 'staff_volunteer' => $staff_volunteer, 'pastor_count' => $pastor_count, 'volunteer_count' => $volunteer_count, 'staff_count' => $staff_count, 'staff_counts' => $staff_counts, 'staff' => $staff );
            return view('staff')->with($data);
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
	
	
	$staff = DB::table('post')
		         ->where('lang_code', '=', $lang)
				  ->where('post_slug', '=', $id)
				  ->where('post_type', '=', 'staff')
				  ->get();
				 
				  
	$staff_counts = DB::table('post')
	             ->where('lang_code', '=', $lang)
		         ->where('post_slug', '=', $id)
				 ->where('post_type', '=', 'staff')
				  ->count();
				  
	$previous =  DB::table('post')
		         ->where('lang_code', '=', $lang)
				 ->where('post_title', '<', $staff[0]->post_title)
				 ->where('post_type', '=', 'staff')
	             ->max('post_title');
				 
	$next =  DB::table('post')
		         ->where('lang_code', '=', $lang)
				 ->where('post_title', '>', $staff[0]->post_title)
				 ->where('post_type', '=', 'staff')
	             ->min('post_title');	
				 
	$previous_link = DB::table('post')
		         ->where('lang_code', '=', $lang)
				  ->where('post_title', '=', $previous)
				  ->where('post_type', '=', 'staff')
				  ->get();			 
	$next_link = DB::table('post')
		         ->where('lang_code', '=', $lang)
				  ->where('post_title', '=', $next)
				  ->where('post_type', '=', 'staff')
				  ->get();			 
				 		 

    /*$popular_blog = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->orderBy('post_date', 'desc')
				 ->take(5)
				 ->get();
				 
	 $latest_sermon = DB::table('sermons')
		        ->orderBy('submitdate', 'desc')
				 ->take(5)
				 ->get();			 
   		  */
		if($lang=="en")
		{
		   $gets = $staff[0]->post_id;
		}
		else
		{
		   $gets = $staff[0]->parent;
		}			  		  
				  
	$data = array('staff' => $staff, 'staff_counts' => $staff_counts,'previous' => $previous, 'next' => $next, 'previous_link' => $previous_link, 'next_link' => $next_link, 'gets' => $gets);
	 return view('staff')->with($data);
	
	
	}
	
	
	
	
	
	
}
