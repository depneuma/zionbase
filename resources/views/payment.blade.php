<?php
/*if (Auth::check())
{
	
}
else
{
	//redirect()->route('login');
	
	echo Redirect::to('login');
}*/
?>  
<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }	
?> 
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body>
<?php $url = URL::to("/");?>
    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    
@include('static')
	
    
	
	
	
	
	<div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo translate( 112, $lang);?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	<div class="container text-center">
	<div class="min-space"></div>
	<div class="h4 black">
    <label><?php echo translate( 301, $lang);?></label> : <?php echo $amount; ?> <?php echo $currency; ?>
	</div>
	<div class="clear height20"></div>
    
    <?php if($payment_type=="paypal"){?>
    <form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_donations">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo translate( 37, $lang);?>">
        <input type="hidden" name="item_number" value="<?php echo $order_no;?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo $url;?>/cancel'>
		<input type='hidden' name='return' value='<?php echo $url;?>/success/<?php echo $order_no;?>'>
		<input type="submit" name="submit" value="<?php echo translate( 304, $lang);?>" class="paynow radiusoff avg_big_button">
     
    
    </form>
	<?php } if($payment_type=="stripe"){
		$fprice = $amount * 100;
		?>
        
        <form action="{{ route('stripe-success') }}" method="POST">
	{{ csrf_field() }}
	
	<input type="hidden" name="cid" value="<?php echo $order_no;?>">
	<input type="hidden" name="amount" value="<?php echo $fprice; ?>">
	<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
	<input type="hidden" name="item_name" value="<?php echo translate( 37, $lang);?>">
		<script src="https://checkout.stripe.com/checkout.js" 
		class="stripe-button" 
		<?php if($setts[0]->stripe_mode=="test") { ?>
		data-key="<?php echo $setts[0]->test_publish_key; ?>" <?php } ?>
		<?php if($setts[0]->stripe_mode=="live") {  ?>
		data-key="<?php echo $setts[0]->live_publish_key; ?>" 
		<?php }?> 
		data-image="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" 
		data-name="<?php echo translate( 37, $lang);?>" 
		data-description="<?php echo $setts[0]->site_name;?>"
		data-amount="<?php echo $fprice; ?>"
		data-currency="<?php echo $currency; ?>"
		/>
		</script>
	</form>
	<?php } ?>
    
    
    
    
    <?php  if($payment_type=="payumoney"){
		if($setts[0]->payu_mode=='live'){ $action = 'https://secure.payu.in/_payment'; } 
		if($setts[0]->payu_mode=='test'){ $action = 'https://test.payu.in/_payment'; }
		$merchant = $setts[0]->merchant_key;
		$salt = $setts[0]->salt_id;
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$email = Auth::user()->email;
        $name = Auth::user()->name;
		$phone = Auth::user()->phone;
$hash_string = $merchant."|".$txnid."|".$amount."|".translate( 37, $lang)."|".$name."|".$email."|||||||||||".$salt;
$hash = strtolower(hash('sha512', $hash_string));
		$success_url = $url.'/payumoney_success/'.$order_no.'/'.$txnid;
		$fail_url = $url.'/payumoney_failed/'.$order_no;
		?>
	
	<form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm">
	{{ csrf_field() }}
	<input type="hidden" name="cid" value="<?php echo $order_no;?>">
    <input type="hidden" name="key" value="<?php echo $merchant ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input name="amount" type="hidden" value="<?php echo $amount; ?>" />
    <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />
    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
    <input type="hidden" name="phone" value="<?php echo $phone; ?>" />
    <input type="hidden" name="productinfo" value="<?php echo translate( 37, $lang); ?>">
    <input type="hidden" name="surl" value="<?php echo $success_url; ?>" />
    <input type="hidden" name="furl" value="<?php echo  $fail_url?>"/>
    <input type="hidden" name="service_provider" value=""/>
    <input type="submit" name="submit" value="Pay Now" class="paynow radiusoff avg_big_button">
</form>
	
	<?php } ?>
    
    
    
    
    
    
    
        
    
	</div>
	
	<div class="height30"></div>
	
	
	
	
	</div>
	
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>