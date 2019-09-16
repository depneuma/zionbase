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
        
           <?php if(Session::has('error')){?>
                <h1 class="h1 white text-center">Oops Error</h1>
           <?php } ?>
            <?php if(Session::has('message')){?>
                <h1 class="h1 white text-center">Thank You</h1>
           <?php } ?>
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	<div class="clearfix"></div>
	<div class="headerbg">
    <div class="height30"></div>
	 <div class="col-md-12" align="center">
     <h1 class="h3 black text-center">
     <?php if(Session::has('error')){?>
    <?php echo session()->get('error');?>
    <?php } ?>
    <?php if(Session::has('message')){?>
    <?php echo session()->get('message');?>
    <?php } ?>
     </h3></div>
     <div class="clear height50"></div>
	 </div>
	
	</div>
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>