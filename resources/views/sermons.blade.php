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
	

<?php if(!empty($single_count)){?>
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $sermon[0]->name;?>">
<meta property="og:description" content="<?php echo substr($sermon[0]->description,0,280).'...';?>">
<meta property="og:url" content="<?php echo $url;?>/sermons/<?php echo $sermon[0]->id;?>/<?php echo $sermon[0]->post_slug;?>">
<meta property="og:site_name" content="<?php echo $setts[0]->site_name;?>">
<?php if(!empty($sermon[0]->image)){ ?>
<meta property="og:image" content="<?php echo $url.'/local/images/post/'.$sermon[0]->image;?>">
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
                <?php if(!empty($sermon_count)){?>
                <span class="h1"><?php echo translate( 7, $lang);?></span>
                <?php } ?>
                <?php if(!empty($single_count)){?>
                <span class="captial fontsize20 lineheight50 gold"><?php echo translate( 7, $lang);?></span><br/>
                <span class="fcaptial thisfont thislineheight"><?php echo $sermon[0]->name;?></span>
                <?php } ?>
                </h1>
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 <?php if(!empty($sermon_count)){?>
     <div class="row sermonlist">
            <?php foreach($sermons as $sermon){
			
			?>
            
            
            
            
            <div class="col-md-4 text-center">
            	<div class="col-md-12 paddingoff text-center">
					<div>
					<?php if(!empty($sermon->image)){?>
          			<a href="<?php echo $url;?>/sermons/<?php echo $sermon->id;?>/<?php echo $sermon->post_slug;?>"><img src="<?php echo $url.'/local/images/post/'.$sermon->image;?>" class="img-responsive"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/sermons/<?php echo $sermon->id;?>/<?php echo $sermon->post_slug;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive"></a>
        			<?php } ?>
                    </div>
                    <div class="postbox sermon_min_height">
                     <div class="clear height10"></div>
                     <div class="fontsize17 lineheight30 bold black text-center ellipsis"><a href="<?php echo $url;?>/sermons/<?php echo $sermon->id;?>/<?php echo $sermon->post_slug;?>" class="black"><?php echo $sermon->name;?></a></div>
                     <?php if(!empty($sermon->pastor_name)){
					 $staff_pastor = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('post_staff_type', '=', 'pastor')
				 ->where('lang_code', '=', 'en')
				 ->where('post_id', '=', $sermon->pastor_name)
				 ->get();
				 
				 
				  $staff_pastor_count = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('post_staff_type', '=', 'pastor')
				 ->where('lang_code', '=', 'en')
				  ->where('post_id', '=', $sermon->pastor_name)
				 ->count();
					 
					 ?><div class="clear height5"></div>
                      <div class="para black bold text-center"><?php echo translate( 154, $lang);?> : <?php if(!empty($staff_pastor_count)){ ?><a href="<?php echo $url;?>/staff/<?php echo $staff_pastor[0]->post_id;?>/<?php echo $staff_pastor[0]->post_slug;?>" class="gold"><?php echo $staff_pastor[0]->post_title;?></a><?php } ?></div>
            		  <div class="clear height5"></div><?php } ?>
                      
                     <p class="para black"><?php echo html_entity_decode(substr($sermon->description,0,100)).'...';?></p>
                     <div class="clear height20"></div>
                     <div  class="sermonicon">
                     <ul>
                     <?php if(!empty($sermon->video_url)){?><li><a href="<?php echo $sermon->video_url;?>" class="bla-2"><i class="lnr lnr-camera-video"></i></a></li><?php } ?>
                     <?php if(!empty($sermon->audio_file)){?><li><a href="javascript:void(0)" data-toggle="modal" data-target="#sermon<?php echo $sermon->id;?>"><i class="lnr lnr-music-note"></i></a></li><?php } ?>
                     <?php if(!empty($sermon->pdf_file)){?><li><a href="<?php echo $url;?>/local/images/pdf/<?php echo $sermon->pdf_file;?>" target="_blank"><i class="lnr lnr-file-empty"></i></a></li><?php } ?>
                     <?php if(!empty($sermon->pdf_file)){?><li><a href="<?php echo $url;?>/local/images/pdf/<?php echo $sermon->pdf_file;?>" download><i class="lnr lnr-download"></i></a></li><?php } ?>
                     </ul>
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
                     
                    </div>
                    
                    
                    
                    
            	</div>
                
                
                
                
              
                
            </div>
            
            
            
            
            
            
            
            <?php } ?>
            
            </div>
            
     
      <div class="pagi"></div>
     <div class="height50"></div>
     
     <?php } ?>
     
     
     
     
     
     
     
     <?php if(!empty($single_count)){?>
     <div class="col-md-8">
     <div class="blogbg">
     <div  class="single_sermonicon absolute top10">
                     <ul>
                     <?php if(!empty($sermon[0]->video_url)){?><li><a href="<?php echo $sermon[0]->video_url;?>" class="bla-2"><i class="lnr lnr-camera-video"></i></a></li><?php } ?>
                     <?php if(!empty($sermon[0]->audio_file)){?><li><a href="javascript:void(0)" data-toggle="modal" data-target="#sermon<?php echo $sermon[0]->id;?>"><i class="lnr lnr-music-note"></i></a></li><?php } ?>
                     <?php if(!empty($sermon[0]->pdf_file)){?><li><a href="<?php echo $url;?>/local/images/pdf/<?php echo $sermon[0]->pdf_file;?>" target="_blank"><i class="lnr lnr-file-empty"></i></a></li><?php } ?>
                     <?php if(!empty($sermon[0]->pdf_file)){?><li><a href="<?php echo $url;?>/local/images/pdf/<?php echo $sermon[0]->pdf_file;?>" download><i class="lnr lnr-download"></i></a></li><?php } ?>
                     </ul>
                     </div>
     <div class="">
                    
    				<?php if(!empty($sermon[0]->image)){ ?>
          			<img src="<?php echo $url.'/local/images/post/'.$sermon[0]->image;?>" class="img-responsive blogpost" title="<?php echo $sermon[0]->name;?>">
        			<?php } else {?>
       				<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost" title="<?php echo $sermon[0]->name;?>">
        			<?php } ?>
                    
                    </div>
                    
                    
                    
                    
                    
                    
                    <div class="modal fade" id="sermon<?php echo $sermon[0]->id;?>" tabindex="-1" role="dialog" aria-labelledby="sermon<?php echo $sermon[0]->id;?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
               
               
               
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="lnr lnr-cross gold bold"></span></button>
                    <h4 class="modal-title h4 black" id="myModalLabel"><?php echo $sermon[0]->name;?></h4>
                  </div>
                  
                  <div class="modal-body">
                   
                   <div class="mediPlayer text-center">
    				<audio class="listen" preload="none" data-size="250" src="<?php echo $url;?>/local/images/mp3/<?php echo $sermon[0]->audio_file;?>"></audio>
					</div>
                  
                   
         
        
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="avg_small_border_button" data-dismiss="modal" value="<?php echo translate( 73, $lang);?>">
                    
                  </div>
                  
                  
                </div>
              </div>
            </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                     <div class="blogbody">
                   
                    <div class="h3 black"><?php echo $sermon[0]->name;?></div>
                    
                    <?php 
					
					 $staff_pastor = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('post_staff_type', '=', 'pastor')
				 
				 ->where('lang_code', '=', 'en')
				 ->where('post_id', '=', $sermon[0]->pastor_name)
				 ->get();
				 
				 $staff_pastor_count = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('post_staff_type', '=', 'pastor')
				->where('lang_code', '=', 'en')
				 ->where('post_id', '=', $sermon[0]->pastor_name)
				 ->count();
				 if(!empty($staff_pastor_count)){
					?><div class="clear height10"></div>
                    <div class="para black bold"><?php echo translate( 154, $lang);?> : <a href="<?php echo $url;?>/staff/<?php echo $staff_pastor[0]->post_id;?>/<?php echo $staff_pastor[0]->post_slug;?>" class="gold"><?php echo $staff_pastor[0]->post_title;?></a></div>
                    <div class="clear height10"></div>
                    <?php } ?>
                    
                    <div class="para black col-md-12 editor"><?php echo html_entity_decode($sermon[0]->description);?></div>
                    <div class="clear height30"></div>
                    
                    
                   
			
            <div class="socialshare text-center">
            <div class="avigher" data-ayoshare="<?php echo $url;?>/sermons/<?php echo $sermon[0]->id;?>/<?php echo $sermon[0]->post_slug;?>"></div>
        	
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
					$post_tags = explode(',',$sermon[0]->post_tags);
					
					foreach($post_tags as $tags)
                    {
					$tag =strtolower(str_replace(" ","-",$tags)); 
					if(!empty($tags)){
					?>
                    <a href="<?php echo $url;?>/tag/sermons/<?php echo $tag;?>" class="white goldbg"><?php echo $tags;?></a>
                    <?php
					} }
					?>
                    </span>
                    
                    </div>
                    
                    
                    <div class="clear height30"></div>
                    </div>
     
     </div>
     <div class="clear height30"></div>
     <div class="row">
     
     <div class="col-md-12">
     <div class="col-md-6 paddingoff">
          <?php if(!empty($previous)){
		
		?>
         <div class="text-left"><a href="<?php echo $url;?>/sermons/<?php echo $previous_link[0]->id;?>/<?php echo $previous_link[0]->post_slug;?>" class="avg_very_small_button fontbtn"><i class="lnr lnr-arrow-left"></i><?php echo '  '.$previous;?></a></div>
         <?php } ?>
         </div>
         
         
         <div class="col-md-6 paddingoff">
         <?php if(!empty($next)){
		 
		 ?>
         <div class="text-right"><a href="<?php echo $url;?>/sermons/<?php echo $next_link[0]->id;?>/<?php echo $next_link[0]->post_slug;?>" class="avg_very_small_button fontbtn"><?php echo $next.'  ';?><i class="lnr lnr-arrow-right"></i></a></div>
          <?php } ?>
         </div>
         
         </div>
         </div>
         
     <div class="clear height50"></div>
     
     
     <div class="col-md-12 paddingoff">
        <div class="h3 black"><?php echo translate( 172, $lang);?></div>
        <div class="clear height20"></div>
        <?php if(Auth::check()) { ?>
        <div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('sermons') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
	
	<div class="paddingoff">
    
	
          <div class="col-lg-6 col-md-6 col-sm-6 paddingleftoff">
            <label class="ash"><?php echo translate( 133, $lang);?><span class="star">*</span></label>
            <input type="text" value=""  class="form-control validate[required] text-input radiusoff" id="name" name="name" >
          </div>
          <div class="mobbottom"></div>
          <div class="col-lg-6 col-md-6 col-sm-6 paddingrightoff">
            <label class="ash"><?php echo translate( 127, $lang);?><span class="star">*</span> </label>
            <input type="text" value="<?php echo Auth::user()->email;?>"  class="form-control validate[required,custom[email]] text-input radiusoff" id="email" name="email" readonly>
          </div>
		  
          <div class="clear height30"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 paddingoff">
            <label class="ash"><?php echo translate( 139, $lang);?><span class="star">*</span> </label>
            <textarea value=""   class="form-control validate[required] text-input radiusoff height150" id="msg" name="msg"></textarea>
          </div>
          
          <input type="hidden" name="post_comment_type" value="sermons">
          
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
							 ->where('post_comment_type', '=', 'sermons')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->orderBy('post_id', 'DESC')
							 ->get();
							 $pcnt = DB::table('post')
							 ->where('post_parent', '=', $gets)
							 ->where('post_comment_type', '=', 'sermons')
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
         <div class="para"><?php echo $viwcomment->post_desc;?></div>
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
     
     
     
     
     
     
     
     
     
     
     
     <div class="col-md-4">
     
     
     
     <div class="borderbottom">
        <h3 class="h4 heading topoff">
        <?php echo translate( 187, $lang);?>
        </h3>
	</div>
     <div class="clear height20"></div>
    <?php foreach($latest_sermon as $latestsermon){
	
	?>
    <div>
   
        <div class="col-md-4 paddingoff">
         
       
    				<?php if(!empty($latestsermon->image)){ ?>
          			<a href="<?php echo $url;?>/sermons/<?php echo $latestsermon->id;?>/<?php echo $latestsermon->post_slug;?>" title="<?php echo $latestsermon->name;?>"><img src="<?php echo $url.'/local/images/post/'.$latestsermon->image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/sermons/<?php echo $latestsermon->id;?>/<?php echo $latestsermon->post_slug;?>" title="<?php echo $latestsermon->name;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                   
                    
                    
                    
        </div>
        <div class="col-md-8 paddingleft10rightoff">
        <div class="black para poptitle ellipsis"><a href="<?php echo $url;?>/sermons/<?php echo $latestsermon->id;?>/<?php echo $latestsermon->post_slug;?>" title="<?php echo $latestsermon->name;?>" class="black decorationoff hoveroff"><?php echo $latestsermon->name;?></a></div>
        <div class="ash fontsize12"><?php echo date("d M Y h:i:s a",strtotime($latestsermon->submitdate));?></div>
        </div>
    
    </div>
    <div class="clear height20"></div>
    <?php } ?>
	
     
     
     
     <div class="clear height50"></div>
     
     
     
     <?php if($setts[0]->site_blog=="on"){?>
     
	<div class="borderbottom">
        <h3 class="h4 heading topoff">
        <?php echo translate( 190, $lang);?>
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
	<?php } ?>
	
	</div>
     
     
     
     
     
     
     
     
     
     
     
     
     <?php } ?>
     
     
     
     
     
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