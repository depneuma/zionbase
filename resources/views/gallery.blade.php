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
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
     @include('static')
    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo translate( 10, $lang);?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 <div class="row">
	
	
    
    <div class="col-md-12 text-center">
    
    <div class="toolbar mb2 mt2">
  <button class="btn fil-cat avg_very_small_button radiusoff mbottom" href="" data-rel="all"><?php echo translate( 151, $lang);?></button>
  <?php foreach($gallery as $galry){?>
  <button class="btn fil-cat avg_very_small_button radiusoff mbottom" data-rel="<?php echo $galry->name;?>"><?php echo $galry->name;?></button>
  
  <?php } ?>
</div> 
    
    <div class="height10"></div>
    <div id="portfolio">
    <?php foreach($gallery as $ngalry){
	if($lang == "en")
	{
	
	$gid = $ngalry->id;
	}
	else
	{
	  $gid = $ngalry->parent;
	}
	
	$galleryimages = DB::table('gallery_images')
		->where('gid', $gid)
		->orderBy('imgid','desc')
		->get();
		foreach($galleryimages as $gimage){
	?>
  <div class="tile scale-anm <?php echo $ngalry->name;?> all">
      <a href="<?php echo $url;?>/local/images/galleryimages/<?php echo $gimage->galleryimage;?>" class="lumos-link" data-lumos="demo2">
        <img src="<?php echo $url;?>/local/images/galleryimages/<?php echo $gimage->galleryimage;?>" alt="" class="postbg" />
        </a>
  </div>
  <?php } } ?>
</div>
    
    
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