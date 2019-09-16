<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$headertype = $setts[0]->header_type;
	?>
<!DOCTYPE html>
<html lang="en">
<head>
   
   <meta charset="utf-8" />
		

   @include('style')
   




</head>
<body class="index">

   

   
   <?php /*  @include('header') */?>
    
   
    
    
    <?php /******* Upcoming Event **********/ ?>
     
    
    
    <div class="themebg">
    <div class="clear height20"></div>
   
    
        
        <a href="<?php echo $url;?>/lang/en">EN</a>
        <a href="<?php echo $url;?>/lang/fr">FR</a>
        
        
    <div class="clear height40"></div>
    </div>
    
   
  <?php if(!empty(Cookie::get('lang'))){ echo Cookie::get('lang'); } ?>
    
    hai
    
			

      <?php /* @include('footer') */ ?>
      <?php if(session()->has('msg')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('msg');?>");
		</script>
    </div>
	 <?php } ?>
</body>
</html>