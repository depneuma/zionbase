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

class TranslateController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $translate = DB::table('avig_translate')
		              ->where('parent', '=', 0)
		             ->orderBy('id','desc')
					->get();

        return view('admin.translate', ['translate' => $translate]);
    }
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $galleryid = $data['gallery_id'];
	   
	   foreach($galleryid as $gallery)
	   {
		   
		   DB::delete('delete from gallery where parent = ?',[$gallery]);
		   DB::delete('delete from gallery where id = ?',[$gallery]);
	   }
	   
      return back();
		
	}
	
	
	
	public function destroy($id) {
		
		$image = DB::table('gallery')->where('id', $id)->first();
		$orginalfile=$image->image;
		$userphoto="/galleryphoto/";
       $path = base_path('images'.$userphoto.$orginalfile);
	  File::delete($path);
	  
	  DB::delete('delete from gallery where parent = ?',[$id]);
	  
      DB::delete('delete from gallery where id = ?',[$id]);
	   
      return back();
      
   }
	
}