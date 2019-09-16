<!DOCTYPE html>
<html lang="en">
  <head>
   
   @include('admin.title')
    
    @include('admin.style')
	
     <?php

$logid = Auth::user()->id;

$user_checkker = DB::select('select * from users where id = ?',[$logid]);

$hidden = explode(',',$user_checkker[0]->show_menu);

   ?>  
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            @include('admin.sitename');

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.welcomeuser')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.menu')
			
			
			
			
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('admin.top')
		
		
		
		
        <!-- /top navigation -->
<?php  if (in_array(2, $hidden)){?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                  
 	@if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
                <?php $url = URL::to("/"); ?>    
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.home-backgrounds') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Home Backgrounds</span>

                      
                      
					  
					  
					  
					  
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sermon_bg">Sermons Background Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="sermon_bg" name="sermon_bg" class="form-control col-md-7 col-xs-12">
						  
						   @if ($errors->has('sermon_bg'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('sermon_bg') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					   
					  <?php 
					   $settingphoto="/settings/";
						$path ='/local/images'.$settingphoto.$settings[0]->sermon_bg;
						if($settings[0]->sermon_bg!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$path;?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="100">
					  </div>
					  </div>
						<?php } ?>
						
						
						
						
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="testimonial_bg">Testimonial Background Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="testimonial_bg" name="testimonial_bg" class="form-control col-md-7 col-xs-12">
						   @if ($errors->has('testimonial_bg'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('testimonial_bg') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					  
					  
					  <?php 
					   $settingphotos="/settings/";
						$paths ='/local/images'.$settingphotos.$settings[0]->testimonial_bg;
						if($settings[0]->testimonial_bg!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$paths;?>" class="thumb" width="100" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="100" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } ?>
						
						
					
                      
                      <input type="hidden" name="save_sermon" value="<?php echo $settings[0]->sermon_bg;?>">
					  
					  
					  <input type="hidden" name="save_testimonial" value="<?php echo $settings[0]->testimonial_bg;?>">
                      
                      
						
						
						
					 
					 
					  
					  
					  
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/home-backgrounds" class="btn btn-primary">Cancel</a>
						  <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btndisable">Submit</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
						  
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
								<?php } ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        <!-- /page content -->

      @include('admin.footer')
      </div>
      
      <?php } else { ?>
	  
	  
	  @include('admin.permission')
	  
		<?php } ?>
    </div>

    
	
  </body>
</html>
