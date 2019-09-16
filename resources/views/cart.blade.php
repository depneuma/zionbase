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
        
           
                <h1 class="h1 white text-center"><?php echo translate( 397, $lang);?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 <div class="row">
	
	
    
    <div class="col-md-12 text-left">
    <?php if(!empty($cart_views_count)){?>
     
    <table class="table table-striped table-bordered table-hover cart_tbl" id="dataTables-example">
        <tbody>
            <tr class="tableheader">
            <th><?php echo translate( 400, $lang);?></th>
                <th><?php echo translate( 403, $lang);?></th>
                <th><?php echo translate( 406, $lang);?></th>
                <th><?php echo translate( 409, $lang);?></th>
                <th><?php echo translate( 412, $lang);?></th>
                <th></th>
            </tr>
            
            <?php 
			$subtotal = 0;
			foreach($cart_views as $cart){
			
			if($lang == "en")
	   {
	   $single_product_count = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->where('prod_id','=',$cart->prod_id)
		->count();
		
		
		$single_product = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->where('prod_id','=',$cart->prod_id)
		->get();
		}
		else
		{
		
		$single_product_count = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->where('parent','=',$cart->prod_id)
		->count();
		
		
		$single_product = DB::table('product')
		->where('lang_code', '=', $lang)
		->where('prod_status', '=', 1)
		->where('parent','=',$cart->prod_id)
		->get();
		
		}
		
		if(!empty($single_product_count))
		{
		$product_image = DB::table('product_images')
		->where('prod_token', $single_product[0]->prod_token)
		->orderBy('prod_img_id','asc')
		->get();
			?>
            <tr>
                <td>
                <?php
				if(!empty($product_image[0]->image)){
	?>
    <img src="<?php echo $url;?>/local/images/media/<?php echo $product_image[0]->image;?>" border="0" alt="" class="img-responsive" style="max-width:100px;" />
    
    <?php } else {?>
    
    <img src="<?php echo $url;?>/local/images/media/noimage_box.jpg" border="0" alt="" class="img-responsive" />
   <?php } ?>
   
   <?php $total_price = $cart->quantity * $cart->price; ?>
                </td>
                <td><?php echo $single_product[0]->prod_name;?></td>
                <td><?php echo $cart->quantity;?></td>
                <td><?php echo $setts[0]->site_currency;?> <?php echo number_format($cart->price,2);?></td>
                
                
                <td><?php echo $setts[0]->site_currency;?> <?php echo number_format($total_price,2);?></td>
                <td> <a href="<?php echo $url;?>/cart/delete/<?php echo $cart->ord_id;?>" onClick="return confirm('<?php echo translate( 298, $lang);?>');"><img src="<?php echo $url;?>/local/images/delete.png" alt="delete" /></a></td>
            </tr>
             <?php $subtotal += $total_price; ?>
            <?php } } ?>
            
           
            
            <tr class="black">
                <th colspan="5"><span class="pull-right"><?php echo translate( 427, $lang);?></span></th>
                <th><?php echo $setts[0]->site_currency;?> <?php echo number_format($subtotal,2);?></th>
            </tr>
            <tr class="black">
                <th colspan="5"><span class="pull-right"><?php echo translate( 424, $lang);?></span></th>
                <th><?php echo $setts[0]->site_currency;?> <?php echo number_format($setts[0]->site_shipping,2);?></th>
            </tr>
            <?php $final_total = $subtotal + $setts[0]->site_shipping; ?>
            
            <tr class="black">
                <th colspan="5"><span class="pull-right"><?php echo translate( 169, $lang);?></span></th>
                <th><?php echo $setts[0]->site_currency;?> <?php echo number_format($final_total,2);?></th>
            </tr>
            <tr>
                <td><a href="<?php echo $url;?>/shop" class="btn btn-primary avg_very_small_button radiusoff"><?php echo translate( 418, $lang);?></a></td>
                <td colspan="5"><a href="<?php echo $url;?>/checkout" class="pull-right btn btn-primary avg_very_small_button radiusoff"><?php echo translate( 421, $lang);?></a></td>
            </tr>
        </tbody>
    </table>          
    <?php } else {?>
    <div class="col-md-12" align="center"><h1 class="h3 black text-center"><?php echo translate( 430, $lang);?></h1></div>
    
    <?php } ?>
    
    
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