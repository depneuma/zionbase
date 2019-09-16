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
        
           
                <h1 class="h1 white text-center"><?php echo translate( 25, $lang);?></h1>
           
       
    </div>
	
	
	
	
	
	
	
	
	<div class="height70"></div>
	
	
	<div class="video">
	
	<div class="container">
			<div id="page-inner"> 
                  <div class="row">
                  
                  <?php if(!empty($postcount)){?>
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                   
                        <div class="col-md-6 text-left paddingoff">
                        <p class="bold black h4"><?php echo $postcount;?> <?php echo translate( 268, $lang);?> !!!</p>
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
											<th width="20%"><?php echo translate( 277, $lang);?></th>
											<th  width="10%"><?php echo translate( 280, $lang);?></th>
											<th><?php echo translate( 283, $lang);?></th>
											
											<th><?php echo translate( 286, $lang);?></th>
                                            <th><?php echo translate( 289, $lang);?></th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
										$sno=1;
										
										foreach($viewpost as $row)
										{
										    
										    
											
											
											
											if($row->post_comment_type=="sermons")
											{
												
												$view_sername_cnt = DB::table('sermons')
																->where('id', '!=' , $row->post_parent)
																->count();
												
												if(!empty($view_sername_cnt))
												{
												$view_sername = DB::table('sermons')
																->where('id', '!=' , $row->post_parent)
																->get();
																
												$post_names = $view_sername[0]->name;				
												}				
											}
											else
											{
												$getpost_count = DB::table('post')
														->where('post_type', '!=' , 'comment')
														->where('post_id', '=' , $row->post_parent)
														
														->count();
														
														
														if(!empty($getpost_count))
														{
											              $getpost = DB::table('post')
														->where('post_type', '!=' , 'comment')
														->where('post_id', '=' , $row->post_parent)
														->get();
														
														$post_names = $getpost[0]->post_title;
														}
											}
											
											
											if($row->post_status==1){ $status = translate( 292, $lang); $color ="#078748"; } else {  $status = translate( 295, $lang); $color ="#CB2027"; }
											
									?>  									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $post_names;?></td>
											<td><?php echo $row->post_comment_type;?></td>	
											<td><?php echo $row->post_desc;?></td>	
												
											<td style="color:<?php echo $color;?>"><?php echo $status;?></td>											
											<td><a href="<?php echo $url;?>/my-comments/<?php echo $row->post_id;?>" onClick="return confirm('<?php echo translate( 298, $lang);?>');"><img src="<?php echo $url;?>/local/images/delete.png" border="0" alt="delete" /></a></td>
										</tr>
										<?php $sno++; } ?>		
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