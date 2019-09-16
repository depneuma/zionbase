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
<?php  if (in_array(13, $hidden)){?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Events Booking</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
				 
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sno</th>
						  
                          
						  <th>Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          
						  <th>Date</th>
						 
						  <th>Seat Need?</th>
                          <th>Event Name</th>
                          <th>Message</th>
                          <th>Status</th>
						  
						  
						  <th>Action</th>
						 
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $sno=0;
					  foreach ($booking as $book) {
						  $sno++;
					

                       $getevent = DB::table('post')
							 ->where('post_id', '=', $book->event_id)
							
							 ->where('post_type', '=', 'event')
							 ->where('post_status', '=', '1')
					         ->get();
			

					  ?>
    
						
                        <tr>
						 <td><?php echo $sno; ?></td>
						 
                          <td><?php echo $book->name;?></td>
                          
						  <td><?php echo $book->phone;?></td>
						  
						   <td><?php echo $book->email;?></td>
						   
						   
						   
						   
						   <td><?php echo $book->entrydatetime;?></td>
						   
						   <td><?php echo $book->seats;?></td>
                           
                           <td><?php echo $getevent[0]->post_title;?></td>
						   
						   <td><?php echo $book->message;?></td>
						   
						   
						   
						   <?php 
						   if($book->status==0){ $btn = "btn btn-danger"; $text = "Unapproved"; $sid = 1;  } else { $btn = "btn btn-success"; $text = "Approved"; $sid = 0; }
						   ?> 
                           
						   <td> <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="<?php echo $btn;?> btndisable"><?php echo $text;?></a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/events-booking/{{ $sid }}/{{ $book->book_id }}" class="<?php echo $btn;?>"><?php echo $text;?></a>
						  
				  <?php } ?> </td>
						  
						  <td>
					<?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>	  
						 <a href="<?php echo $url;?>/admin/events-booking/{{ $book->book_id }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
				  <?php } ?>
						  
						  </td>
						  
						  
						  
						  
						  
                        </tr>
                        <?php } ?>
                       
                      </tbody>
                    </table>
					
					
                  </div>
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

    <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
	
  </body>
</html>
