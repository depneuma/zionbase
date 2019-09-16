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

class OrdersController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
		
		$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		
		$checkout_count = DB::table('checkout')
		          
				   ->orderBy('cid','desc')
				 ->count();
		
		
        $checkout = DB::table('checkout')
		          
				   ->orderBy('cid','desc')
				 ->get();
		
		$data=array('checkout' => $checkout, 'checkout_count' => $checkout_count, 'setting' => $setting);

        return view('admin.orders')->with($data);
    }
	
	
	
	
	public function order_more($id)
	{
	
	$set_id=1;
	$setting = DB::table('settings')->where('id', $set_id)->get();
	
	$order_count = DB::table('orders')
		          ->where('purchase_token','=',$id)
				   
				 ->count();
		
		
        $order = DB::table('orders')
		          ->where('purchase_token','=',$id)
				   
				 ->get();
	
	$data=array('order_count' => $order_count, 'order' => $order, 'setting' => $setting);

        return view('admin.order_more')->with($data);
	
	}
	
	
	public function payment_confirm($id,$status)
	{
	   DB::update('update orders set status="completed" where purchase_token = ?', [$id]);
	   DB::update('update checkout set payment_status="completed" where purchase_token = ?', [$id]);
	   return back();
	}
	
	
	
	public function destroy($id) {
		
		
	  
      
	  
   
   DB::delete('delete from orders where purchase_token = ?',[$id]);
   
   
   DB::delete('delete from checkout where purchase_token = ?',[$id]);
     
	  
	   
      return back();
      
   }
   
   
   
   
   
   
   
	
}