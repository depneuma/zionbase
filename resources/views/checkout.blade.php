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
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
     @include('static')
    

	
    <div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo translate( 421, $lang);?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	<?php if(Auth::check()) { ?>
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
    <div class="height30"></div>
	 
       <form method="POST" action="{{ route('shop_payment') }}" id="formID" enctype="multipart/form-data">
       {{ csrf_field() }}
     <div class="container">
           <?php if(!empty($cart_views_count)){?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-holder">
                         
                        
                        
                        
                           
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required black" for="fullname"><?php echo translate( 433, $lang);?><sup style="color:red">*</sup></label>
                                        <input id="fullname" name="fullname" type="text" class="form-control validate[required] radiusoff" placeholder="<?php echo translate( 433, $lang);?>">
                                    </div>
                                </div>
                                
                                 <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required black" for="address"><?php echo translate( 436, $lang);?><sup style="color:red">*</sup></label>
                                        <textarea id="address" name="address" class="form-control validate[required] radiusoff"></textarea>
                                    </div>
                                   
                                </div>
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required black" for="country"><?php echo translate( 439, $lang);?><sup style="color:red">*</sup></label>
                                        
                                        <select name="country" class="form-control validate[required] radiusoff">
                                        <option value=""></option>
                                        <?php foreach($countries as $country){?>
                                        <option value="<?php echo $country;?>"><?php echo $country;?></option>
                                        <?php } ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required black" for="state"><?php echo translate( 442, $lang);?><sup style="color:red">*</sup></label>
                                        <input id="state" name="state" type="text" class="form-control validate[required] radiusoff" placeholder="<?php echo translate( 442, $lang);?>">
                                    </div>
                                </div>
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required black" for="city"><?php echo translate( 445, $lang);?><sup style="color:red">*</sup></label>
                                        <input id="city" name="city" type="text" class="form-control validate[required] radiusoff" placeholder="<?php echo translate( 445, $lang);?>">
                                    </div>
                                </div>
                                
                                
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required black" for="postcode"><?php echo translate( 448, $lang);?><sup style="color:red">*</sup></label>
                                        <input id="postcode" name="postcode" type="text" class="form-control validate[required] radiusoff" placeholder="<?php echo translate( 448, $lang);?>">
                                    </div>
                                </div>
                                
                                
                                 <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required black" for="order notes"><?php echo translate( 451, $lang);?><sup style="color:red">*</sup></label>
                                        <textarea id="order_notes" name="order_notes" class="form-control validate[required] radiusoff" style="min-height:130px;"></textarea>
                                    </div>
                                   
                                </div>
                                
                              
                                
                                
                           
                       
                    </div>
                </div>
                <?php } ?>
                 <!--/.login-form-->
                      <!--sing-up-form-->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    
                    <?php if(!empty($cart_views_count)){?>
                    
                    <div class="account-holder padding10">
                       
                        
                        
                           <h3 class="text-center black fontsize25 bold"><?php echo translate( 454, $lang);?></h3>
                                
                              <div class="height50"></div>  
                           <div id="order_review" class="woocommerce-checkout-review-order">
                           <table class="table table-striped table-bordered table-hover cart_tbl" width="100%">
	<thead>
		<tr>
			<th class="product-name black fontsize18 bold" colspan="2"><?php echo translate( 457, $lang);?></th>
			<th class="product-total"></th>
		</tr>
	</thead>
	<tbody>
							
                            <?php
							$subtotal = 0;
							$get_id = "";
							$get_name = "";
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
		
		}?>
                            
                            <tr class="cart_item black">
						<td class="product-name" width="40%">
							<?php echo $single_product[0]->prod_name;?> </td>
                            <td width="30%"><?php echo $cart->quantity;?> <?php echo translate( 406, $lang);?></td>
                            
                            <?php $total_price = $cart->quantity * $cart->price; ?>
						<td class="product-total">
							<span class="amount"><?php echo $setts[0]->site_currency;?> <?php echo number_format($total_price,2);?></span>						</td>
					</tr>
                    
                    <?php 
					$get_id .=$single_product[0]->prod_id.',';
					$get_name .=$single_product[0]->prod_name.',';
					
					$subtotal += $total_price; ?>
                    <?php } ?>
                    
                    
                    <?php $get_products = rtrim($get_id,',');
					
					$get_product_names = rtrim($get_name,',');
					?>
                    <input type="hidden" name="product_ids" value="<?php echo $get_products;?>">
                    
                    <input type="hidden" name="product_names" value="<?php echo $get_product_names;?>">
						</tbody>
                        
                        
	<tfoot>
       
		<tr class="cart-subtotal">
			<th colspan="2" class="black bold"><?php echo translate( 427, $lang);?></th>
            
			<td class="black"><?php echo $setts[0]->site_currency;?> <?php echo number_format($subtotal,2);?></td>
		</tr>

	<input type="hidden" name="subtotal" value="<?php echo $subtotal;?>" >	
		
			
			<tr class="shipping">
	<th colspan="2" class="black bold"><?php echo translate( 424, $lang);?></th>
	<td data-title="Shipping">
					<?php echo $setts[0]->site_currency;?> <?php echo number_format($setts[0]->site_shipping,2);?>	
		    </td>
