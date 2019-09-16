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
<?php  if (in_array(11, $hidden)){?>
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
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.edit-page') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Edit Page</span>




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
					      
						  $count_en = DB::table('pages')
										->where('parent', '=', 0)
										->where('page_id', '=', $pages[0]->page_id)
										
										->count();
						  if(!empty($count_en))
						  {
						  $view = DB::table('pages')
										->where('parent', '=', 0)
										->where('page_id', '=', $pages[0]->page_id)
										
										->get();
						  $viewname = $view[0]->page_title;
						  $viewdesc = $view[0]->page_desc;
						  $viewtop = $view[0]->menu_top;
						  $viewbottom = $view[0]->menu_bottom;
						  }	
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
							  $viewtop = "";
							  $viewbottom = "";
							 
						  }			
								
										
					  }
					  else
					  {
					      $count_other = DB::table('pages')
										->where('parent', '=', $pages[0]->page_id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->count();
					      if(!empty($count_other))
						  {
					      $view = DB::table('pages')
										->where('parent', '=', $pages[0]->page_id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->get();
						  $viewname = $view[0]->page_title;
						  $viewdesc = $view[0]->page_desc;
						  $viewtop = $view[0]->menu_top;
						  $viewbottom = $view[0]->menu_bottom;				
						  }
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
							  $viewtop = "";
							  $viewbottom = "";
						  }	
								
					  }
					  
					  ?>
                        <div role="tabpanel" class="tab-pane fade <?php if($languagee->id==2){?>active<?php } ?> in" id="tab_content<?php echo $languagee->id;?>" aria-labelledby="home-tab">
                          
                          <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Heading <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="page_title" class="form-control col-md-7 col-xs-12"  name="page_title[]" value="<?php echo $viewname; ?>" required="required" type="text">
                        
					   </div>
                      </div>
                      
                      
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          
                        
                        
                        
                        <textarea id="txtDefaultHtmlArea<?php echo $languagee->id;?>" class="form-control col-md-7 col-xs-12" required="required" name="page_desc[]"><?php echo $viewdesc;?></textarea>
                        
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
                        <input type="hidden" name="page_id" value="<?php echo $pages[0]->page_id; ?>">
                        <input type="hidden" name="token" value="<?php echo uniqid();?>">
                        
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">URL Slug <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="slug" class="form-control col-md-7 col-xs-12"  name="slug" value="<?php echo $pages[0]->post_slug; ?>" type="text" required="required">
						  ( Ex : about us ) - Page Title
                        
					   </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Enable Top Menu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                        <input type="checkbox" class="" name="top_menu" value="1" <?php if($viewtop==1){?> checked <?php } ?> style="margin-top:13px; padding:4px; cursor:pointer;">
					   </div>
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Enable Footer Menu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                        <input type="checkbox" class="" name="footer_menu" value="1" <?php if($viewbottom==1){?> checked <?php } ?> style="margin-top:13px; padding:4px; cursor:pointer;">
					   </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                    </div>

                  </div>
                </div>
              </div>
















                      
					  
					   
					  
					  
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/pages" class="btn btn-primary">Cancel</a>
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
