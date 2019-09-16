<?php

namespace Responsive\Http\Controllers;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Cookie;
use Session;

class ShopController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
	
 
	 
    public function avigher_index()
    {
        
		
		
		
		
		$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }



        $product_count = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->orderBy('prod_id','desc')
		->count();
		
		
		$product = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->orderBy('prod_id','desc')
		->get();
		
		/*$galleryimages = DB::table('gallery_images')
		->where('user_id', $uuid)
		->orderBy('id','desc')
		->get();*/
		
		
		$category = DB::table('category')
		             ->where('lang_code', '=', $lang)
		            ->orderBy('name','asc')
					->get();			
					
		$category_count = DB::table('category')
		             ->where('lang_code', '=', $lang)
		            ->orderBy('name','asc')
					->count();	
					
		$catagory_txt = 0;			
		
		$data = array('product' => $product, 'product_count' => $product_count, 'category' => $category, 'category_count' => $category_count, 'catagory_txt' => $catagory_txt);

        return view('shop')->with($data); 
		  
    }
	
	
	
	
	
	public function avigher_product_details($id,$slug)
	{
	   
	   $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }

	   
	   if($lang == "en")
	   {
	   $single_product_count = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->where('prod_id','=',$id)
		->count();
		
		
		$single_product = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->where('prod_id','=',$id)
		->get();
		}
		else
		{
		
		$single_product_count = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->where('parent','=',$id)
		->count();
		
		
		$single_product = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->where('parent','=',$id)
		->get();
		
		}
		
		$orginal_id = $id;
		
		
		
		
	   
	   $data = array('single_product_count' => $single_product_count, 'single_product' => $single_product, 'orginal_id' => $orginal_id);
	   
	   return view('product-details')->with($data);
	}
	
	
	
	
	
	public function avigher_cart_delete($delete,$id)
	{
	   
	   $log_id = Auth::user()->id;
	   
	    DB::delete('delete from orders where user_id="'.$log_id.'" and 	status="pending" and ord_id = ?',[$id]);
	   
      return back();
	   
	}
	
	
	public function avigher_view_cart()
	{
	   if(Auth::check()) {
	   $log_id = Auth::user()->id;
	   
	   $cart_views_count = DB::table('orders')
		
		->where('user_id', '=', $log_id)
		->where('status', '=', 'pending')
		
		->count();
	   
	   
	   $cart_views = DB::table('orders')
		
		->where('user_id', '=', $log_id)
		->where('status', '=', 'pending')
		
		->get();
		
		}
		else
		{
		$cart_views_count = 0;
		$cart_views = "";
		
		}
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
	   
	    $data = array('cart_views_count' => $cart_views_count, 'cart_views' => $cart_views, 'setts' => $setts);
	   
	   return view('cart')->with($data);
	}
	
	
	
	public function avigher_checkout()
	{
	
	
	$countries = array(
	'Afghanistan',
	'Albania',
	'Algeria',
	'American Samoa',
	'Andorra',
	'Angola',
	'Anguilla',
	'Antarctica',
	'Antigua and Barbuda',
	'Argentina',
	'Armenia',
	'Aruba',
	'Australia',
	'Austria',
	'Azerbaijan',
	'Bahamas',
	'Bahrain',
	'Bangladesh',
	'Barbados',
	'Belarus',
	'Belgium',
	'Belize',
	'Benin',
	'Bermuda',
	'Bhutan',
	'Bolivia',
	'Bosnia and Herzegowina',
	'Botswana',
	'Bouvet Island',
	'Brazil',
	'British Indian Ocean Territory',
	'Brunei Darussalam',
	'Bulgaria',
	'Burkina Faso',
	'Burundi',
	'Cambodia',
	'Cameroon',
	'Canada',
	'Cape Verde',
	'Cayman Islands',
	'Central African Republic',
	'Chad',
	'Chile',
	'China',
	'Christmas Island',
	'Cocos (Keeling) Islands',
	'Colombia',
	'Comoros',
	'Congo',
	'Congo, the Democratic Republic of the',
	'Cook Islands',
	'Costa Rica',
	'Cote d\'Ivoire',
	'Croatia (Hrvatska)',
	'Cuba',
	'Cyprus',
	'Czech Republic',
	'Denmark',
	'Djibouti',
	'Dominica',
	'Dominican Republic',
	'East Timor',
	'Ecuador',
	'Egypt',
	'El Salvador',
	'Equatorial Guinea',
	'Eritrea',
	'Estonia',
	'Ethiopia',
	'Falkland Islands (Malvinas)',
	'Faroe Islands',
	'Fiji',
	'Finland',
	'France',
	'France Metropolitan',
	'French Guiana',
	'French Polynesia',
	'French Southern Territories',
	'Gabon',
	'Gambia',
	'Georgia',
	'Germany',
	'Ghana',
	'Gibraltar',
	'Greece',
	'Greenland',
	'Grenada',
	'Guadeloupe',
	'Guam',
	'Guatemala',
	'Guinea',
	'Guinea-Bissau',
	'Guyana',
	'Haiti',
	'Heard and Mc Donald Islands',
	'Holy See (Vatican City State)',
	'Honduras',
	'Hong Kong',
	'Hungary',
	'Iceland',
	'India',
	'Indonesia',
	'Iran (Islamic Republic of)',
	'Iraq',
	'Ireland',
	'Israel',
	'Italy',
	'Jamaica',
	'Japan',
	'Jordan',
	'Kazakhstan',
	'Kenya',
	'Kiribati',
	'Korea, Democratic People\'s Republic of',
	'Korea, Republic of',
	'Kuwait',
	'Kyrgyzstan',
	'Lao, People\'s Democratic Republic',
	'Latvia',
	'Lebanon',
	'Lesotho',
	'Liberia',
	'Libyan Arab Jamahiriya',
	'Liechtenstein',
	'Lithuania',
	'Luxembourg',
	'Macau',
	'Macedonia, The Former Yugoslav Republic of',
	'Madagascar',
	'Malawi',
	'Malaysia',
	'Maldives',
	'Mali',
	'Malta',
	'Marshall Islands',
	'Martinique',
	'Mauritania',
	'Mauritius',
	'Mayotte',
	'Mexico',
	'Micronesia, Federated States of',
	'Moldova, Republic of',
	'Monaco',
	'Mongolia',
	'Montserrat',
	'Morocco',
	'Mozambique',
	'Myanmar',
	'Namibia',
	'Nauru',
	'Nepal',
	'Netherlands',
	'Netherlands Antilles',
	'New Caledonia',
	'New Zealand',
	'Nicaragua',
	'Niger',
	'Nigeria',
	'Niue',
	'Norfolk Island',
	'Northern Mariana Islands',
	'Norway',
	'Oman',
	'Pakistan',
	'Palau',
	'Panama',
	'Papua New Guinea',
	'Paraguay',
	'Peru',
	'Philippines',
	'Pitcairn',
	'Poland',
	'Portugal',
	'Puerto Rico',
	'Qatar',
	'Reunion',
	'Romania',
	'Russian Federation',
	'Rwanda',
	'Saint Kitts and Nevis',
	'Saint Lucia',
	'Saint Vincent and the Grenadines',
	'Samoa',
	'San Marino',
	'Sao Tome and Principe',
	'Saudi Arabia',
	'Senegal',
	'Seychelles',
	'Sierra Leone',
	'Singapore',
	'Slovakia (Slovak Republic)',
	'Slovenia',
	'Solomon Islands',
	'Somalia',
	'South Africa',
	'South Georgia and the South Sandwich Islands',
	'Spain',
	'Sri Lanka',
	'St. Helena',
	'St. Pierre and Miquelon',
	'Sudan',
	'Suriname',
	'Svalbard and Jan Mayen Islands',
	'Swaziland',
	'Sweden',
	'Switzerland',
	'Syrian Arab Republic',
	'Taiwan, Province of China',
	'Tajikistan',
	'Tanzania, United Republic of',
	'Thailand',
	'Togo',
	'Tokelau',
	'Tonga',
	'Trinidad and Tobago',
	'Tunisia',
	'Turkey',
	'Turkmenistan',
	'Turks and Caicos Islands',
	'Tuvalu',
	'Uganda',
	'Ukraine',
	'United Arab Emirates',
	'United Kingdom',
	'United States',
	'United States Minor Outlying Islands',
	'Uruguay',
	'Uzbekistan',
	'Vanuatu',
	'Venezuela',
	'Vietnam',
	'Virgin Islands (British)',
	'Virgin Islands (U.S.)',
	'Wallis and Futuna Islands',
	'Western Sahara',
	'Yemen',
	'Yugoslavia',
	'Zambia',
	'Zimbabwe'
);


   if(Auth::check()) {
	   $log_id = Auth::user()->id;
	   
	   $cart_views_count = DB::table('orders')
		
		->where('user_id', '=', $log_id)
		->where('status', '=', 'pending')
		
		->count();
	   
	   
	   $cart_views = DB::table('orders')
		
		->where('user_id', '=', $log_id)
		->where('status', '=', 'pending')
		
		->get();
		
		}
		else
		{
		$cart_views_count = 0;
		$cart_views = "";
		
		}
		
		
		
   $user_details = DB::table('users')
		->where('id', '=', Auth::user()->id)
		->get();
	
	
	$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
	   
	    $data = array('cart_views_count' => $cart_views_count, 'cart_views' => $cart_views, 'setts' => $setts, 'countries' => $countries, 'user_details' => $user_details);
	   
	   return view('checkout')->with($data);
	
	
	}
	
	
	
	
	
	
	
	
	public function avigher_rating(Request $request)
	{
	
	   $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	$data = $request->all();
	$userlog = Auth::user()->id;
	$rating = $data['rating'];
	$comment = $data['comment'];
	$products_id = $data['products_id'];
	
	$submit_date = date('Y-m-d');
	
	$cheker = DB::table('rating')
			  ->where('user_id','=',$userlog)
			  ->where('prod_id', '=', $products_id)
			  ->count();
	if(empty($cheker))
	{
	
	DB::insert('insert into rating (user_id,prod_id,rate,comments,submit_date) values (?,?,?,?,?)', [$userlog,$products_id,$rating,$comment,$submit_date]);
	
	return back()->with('success', 'Thanks for submitted review');
	
	}
	else
	{
	   return back()->with('error', 'You are already reviewed');
	}
	
	
	
	
	
	}
	
	
	
	
	public function avigher_checkout_details(Request $request)
	{
	
	$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	$data = $request->all();
	
	if(!empty($data['product_ids'])){ $product_ids = $data['product_ids']; } else { $product_ids = ""; }
	if(!empty($data['product_names'])) { $product_names = $data['product_names']; } else { $product_names = ""; }
	if(!empty($data['shipping_price'])) { $shipping_price = $data['shipping_price']; } else { $shipping_price = ""; }
	if(!empty($data['subtotal'])){ $subtotal = $data['subtotal']; } else { $subtotal = ""; }
	if(!empty($data['total'])){ $total = $data['total']; } else { $total = ""; }
	if(!empty($data['payment_type'])){ $payment_type = $data['payment_type']; } else { $payment_type = ""; }
	if(!empty($data['fullname'])){ $fullname = $data['fullname']; } else { $fullname = ""; }
	if(!empty($data['phone'])){ $phone = $data['phone']; } else { $phone = ""; }
	if(!empty($data['email'])){ $email = $data['email']; } else { $email = ""; }
	if(!empty($data['country'])){ $country = $data['country']; } else { $country = ""; }
	if(!empty($data['state'])){ $state = $data['state']; } else { $state = ""; }
	if(!empty($data['city'])){ $city = $data['city']; } else { $city = ""; }
	if(!empty($data['postcode'])){ $postcode = $data['postcode']; } else { $postcode = ""; }
	if(!empty($data['address'])){ $address = $data['address']; } else { $address = ""; }
	if(!empty($data['order_notes'])){ $order_notes = $data['order_notes']; } else { $order_notes = ""; }
	$userlog = Auth::user()->id;
	
	$purchase_token = rand(1111111,9999999);
	$token = csrf_token();
	$payment_date =  date("Y-m-d");
	
	$check_checkout = DB::table('checkout')
	                  ->where('token','=',$token)
					  ->where('payment_status','=','pending')
		              ->count();
	
	if(empty($check_checkout))
	{
		DB::insert('insert into checkout (purchase_token,token,prod_id,user_id,shipping_price,subtotal,total,payment_type,fullname,phone,email,country,state,city,postcode,address,order_notes,payment_date,payment_status) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$purchase_token,$token,$product_ids,$userlog,$shipping_price,$subtotal,$total,$payment_type,$fullname,$phone,$email,$country,$state,$city,$postcode,$address,$order_notes,$payment_date,'pending']);
	}
	else
	{
	
	DB::update('update checkout set purchase_token="'.$purchase_token.'",
	prod_id="'.$product_ids.'",
	subtotal="'.$subtotal.'",
	total="'.$total.'",
	payment_type="'.$payment_type.'",
	fullname="'.$fullname.'",
	phone="'.$phone.'",
	email="'.$email.'",
	country="'.$country.'",
	state="'.$state.'",
	city="'.$city.'",
	postcode="'.$postcode.'",
	address="'.$address.'",
	order_notes="'.$order_notes.'",
	payment_date="'.$payment_date.'"
	where payment_status="pending" and token = ?', [$token]);
	
	}
	
	
	
	DB::update('update orders set purchase_token="'.$purchase_token.'" where status="pending" and user_id = ?', [$userlog]);
	
	
	$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
	
	
	$name = $fullname;
	$phone_no = $phone;
	$amount =  $total;
	 $currency  = $setts[0]->site_currency;
	$paypal_url = $setts[0]->paypal_url;
	$paypal_id = $setts[0]->paypal_id;
	$order_no = $purchase_token;
	
	
	$ddata = array('name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'amount' => $amount, 'currency' => $currency, 'paypal_url' => $paypal_url, 'paypal_id' => $paypal_id, 'order_no' => $order_no, 'payment_type' => $payment_type, 'product_names' => $product_names);
            return view('shop_payment')->with($ddata);
	
	
	
	
	
	}
	
	
	
	
	
	public function avigher_cart_details(Request $request)
	{
	
	$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	$data = $request->all();
	
	$product_id = $data['product_id'];
	$quantity = $data['quantity'];
	$price = $data['price'];
	$log_id = Auth::user()->id;
	
	if($lang == "en")
	{
	$checker_count= DB::table('product')
	              ->where('lang_code','=',$lang)
				   ->where('prod_id','=',$product_id)
		           ->count();
	$checker_get= DB::table('product')
	              ->where('lang_code','=',$lang)
				   ->where('prod_id','=',$product_id)
		           ->get();
	}
	else
	{
	 $checker_count= DB::table('product')
	              ->where('lang_code','=',$lang)
				   ->where('parent','=',$product_id)
		           ->count();
	$checker_get= DB::table('product')
	              ->where('lang_code','=',$lang)
				   ->where('parent','=',$product_id)
		           ->get();
	}	
	
	
	if(!empty($checker_count))
	{
			if($checker_get[0]->prod_available_qty >= $quantity && $quantity > 0)
			{
			
				 $keys = Session::getId();
				 
				 $check = DB::table('orders')
						  ->where('user_id','=',$log_id)
						   ->where('prod_id','=',$product_id)
						   ->where('status','=','pending')
						   ->count();
				 
				 if(empty($check))
				 {
				 DB::insert('insert into orders (user_id,prod_id,token,quantity,price,status) values (?, ?,?, ?,?,?)', [$log_id,$product_id,$keys,$quantity,$price,'pending']);
				 }
				 else
				 {
				   DB::update('update orders set quantity="'.$quantity.'" where user_id="'.$log_id.'" and status="pending" and prod_id = ?', [$product_id]);
				 }
				 
			
			return redirect('/cart');
			
			}
			else
			{
			
				return back()->with('error', 'Please check available stock');
				
			}
		
		
		
	}
	
	else
	{
	
	    return back()->with('error', 'Please check available stock');
		
	}
	
	
		   
				   
	
	}
	
	
	
	public function avigher_shop_search(Request $request)
	{
	
	
	   $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	   $data = $request->all();
	   
	   $search_keyword = $data['search_keyword'];
	   $catagory_txt = $data['catagory_txt'];
	   
	   
	   
	   $category = DB::table('category')
		             ->where('lang_code', '=', $lang)
		            ->orderBy('name','asc')
					->get();			
					
		$category_count = DB::table('category')
		             ->where('lang_code', '=', $lang)
		            ->orderBy('name','asc')
					->count();	
	   
	   if(!empty($search_keyword))
	   {
	   
	   
	       $product_count = DB::table('product')
						->where('prod_name','LIKE','%'.$search_keyword.'%')
						->where('lang_code', '=', $lang)
						->where('prod_status', '=', 1)
						->orderBy('prod_id','desc')
						->count();
						
						
	       $product = DB::table('product')
						->where('prod_name','LIKE','%'.$search_keyword.'%')
						->where('lang_code', '=', $lang)
						->where('prod_status', '=', 1)
						->orderBy('prod_id','desc')
						->get();
						
						$catagory_txt = 0;
	   }
	   
	   
	   if(!empty($catagory_txt))
	   {
	   
	   
	   $product_count = DB::table('product')
						->leftJoin('category', 'category.gid', '=', 'product.prod_catagory')
						->where('product.prod_catagory', '=', $catagory_txt)
						->where('product.lang_code', '=', $lang)
						->where('product.prod_status', '=', 1)
						->orderBy('product.prod_id','desc')
						->count();
	   
	   
	    $product = DB::table('product')
						->leftJoin('category', 'category.gid', '=', 'product.prod_catagory')
						->where('product.prod_catagory', '=', $catagory_txt)
						->where('product.lang_code', '=', $lang)
						->where('product.prod_status', '=', 1)
						->orderBy('product.prod_id','desc')
						->get();
	   
	   }
	   
	   if(!empty($search_keyword) && !empty($catagory_txt))
	   {
	   
	   
	   $product_count = DB::table('product')
						->leftJoin('category', 'category.gid', '=', 'product.prod_catagory')
						->where('product.prod_catagory', '=', $catagory_txt)
						->where('product.prod_name','LIKE','%'.$search_keyword.'%')
						->where('product.lang_code', '=', $lang)
						->where('product.prod_status', '=', 1)
						->orderBy('product.prod_id','desc')
						->count();
	   
	   
	    $product = DB::table('product')
						->leftJoin('category', 'category.gid', '=', 'product.prod_catagory')
						->where('product.prod_catagory', '=', $catagory_txt)
						->where('product.prod_name','LIKE','%'.$search_keyword.'%')
						->where('product.lang_code', '=', $lang)
						->where('product.prod_status', '=', 1)
						->orderBy('product.prod_id','desc')
						->get();
	   
	   }
	  
	  
	    if(empty($search_keyword) && empty($catagory_txt))
	   {
	   
	     $product_count = 0;
	     
	     $product = "";
		 
		 $catagory_txt = 0;
	   }
	   
	   
	   $data = array('product' => $product, 'product_count' => $product_count, 'category' => $category, 'category_count' => $category_count, 'catagory_txt' => $catagory_txt);

        return view('shop')->with($data); 
	   
	   
	
	}
	
	
   
   
   
   
   
   
	
}