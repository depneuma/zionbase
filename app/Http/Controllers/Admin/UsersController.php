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

class UsersController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')
		         ->where('admin', '=', 0)
		         ->orderBy('id','desc')
				 ->get();

        return view('admin.users', ['users' => $users]);
    }
	
	
	public function admin_index()
    {
        $administrator = DB::table('users')
		         ->where('admin', '=', 1)
		         ->orderBy('id','desc')
				 ->get();

        return view('admin.administrators', ['administrator' => $administrator]);
    }
	
	
	public function status($status,$sid,$id) 
	{
		
		DB::update('update users set status="'.$sid.'" where id!=1 and id = ?', [$id]);
		
		
		
			return back();
		
	}
	
	
	
	public function destroy($id) {
		
		
	   
	   DB::delete('delete from post where post_type="comment" and post_user_id = ?',[$id]);
      DB::delete('delete from users where id!=1 and id = ?',[$id]);
	   
      return back();
      
   }
	
}