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
<?php  if (in_array(16, $hidden)){?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Donate</h2>
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
                          <th>Email</th>
                          <th>Phone</th>
						  <th>Date</th>
						 
						  <th>Amount</th>
                          <th>Payment Type</th>
                          
                          <th>Message</th>
                          <th>Status</th>
						  
						  
						  <th>Action</th>
						 
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $sno=0;
					  foreach ($donate as $donatenow) {
						  $sno++;
					


					
			

					  ?>
    
						
                        <tr>
						 <td><?php echo $sno; ?></td>
						 
                          <td><?php echo $donatenow->name;?></td>
                          
						  <td><?php echo $donatenow->email;?></td>
						  
						   <td><?php echo $donatenow->phone;?></td>
						   
						   
						   
						   
						   <td><?php echo $donatenow->donate_date;?></td>
						   
						   <td><?php echo $donatenow->amount.' '.$setting[0]->site_currency;?></td>
						   
                           <td><?php echo $donatenow->payment_type;?></td>
                           
						   <td><?php echo $donatenow->message;?></td>
						   
						   
						   
						   <?php if($donatenow->payment_status=="Pending"){ $color="#FB6704"; } else if($donatenow->payment_status=="Confirmed")  { $color="#0DE50D"; } 
						   else if($donatenow->payment_status=="Failed")  { $color="#E91402"; } else { $color = "#E91402"; }
						   ?> 
						   <td style="color:<?php echo $color;?>;"><?php echo $donatenow->payment_status;?></td>
						  
						  <td>
					<?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>	  
						 <a href="<?php echo $url;?>/admin/donate/{{ $donatenow->id }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
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

    
	
  </body>
</html>