</tr>
<input type="hidden" name="shipping_price" value="<?php echo $setts[0]->site_shipping;?>">

			
		
		<?php $final_total = $subtotal + $setts[0]->site_shipping; ?>
		
		
		<tr class="order-total">
			<th colspan="2" class="black bold"><?php echo translate( 169, $lang);?></th>
			<td class="black"><?php echo $setts[0]->site_currency;?> <?php echo number_format($final_total,2);?> </td>
		</tr>
<input type="hidden" name="total" value="<?php echo $final_total;?>" >
		
	</tfoot>
</table>


<div id="payment" class="woocommerce-checkout-payment">
			
           
            
            
            <div class="">
                                    <div class="form-group">
                                        <label class="control-label required black" for="email"><?php echo translate( 214, $lang);?><sup style="color:red">*</sup></label>
                                        <input id="email" name="email" type="text" class="form-control validate[required] radiusoff" placeholder="<?php echo translate( 214, $lang);?>" value="<?php echo $user_details[0]->email;?>">
                                    </div>
                                </div>
                                
                                
                                
                <div class="">
                                    <div class="form-group">
                                        <label class="control-label required black" for="email"><?php echo translate( 136, $lang);?><sup style="color:red">*</sup></label>
                                        <input id="phone" name="phone" type="text" class="form-control validate[required] radiusoff" placeholder="<?php echo translate( 136, $lang);?>" value="<?php echo $user_details[0]->phone;?>">
                                    </div>
                                </div>                
                                
            
             <div class="fontsize16 bold black"><?php echo translate( 460, $lang);?> :</div>
           <div class="mtop10">
            <?php
        
            
            $option = explode (",", $setts[0]->payment_option);
            ?>
        <h4 class="black"><strong><?php echo translate( 361, $lang);?> <span class="require">*</span></strong></h4>
        <select id="payment_type" name="payment_type" class="form-control radiusoff validate[required]">
            <option value="">None</option>
            <?php 
            
            
            foreach($option as $withdraw){
                
                ?>
            <option value="<?php echo $withdraw;?>"><?php echo $withdraw;?></option>
            <?php } ?>
        </select>
        </div>
           
           
           
		<div class="form-row place-order mtop20">
		

		
		
		<input type="submit" class="avg_very_small_button" name="woocommerce_checkout_place_order" id="place_order" value="<?php echo translate( 463, $lang);?>">
		
		</div>
        
        
</div>


</div>     
                                
                               
                       
                    </div>
                    
                    
                    <?php } ?>
                    
                    
                    
                    
                    
                </div>
                  
       
                   
            </div>
            
            </form>
        </div>
     
     
     
     
     <div class="clear height50"></div>
	 </div>
     
     <?php } ?>
	
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>