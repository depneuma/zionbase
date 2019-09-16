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
   
   <meta charset="utf-8" />
		

   @include('style')
   


<?php if(!empty($post_count)){?>
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $post[0]->post_title;?>">
<meta property="og:description" content="<?php echo substr($post[0]->post_desc,0,280).'...';?>">
<meta property="og:url" content="<?php echo $url;?>/blog/<?php echo $post[0]->post_id;?>/<?php echo $post[0]->post_slug;?>">
<meta property="og:site_name" content="<?php echo $setts[0]->site_name;?>">
<?php if(!empty($post[0]->post_image)){ ?>
<meta property="og:image" content="<?php echo $url.'/local/images/post/'.$post[0]->post_image;?>">
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
                <?php if(!empty($blog_count)){?>
                <span class="h1"><?php echo translate( 1, $lang);?></span>
                <?php } ?>
                <?php if(!empty($post_count)){?>
                <span class="captial fontsize20 lineheight50 gold"><?php echo translate( 1, $lang);?></span><br/>
                <span class="fcaptial thisfont thislineheight"><?php echo $post[0]->post_title; ?></span>
                <?php } ?>
                </h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 
	<div class="col-md-8">
	
    <?php if(!empty($blog_count)){?>
    <div class="bloglist">
    
	<?php foreach($blogs as $blog){
	$date = $blog->post_date;
	
	$old_date = strtotime($date);
	$dateonly = date('j', $old_date);
	$monly = date('M', $old_date);
	?>
  
    <div class="blogbg">
   
    
                    <div class="postdate"><p class="calendar"><?php echo $dateonly;?> <em><?php echo $monly;?></em></p></div>
                    <div class="">
                    <?php if($blog->post_media_type=="image"){ ?>
    				<?php if(!empty($blog->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $blog->post_id;?>/<?php echo $blog->post_slug;?>" title="<?php echo $blog->post_title;?>"><img src="<?php echo $url.'/local/images/post/'.$blog->post_image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $blog->post_id;?>/<?php echo $blog->post_slug;?>" title="<?php echo $blog->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                    <?php } ?>
                    </div>
                    
                    <?php if($blog->post_media_type=="mp3"){ ?>
                    <div class="text-center">
                    <div class="height20"></div>
                     <div class="mediPlayer">
    				<audio class="listen" preload="none" data-size="250" src="<?php echo $url;?>/local/images/mp3/<?php echo $blog->post_audio;?>"></audio>
					</div>
                    </div>
                    <?php } ?>
                    
                    <div>
                    <?php 
					if($blog->post_media_type=="video"){
					if (strpos($blog->post_video, 'youtube') > 0) {
					 $vurl = $blog->post_video;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
						$id = $matches[1];
						
						$height = '420px';
					?>
                    <iframe id="ytplayer" type="text/html" width="100%" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                    
                    <?php } 
					if (strpos($blog->post_video, 'vimeo') > 0) {
					$vimeo = $blog->post_video;
					?>
                    <iframe src="https://player.vimeo.com/video/<?php echo (int) substr(parse_url($vimeo, PHP_URL_PATH), 1);?>" width="100%" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<?php }
					} ?>
                    </div>
                    
                    
                    
                    
                    <div class="blogbody">
                   
                    <div class="h3 black ellipsis"><?php echo $blog->post_title;?></div>
                    <div class="clear height10"></div>
                    <div class="para black"><?php echo html_entity_decode(substr($blog->post_desc,0,300)).'...';?></div>
                    <div class="clear height10"></div>
                    <?php
					
		if($lang=="en")
		{
		         $poster = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('lang_code', '=', $lang)
				  ->where('post_id', '=', $blog->post_id)
				  ->get();
		   $gets_new = $poster[0]->post_id;
		}
		else
		{
		        $poster = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('lang_code', '=', $lang)
				  ->where('post_id', '=', $blog->post_id)
				  ->get();
		   $gets_new = $poster[0]->parent;
		}	
					
					$post_comment = DB::table('post')
							 ->where('post_parent', '=', $gets_new)
							  
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->count();
					?>
                    
                    <div class="gold h5 text-left"><i class="lnr lnr-bubble bold"></i> <?php echo $post_comment;?> Comment</div>
                    <div class="text-right"><a href="<?php echo $url;?>/blog/<?php echo $blog->post_id;?>/<?php echo $blog->post_slug;?>" class="avg_very_small_button"><?php echo translate( 64, $lang);?></a></div>
                    </div>
    
    
    </div>
    
    <?php } ?>
	</div>
     <div class="pagess"></div>
	<?php } ?>
    
    
    
    <?php if(!empty($post_count)){
	
	$date = $post[0]->post_date;
	
	$old_date = strtotime($date);
	$dateonly = date('j', $old_date);
	$monly = date('M', $old_date);
	?>
    <div class="bloglist">
        <div class="blogbg">
        <div class="postdate"><p class="calendar"><?php echo $dateonly;?> <em><?php echo $monly;?></em></p></div>
       
        
        
        
        <div class="">
                    <?php if($post[0]->post_media_type=="image"){ ?>
    				<?php if(!empty($post[0]->post_image)){ ?>
          			<img src="<?php echo $url.'/local/images/post/'.$post[0]->post_image;?>" class="img-responsive blogpost" title="<?php echo $post[0]->post_title;?>">
        			<?php } else {?>
       				<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost" title="<?php echo $post[0]->post_title;?>">
        			<?php } ?>
                    <?php } ?>
                    </div>
                    
                    <?php if($post[0]->post_media_type=="mp3"){ ?>
                    <div class="text-center">
                    <div class="height20"></div>
                     <div class="mediPlayer">
    				<audio class="listen" preload="none" data-size="250" src="<?php echo $url;?>/local/images/mp3/<?php echo $post[0]->post_audio;?>"></audio>
					</div>
                    </div>
                    <?php } ?>
                    
                    <div>
                    <?php 
					if($post[0]->post_media_type=="video"){
					if (strpos($post[0]->post_video, 'youtube') > 0) {
					 $vurl = $post[0]->post_video;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
						$id = $matches[1];
						
						$height = '420px';
					?>
                    <iframe id="ytplayer" type="text/html" width="100%" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                    
                    <?php } 
					if (strpos($post[0]->post_video, 'vimeo') > 0) {
					$vimeo = $post[0]->post_video;
					?>
                    <iframe src="https://player.vimeo.com/video/<?php echo (int) substr(parse_url($vimeo, PHP_URL_PATH), 1);?>" width="100%" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<?php }
					} ?>
                    </div>
                    
                    
                    
                     <div class="blogbody">
                   
                    <div class="h3 black ellipsis"><?php echo $post[0]->post_title;?></div>
                    <div class="clear height10"></div>
                    <div class="para black"><?php echo html_entity_decode($post[0]->post_desc);?></div>
                    <div class="clear height30"></div>
                    
                    
                    
                    
                    
                    
                    <div class="clear height30"></div>
                    
                    <?php /*?><div class="share-items text-center" data-title="<?php echo $post[0]->post_title;?>" data-hash="<?php echo $post[0]->post_title;?>" data-url="<?php echo $url;?>/blog/<?php echo $post[0]->post_id;?>/<?php echo $post[0]->post_slug;?>"><?php */?>
			
            <div class="socialshare text-center">
            <div class="avigher" data-ayoshare="<?php echo $url;?>/blog/<?php echo $post[0]->post_id;?>/<?php echo $post[0]->post_slug;?>"></div>
        	
            </div>
       
                    
                    
                   <div class="clear height50"></div> 
                   
                   
                  
                   
                   
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
                   
                   
                   <div class="text-left">
                    <span class="bold black"><i class="lnr lnr-tag bold"></i> <?php echo translate( 109, $lang);?> :</span>
                    
                    <span>
                    <?php 
					$post_tags = explode(',',$post[0]->post_tags);
					
					foreach($post_tags as $tags)
                    {
					$tag =strtolower(str_replace(" ","-",$tags)); 
					if(!empty($tags))
					{
					?>
                    <a href="<?php echo $url;?>/tag/blog/<?php echo $tag;?>" class="white goldbg"><?php echo $tags;?></a>
                    <?php
					}
					}
					?>
                    </span>
                    
                    </div>
                    
                    
                    <div class="clear height30"></div> 
                   
                    
                    </div>
                    
                   
                    
                    
        
         </div>
        <div class="clear"></div>
       
         <div class="col-md-6 paddingoff">
          <?php if(!empty($previous)){
		
		?>
         <div class="text-left"><a href="<?php echo $url;?>/blog/<?php echo $previous_link[0]->post_id;?>/<?php echo $previous_link[0]->post_slug;?>" class="avg_very_small_button fontbtn"><i class="lnr lnr-arrow-left"></i><?php echo '  '.$previous;?></a></div>
         <?php } ?>
         </div>
         
         
         <div class="col-md-6 paddingoff">
         <?php if(!empty($next)){
		
		 ?>
         <div class="text-right"><a href="<?php echo $url;?>/blog/<?php echo $next_link[0]->post_id;?>/<?php echo $next_link[0]->post_slug;?>" class="avg_very_small_button fontbtn"><?php echo $next.'  ';?><i class="lnr lnr-arrow-right"></i></a></div>
          <?php } ?>
         </div>
        
         <div class="clear height50"></div>
        
        <div class="col-md-12 paddingoff">
        <div class="h3 black"><?php echo translate( 172, $lang);?></div>
        <div class="clear height20"></div>
        <?php if(Auth::check()) { ?>
        <div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('blog') }}" id="formID" enctype="multipart/form-data">
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
          
          <input type="hidden" name="post_comment_type" value="blog">
          
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
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->orderBy('post_id', 'DESC')
							 ->get();
							 $pcnt = DB::table('post')
							 ->where('post_parent', '=', $gets)
							 ->where('post_comment_type', '=', 'blog')
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
        <div class="height100"></div>
        <?php } ?>
        </div>
        
         
         
    </div>    
    
    
    <?php } ?>
    
     <div class="height50"></div>
    
    
	</div>
   
	
	
	<div class="col-md-4 mtop">
	<div class="borderbottom">
        <h3 class="h4 heading topoff">
        <?php echo translate( 232, $lang);?>
        </h3>
	</div>
     <div class="clear height20"></div>
    <?php foreach($popular_blog as $popular){
	
	?>
    <div>
   
        <div class="col-md-4 paddingoff">
         
        <?php if($popular->post_media_type=="image"){ ?>
    				<?php if(!empty($popular->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $popular->post_id;?>/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url.'/local/images/post/'.$popular->post_image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $popular->post_id;?>/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                    <?php } ?>
                    
                    <?php if($popular->post_media_type=="mp3"){ ?>
                    <a href="<?php echo $url;?>/blog/<?php echo $popular->post_id;?>/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/blogaudio.png" class="img-responsive blogpost"></a>
                   
                    <?php } ?>
                    <?php if($popular->post_media_type=="video"){?>
                    <a href="<?php echo $url;?>/blog/<?php echo $popular->post_id;?>/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/blogvideo.png" class="img-responsive blogpost"></a>
                    <?php } ?>
                    
        </div>
        <div class="col-md-8 paddingleft10rightoff">
        <div class="black para poptitle ellipsis"><a href="<?php echo $url;?>/blog/<?php echo $popular->post_id;?>/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>" class="black decorationoff hoveroff"><?php echo $popular->post_title;?></a></div>
        <div class="ash fontsize12"><?php echo date("d M Y h:i:s a",strtotime($popular->post_date));?></div>
        </div>
    
    </div>
    <div class="clear height20"></div>
    <?php } ?>
	
	
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