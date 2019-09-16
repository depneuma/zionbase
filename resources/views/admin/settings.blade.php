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
    <script type="text/javascript">
	


function showDiver(elem)
{
   
   if(elem.value == 'static')
   {
      document.getElementById('heading_banner').style.display = "block";
	  document.getElementById('subheading_banner').style.display = "block";
   }
   else if(elem.value == 'slider')
   {
       document.getElementById('heading_banner').style.display = "none";
	  document.getElementById('subheading_banner').style.display = "none";
   }
   else
   {
     document.getElementById('heading_banner').style.display = "none";
	  document.getElementById('subheading_banner').style.display = "none";
   }
   
}


function showLoad(elem)
{

   if(elem.value == "1")
   {
     document.getElementById('animated').style.display = "block";
   }
   else if(elem.value == "0")
   {
     document.getElementById('animated').style.display = "none";
   }
   else
   {
     document.getElementById('animated').style.display = "none";
	}

}
</script>
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
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.settings') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Settings</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Site Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_name" class="form-control col-md-7 col-xs-12"  name="site_name" value="<?php echo $settings[0]->site_name; ?>" required="required" type="text">
                        
					   </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Site Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
						   <textarea id="site_desc" class="form-control col-md-7 col-xs-12" name="site_desc"><?php echo $settings[0]->site_desc; ?></textarea>
                        </div>
                      </div>
					  
					  <input type="hidden" name="save_desc" value="<?php echo $settings[0]->site_desc; ?>">
                      
                      
                      <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Site Keyword</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_keyword" type="text" name="site_keyword" value="<?php echo $settings[0]->site_keyword; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Site Address
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
						   <textarea id="site_address" class="form-control col-md-7 col-xs-12" name="site_address"><?php echo $settings[0]->site_address; ?></textarea>
                        </div>
                      </div>
                      
                      
					  <input type="hidden" name="save_address" value="<?php echo $settings[0]->site_address; ?>">
					  
					  <input type="hidden" name="save_key" value="<?php echo $settings[0]->site_keyword; ?>">
					  
					  
					  <input type="hidden" name="save_facebook" value="<?php echo $settings[0]->site_facebook; ?>">
					  <input type="hidden" name="save_twitter" value="<?php echo $settings[0]->site_twitter; ?>">
					  <input type="hidden" name="save_gplus" value="<?php echo $settings[0]->site_gplus; ?>">
					  <input type="hidden" name="save_pinterest" value="<?php echo $settings[0]->site_pinterest; ?>">
					  <input type="hidden" name="save_instagram" value="<?php echo $settings[0]->site_instagram; ?>">
					  
					  <input type="hidden" name="save_copyright" value="<?php echo $settings[0]->site_copyright; ?>">
					  
					  <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Facebook Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_facebook" type="text" name="site_facebook" value="<?php echo $settings[0]->site_facebook; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  
					  <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Twitter Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_twitter" type="text" name="site_twitter" value="<?php echo $settings[0]->site_twitter; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">GPlus Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_gplus" type="text" name="site_gplus" value="<?php echo $settings[0]->site_gplus; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  
					   <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Pinterest Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_pinterest" type="text" name="site_pinterest" value="<?php echo $settings[0]->site_pinterest; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  
					  
					  <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Instagram Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_instagram" type="text" name="site_instagram" value="<?php echo $settings[0]->site_instagram; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  <?php
						
						$view = DB::table('avig_translate')
										->where('parent', '=', 0)
										->where('lang_code', '=', 'en')
										->where('id', '=', 352)
										
										->get();
						$view_count = DB::table('avig_translate')
										->where('parent', '=', 0)
										->where('lang_code', '=', 'en')
										->where('id', '=', 352)
										
										->count();				
						?>
		<div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Footer Copyright</label> 
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="site_copyright" type="text" name="site_copyright" value="<?php if(!empty($view_count)){?><?php echo $view[0]->name; ?><?php } ?>" readonly  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                        
                        
                        <?php if(!empty($view_count)){?>
                        
                        <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btndisable">To Translate</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
                        
                        <div class="col-md-2 col-sm-2 col-xs-12"><a href="<?php echo $url;?>/admin/edittranslate/352" class="btn btn-success">To Translate</a></div>
                        <?php } } ?>
                      </div>	
                      
                      
                      
                      <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Blog Post Per Page</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_post_per" type="number" name="site_post_per" value="<?php echo $settings[0]->site_post_per; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Sermons Per Page</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_sermon_per" type="number" name="site_sermon_per" value="<?php echo $settings[0]->site_sermon_per; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                      
                       <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Event Per Page</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_event_per" type="number" name="site_event_per" value="<?php echo $settings[0]->site_event_per; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Shop Per Page</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_shop_per" type="number" name="site_shop_per" value="<?php echo $settings[0]->site_shop_per; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Blog ON / OFF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_blog" id="site_blog" class="form-control" required="required">
						<option value="">Select</option>
									<option value="on" <?php { if($settings[0]->site_blog=="on") echo "selected='selected'"; }?>>ON</option>
									<option value="off" <?php { if($settings[0]->site_blog=="off") echo "selected='selected'"; }?>>OFF</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Staff ON / OFF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_staff" id="site_staff" class="form-control" required="required">
						<option value="">Select</option>
									<option value="on" <?php { if($settings[0]->site_staff=="on") echo "selected='selected'"; }?>>ON</option>
									<option value="off" <?php { if($settings[0]->site_staff=="off") echo "selected='selected'"; }?>>OFF</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Testimonial ON / OFF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_testimonial" id="site_testimonial" class="form-control" required="required">
						<option value="">Select</option>
									<option value="on" <?php { if($settings[0]->site_testimonial=="on") echo "selected='selected'"; }?>>ON</option>
									<option value="off" <?php { if($settings[0]->site_testimonial=="off") echo "selected='selected'"; }?>>OFF</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Gallery ON / OFF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_gallery" id="site_gallery" class="form-control" required="required">
						<option value="">Select</option>
									<option value="on" <?php { if($settings[0]->site_gallery=="on") echo "selected='selected'"; }?>>ON</option>
									<option value="off" <?php { if($settings[0]->site_gallery=="off") echo "selected='selected'"; }?>>OFF</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Sermon ON / OFF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_sermon" id="site_sermon" class="form-control" required="required">
						<option value="">Select</option>
									<option value="on" <?php { if($settings[0]->site_sermon=="on") echo "selected='selected'"; }?>>ON</option>
									<option value="off" <?php { if($settings[0]->site_sermon=="off") echo "selected='selected'"; }?>>OFF</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Event ON / OFF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_event" id="site_event" class="form-control" required="required">
						<option value="">Select</option>
									<option value="on" <?php { if($settings[0]->site_event=="on") echo "selected='selected'"; }?>>ON</option>
									<option value="off" <?php { if($settings[0]->site_event=="off") echo "selected='selected'"; }?>>OFF</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Shop ON / OFF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_shop" id="site_shop" class="form-control" required="required">
						<option value="">Select</option>
									<option value="on" <?php { if($settings[0]->site_shop=="on") echo "selected='selected'"; }?>>ON</option>
									<option value="off" <?php { if($settings[0]->site_shop=="off") echo "selected='selected'"; }?>>OFF</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Newsletter ON / OFF <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_newsletter" id="site_newsletter" class="form-control" required="required">
						<option value="">Select</option>
									<option value="on" <?php { if($settings[0]->site_newsletter=="on") echo "selected='selected'"; }?>>ON</option>
									<option value="off" <?php { if($settings[0]->site_newsletter=="off") echo "selected='selected'"; }?>>OFF</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      		  
					  <input type="hidden" name="save_post_per" value="<?php echo $settings[0]->site_post_per; ?>">
                      <input type="hidden" name="save_sermon_per" value="<?php echo $settings[0]->site_sermon_per; ?>">
                      <input type="hidden" name="save_event_per" value="<?php echo $settings[0]->site_event_per; ?>">
                      
                      
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="currency">Currency <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<select name="currency" required="required" class="form-control col-md-7 col-xs-12">
						<option value=""></option>
						<?php foreach($currency as $newcurrency){?>
							   <option value="<?php echo $newcurrency;?>" <?php if($settings[0]->site_currency==$newcurrency){?> selected="selected" <?php } ?>><?php echo $newcurrency;?></option>
						<?php } ?>
						</select>
                          
                        </div>
                      </div>
					 
					  
					  
					  
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Logo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_logo" name="site_logo" class="form-control col-md-7 col-xs-12">
						  
						   @if ($errors->has('site_logo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_logo') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					   
					  <?php 
					   $settingphoto="/settings/";
						$path ='/local/images'.$settingphoto.$settings[0]->site_logo;
						if($settings[0]->site_logo!=""){
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Favicon
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_favicon" name="site_favicon" class="form-control col-md-7 col-xs-12">
						   @if ($errors->has('site_favicon'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_favicon') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					  
					  
					  <?php 
					   $settingphotos="/settings/";
						$paths ='/local/images'.$settingphotos.$settings[0]->site_favicon;
						if($settings[0]->site_favicon!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$paths;?>" class="thumb" width="24" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="24" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } ?>
						
						
						
						
						
						
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Static Banner
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_banner" name="site_banner" class="form-control col-md-7 col-xs-12"><br/>[Please select an image 1920px / 500px]
						   @if ($errors->has('site_banner'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_banner') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					  
					  
					   <?php 
					   $bannerphotos="/settings/";
						$pathes ='/local/images'.$bannerphotos.$settings[0]->site_banner;
						if($settings[0]->site_banner!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$pathes;?>" class="thumb" width="200" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="100" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } ?>
                        
                        
                        
                        
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Homepage Welcome Static Banner
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_welcome_banner" name="site_welcome_banner" class="form-control col-md-7 col-xs-12" ><br/>[Please select an image 791px / 547px]
						   @if ($errors->has('site_welcome_banner'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_welcome_banner') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
                      
                      
                      <?php 
					   
						$pather ='/local/images/settings/'.$settings[0]->site_welcome_banner;
						if($settings[0]->site_welcome_banner!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$pather;?>" class="thumb" width="200" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="100" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } ?>
                      
						
						
						
						
						
						
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Home page header type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="header_type" id="header_type" class="form-control" required="required" onChange="showDiver(this)">
						<option value="">Select</option>
									<option value="static" <?php { if($settings[0]->header_type=="static") echo "selected='selected'"; }?>>Static Banner</option>
									<option value="slider" <?php { if($settings[0]->header_type=="slider") echo "selected='selected'"; }?>>Slideshow</option>
								</select>
						
                          
                        </div>
                      </div>
						
                        <?php
						
						$views = DB::table('avig_translate')
										->where('parent', '=', 0)
										->where('lang_code', '=', 'en')
										->where('id', '=', 355)
										
										->get();
						$views_count = DB::table('avig_translate')
										->where('parent', '=', 0)
										->where('lang_code', '=', 'en')
										->where('id', '=', 355)
										
										->count();				
						?>
                        
                        
						 
						<div class="item form-group" id="heading_banner" <?php if($settings[0]->header_type!="static"){?> style="display:none;" <?php } ?>>
                        <label for="amount" class="control-label col-md-3">Static Banner Heading</label> 
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="static_banner_heading" type="text" name="static_banner_heading" readonly value="<?php if(!empty($views_count)){?><?php echo $views[0]->name; ?><?php } ?>"  class="form-control col-md-7 col-xs-12" required="required">
						  
                        </div>
                         <?php if(!empty($view_count)){?>
                          <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btndisable">To Translate</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
                        <div class="col-md-2 col-sm-2 col-xs-12"><a href="<?php echo $url;?>/admin/edittranslate/355" class="btn btn-success">To Translate</a></div>
                        <?php } } ?>
                      </div>
                      
                      
                      <?php
						
						$viewser = DB::table('avig_translate')
										->where('parent', '=', 0)
										->where('lang_code', '=', 'en')
										->where('id', '=', 358)
										
										->get();
						$viewser_count = DB::table('avig_translate')
										->where('parent', '=', 0)
										->where('lang_code', '=', 'en')
										->where('id', '=', 358)
										
										->count();				
						?>
                      
						
						
                      <div class="item form-group" id="subheading_banner" <?php if($settings[0]->header_type!="static"){?> style="display:none;" <?php } ?>>
                        <label for="amount" class="control-label col-md-3">Static Banner Sub Heading</label> 
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="static_banner_subheading" type="text" name="static_banner_subheading" readonly value="<?php if(!empty($viewser_count)){?><?php echo $viewser[0]->name; ?><?php } ?>"  class="form-control col-md-7 col-xs-12" required="required">
						  
                        </div>
                        
                         <?php if(!empty($view_count)){?>
                          <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btndisable">To Translate</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
                        <div class="col-md-2 col-sm-2 col-xs-12"><a href="<?php echo $url;?>/admin/edittranslate/358" class="btn btn-success">To Translate</a></div>
                        <?php } } ?>
                      </div> 
                      
                      
                      
                      
                      
                      
                       
                        
                        
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Page Loading Animation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_loading" id="site_loading" class="form-control" required="required" onChange="showLoad(this)">
						<option value="">Select</option>
									<option value="1" <?php { if($settings[0]->site_loading=="1") echo "selected='selected'"; }?>>On</option>
									<option value="0" <?php { if($settings[0]->site_loading=="0") echo "selected='selected'"; }?>>Off</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      <div id="animated" <?php if($settings[0]->site_loading!="1"){?> style="display:none;" <?php } ?>>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Animated Gif Image 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_loading_url" name="site_loading_url" <?php if($settings[0]->site_loading_url==""){?>required="required"<?php } ?> class="form-control col-md-7 col-xs-12"><br/>
                          ( Gif format only )						  
						   @if ($errors->has('site_loading_url'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_loading_url') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					   
					  <?php 
					   $setting_gif="/settings/";
						$pathh ='/local/images'.$setting_gif.$settings[0]->site_loading_url;
						if($settings[0]->site_loading_url!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$pathh;?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="100">
					  </div>
					  </div>
						<?php } ?>
                      </div>
                      
                      <input type="hidden" name="save_loading_url" value="<?php echo $settings[0]->site_loading_url;?>">
					  
					  
                      
                      
                      <div class="item form-group">
                
                         <label for="amount" class="control-label col-md-3">Payment Option</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						
						
						$array_payment =  explode(',', $settings[0]->payment_option);
						
						
						foreach($payment as $draw){?>
						<input type="checkbox" name="payment_opt[]" value="<?php echo $draw;?>" <?php  if(in_array($draw,$array_payment)){?> checked <?php } ?> > <?php echo $draw;?><br/>
						<?php } ?>
						</div>
						
						</div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Paypal site Mode <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="paypal_url" id="paypal_url" class="form-control" required="required">
						<option value="">Select</option>
									<option value="https://www.sandbox.paypal.com/cgi-bin/webscr" <?php { if($settings[0]->paypal_url=="https://www.sandbox.paypal.com/cgi-bin/webscr") echo "selected='selected'"; }?>>Test</option>
									<option value="https://www.paypal.com/cgi-bin/webscr" <?php { if($settings[0]->paypal_url=="https://www.paypal.com/cgi-bin/webscr") echo "selected='selected'"; }?>>Live</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      
                      
					  
					  <div class="item form-group">
                        <label for="amount" class="control-label col-md-3">Paypal Id</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="paypal_id" type="text" name="paypal_id" value="<?php echo $settings[0]->paypal_id; ?>"  class="form-control col-md-7 col-xs-12" required="required">
						  
                        </div>
                      </div>
					  
					  
					  
					  
					   
                      
                      
                      
                      
                      
                
                <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Stripe site Mode <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
						
						<select name="stripe_mode" id="stripe_mode" class="form-control" required="required">
						<option value="">Select</option>
									<option value="test" <?php { if($settings[0]->stripe_mode=="test") echo "selected='selected'"; }?>>Test</option>
									<option value="live" <?php { if($settings[0]->stripe_mode=="live") echo "selected='selected'"; }?>>Live</option>
								</select>
						
                          
                        </div>
                      </div>
					  
                      
                      
                      
                      
                       
                         <div class="item form-group" id="stripe_test_publish" <?php if($settings[0]->stripe_mode!="test"){?>style="display:none;"<?php } ?>>
               
                
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Test Publishable key <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                        
                          <input id="test_publish_key" type="text" name="test_publish_key" value="<?php echo $settings[0]->test_publish_key; ?>"  class="form-control" required="required">
						  
                        </div>
                      </div>
					  
                      
                      <div class="item form-group" id="stripe_test_secret" <?php if($settings[0]->stripe_mode!="test"){?>style="display:none;"<?php } ?>>
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Test Secret key <span class="required">*</span>
                        </label>
                        
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  
                          <input id="test_secret_key" type="text" name="test_secret_key" value="<?php echo $settings[0]->test_secret_key; ?>"  class="form-control" required="required">
						  
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                       <div class="item form-group" id="stripe_live_publish" <?php if($settings[0]->stripe_mode!="live"){?>style="display:none;"<?php } ?>>
                            
                
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Live Publishable key <span class="required">*</span>
                        </label>
                        
					  <div class="col-md-6 col-sm-6 col-xs-12">
                       
                       
                          <input id="live_publish_key" type="text" name="live_publish_key" value="<?php echo $settings[0]->live_publish_key; ?>"  class="form-control" required="required">
						  
                        </div>
                      </div>
					  
                      
                      
                      <div class="item form-group" id="stripe_live_secret" <?php if($settings[0]->stripe_mode!="live"){?>style="display:none;"<?php } ?>>
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Live Secret key <span class="required">*</span>
                        </label>
                        
					  <div class="col-md-6 col-sm-6 col-xs-12">
                      
               	  
					   
                          <input id="live_secret_key" type="text" name="live_secret_key" value="<?php echo $settings[0]->live_secret_key; ?>"  class="form-control" required="required">
						  
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Payumoney site Mode <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="payu_mode" id="payu_mode" class="form-control" required="required">
						<option value="">Select</option>
									<option value="test" <?php { if($settings[0]->payu_mode=="test") echo "selected='selected'"; }?>>Test</option>
									<option value="live" <?php { if($settings[0]->payu_mode=="live") echo "selected='selected'"; }?>>Live</option>
								</select>
						
                          
                        </div>
                      </div>
					  
					  
					  
					 
                    <div class="item form-group">
                        <label for="merchant_key" class="control-label col-md-3">Merchant Key</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="merchant_key" type="text" name="merchant_key" value="<?php echo $settings[0]->merchant_key; ?>"  class="form-control col-md-7 col-xs-12" required="required">
						  
                        </div>
                      </div>
					  
					  
					   <div class="item form-group">
                        <label for="salt_id" class="control-label col-md-3">Salt</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="salt_id" type="text" name="salt_id" value="<?php echo $settings[0]->salt_id; ?>"  class="form-control col-md-7 col-xs-12" required="required">
						  
                        </div>
                      </div>

                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
					  
					  
					  <div class="item form-group">
                        <label for="api" class="control-label col-md-3">Shipping Fee</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_shipping" type="number" name="site_shipping" value="<?php echo $settings[0]->site_shipping; ?>"  class="form-control col-md-7 col-xs-12">
						 
                        </div>
                      </div>
					  
						
						<?php /* ?><?php  if(in_array($draw,$narray)){?> checked <?php } ?><?php */?>
						
						
					  
					  
					  
						
						
						<div class="item form-group">
                        <label for="api" class="control-label col-md-3">Google Map Api Key</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_map_api" type="text" name="site_map_api" value="<?php echo $settings[0]->site_map_api; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  
					  
					  <div class="item form-group">
                        <label for="api" class="control-label col-md-3">Site Url</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_url" type="text" name="site_url" value="<?php echo $settings[0]->site_url; ?>"  class="form-control col-md-7 col-xs-12">
						  <br/> ( ex : http://www.yoursite.com/ )
                        </div>
                      </div>
                      
                      
                      
                      <input type="hidden" name="save_map_api" value="<?php echo $settings[0]->site_map_api; ?>">
                      
					  <input type="hidden" name="save_header_type" value="<?php echo $settings[0]->header_type; ?>">
                      
                      
                       <input type="hidden" name="mp3_size" value="<?php echo $settings[0]->mp3_size; ?>">
                       <input type="hidden" name="image_size" value="<?php echo $settings[0]->image_size; ?>">
                       <input type="hidden" name="pdf_size" value="<?php echo $settings[0]->pdf_size; ?>">
					  
					 
					  
					  <input type="hidden" name="save_siteurl" value="<?php echo $settings[0]->site_url; ?>">
					  
						
						
						
						<input type="hidden" name="currentwelcome" value="<?php echo $settings[0]->site_welcome_banner;?>">
					  
					  <input type="hidden" name="currentlogo" value="<?php echo $settings[0]->site_logo;?>">
					  
					  
					  <input type="hidden" name="currentfav" value="<?php echo $settings[0]->site_favicon;?>">
					  
					  <input type="hidden" name="currentban" value="<?php echo $settings[0]->site_banner;?>">
					 
					  
					  
					  
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/settings" class="btn btn-primary">Cancel</a>
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
