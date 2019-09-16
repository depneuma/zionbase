<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;

class CancelController extends Controller
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
    
	
	
	public function avigher_showpage() {
		
		 
		 
		 
		 
		
		
		
		
		
	 
	  
      return view('cancel');
   }
   
   
   
  
	
	public function avigher_payu_failed($cid) 
	{
			
			
			
			
				
				
			$orderupdate = DB::table('orders')
						->where('purchase_token', '=', $cid)
						->where('status', '=', 'pending')
						->update(['status' => 'failed']);
		 $checkoutupdate = DB::table('checkout')
						->where('purchase_token', '=', $cid)
						->where('payment_status', '=', 'pending')
						->update(['payment_status' => 'failed']);	
				
		
			
			
		
		
		
		$datas = array('cid' => $cid);
     return view('payu_failed')->with($datas);
		
	
	  
	
	}
	
	
	
	
	public function avigher_payumoney_failed($cid)
	{
	
	    $bookingupdate = DB::table('donatenow')
						->where('orderno', '=', $cid)
						->update(['payment_status' => 'Failed']);
						
						
		$datas = array('cid' => $cid);
         return view('payumoney_failed')->with($datas);				
						
	
	}
	
	
	
	
	
	
	
	
}
