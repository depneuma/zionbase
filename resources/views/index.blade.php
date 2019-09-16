<?php
	use Illuminate\Support\Facades\Route;
	use Carbon\Carbon;
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
   
   <meta charset="utf-8" />
		

   @include('style')
   




</head>
<body class="index">

   

   
    @include('header')
    
    <?php /****** Slider Section **************/?>
   
    <section id="banner">
    
    <?php if($headertype=="slider"){?>
    <?php if(!empty($slideshow_cnt)){?>
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="6000" >

            
            <ol class="carousel-indicators" style="display:none;">
            <?php 
				$zz=1;
				foreach($slideshow as $slide){?>
                <li data-target="#bootstrap-touch-slider" data-slide-to="<?php echo $zz;?>" class="<?php if($zz==1){?>active<?php } ?>"></li>
                
                <?php $zz++;} ?>
            </ol>

            
            <div class="carousel-inner" role="listbox">

                
                
                
                
                
                 <?php 
				$jj=1;
				foreach($slideshow as $slider){?>
                <div class="item <?php if($jj==1){?>active<?php } ?>">

                    <?php if(!empty($slider->slide_image)){?>
                    <img src="<?php echo $url.'/local/images/post/'.$slider->slide_image;?>" alt="Avigher Slider"  class="slide-image"/>
                    <?php } else {?>
                    <img src="<?php echo $url;?>/local/images/slider.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                    <?php } ?>
                    <div class="bs-slider-overlay"></div>
                    
                    <div class="slide-text slide_style_center">
                        <?php if(!empty($slider->slide_title)){?><h1 data-animation="animated flipInX" class="text-center"><?php echo $slider->slide_title;?></h1><?php } ?>
                        <?php if(!empty($slider->slide_sub_title)){?><p data-animation="animated lightSpeedIn" class="text-center"><?php echo $slider->slide_sub_title;?></p><?php } ?>
                        <?php if(!empty($slider->slide_btn_text)){?><a href="<?php echo $slider->slide_btn_link;?>" class="avg_button" data-animation="animated fadeInUp slow"><?php echo $slider->slide_btn_text;?></a><?php } ?>
                        
                    </div>
                </div>
               <?php $jj++; } ?>
               
                
                


            </div>
            
            
            
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
        <?php } } ?>
    
    <?php if($headertype=="static"){?>    
    <div>
	<div  id="overlays"></div>
	<?php if(!empty($setts[0]->site_banner)){?>
      <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_banner;?>" class="img-responsive bannerheight">
	<?php } else {?>
	<img src="<?php echo $url;?>/img/banner.jpg" class="img-responsive bannerheight">
	<?php } ?>
	</div>
    
    
    <div class="pagetitle" align="center">
        
           
                <h1 class="static_heading white text-center bold"><?php echo translate( 355, $lang);?></h1>
                <h3 class="static_subheading white text-center"><?php echo translate( 358, $lang);?></h3>
           
       
    </div>
    
    <?php } ?>
        
    </section>
    
    <?php /****** End Slider Section **************/?>
    
    
    <?php /******* Upcoming Event **********/ ?>
    
   <?php 
   
   
   if($setts[0]->site_event=="on"){?> 
     
   <?php 
   
   if(!empty($upcoming_cnt)){ ?>
    
    <div class="themebg">
    <div class="clear height20"></div>
   
    
   <div class="container">
   
   
   
        <div class="col-md-4 text-center animated fadeInUp slow">
        <div class="clear height20"></div>
        <div class="white h4 bold"><i class="lnr lnr-calendar-full top5"></i> <?php echo translate( 40, $lang);?></div>
        <div class="white linespace"><?php echo $upcoming[0]->post_title;?></div>
        
        </div>
        
        <div class="col-md-5 text-center animated fadeInUp slow">
        <div class="clear height20"></div>
        <ul class="countdown">
        <li> 
        <div class="countspace">
        <span class="days white h1 bold text-center">00</span>
        <p class="days_ref white timetxt text-center"><?php echo translate( 43, $lang);?></p>
        </div>
        </li>
        <li class="seperator"></li>
        <li> 
        <div class="countspace">
        <span class="hours white h1 bold text-center">00</span>
        <p class="hours_ref white timetxt text-center"><?php echo translate( 46, $lang);?></p>
        </div>
        </li>
        <li class="seperator"></li>
        <li> 
        <div class="countspace">
        <span class="minutes white h1 bold text-center">00</span>
        <p class="minutes_ref white timetxt text-center"><?php echo translate( 49, $lang);?></p>
        </div>
        </li>
        <li class="seperator"></li>
        <li> 
        <div class="countspace">
        <span class="seconds white h1 bold text-center">00</span>
        <p class="seconds_ref white timetxt text-center"><?php echo translate( 52, $lang);?></p>
        </div>
        </li>
        </ul>
        </div>
        
        
        <div class="col-md-3 text-center animated fadeInUp slow">
        <div class="clear height30"></div>
        <a href="<?php echo $url;?>/events/<?php echo $upcoming[0]->post_id;?>/<?php echo $upcoming[0]->post_slug;?>" class="avg_white_button bold"><?php echo translate( 55, $lang);?></a>
        
        </div>
        
   </div>   
    <div class="clear height40"></div>
    </div>  
       <?php } ?>
        <?php } ?>
        
   
    
   
    <?php /*********** End Event ***********/ ?>
    
    
   <?php /************* About Section ************/ ?>
   
    
   <section class="container">
		<div class="clear height50"></div>
        <h1 class="h2 text-center black uppercase bold animated fadeInUp slow"><?php echo translate( 58, $lang);?></h1>
        <div class="h5 ash text-center animated fadeInUp slow"><?php echo translate( 61, $lang);?></div>
        <div class="clear height40"></div>
			<div class="row">
                   <div class="col-md-6 animated fadeInLeft">
                   
                   <?php if(!empty($setts[0]->site_welcome_banner)){?>
      <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_welcome_banner;?>" class="img-responsive">
	<?php } else {?>
	<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive">
	<?php } ?>
                   </div>		

				   <div class="col-md-6 para black animated fadeInRight">
                   
                  <?php if(!empty($about_cnt)){?> <div><?php echo html_entity_decode(substr($about[0]->page_desc,0,600)).'...';?></div>
                   <div class="clear height20"></div><a href="<?php echo $url;?>/page/<?php echo $about[0]->page_id;?>/<?php echo $about[0]->post_slug;?>" class="avg_button"><?php echo translate( 64, $lang);?></a>
                   <?php } ?>
                   </div>
           </div>
			<div class="clear height50"></div>		

	</section>
    
    <?php /*********** End About Section **********/ ?>
    
    
    
    
    
    <!-- <?php /* shop section */?>
    
    
    <section class="container">
		
        <h1 class="h2 text-center black uppercase bold animated fadeInUp slow"><?php echo translate( 367, $lang);?></h1>
        <div class="h5 ash text-center animated fadeInUp slow"><?php echo translate( 499, $lang);?>	</div>
        <div class="clear height40"></div>
			<div class="row">
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
    
              <div class="col-md-3 animated text-center">
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
  <div class="ribbon-wrapper_home">
    <div class="ribbon fontsize11">no stock</div>
  </div>
  <?php } ?>
  <div class="height10"></div>
  <div class="text-center fontsize16 bold black uppercase"><a href="<?php echo $url;?>/product-details/<?php echo $product_id;?>/<?php echo $shop->post_slug;?>" class="black"><?php echo $shop->prod_name;?></a></div>
  <div class="height5"></div>
  <div><?php if(!empty($shop->prod_offer_price)){?><span style="text-decoration:line-through; color:#FF0000;"><?php echo $setts[0]->site_currency.' '.number_format($shop->prod_price,2);?></span> <?php echo $setts[0]->site_currency.' '.number_format($shop->prod_offer_price,2);?> <?php } else { ?> <?php echo $setts[0]->site_currency.' '.number_format($shop->prod_price,2);?> <?php } ?></div>
  <div class="height20"></div>
  
   </div>
   
   <?php } }  ?>
    
    </div>
            <div class="clear height50"></div>
    </section>
    
    
    
    
    
    
    
    <?php /*      end shop section */ ?> -->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php /************ Sermons Section *************/ ?>
    <?php if($setts[0]->site_sermon=="on"){?> 
    <?php if(!empty($sermons_cnt)){?>
    <section class="sermon">
        <div class="container">
		<div class="clear height30"></div>
        <h1 class="h2 text-center white uppercase bold animated fadeInUp slow"><?php echo translate( 67, $lang);?></h1>
        <div class="h5 white_ash text-center animated fadeInUp slow"><?php echo translate( 70, $lang);?></div>
        <div class="clear height30"></div>
        
        <?php foreach($sermons as $sermon){
		
		?>
        <div class="col-md-12 whitebox paddingoff marginbottom20 animated fadeInUp slow">
        
            <div class="col-md-2 paddingoff m-center">
            <?php if(!empty($sermon->image)){?>
      <a href="<?php echo $url;?>/sermons/<?php echo $sermon->id;?>/<?php echo $sermon->post_slug;?>"><img src="<?php echo $url.'/local/images/sermonphoto/'.$sermon->image;?>" class="img-responsive margintop20"></a>
	<?php } else {?>
	<a href="<?php echo $url;?>/sermons/<?php echo $sermon->id;?>/<?php echo $sermon->post_slug;?>"><img src="<?php echo $url;?>/local/images/noimage_box.jpg" class="img-responsive margintop20"></a>
	<?php } ?>
            </div>
            
            <div class="col-md-7 rightborder">
            
            <div class="h4 bold black m-center"><a href="<?php echo $url;?>/sermons/<?php echo $sermon->id;?>/<?php echo $sermon->post_slug;?>" class="black"><?php echo $sermon->name;?></a></div>
            <p class="para black"><?php echo html_entity_decode(substr($sermon->description,0,150)).'...';?></p>
            <p class="height5"></p>
            <?php
			$old_date = strtotime($sermon->submitdate);
			$new_date = date('j F, Y', $old_date);
			?>
            <p class="para m-center"><span class="lnr lnr-clock"></span> <?php echo $new_date;?></p>
            <div class="clear height5"></div>
            </div>
            
            
            <div class="col-md-3 sermonicon text-center">
            <p class="height30"></p>
            <ul class="text-center">
            
            <?php if(!empty($sermon->audio_file)){?><li><a href="javascript:void(0)" title="mp3" data-toggle="modal" data-target="#sermon<?php echo $sermon->id;?>"><i class="lnr lnr-music-note"></i></a></li><?php } ?>
           <?php if(!empty($sermon->video_url)){?><li><a href="<?php echo $sermon->video_url;?>" title="video" class="bla-2"><i class="lnr lnr-film-play"></i></a></li><?php } ?>
            <?php if(!empty($sermon->pdf_file)){?><li><a href="<?php echo $url;?>/local/images/pdf/<?php echo $sermon->pdf_file;?>" title="pdf"  target="_blank"><i class="lnr lnr-book"></i></a></li><?php } ?>
            </ul>
            <div class="height30"></div>
            <div class="text-center"><a href="<?php echo $url;?>/sermons/<?php echo $sermon->id;?>/<?php echo $sermon->post_slug;?>" class="avg_small_border_button marginbm text-center"><?php echo translate( 64, $lang);?></a></div>
            </div>
            
            
            
           
        
        </div>
        
        
        
        
        <div class="modal fade" id="sermon<?php echo $sermon->id;?>" tabindex="-1" role="dialog" aria-labelledby="sermon<?php echo $sermon->id;?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
               
               
               
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="lnr lnr-cross gold bold"></span></button>
                    <h4 class="modal-title h4 black" id="myModalLabel"><?php echo $sermon->name;?></h4>
                  </div>
                  
                  <div class="modal-body">
                   
                   <div class="mediPlayer text-center">
    				<audio class="listen" preload="none" data-size="250" src="<?php echo $url;?>/local/images/mp3/<?php echo $sermon->audio_file;?>"></audio>
					</div>
                  
                   
         
        
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="avg_small_border_button" data-dismiss="modal" value="<?php echo translate( 73, $lang);?>">
                    
                  </div>
                  
                  
                </div>
              </div>
            </div>
        <?php } ?>
        
        
         <div class="clear height40"></div>
        </div>
        
    </section>
    
    <?php } ?>
    <?php } ?>
    <?php /******** End Sermons **************/ ?>
    
    
    
    <?php /********** Gallery *************/ ?>
    <?php if($setts[0]->site_gallery=="on"){?>
    <section class="samplegalery container">
		<div class="clear height50"></div>
        <h1 class="h2 text-center black uppercase bold animated fadeInUp slow"><?php echo translate( 10, $lang);?></h1>
        <div class="h5 ash text-center fadeInUp slow"><?php echo translate( 76, $lang);?></div>
        <div class="clear height50"></div>
        <div class="clear height20"></div>
        <div class="row">
        
			<div class="m-center gallery">
            
             <div class="col-md-6 paddingoff animated fadeInLeft">
             
            <div class="col-md-12 padding-5 gallerybox gallery-item">
            <?php if(!empty($galleryfirst[0]->galleryimage)){?>
            <a href="<?php echo $url;?>/local/images/galleryimages/<?php echo $galleryfirst[0]->galleryimage;?>" class="lumos-link" data-lumos="demo2">
                   <img src="<?php echo $url;?>/local/images/galleryimages/<?php echo $galleryfirst[0]->galleryimage;?>" class="img-responsive grow">
                   </a>
                    <?php } ?>
                   </div>	
                  
                   </div>
                   
            
            <div class="col-md-6 paddingoff animated fadeInRight">
            
            <div class="col-md-6 padding-5 gallerybox gallery-item">
            <?php if(!empty($gallerysecond[0]->galleryimage)){?>
            <a href="<?php echo $url;?>/local/images/galleryimages/<?php echo $gallerysecond[0]->galleryimage;?>" class="lumos-link" data-lumos="demo2">
            <img src="<?php echo $url;?>/local/images/galleryimages/<?php echo $gallerysecond[0]->galleryimage;?>" class="img-responsive grow">
            </a>
            
            <div class="gallery_overlay">
                    
                  </div>
                  <?php } ?>
            </div>
            
            
            
            
            <div class="col-md-6 padding-5 gallerybox gallery-item">
            <?php if(!empty($gallerythird[0]->galleryimage)){?>
             <a href="<?php echo $url;?>/local/images/galleryimages/<?php echo $gallerythird[0]->galleryimage;?>" class="lumos-link" data-lumos="demo2">
            <img src="<?php echo $url;?>/local/images/galleryimages/<?php echo $gallerythird[0]->galleryimage;?>" class="img-responsive grow">
            </a>
            
            <div class="gallery_overlay">
                    
                  </div>
                  <?php } ?>
            </div>
           
            
            
            <div class="col-md-6 padding-5 gallerybox gallery-item">
            <?php if(!empty($galleryfour[0]->galleryimage)){?>
            <a href="<?php echo $url;?>/local/images/galleryimages/<?php echo $galleryfour[0]->galleryimage;?>" class="lumos-link" data-lumos="demo2">
            <img src="<?php echo $url;?>/local/images/galleryimages/<?php echo $galleryfour[0]->galleryimage;?>" class="img-responsive grow">
            </a>
            
            <div class="gallery_overlay">
                    
                  </div>
                  <?php } ?>
            </div>
           
            
            
            
            <div class="col-md-6 padding-5 gallerybox gallery-item">
            <?php if(!empty($galleryfive[0]->galleryimage)){?>
            <a href="<?php echo $url;?>/local/images/galleryimages/<?php echo $galleryfive[0]->galleryimage;?>" class="lumos-link" data-lumos="demo2">
            <img src="<?php echo $url;?>/local/images/galleryimages/<?php echo $galleryfive[0]->galleryimage;?>" class="img-responsive grow">
            </a>
            <div class="gallery_overlay">
                    
                  </div>
                  <?php } ?>
            </div>
           
            
            </div>
            
            
            
            </div>
            
            
            </div>
            
            
            <div class="clear height50"></div>
            
            
    </section>        
    	<?php } ?>		
    <?php /********** End Gallery *************/ ?>
    
    <?php /************ Testimonial ***********/ ?>
    
     <?php if($setts[0]->site_testimonial=="on"){?>
	<?php if(!empty($testimonials_cnt)){?>	
    
    <section id="carousel" class="testimonials">    				
	<div class="container">
    <div class="clear height30"></div>
        <h1 class="h2 text-center white uppercase bold animated fadeInUp slow"><?php echo translate( 79, $lang);?></h1>
        <div class="h5 white_ash text-center animated fadeInUp slow"><?php echo translate( 70, $lang);?></div>
        <div class="clear height30"></div>
    
		<div class="row animated fadeInUp slow">
			<div class="col-md-8 col-md-offset-2">
                
				<div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
				  
                  <ol class="carousel-indicators">
                  <?php
				   $jk=1;
				   foreach($testimonials as $newtestimonial){?>
				    <li data-target="#fade-quote-carousel" data-slide-to="<?php echo $jk;?>" class="<?php if($jk==1){?>active<?php } ?>"></li>
				    <?php $jk++;} ?>
				  </ol>
				  
				  <div class="carousel-inner">
				    
                    <?php 
					$z=1;
					foreach($testimonials as $testimonial){?>
                    <div class="<?php if($z==1){?>active<?php } ?> item">
				    	<blockquote>
				    		<p class="white_ash text_normal para"><?php echo '" '.substr($testimonial->description,0,500).' "';?></p>
				    	</blockquote>
				    	<div class="profile-circle">
                        <?php if(!empty($testimonial->image)){?>
      <img src="<?php echo $url.'/local/images/testimonialphoto/'.$testimonial->image;?>" class="img-responsive round">
	<?php } else {?>
	<img src="<?php echo $url;?>/local/images/noimage_box.jpg" class="img-responsive round">
	<?php } ?>
                        </div>
                        <div class="clear height20"></div>
                        <p class="white text_normal para text-center"> - <?php echo $testimonial->name;?></p>
				    </div>
				    <?php $z++; } ?>
				    
				  </div>
                  
                  
                  
                  
				</div>
			</div>							
		</div>
	</div>
</section>

<?php } ?>
   <?php } ?> 
    <?php /************ End Testimonial ***********/ ?>
    
    
    
    
    
    
     <?php /************ Our Staff ****************/?>
     <?php if($setts[0]->site_staff=="on"){?>
     <?php if(!empty($staffs_cnt)){?> 
    <section>
     <div class="container">
     <div class="clear height50"></div>
        <h1 class="h2 text-center black uppercase bold animated fadeInUp slow"><?php echo translate( 82, $lang);?></h1>
        <div class="h5 ash text-center animated fadeInUp slow"><?php echo translate( 85, $lang);?></div>
        <div class="clear height50"></div>
        <div class="clear height20"></div>
     
    <div id="mixedSlider">
                    <div class="MS-content">
                    <?php foreach($staffs as $staff){ 
					if(!empty($staff->post_slug)){
					?>
                        <div class="item">
                            <div class="imgTitle">
                                <a href="<?php echo $url;?>/staff/<?php echo $staff->post_id;?>/<?php echo $staff->post_slug;?>">
                               <?php if(!empty($staff->post_image)){?>
          			<img src="<?php echo $url.'/local/images/post/'.$staff->post_image;?>" class="img-responsive round postbg">
        			<?php } else {?>
       				<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive round postbg">
        			<?php } ?>
                    </a>
                            </div>
                            <h2 class="h4 text-center black bold"><a href="<?php echo $url;?>/staff/<?php echo $staff->post_id;?>/<?php echo $staff->post_slug;?>" class="black"><?php echo $staff->post_title;?></a></h2>
                            <p class="text-center gold para bold"><?php echo $staff->post_staff_type;?></p>
                            <div class="clear height10"></div>
                            <div class="stafficon text-center">
                            
                           <ul>
                           <?php if(!empty($staff->post_facebook)){?><li><a href="<?php echo $staff->post_facebook;?>" target="_blank" class="btns"><i class="fa fa-facebook move5" aria-hidden="true"></i></a></li><?php } ?>
                            <?php if(!empty($staff->post_twitter)){?><li><a href="<?php echo $staff->post_twitter;?>" target="_blank" class="btns"><i class="fa fa-twitter move5" aria-hidden="true"></i></a></li><?php } ?>
                           <?php if(!empty($staff->post_gplus)){?><li><a href="<?php echo $staff->post_gplus;?>" target="_blank" class="btns"><i class="fa fa-google-plus move5" aria-hidden="true"></i></a></li><?php } ?>
                            <?php if(!empty($staff->post_youtube)){?><li><a href="<?php echo $staff->post_youtube;?>" target="_blank" class="btns"><i class="fa fa-youtube-play move5" aria-hidden="true"></i></a></li><?php } ?>
                            </ul>
                           
                            </div>
                            
                        </div>
                        
                       
                       <?php } } ?>
                        
                       
                    </div>
                    <div class="MS-controls">
                        <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                        <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </div>
                </div>
                
              
                
                </div>
                
                <div class="clear height50"></div>
       
   </section>
     <?php } ?>
   <?php } ?>
   <?php /************ End Staff ****************/?> 
    
    
    
    
    
    
    
    
    
    
    
        
    <?php /************ Blog ****************/?>
    <?php if($setts[0]->site_blog=="on"){?>
    <?php if(!empty($blogs_cnt)){?>
    
    <section class="container">
		<div class="clear height50"></div>
        <h1 class="h2 text-center black uppercase bold animated fadeInUp slow"><?php echo translate( 1, $lang);?></h1>
        <div class="h5 ash text-center animated fadeInUp slow"><?php echo translate( 88, $lang);?></div>
        <div class="clear height50"></div>
        
        <div class="clear height20"></div>
			
            
            <div class="row">
            <?php foreach($blogs as $blog){
			
			?>
            <div class="col-md-4 animated fadeInUp slow">
            	<div class="col-md-12 paddingoff">
					<div>
                    <a href="<?php echo $url;?>/blog/<?php echo $blog->post_id;?>/<?php echo $blog->post_slug;?>">
					<?php if(!empty($blog->post_image)){?>
          			<img src="<?php echo $url.'/local/images/post/'.$blog->post_image;?>" class="img-responsive postbg">
        			<?php } else {?>
       				<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive postbg">
        			<?php } ?>
                    </a>
                    </div>
                    <div class="postbox blog_min_height">
                     <div class="clear height10"></div>
                     <div class="h5 bold black text-left"><?php echo $blog->post_title;?></div>
                     <div class="clear height10"></div>
                     <?php
			$old_dates = strtotime($blog->post_date);
			$new_dates = date('j F, Y', $old_dates);
			?>
            <p class="para small"><span class="lnr lnr-clock"></span> <?php echo $new_dates;?></p>
                      <div class="clear height10"></div>
                     <p class="para black"><?php echo html_entity_decode(substr($blog->post_desc,0,150)).'...';?></p>
                     <div class="clear height20"></div>
                     <div><a href="<?php echo $url;?>/blog/<?php echo $blog->post_id;?>/<?php echo $blog->post_slug;?>" class="avg_small_button"><?php echo translate( 64, $lang);?></a></div>
                     
                    </div>
                    
                    
                    
            	</div>
            </div>
            <?php } ?>
            
            </div>
            <div class="clear height50"></div>
    </section>
    <?php } ?>
    <?php } ?>
    <?php /************ End Blog ****************/?> 
    
    
   
   
    
    <?php /************ Newsletter Subscribe ****************/?> 
    
    <?php if($setts[0]->site_newsletter=="on"){?>
     <section class="newsletter">
       <div class="container">
        <div class="col-md-8">
        <h4 class="h4 white text-center"><?php echo translate( 91, $lang);?></h4>
        </div>
        
        <div class="col-md-4">
        <form action="{{ route('index') }}" enctype="multipart/form-data" method="post" id="formID">
        {!! csrf_field() !!}
        <div class="col-md-8 m-center m-top"><input name="email" class="subscribetxt validate[required,custom[email]] text-input" type="email"></div>
        <?php if(!empty($site_setting[0]->site_logo)){
							 
							?>
						
						<input type="hidden" name="site_logo" value="<?php echo $url.'/local/images/settings/'.$site_setting[0]->site_logo;?>">
					
						<?php } else { ?>
						
						<input type="hidden" name="site_logo" value="">
						
						<?php } ?>
                        
                        <input type="hidden" id="activated" name="activated" value="0">
                        
                        <input type="hidden" name="site_url" value="<?php echo $url;?>">
						
						<input type="hidden" id="admin_email" name="admin_email" value="<?php echo $admin_email;?>">
						<input type="hidden" name="site_name" value="<?php echo $site_setting[0]->site_name;?>">
                        
                        
        
        <div class="col-md-4 m-center m-top paddingoff"><input type="submit" name="submit" class="submit ms-top" value="<?php echo translate( 94, $lang);?>"></div>
        </form>
        </div>
        
       </div>
     
     </section>
     <?php } ?>
           
    <?php /************ End Newsletter Subscribe ****************/?> 
    
    
			

     @include('footer')
      <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
</body>
</html>