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
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.media-settings') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Media Settings</span>

                      
                      
					  
					  
					  
					  
						
						
					
                      
                      
                      
                      <div class="item form-group">
                        <label for="amount" class="control-label col-md-3">Mp3 upload size</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mp3_size" type="number" name="mp3_size" value="<?php echo $msettings[0]->mp3_size; ?>"  class="form-control col-md-7 col-xs-12" required="required"> (ex : 1024kb )
						  
                        </div>
                      </div>
                      
                      <input type="hidden" name="save_mp3" value="<?php echo $msettings[0]->mp3_size; ?>">
					  
                      
                      
                       <div class="item form-group">
                        <label for="amount" class="control-label col-md-3">Image upload size</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="image_size" type="number" name="image_size" value="<?php echo $msettings[0]->image_size; ?>"  class="form-control col-md-7 col-xs-12" required="required"> (ex : 1024kb )
						  
                        </div>
                      </div>
                      <input type="hidden" name="save_image" value="<?php echo $msettings[0]->image_size; ?>">
                      
                      
                      <div class="item form-group">
                        <label for="amount" class="control-label col-md-3">Pdf upload size</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pdf_size" type="number" name="pdf_size" value="<?php echo $msettings[0]->pdf_size; ?>"  class="form-control col-md-7 col-xs-12" required="required"> (ex : 1024kb )
						  
                        </div>
                      </div>
					  
					 
					  <input type="hidden" name="save_pdf" value="<?php echo $msettings[0]->pdf_size; ?>">
					 
					  
						
						
						
						
					 
					 
					  
					  
					  
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/media-settings" class="btn btn-primary">Cancel</a>
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
