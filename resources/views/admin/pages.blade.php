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
		
		<?php $url = URL::to("/"); ?>
		
		
        <!-- /top navigation -->
<?php  if (in_array(11, $hidden)){?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pages</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
                   <form action="{{ route('admin.pages') }}" method="post">
                 
                 {{ csrf_field() }}
                  <div align="right">
                   <?php if(config('global.demosite')=="yes"){?>
					
				   <a href="#" class="btn btn-danger btndisable">Delete All</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   <input type="submit" value="Delete All" class="btn btn-danger" id="checkBtn" onClick="return confirm('Are you sure you want to delete?');">
				  <?php } ?>
                  
                  
				<?php if(config('global.demosite')=="yes"){?>
				  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add Page</a> 
				  <?php } else { ?>
				  <a href="<?php echo $url;?>/admin/add-page" class="btn btn-primary">Add Page</a>
				  <?php } ?>
                  </div>
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                         <th width="10%">
          <button type="button" id="selectAll" class="main">
          <span class="sub"></span> Select All </button></th>
                          <th>Sno</th>
						  
                          <th>Heading</th>
                          
                          <th>Status</th>
                          
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $i=1;
					  foreach ($pages as $page) { ?>
    
						
                        <tr>
                        <td><input type="checkbox" name="page_id[]" value="<?php echo $page->page_id;?>"/></td>
						 <td><?php echo $i;?></td>
						
                          <td><?php echo $page->page_title;?></td>
                          
						  <td>
                           <?php 
						  if($page->status==0){ $btn = "btn btn-danger"; $text = "Disable"; $sid = 1; } else { $btn = "btn btn-success"; $text = "Enable"; $sid=0; }
						  ?>
                         
                          
                           <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="<?php echo $btn;?> btndisable"><?php echo $text;?></a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/pages/action/{{ $page->page_id }}/{{ $sid }}" class="<?php echo $btn;?>"><?php echo $text;?></a>
						  
				  <?php } ?>
                          
                          
                          </td>
                          
                          
                          
						  <td>
						  <?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  <a href="<?php echo $url;?>/admin/edit-page/{{ $page->page_id }}" class="btn btn-success">Edit</a>
				  <?php } ?>
                  
                   <?php if($page->page_id!=4 && $page->page_id!=5 && $page->page_id!=1){?>
                  <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						 <a href="<?php echo $url;?>/admin/pages/{{ $page->page_id }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
						  <?php } ?>
                          
                          <?php } else { ?>
                          <img src="<?php echo $url.'/local/images/not-allowed.png';?>" width="24" border="0" alt="Not Allowed">
                          <?php } ?>
                          
                  
						  </td>
                        </tr>
                        <?php $i++;} ?>
                       
                      </tbody>
                    </table>
					
					
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
