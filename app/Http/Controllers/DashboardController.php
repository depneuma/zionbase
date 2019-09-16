<?php

namespace Responsive\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use File;
use Image;
use URL;
use Mail;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	
	public function avigher_cash_on_delivery(Request $request)
	{
	
	   $data = $request->all();
	   $cid = $data['item_number'];
	    $userid = Auth::user()->id;
	   
	   
	   
	   
	    $orderupdate = DB::table('orders')
						->where('purchase_token', '=', $cid)
						->where('status', '=', 'pending')
						->update(['status' => 'waiting']);
		 $checkoutupdate = DB::table('checkout')
						->where('purchase_token', '=', $cid)
						->where('payment_status', '=', 'pending')
						->update(['payment_status' => 'waiting']);
		
		
		$get_viewr = DB::table('orders')
		->where('purchase_token', '=', $cid)
		->where('status', '=', 'waiting')
		->count();
						
						
		
	  
	  if(!empty($get_viewr))
	  {
	  
	  $get_stock = DB::table('orders')
		->where('purchase_token', '=', $cid)
		->where('status', '=', 'waiting')
		
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
		
		Mail::send('shop_order', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Order Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
		
		
		
	 
	  $data = array('cid' => $cid);
      return view('cashon_success')->with($data);
	
	
	
	
	
	   
	   
	   
	   
	   
	   
	
	}
	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
		$editprofile = DB::select('select * from users where id = ?',[$userid]);
		
		
		$viewpost = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        
				->count();
		
		$data = array('editprofile' => $editprofile, 'viewpost' => $viewpost);
		return view('dashboard')->with($data);
    }
	
	public function mycomments()
    {
	$userid = Auth::user()->id;
	
	$viewpost = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        ->where('post_status', '=', 1)
				->get();
				
	$postcount = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        ->where('post_status', '=', 1)
				->count();			
				
	$data = array('viewpost' => $viewpost, 'postcount' => $postcount);
	return view('my-comments')->with($data);
	}
	
	
	
	
	public function view_orders($id)
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

        return view('view_order')->with($data);
	
	
	
	
	}
	
	
	
	
	
	public function myorders()
    {
	$userid = Auth::user()->id;
	
	
				
				
	$product_count = DB::table('checkout')
						->where('payment_status', '=', 'completed')
						->where('user_id', '=', $userid)
						->orderBy('cid','desc')
						->count();			
				
				
				
	$product = DB::table('checkout')
						->where('payment_status', '=', 'completed')
						->where('user_id', '=', $userid)
						->orderBy('cid','desc')
						->get();
						
						
	$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();									
				
	$data = array('product_count' => $product_count, 'product' => $product, 'setts' => $setts);
	return view('my-orders')->with($data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function mycomments_destroy($id) {
		
		
	   
	   DB::delete('delete from post where post_type="comment" and post_id = ?',[$id]);
     
	   
      return back();
      
   }
   
   
   
   public function myorders_destroy($delete,$id)
   {
   $userid = Auth::user()->id;
   
   
   
   DB::delete('delete from orders where user_id="'.$userid.'" and purchase_token = ?',[$id]);
   
   
   DB::delete('delete from checkout where user_id="'.$userid.'" and purchase_token = ?',[$id]);
     
	   
      return back();
   
   
   }
	
	
	
	
	
	
	
	public function avigher_logout()
	{
		Auth::logout();
       return back();
	}
	
	
	public function avigher_deleteaccount()
	{
		$userid = Auth::user()->id;
		
		
		
		
		
		
	  DB::delete('delete from post where post_type="comment" and post_user_id = ?',[$userid]);
	  
		
		
		DB::delete('delete from users where id!=1 and id = ?',[$userid]);
		return back();
	}
	
	
	
	
	 protected function avigher_edituserdata(Request $request)
    {
       
		
		
		
		 $this->validate($request, [

        		'name' => 'required',

        		'email' => 'required|email'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['email'] = Input::get('email');
       
		$input['name'] = Input::get('name');
		
		
		$rules = array(
        
       
		
        'email'=>'required|email|unique:users,email,'.$id,
		'name' => 'required|regex:/^[\w-]*$/|max:255|unique:users,name,'.$id,
		'photo' => 'max:1024|mimes:jpg,jpeg,png',
		'phone' => 'required|max:255|unique:users,phone,'.$id
		
		
        );
		
		
		$messages = array(
            
            'email' => 'The :attribute field is already exists',
            'name' => 'The :attribute field must only be letters and numbers (no spaces)'
			
        );
		
		
		
		
		
		 $validator = Validator::make(Input::all(), $rules, $messages);

		

		if ($validator->fails())
		{
			 $failedRules = $validator->failed();
			 
			return back()->withErrors($validator);
		}
		else
		{ 
		  

		$name=$data['name'];
		$email=$data['email'];
		$password=bcrypt($data['password']);
		
		
		
		$phone=$data['phone'];
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $userphoto="/userphoto/";
			$delpath = base_path('images'.$userphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$userphoto.$filename);
      
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		if($data['password']!="")
		{
			$passtxt=$password;
		}
		else
		{
			$passtxt=$data['savepassword'];
		}
		
		$admin=$data['usertype'];
		
		if($data['gender']!="")
		{
		    $gendor = $data['gender'];
		}
		else
		{
		   $gendor = $data['save_gender'];
		}
		
		
		DB::update('update post set post_email="'.$email.'" where post_type="comment" and post_user_id = ?', [$id]);
		
		
		
		DB::update('update users set name="'.$name.'",email="'.$email.'",password="'.$passtxt.'",phone="'.$phone.'",gender="'.$gendor.'",photo="'.$savefname.'",admin="'.$admin.'" where id = ?', [$id]);
		
		
		
			return back()->with('success', 'Account has been updated');
        }
		
		
		
		
    }
	
	
}
