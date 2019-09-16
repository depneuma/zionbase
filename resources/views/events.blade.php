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
	



<?php if(!empty($single_count)){?>
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $event[0]->post_title;?>">
<meta property="og:description" content="<?php echo substr($event[0]->post_desc,0,280).'...';?>">
<meta property="og:url" content="<?php echo $url;?>/events/<?php echo $event[0]->post_id;?>/<?php echo $event[0]->post_slug;?>">
<meta property="og:site_name" content="<?php echo $setts[0]->site_name;?>">
<?php if(!empty($event[0]->post_image)){ ?>
<meta property="og:image" content="<?php echo $url.'/local/images/post/'.$event[0]->post_image;?>">
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
        
           
                
           <h1 class="white text-center">
                <?php if(!empty($event_count)){?>
                <span class="h1"><?php echo translate( 4, $lang);?></span>
                <?php } ?>
                <?php if(!empty($single_count)){?>
                <span class="captial fontsize20 lineheight50 gold"><?php echo translate( 4, $lang);?></span><br/>
                <span class="fcaptial thisfont thislineheight"><?php echo $event[0]->post_title; ?></span>
                <?php } ?>
                </h1>
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 
	
	 
    
    <?php if(!empty($event_count)){?>
    <h1 class="h2 text-center black uppercase bold"><?php echo translate( 193, $lang);?></h1>
	<div class="clear height50"></div>
    <div class="clear height30"></div>
    <div class="row eventlist">
    
     <?php foreach($events as $event){
			
			?>
            
            
	<div class="container">
    
    <div class="col-md-3 paddingoff">
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
    
    
   
 </div>
   
    <?php } ?>
    </div>
    <div class="clear height30"></div>
     <div class="epagi"></div>
    
	
	
	
	
	<?php } ?>
    
    
    <?php if(!empty($single_count)){?>
    
    
    <div class="container">
    <div class="col-md-8">
    <div class="mbottom">
    <?php if(!empty($event[0]->post_image)){ ?>
          			<img src="<?php echo $url.'/local/images/post/'.$event[0]->post_image;?>" class="img-responsive blogpost">
        			<?php } else {?>
       				<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost">
        			<?php } ?>
    </div>
    
                    
    </div>
    <?php
	$start_date = date("M d Y @ h:i a", strtotime($event[0]->post_start_date));
	$end_date = date("M d Y @ h:i a", strtotime($event[0]->post_end_date));
	
	$date = date("d",strtotime($event[0]->post_start_date));
	$month = date("M",strtotime($event[0]->post_start_date));
	?>
    <div class="col-md-4">
    <div class="borderbottom">
        <h3 class="fontsize20 heading topoff">
        <?php echo translate( 199, $lang);?>
        </h3>
	</div>
    <div class="clear height20"></div>
    <div class="black">
    <?php if(!empty($start_date)){?><span class="bold fontsize16"><?php echo translate( 202, $lang);?> : </span><br/><span class="fontsize16"><?php echo $start_date;?></span><?php } ?>
    <div class="clear height10"></div>
    <?php if(!empty($end_date)){?><span class="bold fontsize16"><?php echo translate( 205, $lang);?> : </span><br/><span class="fontsize16"><?php echo $end_date;?></span><?php } ?>
    <div class="clear height10"></div>
    <?php if(!empty($event[0]->post_location)){?><span class="bold fontsize16"><?php echo translate( 208, $lang);?> : </span><br/><span class="fontsize16"><?php echo $event[0]->post_location;?></span><?php } ?>
    <div class="clear height10"></div>
    <?php if(!empty($event[0]->post_phone)){?><span class="bold fontsize16"><?php echo translate( 136, $lang);?> : </span><span class="fontsize16"><?php echo $event[0]->post_phone;?></span><?php } ?>
    <div class="clear height10"></div>
    <?php if(!empty($event[0]->post_website)){?><span class="bold fontsize16"><?php echo translate( 211, $lang);?> : </span><span class="fontsize16"><a href="<?php echo $event[0]->post_website;?>" target="_blank" class="black"><?php echo $event[0]->post_website;?></a></span><?php } ?>
     <div class="clear height10"></div>
     <?php if(!empty($event[0]->post_email)){?><span class="bold fontsize16"><?php echo translate( 214, $lang);?> : </span><span class="fontsize16"><a href="mailto:<?php echo $event[0]->post_email;?>" class="black"><?php echo $event[0]->post_email;?></a></span><?php } ?>
    </div>
    
    </div>
    
   <?php if(!empty($event[0]->post_desc)){?>
    <div class="clear height20"></div>
    
    <div class="col-md-12">
    <div class="para black">
    <?php echo html_entity_decode($event[0]->post_desc);?>
    </div>
    </div>
    <?php } ?>
    
    
    <div class="clear height20"></div>
    <div class="col-md-12 text-right"><a href="javascript:void(0)" class="avg_big_button" data-toggle="modal" data-target="#booking"><?php echo translate( 196, $lang);?></a></div>
    <div class="clear height20"></div>
    
   
            
            <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="booking" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <form role="form" method="POST" action="{{ route('event_booking') }}" id="formID" enctype="multipart/form-data">
                 {{ csrf_field() }}
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="lnr lnr-cross gold bold"></span></button>
                    <h4 class="modal-title h4 black" id="myModalLabel"><?php echo translate( 217, $lang);?></h4>
                  </div>
                  
                  <?php if(!empty($bookseat)){ $book_seater = $bookseat; } else { $book_seater = 0; }?>
                  <div class="modal-body">
                   <div class="form-group">
                   <div class="gold bold para"><?php echo translate( 220, $lang);?> : <?php echo $event[0]->post_seat_space - $book_seater;?></div>
                   </div>
                   
                   <input type="hidden" name="event_id" value="<?php echo $gets;?>">
                   
                   <input type="hidden" name="available_seat" value="<?php echo $event[0]->post_seat_space;?>">
                   
                    <input type="hidden" name="booked_seat" value="<?php echo $book_seater;?>">
                   
          <div class="form-group">
            <label for="spaces" class="control-label black h5"><?php echo translate( 223, $lang);?>:</label>
            <input type="number" class="form-control validate[required] text-input radiusoff" id="booking_seats" name="booking_seats">
          </div>
          
          <div class="form-group">
            <label for="name" class="control-label black h5"><?php echo translate( 133, $lang);?>:</label>
            <input type="text" class="form-control validate[required] text-input radiusoff" id="booking_name" name="booking_name">
          </div>
          
          <div class="form-group">
            <label for="phone" class="control-label black h5"><?php echo translate( 136, $lang);?>:</label>
            <input type="text" class="form-control validate[required] text-input radiusoff" id="booking_phone" name="booking_phone">
          </div>
          
          <div class="form-group">
            <label for="email" class="control-label black h5"><?php echo translate( 214, $lang);?>:</label>
            <input type="text" class="form-control validate[required,custom[email]] text-input radiusoff" id="booking_email" name="booking_email">
          </div>
          
          <div class="form-group">
            <label for="message" class="control-label black h5"><?php echo translate( 139, $lang);?>:</label>
            <textarea class="form-control validate[required] text-input radiusoff" id="booking_message" name="booking_message"></textarea>
          </div>
        
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="avg_small_border_button" data-dismiss="modal" value="<?php echo translate( 73, $lang);?>">
                    <input type="submit" class="avg_very_small_button" value="<?php echo translate( 226, $lang);?>">
                  </div>
                  </form>
                  
                </div>
              </div>
            </div>
	
    
    
    <?php if(!empty($event[0]->post_location)){?>
     <div class="clear height30"></div>
     <div class="col-md-12">
     <iframe width="100%" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/search?q=<?php echo $event[0]->post_location;?>&key=<?php echo $setts[0]->site_map_api;?>" allowfullscreen></iframe>
</div>
 <div class="clear height50"></div>
 
 
  <div class="col-md-12">
 <div class="col-md-6 paddingoff">
          <?php if(!empty($previous)){
		
		?>
         <div class="text-left page_next">
         <a href="<?php echo $url;?>/events/<?php echo $previous_link[0]->post_id;?>/<?php echo $previous_link[0]->post_slug;?>" class="avg_very_small_button fontbtn"><i class="lnr lnr-arrow-left"></i><?php echo '  '.$previous;?></a></div>
         <?php } ?>
         </div>
         
         
         <div class="col-md-6 paddingoff">
         <?php if(!empty($next)){
		
		 ?>
         <div class="text-right page_previous">
         <a href="<?php echo $url;?>/events/<?php echo $next_link[0]->post_id;?>/<?php echo $next_link[0]->post_slug;?>" class="avg_very_small_button fontbtn"><?php echo $next.'  ';?><i class="lnr lnr-arrow-right"></i></a></div>
          <?php } ?>
         </div>
 </div>
 
 <div class="clear height50"></div>
 
 <div class="col-md-12">
 
 <div class="topbottom_bar">
 
 <div class="clear height30"></div>
 
 <div class="h3 black text-center"><?php echo translate( 229, $lang);?></div>
 <div class="clear height30"></div>
 
 
			
            <div>
            
            <div class="col-md-12 text-center">
        	<div class="avigher" data-ayoshare="<?php echo $url;?>/events/<?php echo $event[0]->post_id;?>/<?php echo $event[0]->post_slug;?>"></div>
            </div>
            
            </div>
       
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
 <div class="clear height50"></div>
 </div>
 
 </div>
  
  
  
  <div class="clear height50"></div> 
                   
                   
                   <div class="text-left">
                    <span class="bold black"><i class="lnr lnr-tag bold"></i> <?php echo translate( 109, $lang);?> :</span>
                    
                    <span>
                    <?php 
					$post_tags = explode(',',$event[0]->post_tags);
					
					foreach($post_tags as $tags)
                    {
					$tag =strtolower(str_replace(" ","-",$tags)); 
					if(!empty($tags))
					{
					?>
                    <a href="<?php echo $url;?>/tag/events/<?php echo $tag;?>" class="white goldbg"><?php echo $tags;?></a>
                    <?php
					}
					}
					?>
                    </span>
                    
                    </div>
                    
                    
                    <div class="clear height30"></div> 
                   
  
  
  
  
    <?php } ?>
    
    
    
    
    
    
    <div class="col-md-12">
        <div class="h3 black"><?php echo translate( 172, $lang);?></div>
        <div class="clear height20"></div>
        <?php if(Auth::check()) { ?>
        <div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('events') }}" id="formID2" enctype="multipart/form-data">
                        {{ csrf_field() }}
	
	<div class="paddingoff">
    
	
          <div class="col-lg-6 col-md-6 col-sm-6 paddingleftoff">
            <label class="ash"><?php echo translate( 133, $lang);?><span class="star">*</span></label>
            <input type="text" value=""  class="form-control validate[required] text-input radiusoff" id="name" name="name" >
          </div>
          <div class="mobbottom"></div>
          <div class="col-lg-6 col-md-6 col-sm-6 paddingrightoff">
            <label class="ash"><?php echo translate( 214, $lang);?><span class="star">*</span> </label>
            <input type="text" value="<?php echo Auth::user()->email;?>"  class="form-control validate[required,custom[email]] text-input radiusoff" id="email" name="email" readonly>
          </div>
		  
          <div class="clear height30"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 paddingoff">
            <label class="ash"><?php echo translate( 139, $lang);?><span class="star">*</span> </label>
            <textarea value=""   class="form-control validate[required] text-input radiusoff height150" id="msg" name="msg"></textarea>
          </div>
          
          <input type="hidden" name="post_comment_type" value="event">
          
           <input type="hidden" name="post_type" value="comment">
           
           <input type="hidden" name="post_user_id" value="<?php echo Auth::user()->id;?>">
          
          <input type="hidden" name="post_parent" value="<?php echo $gets;?>">
          
		  <div class="clear height30"></div>
          <div class="col-lg-6 paddingoff">
            <input type="submit" class="btn btn-primary avg_small_button radiusoff" value="<?php echo translate( 142, $lang);?>">
          </div>
		  <div class="clear height50"></div>
		 </div> 
        </form>
        </div>
        <?php
		$pcomment = DB::table('post')
							 ->where('post_parent', '=', $gets)
							 ->where('post_comment_type', '=', 'event')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->orderBy('post_id', 'DESC')
							 ->get();
							 $pcnt = DB::table('post')
							 ->where('post_parent', '=', $gets)
							 ->where('post_comment_type', '=', 'event')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->count();
							 
			if($pcnt!=0){				 ?>
        <div class="clear height20"></div>
         <div class="h3 black"><?php echo translate( 175, $lang);?></div>
         <div class="clear height30"></div>
         
         <?php }
		 
							 foreach($pcomment as $viwcomment){
							 $user = DB::table('users')
							         ->where('id', '=', $viwcomment->post_user_id)
									 ->get();
		?>					 
         <div class="col-lg-2 col-md-2 col-sm-2">
         <?php 
					   $userphoto="/userphoto/";
						$path ='/local/images'.$userphoto.$user[0]->photo;
						if($user[0]->photo!=""){
						?>
						 <img src="<?php echo $url.$path;?>" class="thumb round" width="70">
						 <?php } else { ?>
						  <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb round" width="70">
						 <?php } ?>
         </div>
         <div class="col-lg-10 col-md-10 col-sm-10 paddingoff">
         <div class="h4 black"><?php echo $viwcomment->post_title;?></div>
         <div class="height5"></div>
         <div class="para"><?php echo html_entity_decode($viwcomment->post_desc);?></div>
         <div class="height5"></div>
         <div class="fontsize12 gold italic"><?php echo date('d M Y h:i:s a',strtotime($viwcomment->post_date));?></div>
         </div>
         <div class="clear borderbottom paddingtopbottom10"></div>
         <div class="height40"></div>
         <?php } ?>
         
        
        <?php } else {?>
        <div class="para black"><?php echo translate( 178, $lang);?> <a href="<?php echo $url;?>/login" class="gold bold"><?php echo translate( 181, $lang);?></a> <?php echo translate( 184, $lang);?>.</div>
        <?php } ?>
        </div>
    
    
    
    
    
    
    
    
    
    </div>
   
    
    <?php } ?>
	
	
	
	
    <div class="height100"></div>
    
   
    
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