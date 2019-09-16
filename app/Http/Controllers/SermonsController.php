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

class SermonsController extends Controller
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
		$sermons = DB::table('sermons')
		         
				 ->orderBy('submitdate', 'desc')
				 ->where('lang_code', '=', $lang)
				 ->get();
		
		$sermon_count = DB::table('sermons')
		         ->where('lang_code', '=', $lang)
				 ->orderBy('submitdate', 'desc')->count();
      
		
		$data = array('sermons' => $sermons, 'sermon_count' => $sermon_count);
            return view('sermons')->with($data);
    }
	
	
	
	
	public function avigher_sermons_comment(Request $request)
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
		
		
		/*$count = DB::table('post')
		         ->where('post_title', '=', $name)
				 ->where('post_comment_type', '=', $post_comment_type)
				 ->where('post_type', '=', $post_type)
				 ->where('post_status', '=', $status)
				 ->count();
		if($count==0)
		{*/
		
		/* slug */
		$str_one = strtolower($name);
		$str_two = preg_replace("/[^a-z0-9_\s-]/", "", $str_one);
		$str_three = preg_replace("/[\s-]+/", " ", $str_two);
		$post_slug = preg_replace("/[\s_]/", "-", $str_three);
		/* end slug */
		
		$post_user_id = $data['post_user_id'];
		
		
		DB::insert('insert into post (	post_title,post_slug,post_desc,post_comment_type,post_type,post_parent,post_email,post_user_id,post_date,post_status) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$name,$post_slug,$msg,$post_comment_type,$post_type,$post_parent,$email,$post_user_id,$comment_date,$status]);
		/*}*/
		
		
		
		$getevents = DB::table('sermons')
						   ->where('id', '=', $post_parent)
						   
						   
						   ->get();
		
		$sermon_title = $getevents[0]->name;
		$sermon_slug = $getevents[0]->post_slug;
			
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'msg' => $msg, 'sermon_title' => $sermon_title, 'sermon_slug' => $sermon_slug, 'url' => $url
        ];
		
		Mail::send('commentemail', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Comment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
		
		
		
		
		return redirect()->back()->with('message', 'Thanks for your comment! It has been approved. To view the sermon');
		
		
		
	
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
	$sermon = DB::table('sermons')
		           ->where('lang_code', '=', $lang)
				  ->where('post_slug', '=', $id)
				  ->get();
				 
				  
	$single_count = DB::table('sermons')
	               ->where('lang_code', '=', $lang)
		         ->where('post_slug', '=', $id)
				  ->count();
				  
	$previous =  DB::table('sermons')
		           ->where('lang_code', '=', $lang)
				 ->where('name', '<', $sermon[0]->name)
	             ->max('name');
				 
	$next =  DB::table('sermons')
		           ->where('lang_code', '=', $lang)
				 ->where('name', '>', $sermon[0]->name)
	             ->min('name');	
				 
	$previous_link = DB::table('sermons')
		           ->where('lang_code', '=', $lang)
				  ->where('name', '=', $previous)
				  ->get();			 
	$next_link = DB::table('sermons')
		          ->where('lang_code', '=', $lang)
				  ->where('name', '=', $next)
				  ->get();			 
				 		 

    $popular_blog = DB::table('post')
	               ->where('lang_code', '=', $lang)
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->orderBy('post_date', 'desc')
				 ->take(5)
				 ->get();
				 
	 $latest_sermon = DB::table('sermons')
	             ->where('lang_code', '=', $lang)
		        ->orderBy('submitdate', 'desc')
				 ->take(5)
				 ->get();
				 
				 
	if($lang=="en")
		{
		   $gets = $sermon[0]->id;
		}
		else
		{
		   $gets = $sermon[0]->parent;
		}			 			 
   		  
				  		  
				  
	$data = array('sermon' => $sermon, 'single_count' => $single_count,'previous' => $previous, 'next' => $next, 'previous_link' => $previous_link, 'next_link' => $next_link, 'popular_blog' => $popular_blog,'latest_sermon' => $latest_sermon, 'gets' => $gets);
	 return view('sermons')->with($data);
	
	
	}
	
	
	
	
	
	
}
