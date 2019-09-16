<?php 
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
$ncurrentPath= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");
$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
$users = DB::select('select * from users where id = ?',[$setid]);	
$today = date("Y-m-d H:i:s");
$upcoming = DB::table('post')
				            ->where('post_type', '=', 'event')
							->where('post_status', '=', '1')
							->whereDate('post_start_date', '>', Carbon::now())
							->orderBy('post_start_date', 'asc')
							->take(1)
							->get();
							

$upcoming_cnt = DB::table('post')
				            ->where('post_type', '=', 'event')
							->where('post_status', '=', '1')
							->whereDate('post_start_date', '>', Carbon::now())
							->orderBy('post_start_date', 'asc')
							->take(1)
							->count();	
							
													
	function translate_footer($id,$lang) 
{					
	if($lang == "en")
	{
	$translate = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('id', '=', $id)
					->get();
					
		$translate_cnt = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('id', '=', $id)
					->count();			
	}
	else
	{
	$translate = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('parent', '=', $id)
					->get();
					
		$translate_cnt = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('parent', '=', $id)
					->count();			
	}				
	if(!empty($translate_cnt))
	{
					return $translate[0]->name;
	}
	else
	{
	  return "";
	}
}



if($lang == "en")
{					
$pagess = DB::table('pages')
		            ->where('status', '=', 1)
					->where('lang_code', '=', $lang)
					->where('menu_bottom', '=', 1)
					->orderBy('page_title','asc')
					->get();
	$pagess_cnt = DB::table('pages')
		            ->where('status', '=', 1)
					->where('lang_code', '=', $lang)
					->where('menu_bottom', '=', 1)
					->count();													

}
else
{
    $pagess = DB::table('pages')
		            ->where('status', '=', 1)
					->where('lang_code', '=', $lang)
					->where('menu_bottom', '=', 1)
					->orderBy('page_title','asc')
					->get();
	$pagess_cnt = DB::table('pages')
		            ->where('status', '=', 1)
					->where('lang_code', '=', $lang)
					->where('menu_bottom', '=', 1)
					->count();					
}						
?>
<div class="footer">
	<div class="container">
        
        
         <div class="col-md-4  followlist m-bottom">
        <h4 class="h4 white"><?php echo translate_footer( 97, $lang);?></h4>
        <div class="clear height20"></div>
        <ul>
        <!-- <?php if(!empty($setts[0]->site_facebook)){?><li><a href="<?php echo $setts[0]->site_facebook;?>" target="_blank" class="white_ash"><img src="<?php echo $url;?>/local/images/facebook.png" border="0" alt="facebook" /></a></li><?php } ?> -->
        <?php if(!empty($setts[0]->site_facebook)){?>
        	<li>
        		<button class="btn btn-block btn-sm btn-info" href="<?php echo $setts[0]->site_facebook;?>" target="_blank" class="white_ash">FACEBOOK</button>
        	</li>
        <?php } ?>
        <!-- <?php if(!empty($setts[0]->site_twitter)){?><li><a href="<?php echo $setts[0]->site_twitter;?>" target="_blank" class="white_ash"><img src="<?php echo $url;?>/local/images/twitter.png" border="0" alt="twitter" /></a></li><?php } ?>
        <?php if(!empty($setts[0]->site_gplus)){?><li><a href="<?php echo $setts[0]->site_gplus;?>" target="_blank" class="white_ash"><img src="<?php echo $url;?>/local/images/gplus.png" border="0" alt="gplus" /></a></li><?php } ?>
        <?php if(!empty($setts[0]->site_pinterest)){?><li><a href="<?php echo $setts[0]->site_pinterest;?>" target="_blank" class="white_ash"><img src="<?php echo $url;?>/local/images/pinterest.png" border="0" alt="pinterest" /></a></li><?php } ?>
       <?php if(!empty($setts[0]->site_instagram)){?><li><a href="<?php echo $setts[0]->site_instagram;?>" target="_blank" class="white_ash"><img src="<?php echo $url;?>/local/images/instagram.png" border="0" alt="instagram" /></a></li><?php } ?> -->
       
        </ul>
        </div>
        
        
        
        
        <!--<div class="col-md-3 list m-bottom">
        <h4 class="h4 white"><?php echo translate_footer( 100, $lang);?></h4>
        <div class="clear height20"></div>
        <ul>
       
        <?php if($setts[0]->site_gallery=="on"){?>
        <li><a href="<?php echo $url;?>/gallery" class="white_ash"><?php echo translate_footer( 10, $lang);?></a></li>
        <?php } ?>
        
        <?php if($setts[0]->site_sermon=="on"){?>
        <li><a href="<?php echo $url;?>/sermons" class="white_ash"><?php echo translate_footer( 67, $lang);?></a></li>
        <?php } ?>
        
        <?php if($setts[0]->site_event=="on"){?>
        <li><a href="<?php echo $url;?>/events" class="white_ash"><?php echo translate_footer( 4, $lang);?></a></li>
        <?php } ?>
        
        <?php if($setts[0]->site_blog=="on"){?>
        <li><a href="<?php echo $url;?>/blog" class="white_ash"><?php echo translate_footer( 1, $lang);?></a></li>
        <?php } ?>
        
        <?php if($setts[0]->site_staff=="on"){?>
        <li><a href="<?php echo $url;?>/staff" class="white_ash"><?php echo translate_footer( 118, $lang);?></a></li>
        <?php } ?>
        </ul>
        
        </div>-->
        
        
        
        <div class="col-md-4 list m-bottom">
        <h4 class="h4 white"><?php echo translate_footer( 103, $lang);?></h4>
        <div class="clear height20"></div>
        <ul>
        <?php if(!empty($pagess_cnt)){?>
                                <?php foreach($pagess as $page){
								if($page->page_id==4 or $page->parent==4){ $pagerurl = $url.'/'.'contact-us'; }
								else if($page->page_id==5 or $page->parent==5){ $pagerurl = $url.'/'.'donate-now'; }
								else { $pagerurl = $url.'/page/'.$page->page_id.'/'.$page->post_slug; }
								
								
								?>
        <li><a href="<?php echo $pagerurl; ?>" class="white_ash"><?php echo $page->page_title;?></a></li>
        <?php }} ?>
        
        
       
        </ul>
        
        </div>
        
        
        
       
        
        
        <div class="col-md-4 m-bottom">
         
		 <div>
		 <?php if(!empty($setts[0]->site_logo)){?>
		  
		  <a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>" /></a>
		   <?php } else {?>
		   <h1 id="logo"><a class="" href="<?php echo $url;?>"><?php echo $setts[0]->site_name;?></a></h1>
		   <?php } ?>
           </div>
           
           <div>
           <div class="clear height20"></div>
           <p class="small white_ash"><i class="lnr lnr-map-marker"></i> <?php echo ' '.$setts[0]->site_address;?></p>
            <div class="clear height10"></div>
           <p class="small white_ash"><i class="lnr lnr-envelope"></i> <a href="mailto:<?php echo $users[0]->email;?>" class="white_ash"><?php echo ' '.$users[0]->email;?></a></p>
            <div class="clear height10"></div>
           <p class="small white_ash"><i class="lnr lnr-phone-handset"></i> <a href="tel:<?php echo $users[0]->phone;?>" class="white_ash"><?php echo ' '.$users[0]->phone;?></a></p>
           </div>
           
           
           
           
           
           
        </div>
        
        
    </div>    

