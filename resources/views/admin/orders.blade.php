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
<?php  if (in_array(6, $hidden)){?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Orders</h2>
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
						  
                          
						  <th>Product Name</th>
                          <th>Order No</th>
                          <th>Email</th>
						  <th>Phone No</th>
						 
						  <th>Total Price</th>
                          <th>Payment Type</th>
                          
                          <th>View More</th>
                          <th>Status</th>
						  
						  
						  <th>Action</th>
						 
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  if(!empty($checkout_count)){
					  
					  $sno=1;
										$ser_name = "";
										foreach($checkout as $row)
										{
											
										$ser_id=$row->prod_id;
			                            $sel=explode("," , $ser_id);
										$length=count($sel);
										$ser_name="";
										for($i=0;$i<$length;$i++){
				                        $id=$sel[$i];
										
										
										   
										   $fetch_count = DB::table('product')
								                ->where('prod_id', '=', $id)
												
								                 ->count();
										   if(!empty($fetch_count))
										   {
										   $fetch = DB::table('product')
								                ->where('prod_id', '=', $id)
												
								                 ->get();
												 
											  $ser_name.=$fetch[0]->prod_name.',<br>';
				                              		 
											}
											else
											{
											  $fetch = "";
											  $ser_name = "";
											}	 
										
										
										
									      }	  
					


					
			

					  ?>
    
						
                        <tr>
						 <td><?php echo $sno; ?></td>
						 
                          <td><?php echo rtrim($ser_name,',<br>');?></td>
                          
						  <td><?php echo $row->purchase_token;?></td>
						  
						   <td><?php echo $row->email;?></td>
						   
						   
						   
						   
						   <td><?php echo $row->phone;?></td>
						   
						   <td><?php echo $setting[0]->site_currency;?> <?php echo $row->total;?></td>
						   
                           <td><?php echo $row->payment_type;?></td>
                           
						   <td><a href="<?php echo $url;?>/admin/order_more/<?php echo $row->purchase_token;?>" style="color:#0033CC;">view more</a></td>
						   
						   
						   
						   <?php if($row->payment_status=="pending"){ $color="#FB6704"; } else if($row->payment_status=="completed")  { $color="#0DE50D"; }
						   
						   else if($row->payment_status=="failed")  { $color="#E91402"; } else if($row->payment_status=="waiting")  { $color="#FF6000"; }  else { $color = "#E91402"; }
						   ?> 
						   <td style="color:<?php echo $color;?>;">
						   <?php if($row->payment_status=="waiting"){?>
                           
                           <a href="<?php echo $url;?>/admin/orders/<?php echo $row->purchase_token;?>/1" class="btn btn-success">Waiting for payment confirmation</a>
                           <?php } else { ?>
						   
						   <?php echo $row->payment_status;?>
                           <?php } ?>
                           </td>
						  
						  <td>
					<?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>	  
						 <a href="<?php echo $url;?>/admin/orders/{{ $row->purchase_token }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
				  <?php } ?>
						  
						  </td>
						  
						  
						  
						  
						  
                        </tr>
                        <?php  $sno++; } }  ?>
                       
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
