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
                  
                  <?php if(!empty($product_count)){?>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                   
                        <div class="col-md-6 text-left paddingoff">
                        <p class="bold black h4"><?php echo $product_count;?> <?php echo translate( 472, $lang);?> !!!</p>
                        </div>
                        <div class="col-md-6 text-right paddingoff">
                        <a href="<?php echo $url;?>/dashboard" class="avg_small_button"><?php echo translate( 271, $lang);?></a>
                        </div>
                        
                    </div>
                    
                        
                        <div class="container">
                        
                            <div class="overx">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><?php echo translate( 274, $lang);?></th>
											<?php /*?><th><?php echo translate( 457, $lang);?></th><?php */?>
                                            <th><?php echo translate( 469, $lang);?></th>
											<th><?php echo translate( 214, $lang);?></th>
											<th><?php echo translate( 136, $lang);?></th>
											<th><?php echo translate( 412, $lang);?></th>
                                            
                                            
											<th><?php echo translate( 361, $lang);?></th>
                                            <th><?php echo translate( 349, $lang);?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
										$sno=1;
										$ser_name = "";
										foreach($product as $row)
										{
											
										$ser_id=$row->prod_id;
			                            $sel=explode("," , $ser_id);
										$length=count($sel);
										$ser_name="";
										for($i=0;$i<$length;$i++){
				                        $id=$sel[$i];
										
										if($lang == "en")
										{
										   
										   $fetch_count = DB::table('product')
								                ->where('prod_id', '=', $id)
												->where('lang_code', '=', $lang)
								                 ->count();
										   if(!empty($fetch_count))
										   {
										   $fetch = DB::table('product')
								                ->where('prod_id', '=', $id)
												->where('lang_code', '=', $lang)
								                 ->get();
												 
											  $ser_name.=$fetch[0]->prod_name.',<br>';
				                              		 
											}
											else
											{
											  $fetch = "";
											  $ser_name = "";
											}	 
										}
										else
										{
										   
										   
										   $fetch_count = DB::table('product')
								                ->where('parent', '=', $id)
												->where('lang_code', '=', $lang)
								                 ->count();
										   if(!empty($fetch_count))
										   {
										   $fetch = DB::table('product')
								                ->where('parent', '=', $id)
												->where('lang_code', '=', $lang)
								                 ->get();
												 
											  $ser_name.=$fetch[0]->prod_name.',<br>';
				                              		 
											}
											else
											{
											  $fetch = "";
											  $ser_name = "";
											}
										   
										   
										}
										
									}		 
												 	
									?>  									
										<tr>
											<td><?php echo $sno; ?></td>
											<?php /*?><td><?php echo rtrim($ser_name,',<br>');?></td><?php */?>
                                            <td><?php echo $row->purchase_token;?></td>	
											<td><?php echo $row->email;?></td>	
											<td><?php echo $row->phone;?></td>	
												
											<td><?php echo $setts[0]->site_currency;?> <?php echo $row->total;?></td>
                                            <td><?php echo $row->payment_type;?></td>
                                            
                                            <td><a href="<?php echo $url;?>/view_order/<?php echo $row->purchase_token;?>"><?php echo translate( 349, $lang);?></a></td>
                                            
                                            											
											<td><a href="<?php echo $url;?>/my-orders/delete/<?php echo $row->purchase_token;?>" onClick="return confirm('<?php echo translate( 298, $lang);?>');"><img src="<?php echo $url;?>/local/images/delete.png" border="0" alt="delete" /></a></td>
										</tr>
										<?php $sno++; } ?>		
									</tbody>
															
                                </table>
                            </div>
                        
                   
                    <!--End Advanced Tables -->
                </div>
                
                <?php } else { ?>
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