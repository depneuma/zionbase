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
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
$language = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					
					
					->orderBy('id','asc')
					->get();
					
$language_cnt = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					
					
					->orderBy('id','asc')
					->count();					
					
$language_single = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->where('lang_code', '=', 'en')
					->orderBy('id','asc')
					->get();
					
$language_single_cnt = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->where('lang_code', '=', 'en')
					->orderBy('id','asc')
					->count();
					
if($lang == "en")
{					
$pages = DB::table('pages')
		            ->where('status', '=', 1)
					->where('lang_code', '=', $lang)
					->where('menu_top', '=', 1)
					->orderBy('page_title','asc')
					->get();
	$pages_cnt = DB::table('pages')
		            ->where('status', '=', 1)
					->where('lang_code', '=', $lang)
					->where('menu_top', '=', 1)
					->count();													

}
else
{
    $pages = DB::table('pages')
		            ->where('status', '=', 1)
					->where('lang_code', '=', $lang)
					->where('menu_top', '=', 1)
					->orderBy('page_title','asc')
					->get();
	$pages_cnt = DB::table('pages')
		            ->where('status', '=', 1)
					->where('lang_code', '=', $lang)
					->where('menu_top', '=', 1)
					->count();					
}




$didd = 1;
		
		if($lang == "en")
		{
		$aboutus = DB::table('pages')
		       ->where('page_id', '=', $didd)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->get();
			   
			 $aboutcnt = DB::table('pages')
		       ->where('page_id', '=', $didd)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->count();  
		}
		else
		{
		$aboutus = DB::table('pages')
		       ->where('parent', '=', $didd)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->get();
			   
			   $aboutcnt = DB::table('pages')
		       ->where('parent', '=', $didd)
			   ->where('status', '=', 1)
			    ->where('lang_code', '=', $lang)
			   ->count();
		}	   		   
		









											
		
if($currentPaths=="/")
 {
 $activemenu = "/";
 }
 else 
 {
  $activemenu = $currentPaths;
 }
 

/*$translate = DB::table('avig_translate')
		            ->where('lang_status', '=', 1)
					->where('lang_code', '=', $lang) */
					
function translate($id,$lang) 
{					
	if($lang == "en")
	{
	$translate = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('id', '=', $id)
					->get();
					
		$translate_cnt = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('id', '=', $id)
					->count();			
	}
	else
	{
	$translate = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('parent', '=', $id)
					->get();
					
		$translate_cnt = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('parent', '=', $id)
					->count();			
	}				
	if(!empty($translate_cnt))
	{
					return $translate[0]->name;
	}
	else
	{
	  return "";
	}
}
//echo translate(1,$lang);	
	
 
if($activemenu == "/"){ $active_home = "active"; } else { $active_home =""; }
if($activemenu == "about-us"){ $active_about = "active"; } else { $active_about = ""; }
if($activemenu == "gallery"){ $active_gallery = "active"; } else { $active_gallery = ""; }
if($activemenu == "shop"){   $active_shop = "active"; } else { $active_shop = ""; }
if($activemenu == "sermons" or $activemenu == "sermons/{id}"){ $active_sermons = "active"; } else { $active_sermons = ""; }
if($activemenu == "events" or $activemenu == "events/{id}"){ $active_events = "active"; } else { $active_events = ""; }
if($activemenu == "blog" or $activemenu == "blog/{id}") { $active_blog = "active"; } else { $active_blog = ""; }
if($activemenu == "contact-us") { $active_contact = "active"; } else { $active_contact = ""; }
if($activemenu == "donate-now"){ $active_donate = "active"; } else { $active_donate = ""; }
if($activemenu == "register"){ $active_register = "active"; } else { $active_register = ""; }
if($activemenu == "dashboard" or $activemenu == "my-comments"){ $active_dashboard = "active"; } else { $active_dashboard = ""; }
if($activemenu == "staff" or $activemenu == "staff/{id}"){ $active_staff = "active"; } else { $active_staff = ""; }
if($activemenu == "about-us" or $activemenu == "contact-us" or $activemenu == "staff" or $activemenu == "staff/{id}"){ $active_page = "active"; } else { $active_page = ""; }


if(Auth::check()) {
 $cart_views_count = DB::table('orders')
		
		->where('user_id', '=', Auth::user()->id)
		->where('status', '=', 'pending')
		
		->count();
		
		}
		else
		{
		  $cart_views_count = 0 ;
		}
