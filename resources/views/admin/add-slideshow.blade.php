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
			
			<?php $url = URL::to("/"); ?>
			
			
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('admin.top')
		
		
		
		
        <!-- /top navigation -->
<?php  if (in_array(9, $hidden)){?>
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
                    
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.add-slideshow') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Add Image</span>
                      
                      
                      
                      
                      
                      
                      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">
                  
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <?php foreach($language as $languages){?>
                        <li role="presentation" class="<?php if($languages->id==2){?>active<?php } ?>"><a href="#tab_content<?php echo $languages->id;?>" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><img src="<?php echo $url; ?>/local/images/post/<?php echo $languages->lang_flag;?>" style="max-width:24px; max-height:24px;"> <?php echo $languages->lang_name;?></a>
                        </li>
                       <?php } ?> 
                      </ul>
                      <div id="myTabContent" class="tab-content">
                      
                      
                      <?php foreach($language as $languagee){?>
                        <div role="tabpanel" class="tab-pane fade <?php if($languagee->id==2){?>active<?php } ?> in" id="tab_content<?php echo $languagee->id;?>" aria-labelledby="home-tab">
                          
                          
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Heading Text <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="slide_title[]" class="form-control col-md-7 col-xs-12"  name="slide_title[]" value=""  type="text">
						   @if ($errors->has('slide_title'))
                                    <span class="help-block" style="color:red;">
                                        <strong>That slide heading is already exists</strong>
                                    </span>
                                @endif
                        
					   </div>
                      </div>
                      
					  
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Sub Heading Text
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="slide_sub_title[]" class="form-control col-md-7 col-xs-12"  name="slide_sub_title[]" value=""  type="text">
					   </div>
                      </div>
					  
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Button Text
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="slide_btn_text[]" class="form-control col-md-7 col-xs-12"  name="slide_btn_text[]" value=""  type="text">
					   </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      <input type="hidden" name="code[]" value="<?php echo $languagee->lang_code;?>">
                        <input type="hidden" name="token" value="<?php echo uniqid();?>">
                      
                        </div>
                        <?php } ?>
                        
                        
                        
                      </div>
                      
                      
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Button Link
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="slide_btn_link" class="form-control col-md-7 col-xs-12"  name="slide_btn_link"  value=""  type="text">
					   </div>
                      </div>
                      
                      
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="slide_image" name="slide_image" required="required" class="form-control col-md-7 col-xs-12">
						  
						  @if ($errors->has('slide_image'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('slide_image') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
					  
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                    </div>

                  </div>
                </div>
              </div>
                      
                      
                      
                      
                     
					  
					  
					  
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/slideshow" class="btn btn-primary">Cancel</a>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
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
