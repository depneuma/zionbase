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
        
           
                <h1 class="h1 white text-center"><?php echo translate( 367, $lang);?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 <div class="row">
	
	
    
    <div class="col-md-12 text-center">
    
    <div class="searchbox text-left">
    
    	<form  role="form" method="POST" action="{{ route('shop') }}" enctype="multipart/form-data">	
	  {{ csrf_field() }}
        <div class="form-group col-xs-12 col-sm-4 col-md-5 col-lg-5">
            <label class="black bold"><?php echo translate( 370, $lang);?></label>
            <input type="text" class="form-control radiusoff" id="search_keyword" name="search_keyword" placeholder="<?php echo translate( 376, $lang);?>">
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-5 col-lg-5">
            <label class="black bold"><?php echo translate( 373, $lang);?></label>
            
            
            <select class="form-control radiusoff"  name="catagory_txt" id="catagory_txt">
						  <option value=""></option>
						  <?php 
						  if(!empty($category_count)){
						  foreach($category as $view_category){
						  if($lang == "en")
						  {
						    $cat_id = $view_category->gid; 
						  }
						  else
						  {
						     $cat_id = $view_category->parent;
						  }
						  
						  ?>
						  <option value="<?php echo $cat_id;?>"><?php echo $view_category->name;?></option>
						  <?php } } ?>
						  </select>
            
        </div>
        
        
        <div class="form-group col-xs-12 col-sm-4 col-md-2 col-lg-2 mtop15">
        <input type="submit" class="btn btn-primary avg_small_button radiusoff" value="<?php echo translate( 370, $lang);?>">
        </div>
       </form>
    
    <div>
    </div>
     <div class="clearfix"></div>
  
    </div> 
    
    
    <div class="clearfix"></div>
    
    <div class="height40"></div>
    <div class="shoplist">
    <?php 
	if(!empty($product_count))
	{
	foreach($product as $shop){
	if($lang == "en")
	{
	
	$product_id = $shop->prod_id;
	}
	else
	{
	   if(!empty($catagory_txt))
	   {
	     
		 $view_count = DB::table('product')
		->where('prod_status', '=', 1)
		->where('prod_token','=',$shop->prod_token)
		->count();
		
		 $view_product = DB::table('product')
		->where('prod_status', '=', 1)
		->where('prod_token','=',$shop->prod_token)
		->get();
		
	      if(!empty($view_count))
		  {
		  
	        $product_id = $view_product[0]->prod_id;
		  }
		  else
		  {
		     $product_id = 0;
		  }
		  
		  
		}
		else
		{
		   $product_id = $shop->parent;
		}
	}
	
	?>
    
    <div class="col-md-4 col-sm-4 col-xs-6">
    
    
	<a href="<?php echo $url;?>/product-details/<?php echo $product_id;?>/<?php echo $shop->post_slug;?>" title="<?php echo $shop->prod_name;?>">
	<?php 
	$product_image_cnt = DB::table('product_images')
		->where('prod_token', $shop->prod_token)
		->orderBy('prod_img_id','asc')
		->count();
	if(!empty($product_image_cnt))
	{
	$product_image = DB::table('product_images')
		->where('prod_token', $shop->prod_token)
		->orderBy('prod_img_id','asc')
		->get();
		
		if(!empty($product_image[0]->image)){
	?>
    <img src="<?php echo $url;?>/local/images/media/<?php echo $product_image[0]->image;?>" border="0" alt="" class="img-responsive" />
    
    <?php } else {?>
    
    <img src="<?php echo $url;?>/local/images/media/noimage_box.jpg" border="0" alt="" class="img-responsive" />
   <?php } ?>
  
  <?php } ?>
  </a>
  
  <?php if(empty($shop->prod_available_qty)){?>
  <div class="ribbon-wrapper">
    <div class="ribbon fontsize11">no stock</div>
  </div>
  <?php } ?>
  <div class="height10"></div>
  <div class="text-center fontsize16 bold black uppercase"><a href="<?php echo $url;?>/product-details/<?php echo $product_id;?>/<?php echo $shop->post_slug;?>" class="black"><?php echo $shop->prod_name;?></a></div>
  <div class="height5"></div>
  <div><?php if(!empty($shop->prod_offer_price)){?><span style="text-decoration:line-through; color:#FF0000;"><?php echo $setts[0]->site_currency.' '.number_format($shop->prod_price,2);?></span> <?php echo $setts[0]->site_currency.' '.number_format($shop->prod_offer_price,2);?> <?php } else { ?> <?php echo $setts[0]->site_currency.' '.number_format($shop->prod_price,2);?> <?php } ?></div>
  <div class="height20"></div>
  
   </div>
  <?php  } } else { ?>
  
  <div class="col-md-12" align="center"><h1 class="h3 black text-center"><?php echo translate( 379, $lang);?></h1></div>
  <?php } ?>
</div>
    <div class="shopy"></div>
    
    </div>
    
	
	
	
	</div>
	
    <div class="height50"></div>
    
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>