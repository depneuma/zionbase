<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use URL;



class SuccessController extends Controller
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
	 
	 
	 
	 
	 
	 
	 
   public function avigher_payu_success($cid,$txtid)
  {
	  
	  
		
		$orderupdate = DB::table('orders')
						->where('purchase_token', '=', $cid)
						->where('status', '=', 'pending')
						->update(['status' => 'completed', 'payu_token' => $txtid]);
		 $checkoutupdate = DB::table('checkout')
						->where('purchase_token', '=', $cid)
						->where('payment_status', '=', 'pending')
						->update(['payment_status' => 'completed', 'payu_token' => $txtid]);
		
		
		
		$get_viewr = DB::table('orders')
		->where('purchase_token', '=', $cid)
		->where('status', '=', 'completed')
		->count();
						
						
		
	  
	  if(!empty($get_viewr))
	  {
	  
	  $get_stock = DB::table('orders')
		->where('purchase_token', '=', $cid)
		->where('status', '=', 'completed')
		
		->get();
		
		foreach($get_stock as $stocker)
		{
		   
		    $checker_get= DB::table('product')
	               ->where('prod_id','=',$stocker->prod_id)
				  
		           ->get();
				   
				 $stock_value = $stocker->quantity;  
		         $count_qty = $checker_get[0]->prod_available_qty - $stock_value;
				 
		DB::update('update product set prod_available_qty="'.$count_qty.'" where prod_status="1" and prod_id = ?', [$stocker->prod_id]);				
		DB::update('update product set prod_available_qty="'.$count_qty.'" where prod_status="1" and parent = ?', [$stocker->prod_id]); 
		
		}
		
	  
	  }
	  
	  	
		
					
		
		
		 $get_details = DB::table('checkout')
              
			       ->where('purchase_token', '=', $cid)
			   
                   ->get();				
						
				$order_id = $cid;
				$name = $get_details[0]->fullname;
				$email = $get_details[0]->email;
				$phone = $get_details[0]->phone;			
				$amount = $get_details[0]->total;
				$msg = $get_details[0]->order_notes;		
				
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'msg' => $msg, 'phone' => $phone, 'amount' => $amount, 'url' => $url, 'order_id' => $order_id
        ];
		
		Mail::send('shop_email', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 

		
		
		
		
	 
	  
		
		$datas = array('cid' => $cid,'txtid' => $txtid);
     return view('payu_success')->with($datas);
		
	
     }	
	 
	 
	 
	 
	 
    
	
	
	public function avigher_shop_success($cid)
	{
	
	
	
	
				
		
		
		 $orderupdate = DB::table('orders')
						->where('purchase_token', '=', $cid)
						->where('status', '=', 'pending')
						->update(['status' => 'completed']);
		 $checkoutupdate = DB::table('checkout')
						->where('purchase_token', '=', $cid)
						->where('payment_status', '=', 'pending')
						->update(['payment_status' => 'completed']);
		
		
		$get_viewr = DB::table('orders')
		->where('purchase_token', '=', $cid)
		->where('status', '=', 'completed')
		->count();
						
						
		
	  
	  if(!empty($get_viewr))
	  {
	  
	  $get_stock = DB::table('orders')
		->where('purchase_token', '=', $cid)
		->where('status', '=', 'completed')
		
		->get();
		
		foreach($get_stock as $stocker)
		{
		   
		    $checker_get= DB::table('product')
	               ->where('prod_id','=',$stocker->prod_id)
				  
		           ->get();
				   
				 $stock_value = $stocker->quantity;  
		         $count_qty = $checker_get[0]->prod_available_qty - $stock_value;
				 
		DB::update('update product set prod_available_qty="'.$count_qty.'" where prod_status="1" and prod_id = ?', [$stocker->prod_id]);				
		DB::update('update product set prod_available_qty="'.$count_qty.'" where prod_status="1" and parent = ?', [$stocker->prod_id]); 
		
		}
		
	  
	  
	  
	  
	  
	  
	  
	  
	  }
	  
	  	
		
		
		
							
						
		$get_details = DB::table('checkout')
              
			       ->where('purchase_token', '=', $cid)
			   
                   ->get();				
						
				$order_id = $cid;
				$name = $get_details[0]->fullname;
				$email = $get_details[0]->email;
				$phone = $get_details[0]->phone;			
				$amount = $get_details[0]->total;
				$msg = $get_details[0]->order_notes;		
		
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'msg' => $msg, 'phone' => $phone, 'amount' => $amount, 'url' => $url, 'order_id' => $order_id
        ];
		
		Mail::send('shop_email', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
		
		
		
	 
	  $data = array('cid' => $cid);
      return view('shop_success')->with($data);
	
	
	
	
	
	
	
	
	}
	
	
	
	
	public function avigher_payumoney_success($cid,$txtid)
	{
	
	
	    $booking = DB::table('donatenow')
              
			   ->where('orderno', '=', $cid)
			   
                ->get();
				
		
		
		 $bookingupdate = DB::table('donatenow')
						->where('orderno', '=', $cid)
						->update(['payment_status' => 'Confirmed', 'payu_token' => 	$txtid]);
						
		$getdonate = DB::table('donatenow')
              
			       ->where('orderno', '=', $cid)
			   
                   ->get();				
						
				$name = $getdonate[0]->name;
				$email = $getdonate[0]->email;
				$phone = $getdonate[0]->phone;			
				$amount = $getdonate[0]->amount;
				$msg = $getdonate[0]->message;		
		
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'msg' => $msg, 'phone' => $phone, 'amount' => $amount, 'url' => $url
        ];
		
		Mail::send('donate_email', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Donation Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
	$datas = array('cid' => $cid,'txtid' => $txtid);
     return view('payumoney_success')->with($datas);
	
	
	
	
	}
	
	
	public function avigher_cashon($cid)
	{
	 return view('cashon_success');
	}
	
	
	
	public function avigher_showpage($cid) {
		
		
		 $booking = DB::table('donatenow')
              
			   ->where('orderno', '=', $cid)
			   
                ->get();
				
		
		
		 $bookingupdate = DB::table('donatenow')
						->where('orderno', '=', $cid)
						->update(['payment_status' => 'Confirmed']);
						
		$getdonate = DB::table('donatenow')
              
			       ->where('orderno', '=', $cid)
			   
                   ->get();				
						
				$name = $getdonate[0]->name;
				$email = $getdonate[0]->email;
				$phone = $getdonate[0]->phone;			
				$amount = $getdonate[0]->amount;
				$msg = $getdonate[0]->message;		
		
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'msg' => $msg, 'phone' => $phone, 'amount' => $amount, 'url' => $url
        ];
		
		Mail::send('donate_email', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Donation Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
		
		
		
	 
	  $data = array('cid' => $cid);
      return view('success')->with($data);
   }
   
   
   
    
	
	
	
	
	
	
	
	
	
}