</div>

<div class="copyright">
		<div class="container">
		  <div class="col-md-12 text-center white h6"><?php echo translate_footer( 352, $lang);?> </div>
        </div>

</div>



			<script src="<?php echo $url;?>/js/jquery.dropotron.min.js"></script>
			<script src="<?php echo $url;?>/js/jquery.scrolly.min.js"></script>
			<script src="<?php echo $url;?>/js/jquery.scrollgress.min.js"></script>
			<script src="<?php echo $url;?>/js/skel.min.js"></script>
			<script src="<?php echo $url;?>/js/util.js"></script>
			<!--[if lte IE 8]><script src="<?php echo $url;?>/js/ie/respond.min.js"></script><![endif]-->
			<script src="<?php echo $url;?>/js/main.js"></script>
            
            <script  src="<?php echo $url;?>/js/gallery.js"></script>
            
            <script type="text/javascript" src="<?php echo $url;?>/js/jquery.simplePagination.min.js"></script>
            <script type="text/javascript">
		$(function(){
			var perPage = <?php echo $setts[0]->site_post_per;?>;
			var opened = 1;
			var onClass = 'on';
			var paginationSelector = '.pagess';
			$('.bloglist').simplePagination(perPage, opened, onClass, paginationSelector);
		});
		$(function(){
			var perPage_one = <?php echo $setts[0]->site_sermon_per;?>;
			var opened_one = 1;
			var onClass_one = 'on';
			var paginationSelector_one = '.pagi';
			$('.sermonlist').simplePagination(perPage_one, opened_one, onClass_one, paginationSelector_one);
		});
		
		
		$(function(){
			var perPage_two = <?php echo $setts[0]->site_event_per;?>;
			var opened_two = 1;
			var onClass_two = 'on';
			var paginationSelector_two = '.epagi';
			$('.eventlist').simplePagination(perPage_two, opened_two, onClass_two, paginationSelector_two);
		});
		
		
		
		$(function(){
			var perPage_two = <?php echo $setts[0]->site_shop_per;?>;
			var opened_two = 1;
			var onClass_two = 'on';
			var paginationSelector_two = '.shopy';
			$('.shoplist').simplePagination(perPage_two, opened_two, onClass_two, paginationSelector_two);
		});
		
		
		$('#myModal').click(function () {
    $('.modal').hide();
})
		
		
		
		
		
		
		
		
		
		
		
		
	</script>
	
     <script src="<?php echo $url;?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $url;?>/js/slider.js"></script>
        

        <!-- Bootstrap bootstrap-touch-slider Slider Main JS File -->
        <script src="<?php echo $url;?>/js/bootstrap-touch-slider.js"></script>
        
        <script type="text/javascript">
            $('#bootstrap-touch-slider').bsTouchSlider();
        </script>
        <script type="text/javascript" src="<?php echo $url;?>/js/lightbox.js"></script>
        
        <script type="text/javascript" src="<?php echo $url;?>/js/YouTubePopUp.jquery.js"></script>
	<script type="text/javascript">
		jQuery(function(){
			jQuery("a.bla-1").YouTubePopUp();
			jQuery("a.bla-2").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
		});
	</script>
    
    
    <script src="<?php echo $url;?>/js/mp3.js"></script>

