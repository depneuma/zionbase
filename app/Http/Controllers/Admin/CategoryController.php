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

class CategoryController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $category = DB::table('category')
		              ->where('parent', '=', 0)
		             ->orderBy('gid','desc')
					->get();

        return view('admin.category', ['category' => $category]);
    }
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $categoryid = $data['category_id'];
	   
	   foreach($categoryid as $gid)
	   {
		   
		   DB::delete('delete from category where parent = ?',[$gid]);
		   DB::delete('delete from category where gid = ?',[$gid]);
	   }
	   
      return back();
		
	}
	
	
	
	public function destroy($id) {
		
		$image = DB::table('category')->where('gid', $id)->first();
		$orginalfile=$image->image;
		$userphoto="/category/";
       $path = base_path('images'.$userphoto.$orginalfile);
	  File::delete($path);
	  
	  DB::delete('delete from category where parent = ?',[$id]);
	  
      DB::delete('delete from category where gid = ?',[$id]);
	   
      return back();
      
   }
	
}