?>

<?php if($setts[0]->site_loading_url!="" && $setts[0]->site_loading=='1'){?>	
<div class="loader"></div>
<?php } ?>	
<header id="header" class="alt">



 <div class="container">
                   <div class="row">
                   <div class="4u 12u(avigher) floatnone justright">
					
                    
		   <?php if(!empty($setts[0]->site_logo)){?>
		  
		  <a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/settings/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>" /></a>
		   <?php } else {?>
		   <h1 id="logo"><a class="" href="<?php echo $url;?>"><?php echo $setts[0]->site_name;?></a></h1>
		   <?php } ?>
		  
                    </div>
                    
                    <div class="8u 12u(avigher) hides">
					<nav id="nav">
						<ul>
							<li class="<?php echo $active_home;?>"><a href="<?php echo $url;?>"><?php echo translate( 15, $lang);?></a></li>
							<!--<li class="submenu">
								<a href="#">Layouts</a>
								<ul>
									<li><a href="left-sidebar.html">Left Sidebar</a></li>
									<li><a href="right-sidebar.html">Right Sidebar</a></li>
									<li><a href="no-sidebar.html">No Sidebar</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li class="submenu">
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Dolore Sed</a></li>
											<li><a href="#">Consequat</a></li>
											<li><a href="#">Lorem Magna</a></li>
											<li><a href="#">Sed Magna</a></li>
											<li><a href="#">Ipsum Nisl</a></li>
										</ul>
									</li>
								</ul>
							</li>-->
                            <li class="submenu <?php echo $active_page;?>">
								<?php if(!empty($aboutcnt)){?><a href="<?php echo $url;?>/page/<?php echo $aboutus[0]->page_id;?>/<?php echo $aboutus[0]->post_slug;?>"><?php echo translate( 13, $lang);?></a><?php } ?>
								<ul>
                                <?php if(!empty($pages_cnt)){?>
                                <?php foreach($pages as $page){
								if($page->page_id==4 or $page->parent==4){ $pagerurl = $url.'/'.'contact-us'; }
								else if($page->page_id==5 or $page->parent==5){ $pagerurl = $url.'/'.'donate-now'; }
								else { $pagerurl = $url.'/page/'.$page->page_id.'/'.$page->post_slug; }
								?>
                                <li class="<?php echo $active_about;?>"><a href="<?php echo $pagerurl; ?>"><?php echo $page->page_title;?></a></li>
                                <?php } } ?>
                                 <?php /*?><li class="<?php echo $active_contact;?>"><a href="<?php echo $url;?>/contact-us">Contact Us</a></li><?php */?>
                                 
                                 
                                 <?php if($setts[0]->site_staff=="on"){?>
                                 <li class="<?php echo $active_staff;?>"><a href="<?php echo $url;?>/staff">Staff</a></li>
								 <?php } ?>
                                 
                                 <?php if($setts[0]->site_gallery=="on"){?>
                                 <li class="<?php echo $active_gallery;?>"><a href="<?php echo $url;?>/gallery"><?php echo translate( 10, $lang);?></a></li>
                                 <?php } ?>
                                 
                                 <?php if($setts[0]->site_blog=="on"){?>
                                 <li class="<?php echo $active_blog;?>"><a href="<?php echo $url;?>/blog"><?php echo translate( 1, $lang);?></a></li>
                                 <?php } ?>
                                 
                                 <?php if($setts[0]->site_sermon=="on"){?>
                                  <li class="<?php echo $active_sermons;?>"><a href="<?php echo $url;?>/sermons"><?php echo translate( 7, $lang);?></a></li>
                                  <?php } ?>
                                 
                                  <?php if($setts[0]->site_event=="on"){?> 
                            <li class="<?php echo $active_events;?>"><a href="<?php echo $url;?>/events"><?php echo translate( 4, $lang);?></a></li>
                            <?php } ?>
                            
                                 </ul>
                               </li>
                                 
							
                            <?php if($setts[0]->site_shop=="on"){?>
                            <li class="<?php echo $active_shop;?>"><a href="<?php echo $url;?>/shop"><?php echo translate( 367, $lang);?></a></li>
                            <?php } ?>
                           
                            
                           
                             
                             
                             
                              
                              
                             <?php /* ?> <?php if(Auth::check()) { ?>
                               <li class="<?php echo $active_dashboard;?>"><a href="<?php echo $url;?>/dashboard">My Account</a></li>
                                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a></li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                  <?php } else { ?>      
                             <li class="<?php echo $active_login;?>"><a href="<?php echo $url;?>/login">Login</a></li>
									<li class="<?php echo $active_register;?>"><a href="<?php echo $url;?>/register">Register</a></li>
                                    <?php } ?>
                           <?php */?>
                            <li class="submenu <?php echo $active_dashboard;?>">
								<a href="<?php echo $url;?>/dashboard"><?php echo translate( 19, $lang);?></a>
								<ul>
                                 <?php if(Auth::check()) { ?>
                                 <li><a href="<?php echo $url;?>/dashboard"><?php echo translate( 22, $lang);?></a></li>
                                 <?php if($setts[0]->site_blog=="on" || $setts[0]->site_sermon=="on" || $setts[0]->site_event=="on"){?>
                                 <li><a href="<?php echo $url;?>/my-comments"><?php echo translate( 25, $lang);?></a></li>
                                 <?php } ?>
                                 
                                 <?php if($setts[0]->site_shop=="on"){?>
                                 <li><a href="<?php echo $url;?>/my-orders"><?php echo translate( 466, $lang);?></a></li>
                                 <?php } ?>
                                 
                                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo translate( 28, $lang);?></a></li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                 <?php } else { ?>
									<li><a href="<?php echo $url;?>/login"><?php echo translate( 31, $lang);?></a></li>
									<li><a href="<?php echo $url;?>/register"><?php echo translate( 34, $lang);?></a></li>
                                    <?php } ?>
                                </ul>
                             </li> 
                            
                             <li class="submenu"><?php if(!empty($language_single_cnt)){?>
                             <?php if($lang == "en"){?>
                             <a href="<?php echo $url;?>/lang/<?php echo $language_single[0]->lang_code;?>"> <img src="<?php echo $url; ?>/local/images/post/<?php echo $language_single[0]->lang_flag;?>" style="max-width:24px; max-height:24px; top:5px; position:relative;"> <span style="position:relative;top:-3px;"><?php echo $language_single[0]->lang_code;?></span></a><?php } else { 
							 
							 $language_single_view = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->where('lang_code', '=', $lang)
					->orderBy('id','asc')
					->get();
					
					$language_cnt_view = DB::table('avig_language')
		            ->where('lang_status', '=', 1)
					->where('lang_code', '=', $lang)
					->orderBy('id','asc')
					->count();
					
					if(!empty($language_cnt_view)){
							 ?>
                             
                             <a href="<?php echo $url;?>/lang/<?php echo $lang;?>"> <img src="<?php echo $url; ?>/local/images/post/<?php echo $language_single_view[0]->lang_flag;?>" style="max-width:24px; max-height:24px; top:5px; position:relative;"> <span style="position:relative;top:-3px;"><?php echo $lang;?></span></a>
                             <?php } } ?>
                             
							 <?php } ?>
                                 <ul>
                                 <?php 
								 if(!empty($language_cnt)){
								 foreach($language as $languages){?>
                                 <li><a href="<?php echo $url;?>/lang/<?php echo $languages->lang_code;?>"><img src="<?php echo $url; ?>/local/images/post/<?php echo $languages->lang_flag;?>" style="max-width:24px; max-height:24px; top:5px; position:relative;"> <span style="position:relative;top:-3px;"><?php echo $languages->lang_code;?></span> </a></li>
                                 <?php } } ?>
                                 </ul>
                             </li>
                             <li class="<?php echo $active_donate;?>"><a href="<?php echo $url;?>/donate-now" class="white_ash donatebtn"><?php echo translate( 37, $lang);?></a></li> 
                             <?php if($setts[0]->site_shop=="on"){?>
                             <li><a href="<?php echo $url;?>/cart" id="cart"><i class="fa fa-shopping-cart"></i> <?php echo translate( 397, $lang);?> <span class="badge"><?php echo $cart_views_count;?></span></a></li>
                             <?php } ?>
                             
						</ul>
					</nav>
                    </div>
                    
                    
                    
                     
                    
                    </div>
                    
                    </div>
				</header>

 

      
    