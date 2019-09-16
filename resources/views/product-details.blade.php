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
	

<?php if(!empty($single_product_count)){

$prod_id = $single_product[0]->prod_token; 
		 $product_img_count = DB::table('product_images')
		           			->where('prod_token','=',$prod_id)
		                    ->count();
		if(!empty($product_img_count))
		{					
        $product_img = DB::table('product_images')
		           			->where('prod_token','=',$prod_id)
		                    ->get();
		}					
?>
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $single_product[0]->prod_name;?>">
<meta property="og:description" content="<?php echo substr($single_product[0]->prod_desc,0,280).'...';?>">
<meta property="og:url" content="<?php echo $url;?>/product-details/<?php echo $single_product[0]->prod_id;?>/<?php echo $single_product[0]->post_slug;?>">
<meta property="og:site_name" content="<?php echo $setts[0]->site_name;?>">
<?php if(!empty($product_img[0]->image)){ ?>
<meta property="og:image" content="<?php echo $url.'/local/images/media/'.$product_img[0]->image;?>">
<?php } else { ?>
<meta property="og:image" content="<?php echo $url;?>/local/images/noimage.jpg">
<?php } ?>
<meta property="og:image:width" content="400">
<meta property="og:image:height" content="300">
<?php } ?>


</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
     @include('static')
    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <span class="captial fontsize20 lineheight50 gold"><?php echo translate( 367, $lang);?></span><br/>
                <?php if(!empty($single_product_count)){?><span class="fcaptial thisfont thislineheight white"><?php echo $single_product[0]->prod_name; ?></span><?php } ?>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 <div class="row">
	
	
    <?php if(!empty($single_product_count)){?>
    <div class="col-md-12">
    
 @if(Session::has('success'))
<div class="col-md-12">
	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>
</div>
	@endif
	
	
	
	@if(Session::has('error'))
<div class="col-md-12">
	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>
</div>
	@endif



    <div class="">
 
    <div class="container-fluid">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
				<div class="col-md-5">
					
                    
                    <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
    <div class='carousel-outer'>
       
        <div class='carousel-inner '>
        
        <?php $prod_id = $single_product[0]->prod_token; 
		 $product_img_count = DB::table('product_images')
		           			->where('prod_token','=',$prod_id)
		                    ->count();
		if(!empty($product_img_count)){					
        $product_img = DB::table('product_images')
		           			->where('prod_token','=',$prod_id)
		                    ->get();
		$q=1;					
		foreach($product_img as $prod_img){?>					
							
            <div class='item <?php if($q==1){?>active<?php } ?>'>
                <img src='<?php echo $url;?>/local/images/media/<?php echo $prod_img->image;?>' alt=''id="zoom_05"  data-zoom-image="<?php echo $url;?>/local/images/media/<?php echo $prod_img->image;?>"/>
            </div>
            <?php $q++; } ?>
            
            <?php } ?>
            
        </div>
            
        
        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
            <span class='glyphicon glyphicon-chevron-left'></span>
        </a>
        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
            <span class='glyphicon glyphicon-chevron-right'></span>
        </a>
    </div>
    
    <!-- thumb -->
    <ol class='carousel-indicators mCustomScrollbar meartlab'>
    <?php 
	if(!empty($product_img_count)){
	$y=1;					
		foreach($product_img as $prod_img){?>
        <li data-target='#carousel-custom' data-slide-to='0' class='<?php if($y==1){?>active<?php } ?>'><img src='<?php echo $url;?>/local/images/media/<?php echo $prod_img->image;?>' alt='' /></li>
        <?php } ?>
        <?php } ?>

    </ol>
</div>


					
					
				</div>
				
                
      <form  role="form" method="POST" action="{{ route('product-details') }}" id="formID_shop" enctype="multipart/form-data">	
	  {{ csrf_field() }}	
				<div class="col-md-7">
					<div class="fontsize25 black bold lineheight40"><?php echo $single_product[0]->prod_name; ?></div>
					<div class="para black fontsize20 mtop20"><?php if(!empty($single_product[0]->prod_offer_price)){?><span style="text-decoration:line-through; color:#FF0000;" class="fontsize20"><?php echo $setts[0]->site_currency.' '.number_format($single_product[0]->prod_price,2);?></span> <span class="fontsize20"><?php echo $setts[0]->site_currency.' '.number_format($single_product[0]->prod_offer_price,2);?></span> <?php } else { ?> <span class="fontsize20"><?php echo $setts[0]->site_currency.' '.number_format($single_product[0]->prod_price,2);?></span> <?php } ?></div>
                    
                    
                    
                    <?php
					
					$review_value_cnt = DB::table('rating')
	                            ->where('prod_id','=',$orginal_id)
								->groupBy('prod_id')
								->count();
			   
			   if(!empty($review_value_cnt))
			   {
			   $review_value = DB::table('rating')
	                            ->where('prod_id','=',$orginal_id)
								->groupBy('prod_id')
								->get();
			   
			   $over = 0;
		        $fine_value = 0;
				foreach($review_value as $review){
				if($review->rate==1){$value1 = $review->rate*1;} else { $value1 = 0; }
		if($review->rate==2){$value2 = $review->rate*2;} else { $value2 = 0; }
		if($review->rate==3){$value3 = $review->rate*3;} else { $value3 = 0; }
		if($review->rate==4){$value4 = $review->rate*4;} else { $value4 = 0; }
		if($review->rate==5){$value5 = $review->rate*5;} else { $value5 = 0; }
		
		$fine_value += $value1 + $value2 + $value3 + $value4 + $value5;
		

      $over +=$review->rate;
	  
	  
	  
				}
				if(!empty(round($fine_value/$over))){ $roundeding = round($fine_value/$over); } else {
		  $roundeding = 0; }
			   		
					
				}
		
					
					?>
                     <?php
	if(!empty($review_value_cnt))
				{
	if(!empty($roundeding)){
	
	if($roundeding==1){ $rateus_new = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>'; }
	if($roundeding==2){ $rateus_new = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>'; }
	if($roundeding==3){ $rateus_new = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>'; }
	if($roundeding==4){ $rateus_new = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>'; }
	if($roundeding==5){ $rateus_new = '<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>'; }
	
	} else if(empty($roundeding)){  $rateus_new = '<i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>'; }
				}
	?>
                    
                    
                    
                    
                    
                    
                    
                    
					<div class="product-rating mtop10">
                    
                    <?php if(!empty($review_value_cnt))
				{ echo $rateus_new; }?>
                    </div>
					
					<hr/>
                    <?php if(empty($single_product[0]->prod_available_qty)){?>
					<div class="product-stock red_txt"><?php echo translate( 382, $lang);?></div>
                    <hr/>
                    <?php } else { ?>
					<div class="product-stock green_txt"><?php echo translate( 385, $lang);?> - <?php echo $single_product[0]->prod_available_qty;?></div>
                    <hr/>
                    <div class="para black">
                        <div class="col-md-2 paddingoff">
                        <div class="input-group">
                                       
                                        <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="<?php echo $single_product[0]->prod_available_qty;?>">
                                        
                                    </div>
                         </div>           
                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $orginal_id;?>">
                   
                   <?php 
				   if(!empty($single_product[0]->prod_offer_price))
				   {
				   $price = $single_product[0]->prod_offer_price;
				   }
				   else
				   {
				     $price = $single_product[0]->prod_price;
				   }
				   ?>
                   <input type="hidden" name="price" value="<?php echo $price;?>">
                   
                    <?php 
					
					
					
					
					
					} ?>
                    
                    
                    <?php if(!empty($single_product[0]->prod_available_qty)){
					
					?>
                    
                    
					<div class="btn-group cart">
						 <?php if(Auth::check()) { ?>
                         <input type="submit" class="btn btn-primary avg_very_small_button radiusoff" value="<?php echo translate( 388, $lang);?>">
                         <?php } else {?>
                         
                         <a href="javascript:void(0);" class="btn btn-primary avg_very_small_button radiusoff" onClick="alert('<?php echo translate( 415, $lang);?>');"><?php echo translate( 388, $lang);?></a>
                          
                          <?php } ?>
                         
					</div>
					
                    
                    <?php } ?>
                    
                    
                    <hr/>
                    <?php
					$count_category = DB::table('category')
		           			->where('gid','=',$single_product[0]->prod_catagory)
							->where('lang_code', '=', $lang)
		                    ->count();
					if(!empty($count_category))
					{	
					
					$view_category = DB::table('category')
		           			->where('gid','=',$single_product[0]->prod_catagory)
							->where('lang_code', '=', $lang)
		                    ->get();	
					?>
                    
                    <div class="para black"><span class="bold"><?php echo translate( 373, $lang);?> : </span> <?php echo $view_category[0]->name;?></div>
                    <div class="clearfix height40"></div>
                    <?php } ?>
				</div>
                </form>
                
                <div class="socialshare text-left">
            <div class="avigher" data-ayoshare="<?php echo $url;?>/product-details/<?php echo $single_product[0]->prod_id;?>/<?php echo $single_product[0]->post_slug;?>"></div>
                
                <script src="<?php echo $url;?>/share/avigher.js"></script>		
		<script>
		$(function() {
			$(".avigher").ayoshare({
				counter: true,
				button: {
					google : true,
					facebook : true,
					pinterest : true,
					linkedin : true,
					twitter : true,
					flipboard : false,
					email : false,
					whatsapp : true,
					telegram : true,
					line : false,
					bbm : false,
					viber : false,
					sms : false
				}
			});
			
		});
		</script>
                </div>
                
			</div> 
		</div>
        
        <div class="clearfix height40"></div>
        
		<div class="container-fluid">		
			<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#description" data-toggle="tab"><?php echo translate( 391, $lang);?></a></li>
						
						<li><a href="#reviews" data-toggle="tab"><?php echo translate( 394, $lang);?></a></li>
						
					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="description">
						 
							<section class="para fontsize13 black">
								<?php echo html_entity_decode($single_product[0]->prod_desc);?>
							</section>
										  
						</div>
					<div class="tab-pane fade" id="reviews">
						
						<section class="para black">
							
                            <div>
                            <div>
                            
                            <?php  
							
							
							
							$view_review = DB::table('rating')
												
												->where('prod_id', '=', $orginal_id)
												->count();
												
							if(!empty($view_review))
							{					
							$row_review = DB::table('rating')
												
												->where('prod_id', '=', $orginal_id)
												->get();
							
							foreach($row_review as $review)
							{	
							   $user_count = DB::table('users')
												->where('id','=',$review->user_id)
												->count();	
							   $user_detail = DB::table('users')
												->where('id','=',$review->user_id)
												->get();				
							?>
							<div class="col-md-2">
                            <?php if(!empty($user_count)){?>
                            <?php if(!empty($user_detail[0]->photo)){?>
                            <img src="<?php echo $url;?>/local/images/userphoto/<?php echo $user_detail[0]->photo;?>" border="0" width="100" alt="<?php echo $user_detail[0]->name;?>" class="round" />
                            <?php } else {?>
                            <img src="<?php echo $url;?>/local/images/nophoto.jpg" border="0" width="100" alt="<?php echo $user_detail[0]->name;?>" class="round" />
                            <?php } ?>
                            <?php } ?>
                            </div>
                            
                            
                            <div class="col-md-10 mtop10">
                            <p><?php echo $review->comments;?></p>
                            <p class="bold">- <?php echo $user_detail[0]->name;?></p>
                            <p>
                            <?php if($review->rate==5){?><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i><?php } ?>
                            <?php if($review->rate==4){?><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i><?php } ?>
                            <?php if($review->rate==3){?><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i><?php } ?>
                            <?php if($review->rate==2){?><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i><?php } ?>
                            <?php if($review->rate==1){?><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i><?php } ?>
                            </p>
                            </div>
                            <div class="clearfix"></div>
                            </div>
                            <div class="clear border_bottoms"></div>
                            
                            <?php } ?>
							<div class="clear height50"></div>
							
							
							
							
							 
							<?php
							if(Auth::check()) {
							$userlog = Auth::user()->id;
							$check_purchase = DB::table('orders')
												->where('user_id','=',$userlog)
												->where('prod_id', '=', $orginal_id)
												->where('status','=','completed')
												->count();	
							
							if(!empty($check_purchase))
							{
							?>
                            
                            
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('rating') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 width100 black">
            <label class="ash"><?php echo translate( 490, $lang);?><span class="star">*</span> </label>
            
            <div class="fontsize16">
                            <input type="radio" value="5" name="rating" class="validate[required]"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i><br/>
                            
                            <input type="radio" value="4" name="rating" class="validate[required]"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i><br/>
                            
                            <input type="radio" value="3" name="rating" class="validate[required]"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i><br/>
                            
                            <input type="radio" value="2" name="rating" class="validate[required]"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i><br/>
                            
                            <input type="radio" value="1" name="rating" class="validate[required]"> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                            </div>
                            <input type="hidden" name="products_id" value="<?php echo $orginal_id;?>">
                            </div>
                            
                            
                            
                           <div class="col-lg-6 col-md-6 col-sm-6 width100 black">
            <label class="ash"><?php echo translate( 283, $lang);?><span class="star">*</span> </label>
            <textarea value=""   class="form-control validate[required] text-input radiusoff height150" id="comment" name="comment"></textarea>
          </div> 
                            
                    <div class="clear height30"></div>
                    <div class="col-lg-6">
            <input type="submit" class="btn btn-primary avg_small_button radiusoff" value="<?php echo translate( 493, $lang);?>">
          </div>
                            
                            </form>
                            
                            <?php } } } ?>
                            </div>
						</section>
						
					</div>
					
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>
 
 
 
 
 
    </div> 
    
    
    
    
    
    </div>
    
	<?php } ?>
	
	
	</div>
	
    <div class="height50"></div>
    
	</div>
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>