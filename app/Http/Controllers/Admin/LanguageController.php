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

class LanguageController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $language = DB::table('avig_language')
		                ->orderBy('id','desc')
					   ->get();

        return view('admin.language', ['language' => $language]);
    }
	
	
	public function status($status,$id,$sid) {
	 
	 DB::update('update avig_language set lang_status="'.$sid.'" where id = ?',[$id]);
	 return back();
	 }
	 
	 
	 
	 public function asdefault($id,$sid) {
	 
	 DB::update('update avig_language set lang_default="'.$sid.'" where id = ?',[$id]);
	  $language = DB::table('avig_language')
	              ->where('id','!=',$id)
		           ->get();
	  foreach($language as $newlangs)
	  {
	      DB::update('update avig_language set lang_default="0" where id = ?',[$newlangs->id]);
	  }			   
	 
	 return back();
	 }
	 
	
	
	public function destroy($id) {
		
		$image = DB::table('avig_language')->where('id', $id)->first();
		$orginalfile=$image->lang_flag;
		$photo="/post/";
       $path = base_path('images'.$photo.$orginalfile);
	  File::delete($path);
      DB::delete('delete from avig_language where id!=2 and id = ?',[$id]);
	   
      return back();
      
   }
	
}