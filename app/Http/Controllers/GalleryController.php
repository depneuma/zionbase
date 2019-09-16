<?php

namespace Responsive\Http\Controllers;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Cookie;

class GalleryController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
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
		$gallery = DB::table('gallery')
		->where('lang_code', '=', $lang)
		->orderBy('id','desc')
		->get();
		
		/*$galleryimages = DB::table('gallery_images')
		->where('user_id', $uuid)
		->orderBy('id','desc')
		->get();*/
		
		
		
		
		$data = array('gallery' => $gallery);

        return view('gallery')->with($data); 
		  
    }
	
	
	
   
   
   
   
   
   
	
}