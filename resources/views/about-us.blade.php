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
        
           
                <h1 class="h1 white text-center"><?php echo $about_us[0]->page_title;?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<div class="video">
	
	
	<div class="container">
	
	 <div class="height50"></div>
	 <div class="row">
	<div class="col-md-12">
	
	
	
	<p class="para black">
	<?php echo html_entity_decode($about_us[0]->page_desc);?>
    </p>
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