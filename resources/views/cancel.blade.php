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
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

   @include('static')
    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo translate( 316, $lang);?></h1>
           
       
    </div>
    

	
    
	
	
	
	
	
	

	
    
    
    <div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
    <div class="height30"></div>
	 <div class="col-md-12" align="center"><h1 class="h3 black text-center"><?php echo translate( 319, $lang);?>.</h3></div>
     <div class="clear height50"></div>
	 </div>
	
	</div>
    
    
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>