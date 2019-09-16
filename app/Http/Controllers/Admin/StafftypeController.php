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

class StafftypeController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $staff_type = DB::table('staff_type')
		              ->where('parent', '=', 0)
		             ->orderBy('id','desc')
					->get();

        return view('admin.staff-type', ['staff_type' => $staff_type]);
    }
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $typeid = $data['type_id'];
	   
	   foreach($typeid as $type)
	   {
		   
		   DB::delete('delete from staff_type where parent = ?',[$type]);
		   DB::delete('delete from staff_type where id = ?',[$type]);
	   }
	   
      return back();
		
	}
	
	
	
	public function destroy($id) {
		
		$image = DB::table('staff_type')->where('id', $id)->first();
		$orginalfile=$image->image;
		$userphoto="/galleryphoto/";
       $path = base_path('images'.$userphoto.$orginalfile);
	  File::delete($path);
	  
	  DB::delete('delete from staff_type where parent = ?',[$id]);
	  
      DB::delete('delete from staff_type where id = ?',[$id]);
	   
      return back();
      
   }
	
}