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

class TagController extends Controller
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
    
	
	
	
	public function avigher_tag($type,$id)
    {
	    
		$tag_txt = str_replace("-"," ",$id);
	 $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	   if($type=="sermons")
	   {
	
	      
		  
		  
		  $query = DB::table('sermons')
					->where('lang_code', '=', $lang)
					 ->whereRaw("find_in_set('".$tag_txt."',post_tags)")
					 ->get();
		  			 			 
				  
		}		  
		if($type=="blog")
	   {		  
				
			 $query = DB::table('post')
					->where('lang_code', '=', $lang)
					 ->whereRaw("find_in_set('".$tag_txt."',post_tags)")
					 ->where("post_status", "=", "1")
					 ->where("post_type","=","blog")
					 ->get();	  
	
	   }
	   
	   if($type=="events")
	   {
	   
	     $query = DB::table('post')
					->where('lang_code', '=', $lang)
					 ->whereRaw("find_in_set('".$tag_txt."',post_tags)")
					 ->where("post_status", "=", "1")
					 ->where("post_type","=","event")
					 ->get();
	   
	   }
     
		
		
		
				  		  
				  
	$data = array('query' => $query, 'type' => $type, 'tag_txt' => $tag_txt);
	 return view('tag')->with($data);
	
	
	}
	
	 
	
	
}
