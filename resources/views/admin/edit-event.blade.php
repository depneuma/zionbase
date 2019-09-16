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
<?php  if (in_array(12, $hidden)){?>
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
                    
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.edit-event') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Edit Event</span>

                     
                     
                     
                     
                     
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
                      
                      
                      <?php foreach($language as $languagee){
					  
					  if($languagee->lang_code=="en")
					  {
					      
						  $count_en = DB::table('post')
										->where('parent', '=', 0)
										->where('post_id', '=', $event[0]->post_id)
										
										->count();
						  if(!empty($count_en))
						  {
						  $view = DB::table('post')
										->where('parent', '=', 0)
										->where('post_id', '=', $event[0]->post_id)
										
										->get();
						  $viewname = $view[0]->post_title;
						  $viewdesc = $view[0]->post_desc;
						  }	
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
						  }			
								
										
					  }
					  else
					  {
					      $count_other = DB::table('post')
										->where('parent', '=', $event[0]->post_id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->count();
					      if(!empty($count_other))
						  {
					      $view = DB::table('post')
										->where('parent', '=', $event[0]->post_id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->get();
						  $viewname = $view[0]->post_title;
						  $viewdesc = $view[0]->post_desc;			
						  }
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
						  }	
								
					  }
					  
					  
					  
					  ?>
                        <div role="tabpanel" class="tab-pane fade <?php if($languagee->id==2){?>active<?php } ?> in" id="tab_content<?php echo $languagee->id;?>" aria-labelledby="home-tab">
                          
                           <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Event Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"  name="post_title[]" value="<?php echo $viewname; ?>" required="required" type="text">
						   @if ($errors->has('post_title'))
                                    <span class="help-block" style="color:red;">
                                        <strong>That post title is already exists</strong>
                                    </span>
                                @endif
                        
					   </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          
                        
					   
                       
                        <textarea id="txtDefaultHtmlArea<?php echo $languagee->id;?>" class="form-control col-md-7 col-xs-12" required="required" name="post_desc[]"><?php echo $viewdesc;?></textarea>
                       
                       
                       </div>
                      </div>
                      
                      <script type="text/javascript">    
       

        $(function() {
           

            $("#txtDefaultHtmlArea<?php echo $languagee->id;?>").htmlarea(); 
        });
    </script>
                      
                      
                      
                      <input type="hidden" name="code[]" value="<?php echo $languagee->lang_code;?>">
                        
                      
                        </div>
                        <?php } ?>
                        
                        
                        
                      </div>
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">URL Slug <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="slug" class="form-control col-md-7 col-xs-12"  name="slug" value="<?php echo $event[0]->post_slug;?>" type="text" required="required">
						  ( Ex : an appeal to charismatic friends ) - Event Title
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      <div class="item form-group" id="mediaurl">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tags
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tags" class="form-control col-md-7 col-xs-12" value="<?php echo $event[0]->post_tags;?>"  name="tags"  type="text" data-role="tagsinput" required="required">
						   
                        
					   </div>
                      </div>
                      
                      
                      
                     <input type="hidden" name="token" value="<?php echo uniqid();?>">
                        
                       
                      <input type="hidden" name="post_type" value="event">
                      
                      <input type="hidden" name="media_type" value="image">
                      
                                       
					  <input type="hidden" name="post_id" value="<?php echo $event[0]->post_id; ?>">
                      
                      
                      
                      
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Start Date & Time <br/>(yy-mm-dd)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="post_start_date" class="form-control col-md-7 col-xs-12"  name="post_start_date" value="<?php echo $event[0]->post_start_date; ?>" required="required" type="text">  
                       
					   </div>
                      </div>
                      
                      
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">End Date & Time <br/>(yy-mm-dd)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="post_end_date" class="form-control col-md-7 col-xs-12"  name="post_end_date" value="<?php echo $event[0]->post_end_date; ?>" required="required" type="text">  
                       
					   </div>
                      </div>
                      
                      <script type="text/javascript">
$('#post_start_date').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: "HH:mm:ss",
	minDate: 0,
	onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#post_end_date").datepicker("option", "minDate", dt);
        }
});
</script> 

<script type="text/javascript">
$('#post_end_date').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: "HH:mm:ss",
	minDate: 0,
	onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#post_start_date").datepicker("option", "maxDate", dt);
        }
});
</script> 
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Location <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="post_location" class="form-control col-md-7 col-xs-12"  name="post_location" value="<?php echo $event[0]->post_location; ?>" required="required" type="text">  
                       
					   </div>
                      </div>
                      
                       <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="canvas" style="height:400px;"></div>
                      </div>
                       </div>
                      <script>


$('#post_location').geocomplete({
	map: '#canvas',
	basemap: 'gray',
	mapOptions: {
		zoom: 10
	},

	marketOptions: {
		draggable: true
	}
});

	</script>
    
    				<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">No Of Seats / Spaces <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="post_seat_space" class="form-control col-md-7 col-xs-12"  name="post_seat_space" value="<?php echo $event[0]->post_seat_space; ?>" required="required" type="number">  
                       
					   </div>
                      </div>
    
    
    
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="post_phone" class="form-control col-md-7 col-xs-12"  name="post_phone" value="<?php echo $event[0]->post_phone; ?>" required="required" type="text">  
                       
					   </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Website Url 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="post_website" class="form-control col-md-7 col-xs-12"  name="post_website" value="<?php echo $event[0]->post_website; ?>" type="url">  
                       
					   </div>
                      </div>
                     
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="post_email" class="form-control col-md-7 col-xs-12"  name="post_email" value="<?php echo $event[0]->post_email; ?>" required="required" type="email">  
                       
					   </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
					  
					  
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12" <?php if($event[0]->post_image==""){ ?>required="required"<?php } ?>>
						  
						  @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                        </div>
                      
					  
                      <?php $url = URL::to("/"); ?>
					  <?php 
					  if($event[0]->post_media_type=="image"){
						$path ='/local/images/post/'.$event[0]->post_image;
						if($event[0]->post_image!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$path;?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } } ?>
                      
                      </div>
                      
                      
                      
                      
                      
                      
                      <input type="hidden" name="save_tags" value="<?php echo $event[0]->post_tags;?>">
                      
					  
					  
					   <input type="hidden" name="save_website" value="<?php echo $event[0]->post_website;?>">
					  
					  <input type="hidden" name="currentphoto" value="<?php echo $event[0]->post_image;?>">
                     
                     
                     
                     
                      
                      
                      
                      
                      
                      
                      
                      
                      
                    </div>

                  </div>
                </div>
              </div>
                     
                     
                     
                     
                      
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/events" class="btn btn-primary">Cancel</a>
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
