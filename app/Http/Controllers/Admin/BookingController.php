<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Mail;



use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    
	
	
	
	
	
	
	public function destroy($id) {
		
		
	  
      DB::delete('delete from booking where book_id = ?',[$id]);
	   
      return back();
      
   }
   
   
  
   
   
   
   
	
}