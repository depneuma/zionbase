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
<?php  if (in_array(7, $hidden)){?>
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
                    
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.edit-sermon') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Edit Sermon</span>
                      
                      
                      
                      
                      
                      
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
					      
						  $count_en = DB::table('sermons')
										->where('parent', '=', 0)
										->where('id', '=', $sermons[0]->id)
										
										->count();
						  if(!empty($count_en))
						  {
						  $view = DB::table('sermons')
										->where('parent', '=', 0)
										->where('id', '=', $sermons[0]->id)
										
										->get();
						  $viewname = $view[0]->name;
						  $viewdesc = $view[0]->description;
						   $viewtag = $view[0]->post_tags;
						  }	
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
							 $viewtag = "";
						  }			
								
										
					  }
					  else
					  {
					      $count_other = DB::table('sermons')
										->where('parent', '=', $sermons[0]->id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->count();
					      if(!empty($count_other))
						  {
					      $view = DB::table('sermons')
										->where('parent', '=', $sermons[0]->id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->get();
						  $viewname = $view[0]->name;
						  $viewdesc = $view[0]->description;
						  $viewtag = $view[0]->post_tags;				
						  }
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
							 $viewtag = "";
						  }	
								
					  }
					  
					  ?>
                        <div role="tabpanel" class="tab-pane fade <?php if($languagee->id==2){?>active<?php } ?> in" id="tab_content<?php echo $languagee->id;?>" aria-labelledby="home-tab">
                          
                          
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name[]" class="form-control col-md-7 col-xs-12"  name="name[]" value="<?php echo $viewname; ?>" required="required" type="text">
						  @if ($errors->has('name'))
                                    <span class="help-block" style="color:red;">
                                        <strong>That sermon name is already exists</strong>
                                    </span>
                                @endif
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          
                        <textarea id="txtDefaultHtmlArea<?php echo $languagee->id;?>" class="form-control col-md-7 col-xs-12" required="required" name="desc[]"><?php echo $viewdesc;?></textarea>
					   </div>
                      </div>
                      
                      <script type="text/javascript">    
       

        $(function() {
           

            $("#txtDefaultHtmlArea<?php echo $languagee->id;?>").htmlarea(); // Initialize jHtmlArea's with all default values

           /* $("#txtCustomHtmlArea").htmlarea({
                
                toolbar: [
                    ["bold", "italic", "underline", "|", "forecolor"],
                    ["p", "h1", "h2", "h3", "h4", "h5", "h6"],
                    ["link", "unlink", "|", "image"],                    
                    [{
                        
                        css: "custom_disk_button",
                        text: "Save",
                        action: function(btn) {
                            
                            alert('SAVE!\n\n' + this.toHtmlString());
                        }
                    }]
                ],

                
                toolbarText: $.extend({}, jHtmlArea.defaultOptions.toolbarText, {
                        "bold": "fett",
                        "italic": "kursiv",
                        "underline": "unterstreichen"
                    }),

               
                css: "style/jHtmlArea.Editor.css",

               
                loaded: function() {
                   
                }
            });*/
        });
    </script>
                     
                      
                      
                      
                      
                      
                      
                      
                      
                      <input type="hidden" name="code[]" value="<?php echo $languagee->lang_code;?>">
                        <input type="hidden" name="token" value="<?php echo uniqid();?>">
                        
                        
                      
                      
                      
                      
                      
                      
                        </div>
                        <?php } ?>
                        
                        
                        
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">URL Slug <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="slug" class="form-control col-md-7 col-xs-12"  name="slug" value="<?php echo $sermons[0]->post_slug;?>" type="text" required="required">
						  ( Ex : an appeal to charismatic friends ) - Sermons Title
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Pastor Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="pastor_name" id="pastor_name" class="form-control">
						<option value="">Select</option>
                        <?php 
						$staff_pastor = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('post_staff_type', '=', 'pastor')
				  ->where('lang_code', '=', 'en')
				 ->orderBy('post_id', 'desc')->get();
				 
				 $staff_pastor_cnt = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'staff')
				 ->where('post_staff_type', '=', 'pastor')
				  ->where('lang_code', '=', 'en')
				 ->orderBy('post_id', 'desc')->count();
						
						if(!empty($staff_pastor_cnt))
						{
						foreach($staff_pastor as $pastor){
						if(!empty($pastor->post_title)){
						
						/*if($languagee->lang_code=="en")
					    {
						
						
						$select_sermons = DB::table('sermons')
		         							->where('lang_code', '=', $languagee->lang_code)
				 							->where('id', '=', $sermons[0]->id)
											->get();
						$select_sermons_cnt = DB::table('sermons')
		         							->where('lang_code', '=', $languagee->lang_code)
				 							->where('id', '=', $sermons[0]->id)
											->count();
						
						}
						else
						{
						
						
						$select_sermons = DB::table('sermons')
		         							->where('lang_code', '=', $languagee->lang_code)
				 							->where('parent', '=', $sermons[0]->id)
											->get();
						$select_sermons_cnt = DB::table('sermons')
		         							->where('lang_code', '=', $languagee->lang_code)
				 							->where('parent', '=', $sermons[0]->id)
											->count();
						
						
						}*/
						?>
									<option value="<?php echo $pastor->post_id;?>" <?php  if($sermons[0]->pastor_name==$pastor->post_id){?> selected <?php }  ?>><?php echo $pastor->post_title;?></option>
									<?php } } } ?>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                       <div class="item form-group" id="mediaurl">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tags
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tags" class="form-control col-md-7 col-xs-12" value="<?php echo $sermons[0]->post_tags;?>"  name="tags"  type="text" data-role="tagsinput" required="required">
						   
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      
                      <?php $url = URL::to("/"); 
					   $mp3path ='/local/images/mp3/'.$sermons[0]->audio_file;
					   $pdfpath ='/local/images/pdf/'.$sermons[0]->pdf_file;
					   ?>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">MP3 Upload
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="audio_file" class="form-control col-md-7 col-xs-12"  name="audio_file"  type="file">
						  @if ($errors->has('audio_file'))
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo str_replace("mpga","mp3",$errors->first('audio_file'));?></strong>
                                    </span>
                                @endif
                        <br/>
                        <?php if(!empty($sermons[0]->audio_file)){?>
                        <a href="<?php echo $url.$mp3path;?>" target="_blank" class="tagcolr"><?php echo $sermons[0]->audio_file; ?></a>
                        <?php } ?>
					   </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Youtube or Vimeo Url
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="video_url" class="form-control col-md-7 col-xs-12"  name="video_url" value="<?php echo $sermons[0]->video_url; ?>" type="url">
						  
                        
					   </div>
                      </div>
                      
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">PDF Upload
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pdf_file" class="form-control col-md-7 col-xs-12"  name="pdf_file"  type="file">
						  @if ($errors->has('pdf_file'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('pdf_file') }}</strong>
                                    </span>
                                @endif
                         <br/>
                         <?php if(!empty($sermons[0]->pdf_file)){?>
                        <a href="<?php echo $url.$pdfpath;?>" target="_blank" class="tagcolr"><?php echo $sermons[0]->pdf_file; ?></a>
                        <?php } ?>
					   </div>
                      </div>
                      
                      
                     
					  <input type="hidden" name="id" value="<?php echo $sermons[0]->id; ?>">
					  
					  
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Image 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12">
						  
						  @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
					   <?php $url = URL::to("/"); ?>
					  <?php 
					   $sermonphoto="/sermonphoto/";
						$path ='/local/images'.$sermonphoto.$sermons[0]->image;
						if($sermons[0]->image!=""){
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
						<?php } ?>
                        
                        
                        
                        
                        
                        
                      <input type="hidden" name="save_tags" value="<?php echo $sermons[0]->post_tags;?>">  
                        
					  
					  <input type="hidden" name="currentphoto" value="<?php echo $sermons[0]->image;?>">
                      
                      <input type="hidden" name="currentmp3" value="<?php echo $sermons[0]->audio_file;?>">
                      
                      <input type="hidden" name="currentpdf" value="<?php echo $sermons[0]->pdf_file;?>">
                     
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                    </div>

                  </div>
                </div>
              </div>
                      
                      
                      
                 
                      
                      
                      
                      
                      
                      
                       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/sermons" class="btn btn-primary">Cancel</a>
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
