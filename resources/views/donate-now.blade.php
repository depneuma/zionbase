<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$headertype = $setts[0]->header_type;
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
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
     @include('static')
    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo $donate[0]->page_title;?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="video contactform">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 <div class="">
	
    
    
	
    
    
    
    <div class="col-md-12">
    <div class="clear height10"></div>
    
     
    <form class="form-horizontal" role="form" method="POST" action="{{ route('payment') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
	
	<div class="container width100">
    <div class="clear height20"></div>
    <div class="black h3 text-center"><?php echo translate( 145, $lang);?></div>
    <div class="clear height20"></div>
    <p class="para black text-center">
	<?php echo html_entity_decode($donate[0]->page_desc);?>
    </p>
	<div class="clear height40"></div>
          <div class="col-lg-6 col-md-6 col-sm-6 width100">
            <label class="ash"><?php echo translate( 133, $lang);?><span class="star">*</span></label>
            <input type="text" value=""  class="form-control validate[required] text-input radiusoff" id="name" name="name" >
          </div>
          <div class="mobbottom"></div>
          <div class="col-lg-6 col-md-6 col-sm-6 width100">
            <label class="ash"><?php echo translate( 127, $lang);?><span class="star">*</span> </label>
            <input type="text" value=""  class="form-control validate[required,custom[email]] text-input radiusoff" id="email" name="email" >
          </div>
		  <div class="clear height30"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 width100">
            <label class="ash"><?php echo translate( 136, $lang);?><span class="star">*</span></label>
            <input type="text" value=""  class="form-control validate[required] text-input radiusoff" id="phone_no" name="phone_no" >
          </div>
          
          
          
          <div class="clear height30"></div>
          
         <div class="col-lg-12 col-md-12 col-sm-12 width100">
            
        
        <?php
        
            
            $option = explode (",", $setts[0]->payment_option);
            ?>
        <h4><strong><?php echo translate( 361, $lang);?> <span class="require">*</span></strong></h4>
        <select id="payment_type" name="payment_type" class="form-control validate[required]">
            <option value="">None</option>
            <?php 
            
            
            foreach($option as $withdraw){
                
                ?>
            <option value="<?php echo $withdraw;?>"><?php echo $withdraw;?></option>
            <?php } ?>
        </select>
        
        </div>
        
          
          
          <div class="clear height30"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 width100">
            <label class="ash"><?php echo translate( 148, $lang);?> (<?php echo $setting[0]->site_currency;?>) <span class="star">*</span></label>
            <input type="number" value=""  class="form-control validate[required] text-input radiusoff" id="amount" name="amount" >
            
          </div>
          
          <input type="hidden" name="currency" value="<?php echo $setting[0]->site_currency;?>">
          
          <input type="hidden" name="paypal_url" value="<?php echo $setting[0]->paypal_url;?>">
          
          <input type="hidden" name="paypal_id" value="<?php echo $setting[0]->paypal_id;?>">
          
          <input type="hidden" name="order_no" value="<?php echo rand(11111,99999);?>">
          
          <input type="hidden" name="token" value="<?php echo csrf_token();?>">
          
          
          
          <div class="clear height30"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 width100">
            <label class="ash"><?php echo translate( 139, $lang);?><span class="star">*</span> </label>
            <textarea value=""   class="form-control validate[required] text-input radiusoff height150" id="msg" name="msg"></textarea>
          </div>
          
          
          
          
          
          
          
		  <div class="clear height30"></div>
          <div class="col-lg-6">
            <input type="submit" class="btn btn-primary avg_small_button radiusoff" value="<?php echo translate( 142, $lang);?>">
          </div>
		  <div class="clear height50"></div>
		 </div> 
        </form>
    </div>
    
	
	
	
	</div>
	
    <div class="height50"></div>
    
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
       <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
</body>
</html>