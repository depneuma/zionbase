<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
     @include('static')
    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <h1 class="h1 white text-center"><?php echo translate( 466, $lang);?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	<div class="height70"></div>
	
	
	<div class="video">
	
	<div class="container">
			<div id="page-inner"> 
                  <div class="row">
                  
                  <?php if(!empty($order_count)){ ?>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                   
                        <div class="col-md-6 text-left paddingoff">
                        <p class="bold black h4"><?php echo translate( 484, $lang);?></p>
                        </div>
                        <div class="col-md-6 text-right paddingoff">
                        <a href="<?php echo $url;?>/my-orders" class="avg_small_button"><?php echo translate( 481, $lang);?></a>
                        </div>
                        
                    </div>    
                        <div class="container">
                        
                            <div class="overx">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
											                                            
                                            <th><?php echo translate( 274, $lang);?></th>
						  
                          
						  <th><?php echo translate( 253, $lang);?></th>
                          <th><?php echo translate( 475, $lang);?></th>
                          
						  <th><?php echo translate( 469, $lang);?></th>
						 
						  <th><?php echo translate( 478, $lang);?></th>
                          <th><?php echo translate( 301, $lang);?></th>
                          
                          <th><?php echo translate( 394, $lang);?></th>
                          
                         
                          <th><?php echo translate( 286, $lang);?></th>
                                            
                                            
                                            
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
							$product_slug = $product_details[0]->post_slug;
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
						   
                           <td><a href="<?php echo $url;?>/product-details/<?php echo $row->prod_id;?>/<?php echo $product_slug;?>#reviews"><?php echo translate( 487, $lang);?></a></td>
                           
                           						   
						   <?php if($row->status=="pending"){ $color="#FB6704"; } else if($row->status=="completed")  { $color="#0DE50D"; } else if($row->status=="failed")  { $color="#FF1D00"; }
						   
						   else { $color = "#FF1D00"; }
						   ?> 
						   <td style="color:<?php echo $color;?>;"><?php echo $row->status;?></td>
						  
						  
						  
						  
						  
						  
						  
                        </tr>
                        <?php  $sno++; } }  ?>
                       
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    	</tbody>
															
                                </table>
                            </div>
                        
                   
                    <!--End Advanced Tables -->
                </div>
                
                <?php } else {?>
                
                
                 <div class="col-md-12" align="center"><h1 class="h3 black text-center"><?php echo translate( 379, $lang);?></h1></div>
                
                <?php } ?>
            </div>
                <!-- /. ROW  -->
            </div>
		</div>
	
    
    
	</div>
	
	<div class="height70"></div>
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>