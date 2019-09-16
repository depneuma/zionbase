<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");

/*$ncounts = DB::table('users')->get();
		foreach($ncounts as $well)
		{
			$we = $well->id;
			$ewe = $well->email;
			DB::update('update shop set user_id="'.$we.'" where seller_email = ?', [$ewe]);
		}*/
		
$logid = Auth::user()->id;

$user_checkker = DB::select('select * from users where id = ?',[$logid]);

$hidden = explode(',',$user_checkker[0]->show_menu);		
?>	
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                 <?php  if (in_array(1, $hidden)){?>
                  <li><a href="<?php echo $url;?>/admin"><i class="fa fa-laptop"></i> Dashboard </a></li>
				   
                  <?php }  ?>
				  
				  
				  <?php  if (in_array(2, $hidden)){?>
                   <li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $url;?>/admin/settings">General Settings </a></li>
                      <li><a href="<?php echo $url;?>/admin/media-settings">Media Settings </a></li>
                      <li><a href="<?php echo $url;?>/admin/color-settings">Font & Color Settings </a></li>
                      <li><a href="<?php echo $url;?>/admin/home-backgrounds">Home Backgrounds </a></li>
                    </ul>
                  </li>
                   <?php } ?>
                 
                  
                 
                 
                 <?php if(Auth::user()->admin==1 && Auth::user()->id==1) {?>
				   <li><a href="<?php echo $url;?>/admin/administrators"><i class="fa fa-user"></i> Administrators </a></li>
				  <?php } ?>
                  
                  <?php  if (in_array(3, $hidden)){?>	 
				  <li><a href="<?php echo $url;?>/admin/users"><i class="fa fa-user"></i> Users </a></li>
                  <?php } ?>
                  
                  <?php  if (in_array(4, $hidden)){?>
				  <li><a href="<?php echo $url;?>/admin/gallery"><i class="fa fa-picture-o"></i> Gallery </a></li>
                  <?php } ?>
                  
                  <?php  if (in_array(5, $hidden)){?>
				  <li><a href="<?php echo $url;?>/admin/galleryimages"><i class="fa fa-picture-o"></i> Gallery Images </a></li>
                  <?php } ?>
                  
                  
                  <?php  if (in_array(6, $hidden)){?>
                  <li><a><i class="fa fa-shopping-cart"></i> Shop <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $url;?>/admin/category">Category </a></li>
                      <li><a href="<?php echo $url;?>/admin/product">Product </a></li>
                      <li><a href="<?php echo $url;?>/admin/orders">Orders </a></li>
                   </ul>
                  </li>
                  <?php } ?>
                  
                  <?php  if (in_array(7, $hidden)){?>
                  <li><a href="<?php echo $url;?>/admin/sermons"><i class="fa fa-sticky-note"></i> Sermons </a></li>
                  <?php } ?>
                  
                  
                  <?php  if (in_array(8, $hidden)){?>
                  <li><a href="<?php echo $url;?>/admin/testimonials"><i class="fa fa-comments"></i> Testimonials </a></li>
                  <?php } ?>
                  
                  <?php  if (in_array(9, $hidden)){?>
                  <li><a href="<?php echo $url;?>/admin/slideshow"><i class="fa fa-picture-o"></i> Slideshow </a></li>
                  <?php } ?>
				  
                  <?php  if (in_array(10, $hidden)){?>
				  <li><a href="<?php echo $url;?>/admin/blog"><i class="fa fa-comments"></i> Blog </a></li>
                  <?php } ?>
                  
                  <?php  if (in_array(11, $hidden)){?>
                  <li><a href="<?php echo $url;?>/admin/pages"><i class="fa fa-sticky-note"></i> Pages </a></li>
                  <?php } ?>
                  
                  <?php  if (in_array(12, $hidden)){?>
                  <li><a href="<?php echo $url;?>/admin/events"><i class="fa fa-sticky-note"></i> Events </a></li>
                  <?php } ?>
                  
                  <?php  if (in_array(13, $hidden)){?>
                   <li><a href="<?php echo $url;?>/admin/events-booking"><i class="fa fa-sticky-note"></i> Events Booking </a></li>
                   <?php } ?>
                   
                   
                   
                   <?php  if (in_array(14, $hidden)){?>
                   <li><a><i class="fa fa-user"></i> Staff <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $url;?>/admin/staff-type"><i class="fa fa-user"></i> Staff Type</a></li>
                      <li><a href="<?php echo $url;?>/admin/staff"><i class="fa fa-user"></i> Staff </a></li>
                     
                    </ul>
                  </li>
                  <?php } ?>
                   
                  <?php  if (in_array(15, $hidden)){?>
                   <li><a href="<?php echo $url;?>/admin/newsletter"><i class="fa fa-user"></i> Newsletter </a></li>
                   <?php } ?>
                  
                  <?php  if (in_array(16, $hidden)){?>
				   <li><a href="<?php echo $url;?>/admin/donate"><i class="fa fa-money" aria-hidden="true"></i> Donate </a></li>
                   <?php } ?>
                   
                   <?php  if (in_array(17, $hidden)){?>
				    <li><a href="<?php echo $url;?>/admin/translate"><i class="fa fa-sticky-note"></i> Translate </a></li>
                    <?php } ?>
				    
                    <?php  if (in_array(18, $hidden)){?>
				  <li><a href="<?php echo $url;?>/admin/language"><i class="fa fa-sticky-note"></i> Language </a></li>
				  <?php } ?>
				  
				  
				  
				  
				  
				 
                 
                 
                  
                  <!--<li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>-->


                  
                  
                </ul>
              </div>

            </div>
			
			
			<!--<div class="x_content">
                    <button type="button" class="btn btn-default">Default</button>

                    <button type="button" class="btn btn-primary">Primary</button>

                    <button type="button" class="btn btn-success">Success</button>

                    <button type="button" class="btn btn-info">Info</button>

                    <button type="button" class="btn btn-warning">Warning</button>

                    <button type="button" class="btn btn-danger">Danger</button>

                    <button type="button" class="btn btn-dark">Dark</button>

                    <button type="button" class="btn btn-link">Link</button>
                  </div>-->