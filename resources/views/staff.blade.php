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
	

<?php if(!empty($staff_counts)){?>
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $staff[0]->post_title;?>">
<meta property="og:description" content="<?php echo substr($staff[0]->post_desc,0,280).'...';?>">
<meta property="og:url" content="<?php echo $url;?>/staff/<?php echo $staff[0]->post_id;?>/<?php echo $staff[0]->post_slug;?>">
<meta property="og:site_name" content="<?php echo $setts[0]->site_name;?>">
<?php if(!empty($staff[0]->post_image)){ ?>
<meta property="og:image" content="<?php echo $url.'/local/images/post/'.$staff[0]->post_image;?>">
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
                <?php if(!empty($staff_count)){?>
                <span class="h1"><?php echo translate( 118, $lang);?></span>
                <?php } ?>
                <?php if(!empty($staff_counts)){?>
                <span class="captial fontsize20 lineheight50 gold"><?php echo translate( 118, $lang);?></span><br/>
                <span class="fcaptial thisfont thislineheight"><?php echo $staff[0]->post_title;?></span>
                <?php } ?>
                </h1>
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="clear height50"></div>
      <?php if(!empty($staff_count)){
	 foreach($staff as $staffer){
	  
	  
	  ?>
      <?php 
			
			$staff_view = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('lang_code', '=', $lang)
				 ->where('post_staff_type', '=', $staffer->name)
				 ->orderBy('post_id', 'desc')->get();
				 
			$staff_view_count = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('lang_code', '=', $lang)
				 ->where('post_staff_type', '=', $staffer->name)
				 ->orderBy('post_id', 'desc')->count();	
				 
				 
			
			?>
      
        <h1 class="h2 text-center black uppercase bold animated fadeInUp slow"><?php echo $staffer->name;?></h1>
        <div class="h5 ash text-center animated fadeInUp slow"><?php echo translate( 85, $lang);?></div>
        <div class="clear height50"></div>
        <div class="clear height20"></div>
	<?php
	if(!empty($staff_view_count))
				 { 
				 
			foreach($staff_view as $pastor){
			?>
     <div class="sermonlist">
            <?php if(!empty($pastor->post_slug)){?>
            <div class="col-md-3 bide barbot" align="center">
            	<div class="text-center spacer">
					<div align="center">
					<?php if(!empty($pastor->post_image)){?>
          			<a href="<?php echo $url;?>/staff/<?php echo $pastor->post_id;?>/<?php echo $pastor->post_slug;?>"><img src="<?php echo $url.'/local/images/post/'.$pastor->post_image;?>" class="img-responsive round postbg"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/staff/<?php echo $pastor->post_id;?>/<?php echo $pastor->post_slug;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive round postbg"></a>
        			<?php } ?>
                    </div>
                    <div class="staff_min_height">
                     <div class="clear height10"></div>
                     <div class="fontsize17 lineheight30 bold black text-center ellipsis"><a href="<?php echo $url;?>/staff/<?php echo $pastor->post_id;?>/<?php echo $pastor->post_slug;?>" class="black"><?php echo $pastor->post_title;?></a></div>
                     <?php if(!empty($pastor->post_staff_type)){?><div class="clear height5"></div>
                      <div class="para gold bold text-center"><?php echo $pastor->post_staff_type;?></div>
            		  <div class="clear height5"></div><?php } ?>
                      
                     <p class="para black text-center"><?php echo html_entity_decode(substr($pastor->post_desc,0,50)).'...';?></p>
                     <div class="clear height20"></div>
                     
                     
                     
                     
                     
                     
                     
                     <div  class="stafficon">
                     <ul>
                     <?php if(!empty($pastor->post_facebook)){?><li><a href="<?php echo $pastor->post_facebook;?>" target="_blank"><i class="fa fa-facebook move5"></i></a></li><?php } ?>
                     <?php if(!empty($pastor->post_twitter)){?><li><a href="<?php echo $pastor->post_twitter;?>" target="_blank"><i class="fa fa-twitter move5"></i></a></li><?php } ?>
                     <?php if(!empty($pastor->post_gplus)){?><li><a href="<?php echo $pastor->post_gplus;?>" target="_blank"><i class="fa fa-google-plus move5"></i></a></li><?php } ?>
                     <?php if(!empty($pastor->post_youtube)){?><li><a href="<?php echo $pastor->post_youtube;?>" download><i class="fa fa-youtube-play move5"></i></a></li><?php } ?>
                     </ul>
                     </div>
                    
                     
                    </div>
                    
                    
                    
            	</div>
            </div>
            <?php } ?>
            
            
            
            
            
            
           
            
            </div>
            
     
      <?php } } ?>
     <div class="height50 clear"></div>
     <div class="height20 clear"></div>
     <?php }  } ?>
     
     
     
     
     
     
     <?php /*?>
	 <div class="height50 clear"></div>
     <div class="height20 clear"></div>
      <?php if(!empty($volunteer_count)){?>
      <h1 class="h2 text-center black uppercase bold animated fadeInUp slow"><?php echo translate( 238, $lang);?></h1>
        <div class="h5 ash text-center animated fadeInUp slow"><?php echo translate( 85, $lang);?></div>
        <div class="clear height50"></div>
     <div class="clear height50"></div>
    
     <div class="sermonlist">
            <?php foreach($staff_volunteer as $volunteer){
			
			?>
            <div class="col-md-3 bide barbot" align="center">
            	<div class="text-center spacer">
					<div align="center">
					<?php if(!empty($volunteer->post_image)){?>
          			<a href="<?php echo $url;?>/staff/<?php echo $volunteer->post_slug;?>"><img src="<?php echo $url.'/local/images/post/'.$volunteer->post_image;?>" class="img-responsive round postbg"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/staff/<?php echo $volunteer->post_slug;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive round postbg"></a>
        			<?php } ?>
                    </div>
                    <div class="staff_min_height">
                     <div class="clear height10"></div>
                     <div class="fontsize17 lineheight30 bold black text-center ellipsis"><a href="<?php echo $url;?>/staff/<?php echo $volunteer->post_slug;?>" class="black"><?php echo $volunteer->post_title;?></a></div>
                     <?php if(!empty($volunteer->post_staff_type)){?><div class="clear height5"></div>
                      <div class="para gold bold text-center"><?php echo $volunteer->post_staff_type;?></div>
            		  <div class="clear height5"></div><?php } ?>
                      
                     <p class="para black text-center"><?php echo substr($volunteer->post_desc,0,50).'...';?></p>
                     <div class="clear height20"></div>
                     <div  class="stafficon">
                     <ul>
                     <?php if(!empty($volunteer->post_facebook)){?><li><a href="<?php echo $volunteer->post_facebook;?>" target="_blank"><i class="fa fa-facebook move5"></i></a></li><?php } ?>
                     <?php if(!empty($volunteer->post_twitter)){?><li><a href="<?php echo $volunteer->post_twitter;?>" target="_blank"><i class="fa fa-twitter move5"></i></a></li><?php } ?>
                     <?php if(!empty($volunteer->post_gplus)){?><li><a href="<?php echo $volunteer->post_gplus;?>" target="_blank"><i class="fa fa-google-plus move5"></i></a></li><?php } ?>
                     <?php if(!empty($volunteer->post_youtube)){?><li><a href="<?php echo $volunteer->post_youtube;?>" download><i class="fa fa-youtube-play move5"></i></a></li><?php } ?>
                     </ul>
                     </div>
                    
                     
                    </div>
                    
                    
                    
            	</div>
            </div>
            
            
            
            
            
            
            
            <?php } ?>
            
            </div>
     <?php } ?>
     
     <?php */?>
     
     
     <?php if(!empty($staff_counts)){?>
     <div class="col-md-12">
     <div class="blogbg">
     
     <div align="center">
                     <div class="clear height10"></div>
    				<?php if(!empty($staff[0]->post_image)){ ?>
          			<img src="<?php echo $url.'/local/images/post/'.$staff[0]->post_image;?>" class="img-responsive blogpost round postbg" title="<?php echo $staff[0]->post_title;?>">
        			<?php } else {?>
       				<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost postbg" title="<?php echo $staff[0]->post_title;?>">
        			<?php } ?>
                    
                    </div>
                    
                    
                    
                     <div class="blogbody">
                   
                    <div class="h3 black text-center"><?php echo $staff[0]->post_title;?></div>
                    
                    <?php if(!empty($staff[0]->post_staff_type)){?><div class="clear"></div>
                    <div class="para gold bold text-center"><?php echo $staff[0]->post_staff_type;?></div>
                    <div class="clear height5"></div>
                    <?php } ?>
                    <div class="clear height10"></div>
                    <div  class="stafficon" align="center">
                     <ul>
                     <?php if(!empty($staff[0]->post_facebook)){?><li><a href="<?php echo $staff[0]->post_facebook;?>" target="_blank"><i class="fa fa-facebook move5"></i></a></li><?php } ?>
                     <?php if(!empty($staff[0]->post_twitter)){?><li><a href="<?php echo $staff[0]->post_twitter;?>" target="_blank"><i class="fa fa-twitter move5"></i></a></li><?php } ?>
                     <?php if(!empty($staff[0]->post_gplus)){?><li><a href="<?php echo $staff[0]->post_gplus;?>" target="_blank"><i class="fa fa-google-plus move5"></i></a></li><?php } ?>
                     <?php if(!empty($staff[0]->post_youtube)){?><li><a href="<?php echo $staff[0]->post_youtube;?>" download><i class="fa fa-youtube-play move5"></i></a></li><?php } ?>
                     </ul>
                     </div>
                    <div class="clear height10"></div>
                    <div class="para black"><?php echo html_entity_decode($staff[0]->post_desc);?></div>
                    
                    
                    
                    <div class="clear height30"></div>
                    
                    
                    <div>
            
            <div class="col-md-12 text-center">
        	<div class="avigher" data-ayoshare="<?php echo $url;?>/staff/<?php echo $staff[0]->post_id;?>/<?php echo $staff[0]->post_slug;?>"></div>
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
                    
                    
                    
                    
                    
                  <?php /* ?>  
                    <div class="share-items text-center" data-title="<?php echo $staff[0]->post_title;?>" data-hash="<?php echo $staff[0]->post_title;?>" data-url="<?php echo $url;?>/staff/<?php echo $staff[0]->post_id;?>/<?php echo $staff[0]->post_slug;?>">
			
            <div class="socialshare text-center">
        	<ul class="share-links">
        		<li>
        			<a class="twitterBtn" data-dir="left" href="" >
            			<span><?php echo translate( 157, $lang);?></span>
            			<span class="twitter-count"></span>
                    </a>
        		</li>
        		<li>
        			<a class="facebookBtn" href="">
            			<span><?php echo translate( 160, $lang);?></span>
            			<span class="facebook-count"></span>
                    </a>
        		</li>
        		<li>
        			<a class="linkedinBtn" href="">
            			<span><?php echo translate( 163, $lang);?></span>
            			<span class="linkedin-count"></span>
                    </a>
        		</li>
        		<li>
        			<a class="googleBtn" href="">
            			<span><?php echo translate( 166, $lang);?></span>
            			<span class="google-count"></span>
                    </a>
        		</li>
				<li>
					<span><?php echo translate( 169, $lang);?></span>
					<span class="total-count"></span>
				</li>
        	</ul>
            </div>
            
            
        </div><?php */?>
                    
                    
                 <div class="clear height50"></div>   
                    
                    
                    
                    
                    
                    </div>
     
     </div>
     <div class="clear height30"></div>
     <div class="row">
     
     <div class="col-md-12">
     <div class="col-md-6 paddingoff">
          <?php if(!empty($previous)){
		
		?>
         <div class="text-left"><a href="<?php echo $url;?>/staff/<?php echo $previous_link[0]->post_id;?>/<?php echo $previous_link[0]->post_slug;?>" class="avg_very_small_button fontbtn"><i class="lnr lnr-arrow-left"></i><?php echo '  '.$previous;?></a></div>
         <?php } ?>
         </div>
         
         
         <div class="col-md-6 paddingoff">
         <?php if(!empty($next)){
		 
		 ?>
         <div class="text-right"><a href="<?php echo $url;?>/staff/<?php echo $next_link[0]->post_id;?>/<?php echo $next_link[0]->post_slug;?>" class="avg_very_small_button fontbtn"><?php echo $next.'  ';?><i class="lnr lnr-arrow-right"></i></a></div>
          <?php } ?>
         </div>
         
         </div>
         </div>
         
     <div class="clear height50"></div>
     
     
     
     
     
     
     
     
     </div>
     
     
     
     
     <?php } ?>
     
     
     
     
     
     <?php /*?>
     <div class="col-md-4">
     
     
     
     <div class="borderbottom">
        <h3 class="h4 heading topoff">
        Latest Sermons
        </h3>
	</div>
     <div class="clear height20"></div>
    <?php foreach($latest_sermon as $latestsermon){
	
	?>
    <div>
   
        <div class="col-md-4 paddingoff">
         
       
    				<?php if(!empty($latestsermon->image)){ ?>
          			<a href="<?php echo $url;?>/sermons/<?php echo $latestsermon->post_slug;?>" title="<?php echo $latestsermon->name;?>"><img src="<?php echo $url.'/local/images/post/'.$latestsermon->image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/sermons/<?php echo $latestsermon->post_slug;?>" title="<?php echo $latestsermon->name;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                   
                    
                    
                    
        </div>
        <div class="col-md-8 paddingleft10rightoff">
        <div class="black para poptitle ellipsis"><a href="<?php echo $url;?>/sermons/<?php echo $latestsermon->post_slug;?>" title="<?php echo $latestsermon->name;?>" class="black decorationoff hoveroff"><?php echo $latestsermon->name;?></a></div>
        <div class="ash fontsize12"><?php echo date("d M Y h:i:s a",strtotime($latestsermon->submitdate));?></div>
        </div>
    
    </div>
    <div class="clear height20"></div>
    <?php } ?>
	
     
     
     
     <div class="clear height50"></div>
     
     
     
     
     
	<div class="borderbottom">
        <h3 class="h4 heading topoff">
        Latest Post
        </h3>
	</div>
     <div class="clear height20"></div>
    <?php foreach($popular_blog as $popular){
	
	?>
    <div>
   
        <div class="col-md-4 paddingoff">
         
        <?php if($popular->post_media_type=="image"){ ?>
    				<?php if(!empty($popular->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url.'/local/images/post/'.$popular->post_image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                    <?php } ?>
                    
                    <?php if($popular->post_media_type=="mp3"){ ?>
                    <a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/blogaudio.png" class="img-responsive blogpost"></a>
                   
                    <?php } ?>
                    <?php if($popular->post_media_type=="video"){?>
                    <a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/blogvideo.png" class="img-responsive blogpost"></a>
                    <?php } ?>
                    
        </div>
        <div class="col-md-8 paddingleft10rightoff">
        <div class="black para poptitle ellipsis"><a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>" class="black decorationoff hoveroff"><?php echo $popular->post_title;?></a></div>
        <div class="ash fontsize12"><?php echo date("d M Y h:i:s a",strtotime($popular->post_date));?></div>
        </div>
    
    </div>
    <div class="clear height20"></div>
    <?php } ?>
	
	
	</div>
     
     
   
     
     
     
     
     
     
     
     
     
     <?php } ?>
     
       <?php */?>
     
     
     
    </div>
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