<script>
    $(document).ready(function () {
        $('.mediPlayer').mediaPlayer();
    });
</script>
<?php if(!empty($upcoming_cnt)){?>
<?php 
		  $newDate = date("m/d/Y H:i:s", strtotime($upcoming[0]->post_start_date));
		  
		  ?>
<script type="text/javascript" src="<?php echo $url;?>/js/timer.js"></script> 
<script class="source" type="text/javascript">
        $('.countdown').downCount({
            date: '<?php echo $newDate;?>',
            offset: +10
        }, function () {
            
        });
    </script> 
    <?php } ?>
    
    <script src='<?php echo $url;?>/js/animations.js'></script>
    
    <script src='<?php echo $url;?>/js/carousel.js'></script>
    
    <script src="<?php echo $url;?>/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="<?php echo $url;?>/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready(function(){
			
			jQuery("#formID").validationEngine('attach', { promptPosition: "topLeft" });
			jQuery("#formID2").validationEngine('attach', { promptPosition: "topLeft" });
			jQuery("#formID_shop").validationEngine('attach', { promptPosition: "topLeft" });
		});
		
		
		
    </script>
    
    
    
    
   
    
		<script>
				
				
				
			function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});	


</script>
		
        <script src="<?php echo $url;?>/js/totop.min.js"></script>

        		
		<div class="totop"><i class="fa fa-angle-up"></i> <?php echo translate_footer( 502, $lang);?></div>
<script>
        $('.totop').tottTop({
            scrollTop: 100
        });
    </script>
    
    
    
    
    
    