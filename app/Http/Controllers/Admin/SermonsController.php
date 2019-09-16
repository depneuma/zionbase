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

class SermonsController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $sermons = DB::table('sermons')
		                ->where('parent','=',0)
		                ->orderBy('id','desc')
					   ->get();

        return view('admin.sermons', ['sermons' => $sermons]);
    }
	
	
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $ser_id = $data['ser_id'];
	   
	   foreach($ser_id as $postt)
	   {
		   
	  
	  $image = DB::table('sermons')->where('id', $postt)->first();
		$orginalfile=$image->image;
		$pdfile=$image->pdf_file;
		$audiofile=$image->audio_file;
		
		$sermonphoto="/sermonphoto/";
		$big = "/post/";
		
       $path = base_path('images'.$sermonphoto.$orginalfile);
	   $bigpath = base_path('images'.$big.$orginalfile);
	   $pdfpath = base_path('images/pdf/'.$pdfile);
	   $mp3path = base_path('images/mp3/'.$audiofile);
	   
	  File::delete($path);
	  File::delete($pdfpath);
	  File::delete($mp3path);
	  File::delete($bigpath);
	  
	   
	  	 
	  DB::delete('delete from post where post_type="comment" and post_comment_type="sermons" and post_parent = ?',[$postt]);
	  DB::delete('delete from sermons where parent = ?',[$postt]);
      DB::delete('delete from sermons where id = ?',[$postt]);
		   
	   }
	   
      return back();
		
	}
	
	
	
	
	
	
	public function destroy($id) {
		
		$image = DB::table('sermons')->where('id', $id)->first();
		$orginalfile=$image->image;
		$pdfile=$image->pdf_file;
		$audiofile=$image->audio_file;
		
		$sermonphoto="/sermonphoto/";
		$big = "/post/";
		
       $path = base_path('images'.$sermonphoto.$orginalfile);
	   $bigpath = base_path('images'.$big.$orginalfile);
	   $pdfpath = base_path('images/pdf/'.$pdfile);
	   $mp3path = base_path('images/mp3/'.$audiofile);
	   
	  File::delete($path);
	  File::delete($pdfpath);
	  File::delete($mp3path);
	  File::delete($bigpath);
	   DB::delete('delete from post where post_type="comment" and post_comment_type="sermons" and post_parent = ?',[$id]);
	   DB::delete('delete from sermons where parent = ?',[$id]);
      DB::delete('delete from sermons where id = ?',[$id]);
	   
      return back();
      
   }
	
}