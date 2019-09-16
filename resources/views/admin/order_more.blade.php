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
                    <h2>Orders Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
                  
                  <div align="left">
                  <a href="<?php echo $url;?>/admin/orders" class="btn btn-primary">Back</a>
                  </div>
				 
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sno</th>
						  
                          
						  <th>User Name</th>
                          <th>Product Name</th>
                          
						  <th>Order No</th>
						 
						  <th>Quantity</th>
                          <th>Price</th>
                          
                         
                          <th>Status</th>
						  
						  
						  
						 
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  if(!empty($order_count)){
					  
					  $sno=1;
										
										foreach($order as $row)
										{
											
										
					$user_count = DB::table('users')
		          					->where('id','=',$row->user_id)
				   					->count();
			       if(!empty($user_count))
				   {
				      $user_details = DB::table('users')
		          					->where('id','=',$row->user_id)
				   					->get();
						$user_name = $user_details[0]->name;			
				   }
				   else
				   { 
				     $user_details = "";
					 $user_name = "";
				   }
				   
				   
				          $product_count = DB::table('product')
		          					->where('prod_id','=',$row->prod_id)
				   					->count();
				         if(!empty($product_count))
						 {
						    $product_details = DB::table('product')
		          					         ->where('prod_id','=',$row->prod_id)
				   					         ->get();
						    $product_name = $product_details[0]->prod_name;
						 }
						 else
						 {
						   $product_details = "";
						   $product_name = "";
						 }

					  ?>
    
						
                        <tr>
						 <td><?php echo $sno; ?></td>
						 
                          <td><?php echo $user_name;?></td>
                          
						  <td><?php echo $product_name;?></td>
                          
                          <td><?php echo $row->purchase_token;?></td>
						  
						   <td><?php echo $row->quantity;?></td>
						   
						   <td><?php echo $setting[0]->site_currency;?> <?php echo $row->price * $row->quantity;?></td>
						   
                           						   
						   <?php if($row->status=="pending"){ $color="#FB6704"; } else if($row->status=="completed")  { $color="#0DE50D"; } else if($row->status=="failed")  { $color="#E91402"; }
						   else { $color = "#E91402"; }
						   ?> 
						   <td style="color:<?php echo $color;?>;"><?php echo $row->status;?></td>
						  
						  
						  
						  
						  
						  
						  
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
