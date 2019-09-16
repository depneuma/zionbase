<!DOCTYPE html>
<html lang="en">
<head>

    <title>Comment Approved</title>

  
	




</head>
<body>

   

    
    

	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="container">
	 <h1><?php echo $site_name;?> - Comment Approved</h1>
	 
	 
	
	 
	 
	 <div class="clearfix"></div>
	 
	 <div class="row profile shop">
		<div class="col-md-6">
	 
	 
	
	<div id="outer" style="width: 100%;margin: 0 auto;background-color:#cccccc; padding:10px;">  
	
	
	<div id="inner" style="width: 80%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;
	font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px; padding:10px;">
			
			<div style="background:#B98B4B;padding:15px 10px 10px 10px;">
			<?php if(!empty($site_logo)){?>
			<div align="center"><img src="<?php echo $site_logo;?>" border="0" alt="logo" /></div>
			<?php } else { ?>
			<div align="center"><h2><?php echo $site_name;?></h2></div>
			<?php } ?>
			</div>
			
			<?php if(!empty($event_title)){ $txt_title ="Event"; $link =$type.'s'; $slug =  $event_slug; $title = $event_title; }?>
			<?php if(!empty($blog_title)){ $txt_title ="Blog"; $link =$type; $slug =  $blog_slug; $title = $blog_title; }?>
			<?php if(!empty($sermon_title)){ $txt_title ="Sermon"; $link =$type; $slug =  $sermon_slug; $title = $sermon_title; }?>
			
			
			<h3> Your comment has been approved.Thank You!!</h3>
			<p> <?php echo $txt_title;?> Name - <a href="<?php echo $url;?>/<?php echo $link;?>/<?php echo $slug;?>"><?php echo $title;?></a></p>
            <br/><br/>
            
            	
			<p> Thanks,</p> 	
			<p style="height:10px;"></p>
            <p>Admin</p>	
				
			
			
			
	
	
	
	
	</div>
	</div>
	 
	 
	 
	
	 
	 
	
	
	
	
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	

      
</body>
</html>