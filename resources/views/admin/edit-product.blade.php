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
<?php  if (in_array(6, $hidden)){?>
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
                    
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.edit-product') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Edit Product</span>
                      
                      <?php $url = URL::to("/"); ?>
                      
                      
                      
                      
                      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
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
					      
						  $count_en = DB::table('product')
										->where('parent', '=', 0)
										->where('prod_id', '=', $prod_id)
										
										->count();
						  if(!empty($count_en))
						  {
						  $view = DB::table('product')
										->where('parent', '=', 0)
										->where('prod_id', '=', $prod_id)
										
										->get();
						  $viewname = $view[0]->prod_name;
						  $viewdesc = $view[0]->prod_desc;
						  }	
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
						  }			
								
										
					  }
					  else
					  {
					      $count_other = DB::table('product')
										->where('parent', '=', $prod_id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->count();
					      if(!empty($count_other))
						  {
					      $view = DB::table('product')
										->where('parent', '=', $prod_id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->get();
						  $viewname = $view[0]->prod_name;
						   $viewdesc = $view[0]->prod_desc;				
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name[]" class="form-control col-md-7 col-xs-12"  name="prod_name[]" value="<?php echo $viewname; ?>" required="required" type="text">
						  @if ($errors->has('name'))
                                    <span class="help-block" style="color:red;">
                                        <strong>That product name is already exists</strong>
                                    </span>
                                @endif
                        
					   </div>
                      </div>
                      
                      
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          
                        
                       
                       <textarea id="txtDefaultHtmlArea<?php echo $languagee->id;?>" class="form-control col-md-7 col-xs-12" required="required" name="prod_desc[]"><?php echo $viewdesc;?></textarea>
                       
                       
                       <script type="text/javascript">    
       

        $(function() {
           

            $("#txtDefaultHtmlArea<?php echo $languagee->id;?>").htmlarea(); 
        });
    </script>
					  
                       </div>
                      </div>
                      
                     
					  <input type="hidden" name="id" value="<?php echo $product[0]->prod_id; ?>">
					  
                      
                      
                       <input type="hidden" name="code[]" value="<?php echo $languagee->lang_code;?>">
                        <input type="hidden" name="token" value="<?php echo uniqid();?>">
                        
                        
                      
                      
                      
                        </div>
                        <?php } ?>
                        
                        
                        
                      </div>
                      
                      
                      <input type="hidden" name="prod_token_id" value="<?php echo $product[0]->prod_token; ?>">
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">URL Slug <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="slug" class="form-control col-md-7 col-xs-12"  name="slug" value="<?php echo $product[0]->post_slug;?>" type="text" required="required">
						  ( Ex : candles ) - Product Title
                        
					   </div>
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12"  name="prod_catagory" id="prod_catagory"  required="required">
						  <option value=""></option>
						  <?php 
						  if(!empty($category_count)){
						  foreach($category as $view_category){?>
						  <option value="<?php echo $view_category->gid;?>" <?php if($product[0]->prod_catagory==$view_category->gid){?> selected <?php } ?>><?php echo $view_category->name;?></option>
						  <?php } } ?>
						  </select>
						  
						 
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="image[]" class="form-control col-md-7 col-xs-12" accept="image/*" multiple>
						  
						   @if ($errors->has('image'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                     <div class="item form-group" style="margin-left:20%; margin-right:20%;">
					   <?php $url = URL::to("/"); ?>
					 <?php 
					 $check_image =  DB::table('product')
										->where('prod_id', '=', $prod_id)
										->count();
					 if(!empty($check_image))
					 {
					 $view_images = DB::table('product')
										->where('prod_id', '=', $prod_id)
										->get();
										
						 $view_full = DB::table('product_images')
		                               ->where('prod_token', '=', $view_images[0]->prod_token)
									   ->get();				
					 
					 foreach($view_full as $full){
					   $media="/media/";
						$path ='/local/images'.$media.$full->image;
						if(!empty($full->image)){
						?>
                        
					  <div style="float:left; margin-right:10px;">
					 
					  <img src="<?php echo $url.$path;?>" class="thumb" width="80">
					 
					 <a href="<?php echo $url;?>/admin/edit-product/delete/<?php echo $full->prod_img_id;?>" onClick="return confirm('Are you sure you want to delete?')"><img src="<?php echo $url.'/local/images/delete.png';?>" border="0" /></a>
                      </div>
						<?php } else { ?>
                       
					 <div style="float:left; margin-right:10px;">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="80">
                      <a href="<?php echo $url;?>/admin/edit-product/delete/<?php echo $full->prod_img_id;?>" onClick="return confirm('Are you sure you want to delete?')"><img src="<?php echo $url.'/local/images/delete.png';?>" border="0" /></a>
					  </div>
                     
					  
						<?php  } } ?>
					  
					<?php } ?>
                     
                      </div>
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Regular Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="prod_price" class="form-control col-md-7 col-xs-12"  name="prod_price" value="<?php echo $product[0]->prod_price;?>" required="required" type="number">
						   
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sale Price
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="prod_offer_price" class="form-control col-md-7 col-xs-12"  name="prod_offer_price" value="<?php echo $product[0]->prod_offer_price;?>" type="number">
						   
                        
					   </div>
                      </div>
                      
                     
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Quantity <span class="required">*</span> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="prod_available_qty" class="form-control col-md-7 col-xs-12"  name="prod_available_qty" value="<?php echo $product[0]->prod_available_qty;?>" required="required" type="number">
						   
                        
					   </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                    </div>

                  </div>
                </div>
              </div>
                      
                      
                      
                      
           
					   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/product" class="btn btn-primary">Cancel</a>
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
