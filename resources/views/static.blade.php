 <?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
?>
<section id="banner">
 <div id="pagebaner">
    
      <div>
	<div  id="overlays"></div>
	<?php if(!empty($setts[0]->site_banner)){?>
      <img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_banner;?>" class="img-responsive bannerheight">
	<?php } else {?>
	<img src="<?php echo $url;?>/img/banner.jpg" class="img-responsive bannerheight">
	<?php } ?>
    
	</div>
    
    </div>
    
    </section>
    