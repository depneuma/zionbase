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
        
           
                <h1 class="white text-center">
                
                <span class="captial fontsize20 lineheight50 gold"><?php echo translate( 346, $lang);?></span><br/>
                <span class="fcaptial thisfont thislineheight"><?php echo $tag_txt;?></span>
                </h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 <div class="row">
	<div class="col-md-12">
	
    
    
	<?php if($type=="sermons"){?>
	
	
	<?php foreach($query as $nquery){ ?>
	
    
    <div class="container">
    
    <div class="col-md-3 paddingoff">
    <?php if(!empty($nquery->image)){?>
          			<a href="<?php echo $url;?>/sermons/<?php echo $nquery->id;?>/<?php echo $nquery->post_slug;?>"><img src="<?php echo $url.'/local/images/post/'.$nquery->image;?>" class="img-responsive"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/sermons/<?php echo $nquery->id;?>/<?php echo $nquery->post_slug;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive"></a>
        			<?php } ?>
    </div>
    
    
     
    
   
    <div class="col-md-9 mtop10">
    <div class="fontsize16 bold gold ellipsis"><a href="<?php echo $url;?>/sermons/<?php echo $nquery->id;?>/<?php echo $nquery->post_slug;?>" class="gold decorationoff"><?php echo $nquery->name;?></a></div>
     <?php if(!empty($nquery->pastor_name)){
	 
	
	 $viewpastor = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('lang_code', '=', 'en')
				 ->where('post_staff_type', '=', 'pastor')
				  ->where('post_id', '=', $nquery->pastor_name)
				 ->get();
				 
	$viewpastor_cnt = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('lang_code', '=', 'en')
				 ->where('post_staff_type', '=', 'pastor')
				  ->where('post_id', '=', $nquery->pastor_name)
				 ->count();			 
	 
	 
	 
	 ?><div class="clear height5"></div>
                      <div class="para black bold text-left"><?php echo translate( 154, $lang);?> : <?php if(!empty($viewpastor_cnt)){?> <?php echo $viewpastor[0]->post_title;?><?php } ?></div>
            		  <div class="clear height5"></div><?php } ?>
    <p class="para black"><?php echo html_entity_decode(substr($nquery->description,0,150)).'...';?></p>
     <div class="clear height20"></div>
    <div class="text-left"><a href="<?php echo $url;?>/sermons/<?php echo $nquery->id;?>/<?php echo $nquery->post_slug;?>" class="avg_small_button"><?php echo translate( 349, $lang);?></a></div>
    </div>
    
    
    
    
    
    
    <div class="clear height40"></div>
   <div class="clear borderbottom paddingoff"></div>
    <div class="clear height40"></div>
    
   
 </div>
 
	
	
	<?php } ?>
    
    
    
    
    
    <?php } ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php if($type=="blog"){?>
	
	<?php foreach($query as $nquery){ ?>
    
    
    
    <div class="container">
    
    <div class="col-md-3 paddingoff">
    <?php if($nquery->post_media_type=="image"){ ?>
    				<?php if(!empty($nquery->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $nquery->post_id;?>/<?php echo $nquery->post_slug;?>" title="<?php echo $nquery->post_title;?>"><img src="<?php echo $url.'/local/images/post/'.$nquery->post_image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $nquery->post_id;?>/<?php echo $nquery->post_slug;?>" title="<?php echo $nquery->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                    <?php } ?>
                    
                    <?php if($nquery->post_media_type=="mp3"){ ?>
                    <a href="<?php echo $url;?>/blog/<?php echo $nquery->post_id;?>/<?php echo $nquery->post_slug;?>" title="<?php echo $nquery->post_title;?>"><img src="<?php echo $url;?>/local/images/blogaudio.png" class="img-responsive blogpost"></a>
                   
                    <?php } ?>
                    <?php if($nquery->post_media_type=="video"){?>
                    <a href="<?php echo $url;?>/blog/<?php echo $nquery->post_id;?>/<?php echo $nquery->post_slug;?>" title="<?php echo $nquery->post_title;?>"><img src="<?php echo $url;?>/local/images/blogvideo.png" class="img-responsive blogpost"></a>
                    <?php } ?>
    </div>
    
    
     
    
   
    <div class="col-md-9 mtop10">
    <div class="fontsize16 bold gold ellipsis"><a href="<?php echo $url;?>/blog/<?php echo $nquery->post_id;?>/<?php echo $nquery->post_slug;?>" class="gold decorationoff"><?php echo $nquery->post_title;?></a></div>
     <div class="ash fontsize12"><?php echo date("d M Y h:i:s a",strtotime($nquery->post_date));?></div>
    <p class="para black"><?php echo html_entity_decode(substr($nquery->post_desc,0,150)).'...';?></p>
     <div class="clear height20"></div>
    <div class="text-left"><a href="<?php echo $url;?>/blog/<?php echo $nquery->post_id;?>/<?php echo $nquery->post_slug;?>" class="avg_small_button"><?php echo translate( 349, $lang);?></a></div>
    </div>
    
    
    
    
    
    
    <div class="clear height40"></div>
   <div class="clear borderbottom paddingoff"></div>
    <div class="clear height40"></div>
    
   
 </div>
    
  
    
    <?php } ?>
    
    <?php } ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php if($type=="events"){?>
	
	<?php foreach($query as $event){ ?>
    
    
    
    <div class="container">
    
    
    
    <div class="col-md-3">
    <?php if(!empty($event->post_image)){ ?>
          			<a href="<?php echo $url;?>/events/<?php echo $event->post_id;?>/<?php echo $event->post_slug;?>" title="<?php echo $event->post_title;?>"><img src="<?php echo $url.'/local/images/post/'.$event->post_image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/events/<?php echo $event->post_id;?>/<?php echo $event->post_slug;?>" title="<?php echo $event->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
    </div>
    
    
     
    
    <?php
	$start_date = date("M d Y @ h:i a", strtotime($event->post_start_date));
	$end_date = date("M d Y @ h:i a", strtotime($event->post_end_date));
	
	$date = date("d",strtotime($event->post_start_date));
	$month = date("M",strtotime($event->post_start_date));
	?>
    <div class="col-md-5 mtop10">
    <div class="fontsize16 bold gold ellipsis"><a href="<?php echo $url;?>/events/<?php echo $event->post_id;?>/<?php echo $event->post_slug;?>" class="gold decorationoff"><?php echo $event->post_title;?></a></div>
     <div class="clear height5"></div>
    <div class="fontsize12 ash"><span class="lnr lnr-clock ash bold"></span> <?php echo $start_date;?> - <?php echo $end_date;?></div>
     <div class="clear height5"></div>
    <div class="fontsize14 black"><span class="lnr lnr-map-marker black bold"></span> <?php echo $event->post_location;?></div>
    </div>
    
    
    <div class="col-md-2 mtop30">
    <div><span class="edate fontsize70 gold bold"><?php echo $date;?></span><br/><span class="ash fontsize16 text-right mleft10"><?php echo $month;?></span></div>
    </div>
    
    
    <div class="col-md-2 mtop30">
    <a href="<?php echo $url;?>/events/<?php echo $event->post_id;?>/<?php echo $event->post_slug;?>" class="avg_small_button"><?php echo translate( 196, $lang);?></a>
    </div>
    <div class="clear height40"></div>
   <div class="clear borderbottom paddingoff"></div>
    <div class="clear height40"></div>
    
   
 </div>
    
    
    
    
    
    
    <?php } ?>
    
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