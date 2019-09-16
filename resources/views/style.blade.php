<?php
/*
Theme Name: Christ Church
Theme URI: http://avigher.com
Author: Avigher
Author URI: http://avigher.com
Description: Christ Church
Version: 2.0
Text Domain: avigher
*/
?>
 <?php 
 use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
 $url = URL::to("/"); 
 $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$color_setts = DB::table('color_settings')
		->where('id', '=', $setid)
		->get();
		
		
		$name = Route::currentRouteName();
 if($currentPaths=="/")
 {
	 $pagetitle="Home";
	 $activemenu = "/";
 }
 else 
 {
	 $pagetitle=$currentPaths;
	 $activemenu = $currentPaths;
 }
 
 


$ppid=1;
		$about_title = DB::table('pages')
		->where('page_id', '=', $ppid)
		->get();
$ppid_two=4;
		$contact_title = DB::table('pages')
		->where('page_id', '=', $ppid_two)
		->get();
$ppid_three=5;
		$donate_title = DB::table('pages')
		->where('page_id', '=', $ppid_three)
		->get();
$ppid_four=6;
		$support_title = DB::table('pages')
		->where('page_id', '=', $ppid_four)
		->get();
$ppid_five=7;
		$faq_title = DB::table('pages')
		->where('page_id', '=', $ppid_five)
		->get();	
		
$ppid_six=8;
		$terms_title = DB::table('pages')
		->where('page_id', '=', $ppid_six)
		->get();
$ppid_seven=9;
		$privacy_title = DB::table('pages')
		->where('page_id', '=', $ppid_seven)
		->get();					
 ?>
 
 <title><?php echo $setts[0]->site_name;?>  
 <?php if($activemenu == "/" or $activemenu == "index"){ echo " - Home"; } else { echo ""; }
if($activemenu == "about-us"){ echo $about_title[0]->page_title; } else { echo ""; }
if($activemenu == "gallery"){ echo " - Gallery"; } else { echo ""; }
if($activemenu == "shop"){   echo " - Shop"; } else { echo ""; }
if($activemenu == "sermons" or $activemenu == "sermons/{id}"){ echo " - Sermons"; } else { echo ""; }
if($activemenu == "events" or $activemenu == "events/{id}"){ echo " - Events"; } else { echo ""; }
if($activemenu == "blog" or $activemenu == "blog/{id}"){ echo " - Blog"; } else { echo ""; }
if($activemenu == "contact-us"){ echo ' - '.$contact_title[0]->page_title; } else { echo ""; }
if($activemenu == "dashboard"){ echo ' - Dashboard'; } else { echo ""; }
if($activemenu == "my-comments"){ echo ' - My Comments'; } else { echo ""; }
if($activemenu == "donate-now"){ echo ' - '.$donate_title[0]->page_title; } else { echo ""; }
if($activemenu == "support"){ echo $support_title[0]->page_title; } else { echo ""; }
if($activemenu == "faq"){ echo $faq_title[0]->page_title; } else { echo ""; }
if($activemenu == "terms-of-use"){ echo $terms_title[0]->page_title; } else { echo ""; }
if($activemenu == "privacy-policy"){ echo $privacy_title[0]->page_title; } else { echo ""; }
if($activemenu == "tag/{type}/{id}"){ echo ' - Tags'; } else { echo ""; }
if($activemenu == "payment"){ echo ' - Payment Confirmation'; } else { echo ""; }
if($activemenu == "success/{cid}"){ echo ' - Payment Success'; } else { echo ""; }
if($activemenu == "cancel"){ echo ' - Transaction Cancel'; } else { echo ""; }
if($activemenu == "404"){ echo ' - 404 Page not found!'; } else { echo ""; }
if($activemenu == "forgot-password"){ echo ' - Forgot Password?'; } else { echo ""; }
if($activemenu == "reset-password/{id}"){ echo ' - Reset Password'; } else { echo ""; }
if($activemenu == "thankyou/{id}"){ echo ' - Thank You'; } else { echo ""; }
if($activemenu == "staff"){ echo ' - Staff'; } else { echo ""; }
if($activemenu == "staff/{id}"){ echo ' - Staff'; } else { echo ""; }

?>
 </title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	 <!-- css stylesheets -->
	 <?php if(!empty($setts[0]->site_favicon)){?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/settings/'.$setts[0]->site_favicon;?>" />
	 <?php } else { ?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/noimage.jpg';?>" />
	 <?php } ?>
	 <link href="<?php echo $url;?>/css/bootstrap.min.css" rel="stylesheet" media="all">
     <?php /*?><link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="all"><?php */?>
    	 <link href="<?php echo $url;?>/css/animate.css" rel="stylesheet" media="all">
         <link href="<?php echo $url;?>/css/bootstrap-touch-slider.css" rel="stylesheet" media="all">
         
         
          <meta name="keywords" content="<?php echo $setts[0]->site_keyword;?>">
          <meta name="description" content="<?php echo $setts[0]->site_desc;?>">
         
         
         <link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/YouTubePopUp.css">
	
         <link rel="stylesheet" type="text/css" href="<?php echo $url;?>/css/lightbox.css">
         
         <link rel="stylesheet" href="<?php echo $url;?>/css/gallery.css">
         
         <link rel="stylesheet" href="<?php echo $url;?>/css/carousel.css">
         
         <link rel="stylesheet" href="<?php echo $url;?>/css/animations.css" type="text/css">
         
        
         
         <link href="<?php echo $url;?>/share/avigher.css" rel="stylesheet">
         
        
    
         
    <style type="text/css">

@import url("<?php echo $url;?>/css/font-awesome.min.css");
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->body_font;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading1;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading2;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading3;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading4;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading5;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading6;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->paragraph;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->list_font;?>');

.profile-usermenu .nav>li>a
{
padding:0px !important;
}
.profile-usermenu .nav>li>a:hover
{
background:none !important;
color:#000 !important;
}
.roundbg
{
background:#CB2027 !important;
color:#fff !important;
border-radius: 50%;
 
  padding:5px 10px 5px 10px;
   
    text-align: center;

    font-size:12px;
}

.linespace
{
line-height:28px !important;
color:#FFFFFF;
}


.move5
{
top:2px;
position:relative;
}

.editor
{
width:100% !important;
}

.editor img
{
width:100% !important;
}


.samples ul li
{
display:inline !important;
list-style:none !important;
}


.table-bordered>thead>tr>th,.tableheader
{
background:<?php echo $color_setts[0]->theme_color;?> !important;
color:#fff !important;
}





.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo $url;?>/local/images/settings/<?php echo $setts[0]->site_loading_url;?>') 50% 50% no-repeat rgb(249,249,249);
    opacity: 1;
	
	
}


.text_colors
{
color:<?php echo $color_setts[0]->button_color;?> !important;
}

.totop {
            position: fixed;
            bottom: 50px;
            right: 50px;
            cursor: pointer;
            display: none;
            background: <?php echo $color_setts[0]->button_color;?> !important;
            color: #fff;
            border-radius: 25px;
            height: 50px;
            line-height: 50px;
            padding: 0 30px;
            font-size: 18px;
        }

body
{
overflow-x:hidden !important;
}


.heading
{
   color: <?php echo $color_setts[0]->theme_color;?> !important;
    
    display: inline-block;
    font-weight: bold;
    
    font-size: 20px;
    text-transform: uppercase;
}

.static_heading
{
font-size:40px;
line-height:60px;
text-transform:uppercase !important;
}
.static_subheading
{
font-size:20px;
line-height:30px;
}

.mleft10
{
margin-left:10px;
}

.italic
{
font-style:italic !important;
}
.topoff
{
margin-top:0px !important;
top:0px !important;

}
.topbottom_bar
{
border-top:1px solid <?php echo $color_setts[0]->theme_color;?> !important;
border-bottom:1px solid <?php echo $color_setts[0]->theme_color;?> !important;
}


.sermon_min_height
{
min-height:255px !important;
}
.staff_min_height
{
min-height:200px !important;
}

.blog_min_height
{
min-height:290px !important;
}

.height150
{
height:150px !important;
}
.decorationoff
{
text-decoration:none !important;
}
.black:hover
{
color:#000000 !important;
text-decoration:none !important;
}
.black:focus
{
color:#000000 !important;
text-decoration:none !important;
}

.borderbottom
{
border-bottom:1px solid <?php echo $color_setts[0]->theme_color;?> !important;
}
.paddingtopbottom10
{

margin-bottom:20px !important;
padding-bottom:20px !important;
}


.fontsize10
{
font-size:10px !important;
}
.fontsize11
{
font-size:11px !important;
}
.fontsize12
{
font-size:12px !important;
}
.fontsize13
{
font-size:13px !important;
}
.fontsize14
{
font-size:14px !important;
}
.fontsize15
{
font-size:15px !important;
}
.fontsize16
{
font-size:16px !important;
}
.fontsize17
{
font-size:17px !important;
}
.fontsize18
{
font-size:18px !important;
}

.fontsize20
{
font-size:20px !important;
}

.fontsize25
{
font-size:25px !important;
}


.fontsize30
{
font-size:30px !important;

}
.fontsize40
{
font-size:40px !important;
}

.fontsize50
{
font-size:50px !important;
}
.fontsize60
{
font-size:60px !important;
}
.fontsize70
{
font-size:70px !important;
}

.shadow {
  -webkit-box-shadow: 3px 3px 5px 6px #ccc;  
  -moz-box-shadow:    3px 3px 5px 6px #ccc;  
  box-shadow:         3px 3px 5px 6px #ccc; 
}



.thisfont
{
font-size:40px;
}
.thislineheight
{
line-height:40px;
}

.ellipsis {
  text-overflow: ellipsis;

  
  white-space: nowrap;
  overflow: hidden;
}


.fcaptial
{
text-transform:capitalize !important;
}
.paddingleftoff
{
padding-left:0px !important;
}
.paddingrightoff
{
padding-right:0px !important;
}
.captial
{
text-transform:uppercase !important;
}
.right
{
float:right !important;

}

.border2
	{
	border:2px solid #7C8081;
	}
.lineheight20
{
line-height:20px !important;
}

.lineheight25
{
line-height:25px !important;
}

.lineheight30
{
line-height:30px !important;
}
.lineheight40
{
line-height:40px !important;
}
.lineheight50
{
line-height:50px !important;
}

/************* COUNTDOWN TIMER ***********/
ul.countdown {
list-style: none;

padding: 0;
display: block;
text-align: center;
}
ul.countdown li {
display: inline-block;
background:#201B1B !important;
padding:5px;
border-radius:6px;



}
/*ul.countdown li span {

line-height: 80px;

}*/
.ffleft
{
text-align:center;
display:inline-block !important;
}


ul.countdown li.seperator {
margin-left:4px;
margin-right:4px;
padding:0px;
}

ul.countdown li p
{
line-height:20px;
}

/************* END COUNTDOWN TIMER *************/


/*************** PAGINATION *************/

.pagess {
	clear: both;
	float:right;
	display: inline;
}

.pagess ul {
	float: left;
}

.pagess ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.pagess ul li a {
	padding: 3px 9px 2px;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	color: #fff;
}

.pagess ul li.on a {
	background: #FF0066 !important;
	color: #fff;
}

.pagess ul li span span {
	color: #fff;
	padding: 3px 9px 2px;
	background: #454545;
}










.pagi {
	clear: both;
	float:right;
	display: inline;
}

.pagi ul {
	float: left;
}

.pagi ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.pagi ul li a {
	padding: 3px 9px 2px;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	color: #fff;
}

.pagi ul li.on a {
	background: #FF0066 !important;
	color: #fff;
}

.pagi ul li span span {
	color: #fff;
	padding: 3px 9px 2px;
	background: #454545;
}







.epagi {
	clear: both;
	float:right;
	display: inline;
}

.epagi ul {
	float: left;
}

.epagi ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.epagi ul li a {
	padding: 3px 9px 2px;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	color: #fff;
}

.epagi ul li.on a {
	background: #FF0066 !important;
	color: #fff;
}

.epagi ul li span span {
	color: #fff;
	padding: 3px 9px 2px;
	background: #454545;
}










.shopy {
	clear: both;
	float:right;
	display: inline;
	margin-top:20px;
	margin-right:10px;
}

.shopy ul {
	float: left;
}

.shopy ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.shopy ul li a {
	padding: 3px 9px 2px;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	color: #fff;
}

.shopy ul li.on a {
	background: <?php echo $color_setts[0]->button_color;?> !important;
	color: #fff;
}

.shopy ul li span span {
	color: #fff;
	padding: 3px 9px 2px;
	background: #454545;
}













.mtop10
{
margin-top:10px !important;
}

.mtop15
{
margin-top:15px !important;
}
.mtop20
{
margin-top:20px !important;
}
.mtop30
{
margin-top:30px !important;
}


/**************** END PAGINATION ***************/


/*************** MP3 PLAYER ****************/

.mediPlayer .control {
    opacity        : 0; 
    pointer-events : none;
    cursor         : pointer;
}

.mediPlayer .not-started .play, .mediPlayer .paused .play {
    opacity : 1;

}

.mediPlayer .playing .pause {
    opacity : 1;

}

.mediPlayer .playing .play {
    opacity : 0;
}

.mediPlayer .ended .stop {
    opacity        : 1;
    pointer-events : none;
}

.mediPlayer .precache-bar .done {
    opacity : 0;
}

.mediPlayer .not-started .progress-bar, .mediPlayer .ended .progress-bar {
    display : none;
}

.mediPlayer .ended .progress-track {
    stroke-opacity : 1;
}

.mediPlayer .progress-bar,
.mediPlayer .precache-bar {
    transition        : stroke-dashoffset 500ms;

    stroke-dasharray  : 298.1371428256714;
    stroke-dashoffset : 298.1371428256714;
}



/******************** END MP3 PLAYER ***************/


@media only screen 
  and (min-device-width: 768px) 
  and (max-device-width: 1024px)
  and (-webkit-min-device-pixel-ratio: 1) {
  .barbot
{
margin-bottom:20px;
}
  
  
  .countspace
{
min-width:60px;
}
  .slide-text {
top: 35% !important;
}
  
  .mbottom
{
margin-bottom:20px;
}
  
  
  .subscribetxt
{
padding:4.9px !important;
}
  
  .panel-body
{
border:0px !important;
}
  #header nav ul li a
  {
  padding:0.6em 0.4em !important;
  }
  
  
  .padding-5
{
padding:0px !important;
}
  
  .marginbm
{
margin-bottom:10px;
}
  .poptitle
{
margin-top:10px !important;
}
  
  .paddingleftoff
{
padding:0px !important;
width:100% !important;
}
.paddingrightoff
{
padding:0px !important;
width:100% !important;
}
  
  .paddingleft10rightoff
	{
	padding-left:0px !important;
	padding-right:0px !important;
	}
  
  
  .width100
{
width:100% !important;
}
.mobbottom
{
margin-bottom:30px !important;
clear:both !important;
}
  
  .pagebaner
	{
	 min-height:200px !important;
	}
	#pagelays {
      position:absolute;
      top: 0;
      left: 0;
     
      width: 100%;
	  height:268px !important;
	  
      
      background-color: rgba(0, 0, 0, 0.5);
     
    }
	
	.pagetitle
	{
	position:absolute;
	text-align:center;
	top:180px !important;
	width:100%;
	}
	
	#header nav ul li
	{
	margin-left:0px !important;
	}
	
  }

@media screen and (max-width: 1366px) and (min-width:1024px){
 #header .hides
  {
  display:block !important;
  }
 
}

@media only screen 
  and (min-device-width: 768px) 
  and (max-device-width: 291px)
   {
   #header .hides
  {
  display:none;
  }
  }

@media only screen 
  and (min-device-width: 768px) 
  and (max-device-width: 1024px)
  and (orientation: portrait) 
  and (-webkit-min-device-pixel-ratio: 1) {
  .margintop20
{
margin-top:20px !important;
}
  #header .hides
  {
  display:none;
  }
  .justright
  {
  margin-left:20px !important;
  }
  
  .pagetitle
	{
	position:absolute;
	text-align:center;
	top:150px !important;
	width:100%;
	}
  
  .pagebaner
	{
	 min-height:200px !important;
	}
	#pagelays {
      position:absolute;
      top: 0;
      left: 0;
     
      width: 100%;
	  height:200px !important;
	  
      
      background-color: rgba(0, 0, 0, 0.5);
     
    }
	
  
  .m-center
	{
	text-align:center !important;
	
	}
	.samplegalery .row > *
	{
	float:none;
	margin:0 20px;
	}
	.m-center .img-responsive
	{
	display:inline-block !important;
	}
  
  }

@media screen and (max-width: 767px) {

.barbot
{
margin-bottom:20px;
}

.move5
{
top:4px !important;
position:relative;
}


.overx
{
width:100%; overflow-x:scroll !important;
}
.timetxt
{
font-size:11px !important;
}	
	

.static_heading
{
font-size:20px;
line-height:60px;
text-transform:uppercase !important;
}
.static_subheading
{
font-size:13px;
line-height:30px;
}

.countspace
{
min-width:55px !important;
}
.h1
{
font-size:25px !important;
line-height:30px !important;
}

.slide-text {
top: 35% !important;
}

.fontbtn
{
font-size:10px !important;

}
.mbottom
{
margin-bottom:20px;
}

.subscribetxt
{
padding:4.7px !important;
}
.thisfont
{
font-size:19px;
}
.thislineheight
{
line-height:28px;
}

.panel-body
{
border:0px !important;
}
.margintop20
{
margin-top:20px !important;
}

.padding-5
{
padding:0px !important;
}


.poptitle
{
margin-top:10px !important;
}

.paddingleftoff
{
padding:0px !important;
}
.paddingrightoff
{
padding:0px !important;
}

.paddingleft10rightoff
	{
	padding-left:0px !important;
	padding-right:0px !important;
	}

.mobbottom
{
margin-bottom:30px !important;
clear:both !important;
}
.width100
{
width:100% !important;
}
.form-control
{
display:inline-block !important;
}
.contactform .row
{


}

.marginbm
{
margin-bottom:10px;
}

ul.countdown li {
padding:0px !important;


}


ul.countdown li.seperator
{
margin-left:1px !important;
margin-right:1px !important;
padding:0px !important;
}

.floatnone
{
float:none !important;
width:100% !important;
}

#header .hides {
				display: none;
			}
.pagetitle
	{
	position:absolute;
	text-align:center;
	top:75px !important;
	width:100%;
	}
	.pagetitle h1
	{
	top:20px !important;
	position:relative;
	}

#overlays {
      position:absolute;
      top: 0;
      left: 0;
     
      width: 100%;
	  height:200px !important;
	  
      
      background-color: rgba(0, 0, 0, 0.5);
     
    }
	.bannerheight
	{
		min-height:200px !important;
	}
	
	.pagebaner
	{
	 min-height:200px !important;
	}
	#pagelays {
      position:absolute;
      top: 0;
      left: 0;
     
      width: 100%;
	  height:200px !important;
	  
      
      background-color: rgba(0, 0, 0, 0.5);
     
    }
	
	
	.m-center
	{
	text-align:center !important;
	
	}
	.samplegalery .row > *
	{
	float:none;
	margin:0 auto !important;
	
	}
	.m-center .img-responsive
	{
	display:inline-block !important;
	}

}


#booking .close
{
opacity:1 !important;
}

.btns
{
color:#000 !important;

}

.avg_button
{
color: <?php echo $color_setts[0]->link_color;?> !important;
    font-weight: 400;
    font-size: 13px;
    line-height: 15px;
    margin-right: 10px;
    text-align: center;
    padding: 17px 30px;
    white-space: nowrap;
    letter-spacing: 1px;
    display: inline-block;
    border: none;
    text-transform: uppercase;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
    transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
	background:<?php echo $color_setts[0]->button_color;?>;

}
.avg_button:hover
{
background:<?php echo $color_setts[0]->button_color;?> !important;
text-decoration:none;
opacity:0.9;
color: <?php echo $color_setts[0]->link_color;?> !important;
}

.avg_white_button
{
color: #fff;
    font-weight: 400;
    font-size: 13px;
    line-height: 15px;
    margin-right: 10px;
    text-align: center;
    padding: 17px 30px;
    white-space: nowrap;
    letter-spacing: 1px;
    display: inline-block;
    border: none;
    text-transform: uppercase;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
    transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
	background:transparent;
	border-radius:50px;
	border:2px solid #fff;

}

.avg_white_button:hover,.avg_white_button:focus
{

color: #fff !important;
text-decoration:none !important;
}

.avg_small_border_button
{

    font-weight: 400;
    font-size: 13px;
    line-height: 15px;
    margin-right: 10px;
    text-align: center;
    padding: 10px 20px;
    white-space: nowrap;
    letter-spacing: 1px;
    display: inline-block;
    border:1px solid <?php echo $color_setts[0]->button_color;?>;
    text-transform: uppercase;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
    transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
	background:#ffffff;
	color:<?php echo $color_setts[0]->button_color;?> !important;

}
.avg_small_border_button:hover
{
background:<?php echo $color_setts[0]->button_color;?> !important;
text-decoration:none;
opacity:0.9;
color: <?php echo $color_setts[0]->link_color;?> !important;
}




.avg_big_button
{
color: <?php echo $color_setts[0]->link_color;?> !important;
    font-weight: 400;
    font-size: 13px;
    line-height: 15px;
    margin-right: 10px;
    text-align: center;
    padding: 20px 30px;
    white-space: nowrap;
    letter-spacing: 1px;
    display: inline-block;
    border: none;
    text-transform: uppercase;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
    transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
	background:<?php echo $color_setts[0]->button_color;?>;

}
.avg_big_button:hover
{
background:<?php echo $color_setts[0]->button_color;?> !important;
text-decoration:none;
opacity:0.9;
color: <?php echo $color_setts[0]->link_color;?> !important;
}





.avg_small_button
{
color: <?php echo $color_setts[0]->link_color;?> !important;
    font-weight: 400;
    font-size: 13px;
    line-height: 15px;
    margin-right: 10px;
    text-align: center;
    padding: 15px 20px;
    white-space: nowrap;
    letter-spacing: 1px;
    display: inline-block;
    border: none;
    text-transform: uppercase;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
    transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
	background:<?php echo $color_setts[0]->button_color;?>;

}
.avg_small_button:hover
{
background:<?php echo $color_setts[0]->button_color;?> !important;
text-decoration:none;
opacity:0.9;
color: <?php echo $color_setts[0]->link_color;?> !important;
}


.radiusoff
{
border-radius:0px !important;
}


.avg_very_small_button
{
color: <?php echo $color_setts[0]->link_color;?> !important;
    font-weight: 400;
    font-size: 13px;
    line-height: 15px;
    margin-right: 10px;
    text-align: center;
    padding: 10px 10px;
    white-space: nowrap;
    letter-spacing: 1px;
    display: inline-block;
    border: none;
    text-transform: uppercase;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
    transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
	background:<?php echo $color_setts[0]->button_color;?>;
    outline: none !important;
}
.avg_very_small_button:hover
{
background:<?php echo $color_setts[0]->button_color;?> !important;
text-decoration:none;
opacity:0.9;
color: <?php echo $color_setts[0]->link_color;?> !important;
outline: none !important;
}













.padding-5
{
padding:5px !important;
}

.gallery-item a
{
display: block;
    line-height: 0;
    overflow: hidden;
}

.gallery-item a img
{
-webkit-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
}

.gallery-item a img:hover
{
-webkit-transform: scale(1.2);
          transform: scale(1.2);
}

.control-round .carousel-control {
    top: 47%;
    opacity: 0;
    width: 45px;
    height: 45px;
    z-index: 100;
    color: #ffffff;
    display: block;
    font-size: 24px;
    cursor: pointer;
    overflow: hidden;
    line-height: 43px;
    text-shadow: none;
    position: absolute;
    font-weight: normal;
    background: <?php echo $color_setts[0]->button_color;?> !important;
    -webkit-border-radius: 100px;
    border-radius: 100px;
	border:1px solid <?php echo $color_setts[0]->button_color;?> !important;
}

.sermon
{
	background: url(<?php echo $url;?>/local/images/settings/<?php echo $setts[0]->sermon_bg;?>) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  height:100%;
  
}


.testimonials
{
	background: url(<?php echo $url;?>/local/images/settings/<?php echo $setts[0]->testimonial_bg;?>) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  height:100%;
  
}

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
		
	}
	
	body
	{
	font-family: <?php echo $color_setts[0]->body_font;?>, sans-serif !important;
	font-size:<?php echo $color_setts[0]->font_size;?>px !important;
	}
	
	.subscribetxt
	{
	background:#000 !important;
	opacity:0.2;
	border:1px solid #fff !important;
	color:#fff !important;
	line-height:39px;
	height:39px;
	width:auto;
	color:#ffffff !important;
	}
	.newsletter .submit
	{
	height:38px;
	line-height:30px;
	color:#fff;
	border:1px solid #fff;
	font-size:14px;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	}
	.m-top
	{
	margin-top:10px;
	}
	.ms-top
	{
     margin-top:1px;
	}
	.footer
	{
	background:#34495e;
	padding:50px 50px;
	}
	.copyright
	{
	background:#2c3e50;
	padding:10px;
	border-top:1px solid #2c3e50;
	}
	
	
	.m-bottom
	{
	margin-bottom:50px;
	}
	
	#overlays {
      position:absolute;
      top: 0;
      left: 0;
     
      width: 100%;
	  height:430px;
	  
      
      background-color: rgba(0, 0, 0, 0.5);
     
    }
	.clear
	{
	clear:both;
	
	}
	.height5
	{
	height:5px;
	}
	.height7
	{
	height:7px;
	}
	.height8
	{
	height:8px;
	}
	.height10
	{
	height:10px;
	}
	.height20
	{
	height:20px;
	}
	.height30
	{
	height:30px;
	}
	.height40
	{
	height:40px;
	}
	.height50
	{
	height:50px;
	}
	.height60
	{
	height:60px;
	}
	.height70
	{
	height:70px;
	}
	.height80
	{
	height:80px;
	}
	.height90
	{
	height:90px;
	}
	.height100
	{
	height:100px;
	}
	
	
	.pagebaner
	{
	 min-height:300px;
	}
	#pagelays {
      position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.60);
     
    }
	
	.bannerheight
	{
		min-height:430px;
	}
	.text-center
	{
	text-align:center !important;
	}
	.themecolor
	{
     color:<?php echo $color_setts[0]->theme_color;?> !important;
	}
	.themebg
	{
     background:<?php echo $color_setts[0]->theme_color;?> !important;
	}
	.relative
	{
	position:relative !important;
	}
	.absolute
	{
	position:absolute !important;
	}
	.top5
	{
	top:2px !important;
	position:relative;
	}
	.top10
	{
	top:10px !important;
	}
	.bottom0
	{
	bottom:0px !important;
	}
	
	.black
	{
	color:#000000;
	}
	.white
	{
	color:#fff;
	}
	.text_normal
	{
	font-style:normal;
	}
	.round
	{
	border-radius:50%;
	-webkit-border-radius:50%;
	}
	.white_ash
	{
	  color:#CCCCCC;
	}
	.white_ash:hover
	{
	text-decoration:none;
	color:#CCCCCC;
	}
	.white_ash:focus
	{
	text-decoration:none;
	color:#CCCCCC !important;
	}
	.list ul li a
	{
	font-family: <?php echo $color_setts[0]->list_font;?>, sans-serif !important;
	font-size:<?php echo $color_setts[0]->list_font_size;?>px !important;
	line-height:32px !important;
	}
	.followlist ul li
	{
	list-style:none;
	display:inline-block;
	margin-left:2px;
	margin-right:2px;
	}
	
	.uppercase
	{
	text-transform:uppercase !important;
	}
	.bold
	{
	font-weight:bold !important;
	}
	.ash
	{
	color:#7C8081;
	}
	.paddingoff
	{
	padding:0px !important;
	}
	.paddingleft10rightoff
	{
	padding-left:10px !important;
	padding-right:0px !important;
	}
	
	.marginbottom10
	{
	margin-bottom:10px;
	}
	.marginbottom20
	{
	margin-bottom:20px;
	}
	
	.h1
	{
	font-family: <?php echo $color_setts[0]->heading1;?>, sans-serif !important;
	font-size: <?php echo $color_setts[0]->head_font1;?>px;
	line-height: <?php echo $color_setts[0]->head_font1;?>px;
	}
	
	
	.h2
	{
	font-family: <?php echo $color_setts[0]->heading2;?>, sans-serif !important;
	font-size: <?php echo $color_setts[0]->head_font2;?>px !important;
	line-height: <?php echo $color_setts[0]->head_font2;?>px !important;
	}
	
	.h3
	{
	font-family: <?php echo $color_setts[0]->heading3;?>, sans-serif !important;
	font-size: <?php echo $color_setts[0]->head_font3;?>px !important;
	line-height: <?php echo $color_setts[0]->head_font3;?>px !important;
	}
	
	.h4
	{
	font-family: <?php echo $color_setts[0]->heading4;?>, sans-serif !important;
	font-size: <?php echo $color_setts[0]->head_font4;?>px !important;
	line-height: <?php echo $color_setts[0]->head_font4;?>px !important;
	}
	
	
	.h5
	{
	font-family: <?php echo $color_setts[0]->heading5;?>, sans-serif !important;
	font-size: <?php echo $color_setts[0]->head_font5;?>px !important;
	line-height: <?php echo $color_setts[0]->head_font5;?>px !important;
	}
	
	
	
	.h6
	{
	font-family: <?php echo $color_setts[0]->heading6;?>, sans-serif !important;
	font-size: <?php echo $color_setts[0]->head_font6;?>px !important;
	line-height: <?php echo $color_setts[0]->head_font6;?>px !important;
	}
	
	
	.para
	{
	font-family: <?php echo $color_setts[0]->paragraph;?>, sans-serif !important;
	font-size: <?php echo $color_setts[0]->para_font_size;?>px !important;
	line-height: <?php echo $color_setts[0]->paragraph;?>px !important;
	}
	
	.whitebox
	{
	background:#fff;
	
	}
	.address
	{
	padding:10px 12px 15px 12px;
	}
	.phone
	{
	padding:12px 12px 13px 12px;
	}
	
	
	
	.sermonicon ul li
	{
	list-style:none;
	    display: inline-block;
    margin-left: 10px;
    text-align: center;
    position: relative;
	
	}
	.sermonicon ul li a
	{
	border: 1px solid #000000;
    color: #000000;
	display: block;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 30px;
	font-weight:normal;
	}
	.sermonicon ul li a:hover
	{
	text-decoration:none;
	}
	.sermonicon ul li a:focus
	{
	text-decoration:none;
	}
	
	
	
	
	
	
	.stafficon ul li
	{
	list-style:none;
	    display: inline-block !important;
    
	padding-left:3px !important;
	padding-right:3px !important;
    text-align: center;
    position: relative;
	margin-top:-5px !important;
	
	
	}
	.stafficon ul li a
	{
	border: 1px solid #000000;
    color: #000000;
	display: block;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    font-size: 16px;
	font-weight:normal;
	}
	.stafficon ul li a:hover
	{
	text-decoration:none;
	color:#fff !important;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	border: 1px solid <?php echo $color_setts[0]->theme_color;?> !important;
	}
	.stafficon ul li a:focus
	{
	text-decoration:none;
	color:#fff !important;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	.single_sermonicon ul li
	{
	list-style:none;
	    display: inline-block;
    margin-left: 10px;
    text-align: center;
    position: relative;
	
	}
	.single_sermonicon ul li a
	{
	border: 1px solid <?php echo $color_setts[0]->theme_color;?> !important;
    color: #fff;
	display: block;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 30px;
	font-weight:normal;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	}
	.single_sermonicon ul li a:hover
	{
	text-decoration:none;
	}
	.single_sermonicon ul li a:focus
	{
	text-decoration:none;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	.gallerybox
	{
	overflow:hidden;
	
	}
	
	.postbox
	{
	border:1px solid #F3F3F3;
	border-top:none;
	padding:10px;
	
	}
	.postbg:hover
	{
	opacity:0.5;
	}
	
	.bide
	{
	
	
	
	
	
	
	}
	
	.spacer {
    border:1px solid #F3F3F3;
    margin: 0px;
	padding:20px;
}
	
	.center-cropped {
  width: 100px;
  height: 100px;
  background-position: center center;
  background-repeat: no-repeat;
  overflow: hidden;
}


.center-cropped img {
  min-height: 100%;
  min-width: 100%;
  /* IE 8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  /* IE 5-7 */
  filter: alpha(opacity=1);
  /* modern browsers */
  opacity: 1;
}
	
	
	.text-left
	{
	text-align:left;
	}
	.text-right
	{
	text-align:right;
	}
	.small
	{
	font-size:13px !important;
	}
	.newsletter
	{
	
    background-color: <?php echo $color_setts[0]->theme_color;?> !important;
    color: #FFF;
    padding: 40px 0;

	}
	
	
			#fade-quote-carousel.carousel {
		  padding-bottom: 60px;
		}
		#fade-quote-carousel.carousel .carousel-inner .item {
		  opacity: 0;
		  -webkit-transition-property: opacity;
			  -ms-transition-property: opacity;
				  transition-property: opacity;
		}
		#fade-quote-carousel.carousel .carousel-inner .active {
		  opacity: 1;
		  -webkit-transition-property: opacity;
			  -ms-transition-property: opacity;
				  transition-property: opacity;
		}
		#fade-quote-carousel.carousel .carousel-indicators {
		  bottom: 10px;
		}
		#fade-quote-carousel.carousel .carousel-indicators > li {
		  background-color: <?php echo $color_setts[0]->theme_color;?> !important;
		  border: none;
		  
		}
		#fade-quote-carousel blockquote {
			text-align: center;
			border: none;
		}
		#fade-quote-carousel .profile-circle {
			width: 100px;
			height: 100px;
			margin: 0 auto;
			border-radius: 100px;
		}
	

	article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
		display: block;
	}

	body {
		line-height: 1;
	}

	ol, ul {
		list-style: none;
	}

	blockquote, q {
		quotes: none;
	}

	blockquote:before, blockquote:after, q:before, q:after {
		content: '';
		content: none;
	}

	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	body {
		-webkit-text-size-adjust: none;
	}



	*, *:before, *:after {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}


	.container {
		margin-left: auto;
		margin-right: auto;
	}

	.container.\31 25\25 {
		width: 100%;
		max-width: 1750px;
		min-width: 1400px;
	}

	.container.\37 5\25 {
		width: 1050px;
	}

	.container.\35 0\25 {
		width: 700px;
	}

	.container.\32 5\25 {
		width: 350px;
	}

	.container {
		width: 1400px;
	}

	@media screen and (max-width: 1680px) {

		.container.\31 25\25 {
			width: 100%;
			max-width: 1500px;
			min-width: 1200px;
		}

		.container.\37 5\25 {
			width: 900px;
		}

		.container.\35 0\25 {
			width: 600px;
		}

		.container.\32 5\25 {
			width: 300px;
		}

		.container {
			width: 1200px;
		}

	}
	
	
	@media only screen 
and (min-device-width : 1199px) 
and (max-device-width : 1920px)  {
.countspace
{
min-width:70px;
}
#header:not(.alt) img
		{
		  margin-top:6px !important;
		}

.slide-text {
top: 25% !important;
}


.marginleft10
{
margin-left:10px;
}
.marginleft20
{
margin-left:20px;
}
.marginleft30
{
margin-left:30px;
}

#header .container
{
 width:100% !important;
}

.rightborder
	{
	 border-right:1px solid #ccc;
	 margin-top:10px;
	 margin-bottom:10px;
	 min-height:175px;
	 
	}
	.pagetitle
	{
	position:absolute;
	text-align:center;
	top:180px;
	width:100%;
	}

}
	

	@media screen and (max-width: 1280px) {
        
		.container.\31 25\25 {
			width: 100%;
			max-width: 1200px;
			min-width: 960px;
		}

		.container.\37 5\25 {
			width: 720px;
		}

		.container.\35 0\25 {
			width: 480px;
		}

		.container.\32 5\25 {
			width: 240px;
		}

		.container {
			width: 1024px;
		}

	}

	@media screen and (max-width: 980px) {

		.container.\31 25\25 {
			width: 100%;
			max-width: 118.75%;
			min-width: 95%;
		}

		.container.\37 5\25 {
			width: 71.25%;
		}

		.container.\35 0\25 {
			width: 47.5%;
		}

		.container.\32 5\25 {
			width: 23.75%;
		}

		.container {
			width: 95%;
		}

	}

	@media screen and (max-width: 840px) {
	
	.floatnone
{
float:none !important;
width:100% !important;
}
	

#header .hides
{
display:none;
}

		.container.\31 25\25 {
			width: 100%;
			max-width: 118.75%;
			min-width: 95%;
		}

		.container.\37 5\25 {
			width: 71.25%;
		}

		.container.\35 0\25 {
			width: 47.5%;
		}

		.container.\32 5\25 {
			width: 23.75%;
		}

		.container {
			width: 95% !important;
		}

	}

	@media screen and (max-width: 736px) {

		.container.\31 25\25 {
			width: 100%;
			max-width: 125%;
			min-width: 100%;
		}

		.container.\37 5\25 {
			width: 75%;
		}

		.container.\35 0\25 {
			width: 50%;
		}

		.container.\32 5\25 {
			width: 25%;
		}

		.container {
			width: 100% !important;
		}

	}



	.row {
		border-bottom: solid 1px transparent;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	.row > * {
		float: left;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}

	.row:after, .row:before {
		content: '';
		display: block;
		clear: both;
		height: 0;
	}

	.row.uniform > * > :first-child {
		margin-top: 0;
	}

	.row.uniform > * > :last-child {
		margin-bottom: 0;
	}

	.row.\30 \25 > * {
		padding: 0px 0 0 0px;
	}

	.row.\30 \25 {
		margin: 0px 0 -1px 0px;
	}

	.row.uniform.\30 \25 > * {
		padding: 0px 0 0 0px;
	}

	.row.uniform.\30 \25 {
		margin: 0px 0 -1px 0px;
	}

	.row > * {
		padding: 50px 0 0 50px;
	}

	.row {
		margin: -50px 0 -1px -50px;
	}

	.row.uniform > * {
		padding: 50px 0 0 50px;
	}

	.row.uniform {
		margin: -50px 0 -1px -50px;
	}

	.row.\32 00\25 > * {
		padding: 100px 0 0 100px;
	}

	.row.\32 00\25 {
		margin: -100px 0 -1px -100px;
	}

	.row.uniform.\32 00\25 > * {
		padding: 100px 0 0 100px;
	}

	.row.uniform.\32 00\25 {
		margin: -100px 0 -1px -100px;
	}

	.row.\31 50\25 > * {
		padding: 75px 0 0 75px;
	}

	.row.\31 50\25 {
		margin: -75px 0 -1px -75px;
	}

	.row.uniform.\31 50\25 > * {
		padding: 75px 0 0 75px;
	}

	.row.uniform.\31 50\25 {
		margin: -75px 0 -1px -75px;
	}

	.row.\35 0\25 > * {
		padding: 25px 0 0 25px;
	}

	.row.\35 0\25 {
		margin: -25px 0 -1px -25px;
	}

	.row.uniform.\35 0\25 > * {
		padding: 25px 0 0 25px;
	}

	.row.uniform.\35 0\25 {
		margin: -25px 0 -1px -25px;
	}

	.row.\32 5\25 > * {
		padding: 12.5px 0 0 12.5px;
	}

	.row.\32 5\25 {
		margin: -12.5px 0 -1px -12.5px;
	}

	.row.uniform.\32 5\25 > * {
		padding: 12.5px 0 0 12.5px;
	}

	.row.uniform.\32 5\25 {
		margin: -12.5px 0 -1px -12.5px;
	}

	.\31 2u, .\31 2u\24 {
		width: 100%;
		clear: none;
		margin-left: 0;
	}

	.\31 1u, .\31 1u\24 {
		width: 91.6666666667%;
		clear: none;
		margin-left: 0;
	}

	.\31 0u, .\31 0u\24 {
		width: 83.3333333333%;
		clear: none;
		margin-left: 0;
	}

	.\39 u, .\39 u\24 {
		width: 75%;
		clear: none;
		margin-left: 0;
	}

	.\38 u, .\38 u\24 {
		width: 66.6666666667%;
		clear: none;
		margin-left: 0;
	}

	.\37 u, .\37 u\24 {
		width: 58.3333333333%;
		clear: none;
		margin-left: 0;
	}

	.\36 u, .\36 u\24 {
		width: 50%;
		clear: none;
		margin-left: 0;
	}

	.\35 u, .\35 u\24 {
		width: 41.6666666667%;
		clear: none;
		margin-left: 0;
	}

	.\34 u, .\34 u\24 {
		width: 33.3333333333%;
		clear: none;
		margin-left: 0;
	}

	.\33 u, .\33 u\24 {
		width: 25%;
		clear: none;
		margin-left: 0;
	}

	.\32 u, .\32 u\24 {
		width: 16.6666666667%;
		clear: none;
		margin-left: 0;
	}

	.\31 u, .\31 u\24 {
		width: 8.3333333333%;
		clear: none;
		margin-left: 0;
	}

	.\31 2u\24 + *,
	.\31 1u\24 + *,
	.\31 0u\24 + *,
	.\39 u\24 + *,
	.\38 u\24 + *,
	.\37 u\24 + *,
	.\36 u\24 + *,
	.\35 u\24 + *,
	.\34 u\24 + *,
	.\33 u\24 + *,
	.\32 u\24 + *,
	.\31 u\24 + * {
		clear: left;
	}

	.\-11u {
		margin-left: 91.66667%;
	}

	.\-10u {
		margin-left: 83.33333%;
	}

	.\-9u {
		margin-left: 75%;
	}

	.\-8u {
		margin-left: 66.66667%;
	}

	.\-7u {
		margin-left: 58.33333%;
	}

	.\-6u {
		margin-left: 50%;
	}

	.\-5u {
		margin-left: 41.66667%;
	}

	.\-4u {
		margin-left: 33.33333%;
	}

	.\-3u {
		margin-left: 25%;
	}

	.\-2u {
		margin-left: 16.66667%;
	}

	.\-1u {
		margin-left: 8.33333%;
	}

	@media screen and (max-width: 1680px) {

		.row > * {
			/*padding: 40px 0 0 40px;*/
		}

		.row {
			margin: -40px 0 -1px -40px;
		}

		.row.uniform > * {
			padding: 40px 0 0 40px;
		}

		.row.uniform {
			margin: -40px 0 -1px -40px;
		}

		.row.\32 00\25 > * {
			padding: 80px 0 0 80px;
		}

		.row.\32 00\25 {
			margin: -80px 0 -1px -80px;
		}

		.row.uniform.\32 00\25 > * {
			padding: 80px 0 0 80px;
		}

		.row.uniform.\32 00\25 {
			margin: -80px 0 -1px -80px;
		}

		.row.\31 50\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.\31 50\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.uniform.\31 50\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.uniform.\31 50\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.\35 0\25 > * {
			padding: 20px 0 0 20px;
		}

		.row.\35 0\25 {
			margin: -20px 0 -1px -20px;
		}

		.row.uniform.\35 0\25 > * {
			padding: 20px 0 0 20px;
		}

		.row.uniform.\35 0\25 {
			margin: -20px 0 -1px -20px;
		}

		.row.\32 5\25 > * {
			padding: 10px 0 0 10px;
		}

		.row.\32 5\25 {
			margin: -10px 0 -1px -10px;
		}

		.row.uniform.\32 5\25 > * {
			padding: 10px 0 0 10px;
		}

		.row.uniform.\32 5\25 {
			margin: -10px 0 -1px -10px;
		}

		.\31 2u\28wide\29, .\31 2u\24\28wide\29 {
			width: 100%;
			clear: none;
			margin-left: 0;
		}

		.\31 1u\28wide\29, .\31 1u\24\28wide\29 {
			width: 91.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 0u\28wide\29, .\31 0u\24\28wide\29 {
			width: 83.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\39 u\28wide\29, .\39 u\24\28wide\29 {
			width: 75%;
			clear: none;
			margin-left: 0;
		}

		.\38 u\28wide\29, .\38 u\24\28wide\29 {
			width: 66.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\37 u\28wide\29, .\37 u\24\28wide\29 {
			width: 58.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\36 u\28wide\29, .\36 u\24\28wide\29 {
			width: 50%;
			clear: none;
			margin-left: 0;
		}

		.\35 u\28wide\29, .\35 u\24\28wide\29 {
			width: 41.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\34 u\28wide\29, .\34 u\24\28wide\29 {
			width: 33.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\33 u\28wide\29, .\33 u\24\28wide\29 {
			width: 25%;
			clear: none;
			margin-left: 0;
		}

		.\32 u\28wide\29, .\32 u\24\28wide\29 {
			width: 16.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 u\28wide\29, .\31 u\24\28wide\29 {
			width: 8.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\31 2u\24\28wide\29 + *,
		.\31 1u\24\28wide\29 + *,
		.\31 0u\24\28wide\29 + *,
		.\39 u\24\28wide\29 + *,
		.\38 u\24\28wide\29 + *,
		.\37 u\24\28wide\29 + *,
		.\36 u\24\28wide\29 + *,
		.\35 u\24\28wide\29 + *,
		.\34 u\24\28wide\29 + *,
		.\33 u\24\28wide\29 + *,
		.\32 u\24\28wide\29 + *,
		.\31 u\24\28wide\29 + * {
			clear: left;
		}

		.\-11u\28wide\29 {
			margin-left: 91.66667%;
		}

		.\-10u\28wide\29 {
			margin-left: 83.33333%;
		}

		.\-9u\28wide\29 {
			margin-left: 75%;
		}

		.\-8u\28wide\29 {
			margin-left: 66.66667%;
		}

		.\-7u\28wide\29 {
			margin-left: 58.33333%;
		}

		.\-6u\28wide\29 {
			margin-left: 50%;
		}

		.\-5u\28wide\29 {
			margin-left: 41.66667%;
		}

		.\-4u\28wide\29 {
			margin-left: 33.33333%;
		}

		.\-3u\28wide\29 {
			margin-left: 25%;
		}

		.\-2u\28wide\29 {
			margin-left: 16.66667%;
		}

		.\-1u\28wide\29 {
			margin-left: 8.33333%;
		}

	}

	@media screen and (max-width: 1280px) {

		.row > * {
			padding: 40px 0 0 40px;
		}

		.row {
			margin: -40px 0 -1px -40px;
		}

		.row.uniform > * {
			padding: 40px 0 0 40px;
		}

		.row.uniform {
			margin: -40px 0 -1px -40px;
		}

		.row.\32 00\25 > * {
			padding: 80px 0 0 80px;
		}

		.row.\32 00\25 {
			margin: -80px 0 -1px -80px;
		}

		.row.uniform.\32 00\25 > * {
			padding: 80px 0 0 80px;
		}

		.row.uniform.\32 00\25 {
			margin: -80px 0 -1px -80px;
		}

		.row.\31 50\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.\31 50\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.uniform.\31 50\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.uniform.\31 50\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.\35 0\25 > * {
			padding: 20px 0 0 20px;
		}

		.row.\35 0\25 {
			margin: -20px 0 -1px -20px;
		}

		.row.uniform.\35 0\25 > * {
			padding: 20px 0 0 20px;
		}

		.row.uniform.\35 0\25 {
			margin: -20px 0 -1px -20px;
		}

		.row.\32 5\25 > * {
			padding: 10px 0 0 10px;
		}

		.row.\32 5\25 {
			margin: -10px 0 -1px -10px;
		}

		.row.uniform.\32 5\25 > * {
			padding: 10px 0 0 10px;
		}

		.row.uniform.\32 5\25 {
			margin: -10px 0 -1px -10px;
		}

		.\31 2u\28normal\29, .\31 2u\24\28normal\29 {
			width: 100%;
			clear: none;
			margin-left: 0;
		}

		.\31 1u\28normal\29, .\31 1u\24\28normal\29 {
			width: 91.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 0u\28normal\29, .\31 0u\24\28normal\29 {
			width: 83.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\39 u\28normal\29, .\39 u\24\28normal\29 {
			width: 75%;
			clear: none;
			margin-left: 0;
		}

		.\38 u\28normal\29, .\38 u\24\28normal\29 {
			width: 66.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\37 u\28normal\29, .\37 u\24\28normal\29 {
			width: 58.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\36 u\28normal\29, .\36 u\24\28normal\29 {
			width: 50%;
			clear: none;
			margin-left: 0;
		}

		.\35 u\28normal\29, .\35 u\24\28normal\29 {
			width: 41.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\34 u\28normal\29, .\34 u\24\28normal\29 {
			width: 33.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\33 u\28normal\29, .\33 u\24\28normal\29 {
			width: 25%;
			clear: none;
			margin-left: 0;
		}

		.\32 u\28normal\29, .\32 u\24\28normal\29 {
			width: 16.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 u\28normal\29, .\31 u\24\28normal\29 {
			width: 8.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\31 2u\24\28normal\29 + *,
		.\31 1u\24\28normal\29 + *,
		.\31 0u\24\28normal\29 + *,
		.\39 u\24\28normal\29 + *,
		.\38 u\24\28normal\29 + *,
		.\37 u\24\28normal\29 + *,
		.\36 u\24\28normal\29 + *,
		.\35 u\24\28normal\29 + *,
		.\34 u\24\28normal\29 + *,
		.\33 u\24\28normal\29 + *,
		.\32 u\24\28normal\29 + *,
		.\31 u\24\28normal\29 + * {
			clear: left;
		}

		.\-11u\28normal\29 {
			margin-left: 91.66667%;
		}

		.\-10u\28normal\29 {
			margin-left: 83.33333%;
		}

		.\-9u\28normal\29 {
			margin-left: 75%;
		}

		.\-8u\28normal\29 {
			margin-left: 66.66667%;
		}

		.\-7u\28normal\29 {
			margin-left: 58.33333%;
		}

		.\-6u\28normal\29 {
			margin-left: 50%;
		}

		.\-5u\28normal\29 {
			margin-left: 41.66667%;
		}

		.\-4u\28normal\29 {
			margin-left: 33.33333%;
		}

		.\-3u\28normal\29 {
			margin-left: 25%;
		}

		.\-2u\28normal\29 {
			margin-left: 16.66667%;
		}

		.\-1u\28normal\29 {
			margin-left: 8.33333%;
		}

	}

	@media screen and (max-width: 980px) {

		.row > * {
			padding: 30px 0 0 30px;
		}

		.row {
			margin: -30px 0 -1px -30px;
		}

		.row.uniform > * {
			padding: 30px 0 0 30px;
		}

		.row.uniform {
			margin: -30px 0 -1px -30px;
		}

		.row.\32 00\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.\32 00\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.uniform.\32 00\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.uniform.\32 00\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.\31 50\25 > * {
			padding: 45px 0 0 45px;
		}

		.row.\31 50\25 {
			margin: -45px 0 -1px -45px;
		}

		.row.uniform.\31 50\25 > * {
			padding: 45px 0 0 45px;
		}

		.row.uniform.\31 50\25 {
			margin: -45px 0 -1px -45px;
		}

		.row.\35 0\25 > * {
			padding: 15px 0 0 15px;
		}

		.row.\35 0\25 {
			margin: -15px 0 -1px -15px;
		}

		.row.uniform.\35 0\25 > * {
			padding: 15px 0 0 15px;
		}

		.row.uniform.\35 0\25 {
			margin: -15px 0 -1px -15px;
		}

		.row.\32 5\25 > * {
			padding: 7.5px 0 0 7.5px;
		}

		.row.\32 5\25 {
			margin: -7.5px 0 -1px -7.5px;
		}

		.row.uniform.\32 5\25 > * {
			padding: 7.5px 0 0 7.5px;
		}

		.row.uniform.\32 5\25 {
			margin: -7.5px 0 -1px -7.5px;
		}

		.\31 2u\28narrow\29, .\31 2u\24\28narrow\29 {
			width: 100%;
			clear: none;
			margin-left: 0;
		}

		.\31 1u\28narrow\29, .\31 1u\24\28narrow\29 {
			width: 91.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 0u\28narrow\29, .\31 0u\24\28narrow\29 {
			width: 83.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\39 u\28narrow\29, .\39 u\24\28narrow\29 {
			width: 75%;
			clear: none;
			margin-left: 0;
		}

		.\38 u\28narrow\29, .\38 u\24\28narrow\29 {
			width: 66.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\37 u\28narrow\29, .\37 u\24\28narrow\29 {
			width: 58.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\36 u\28narrow\29, .\36 u\24\28narrow\29 {
			width: 50%;
			clear: none;
			margin-left: 0;
		}

		.\35 u\28narrow\29, .\35 u\24\28narrow\29 {
			width: 41.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\34 u\28narrow\29, .\34 u\24\28narrow\29 {
			width: 33.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\33 u\28narrow\29, .\33 u\24\28narrow\29 {
			width: 25%;
			clear: none;
			margin-left: 0;
		}

		.\32 u\28narrow\29, .\32 u\24\28narrow\29 {
			width: 16.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 u\28narrow\29, .\31 u\24\28narrow\29 {
			width: 8.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\31 2u\24\28narrow\29 + *,
		.\31 1u\24\28narrow\29 + *,
		.\31 0u\24\28narrow\29 + *,
		.\39 u\24\28narrow\29 + *,
		.\38 u\24\28narrow\29 + *,
		.\37 u\24\28narrow\29 + *,
		.\36 u\24\28narrow\29 + *,
		.\35 u\24\28narrow\29 + *,
		.\34 u\24\28narrow\29 + *,
		.\33 u\24\28narrow\29 + *,
		.\32 u\24\28narrow\29 + *,
		.\31 u\24\28narrow\29 + * {
			clear: left;
		}

		.\-11u\28narrow\29 {
			margin-left: 91.66667%;
		}

		.\-10u\28narrow\29 {
			margin-left: 83.33333%;
		}

		.\-9u\28narrow\29 {
			margin-left: 75%;
		}

		.\-8u\28narrow\29 {
			margin-left: 66.66667%;
		}

		.\-7u\28narrow\29 {
			margin-left: 58.33333%;
		}

		.\-6u\28narrow\29 {
			margin-left: 50%;
		}

		.\-5u\28narrow\29 {
			margin-left: 41.66667%;
		}

		.\-4u\28narrow\29 {
			margin-left: 33.33333%;
		}

		.\-3u\28narrow\29 {
			margin-left: 25%;
		}

		.\-2u\28narrow\29 {
			margin-left: 16.66667%;
		}

		.\-1u\28narrow\29 {
			margin-left: 8.33333%;
		}

	}

	@media screen and (max-width: 840px) {

		.row > * {
			padding: 30px 0 0 30px;
		}

		.row {
			margin: -30px 0 -1px -30px;
		}

		.row.uniform > * {
			padding: 30px 0 0 30px;
		}

		.row.uniform {
			margin: -30px 0 -1px -30px;
		}

		.row.\32 00\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.\32 00\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.uniform.\32 00\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.uniform.\32 00\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.\31 50\25 > * {
			padding: 45px 0 0 45px;
		}

		.row.\31 50\25 {
			margin: -45px 0 -1px -45px;
		}

		.row.uniform.\31 50\25 > * {
			padding: 45px 0 0 45px;
		}

		.row.uniform.\31 50\25 {
			margin: -45px 0 -1px -45px;
		}

		.row.\35 0\25 > * {
			padding: 15px 0 0 15px;
		}

		.row.\35 0\25 {
			margin: -15px 0 -1px -15px;
		}

		.row.uniform.\35 0\25 > * {
			padding: 15px 0 0 15px;
		}

		.row.uniform.\35 0\25 {
			margin: -15px 0 -1px -15px;
		}

		.row.\32 5\25 > * {
			padding: 7.5px 0 0 7.5px;
		}

		.row.\32 5\25 {
			margin: -7.5px 0 -1px -7.5px;
		}

		.row.uniform.\32 5\25 > * {
			padding: 7.5px 0 0 7.5px;
		}

		.row.uniform.\32 5\25 {
			margin: -7.5px 0 -1px -7.5px;
		}

		.\31 2u\28avigher\29, .\31 2u\24\28avigher\29 {
			width: 100%;
			clear: none;
			margin-left: 0;
		}

		.\31 1u\28avigher\29, .\31 1u\24\28avigher\29 {
			width: 91.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 0u\28avigher\29, .\31 0u\24\28avigher\29 {
			width: 83.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\39 u\28avigher\29, .\39 u\24\28avigher\29 {
			width: 75%;
			clear: none;
			margin-left: 0;
		}

		.\38 u\28avigher\29, .\38 u\24\28avigher\29 {
			width: 66.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\37 u\28avigher\29, .\37 u\24\28avigher\29 {
			width: 58.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\36 u\28avigher\29, .\36 u\24\28avigher\29 {
			width: 50%;
			clear: none;
			margin-left: 0;
		}

		.\35 u\28avigher\29, .\35 u\24\28avigher\29 {
			width: 41.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\34 u\28avigher\29, .\34 u\24\28avigher\29 {
			width: 33.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\33 u\28avigher\29, .\33 u\24\28avigher\29 {
			width: 25%;
			clear: none;
			margin-left: 0;
		}

		.\32 u\28avigher\29, .\32 u\24\28avigher\29 {
			width: 16.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 u\28avigher\29, .\31 u\24\28avigher\29 {
			width: 8.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\31 2u\24\28avigher\29 + *,
		.\31 1u\24\28avigher\29 + *,
		.\31 0u\24\28avigher\29 + *,
		.\39 u\24\28avigher\29 + *,
		.\38 u\24\28avigher\29 + *,
		.\37 u\24\28avigher\29 + *,
		.\36 u\24\28avigher\29 + *,
		.\35 u\24\28avigher\29 + *,
		.\34 u\24\28avigher\29 + *,
		.\33 u\24\28avigher\29 + *,
		.\32 u\24\28avigher\29 + *,
		.\31 u\24\28avigher\29 + * {
			clear: left;
		}

		.\-11u\28avigher\29 {
			margin-left: 91.66667%;
		}

		.\-10u\28avigher\29 {
			margin-left: 83.33333%;
		}

		.\-9u\28avigher\29 {
			margin-left: 75%;
		}

		.\-8u\28avigher\29 {
			margin-left: 66.66667%;
		}

		.\-7u\28avigher\29 {
			margin-left: 58.33333%;
		}

		.\-6u\28avigher\29 {
			margin-left: 50%;
		}

		.\-5u\28avigher\29 {
			margin-left: 41.66667%;
		}

		.\-4u\28avigher\29 {
			margin-left: 33.33333%;
		}

		.\-3u\28avigher\29 {
			margin-left: 25%;
		}

		.\-2u\28avigher\29 {
			margin-left: 16.66667%;
		}

		.\-1u\28avigher\29 {
			margin-left: 8.33333%;
		}

	}

	@media screen and (max-width: 736px) {

		.row > * {
			padding: 30px 0 0 30px;
		}

		.row {
			margin: -30px 0 -1px -30px;
		}

		.row.uniform > * {
			padding: 30px 0 0 30px;
		}

		.row.uniform {
			margin: -30px 0 -1px -30px;
		}

		.row.\32 00\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.\32 00\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.uniform.\32 00\25 > * {
			padding: 60px 0 0 60px;
		}

		.row.uniform.\32 00\25 {
			margin: -60px 0 -1px -60px;
		}

		.row.\31 50\25 > * {
			padding: 45px 0 0 45px;
		}

		.row.\31 50\25 {
			margin: -45px 0 -1px -45px;
		}

		.row.uniform.\31 50\25 > * {
			padding: 45px 0 0 45px;
		}

		.row.uniform.\31 50\25 {
			margin: -45px 0 -1px -45px;
		}

		.row.\35 0\25 > * {
			padding: 15px 0 0 15px;
		}

		.row.\35 0\25 {
			margin: -15px 0 -1px -15px;
		}

		.row.uniform.\35 0\25 > * {
			padding: 15px 0 0 15px;
		}

		.row.uniform.\35 0\25 {
			margin: -15px 0 -1px -15px;
		}

		.row.\32 5\25 > * {
			padding: 7.5px 0 0 7.5px;
		}

		.row.\32 5\25 {
			margin: -7.5px 0 -1px -7.5px;
		}

		.row.uniform.\32 5\25 > * {
			padding: 7.5px 0 0 7.5px;
		}

		.row.uniform.\32 5\25 {
			margin: -7.5px 0 -1px -7.5px;
		}

		.\31 2u\28mobile\29, .\31 2u\24\28mobile\29 {
			width: 100%;
			clear: none;
			margin-left: 0;
		}

		.\31 1u\28mobile\29, .\31 1u\24\28mobile\29 {
			width: 91.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 0u\28mobile\29, .\31 0u\24\28mobile\29 {
			width: 83.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\39 u\28mobile\29, .\39 u\24\28mobile\29 {
			width: 75%;
			clear: none;
			margin-left: 0;
		}

		.\38 u\28mobile\29, .\38 u\24\28mobile\29 {
			width: 66.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\37 u\28mobile\29, .\37 u\24\28mobile\29 {
			width: 58.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\36 u\28mobile\29, .\36 u\24\28mobile\29 {
			width: 50%;
			clear: none;
			margin-left: 0;
		}

		.\35 u\28mobile\29, .\35 u\24\28mobile\29 {
			width: 41.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\34 u\28mobile\29, .\34 u\24\28mobile\29 {
			width: 33.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\33 u\28mobile\29, .\33 u\24\28mobile\29 {
			width: 25%;
			clear: none;
			margin-left: 0;
		}

		.\32 u\28mobile\29, .\32 u\24\28mobile\29 {
			width: 16.6666666667%;
			clear: none;
			margin-left: 0;
		}

		.\31 u\28mobile\29, .\31 u\24\28mobile\29 {
			width: 8.3333333333%;
			clear: none;
			margin-left: 0;
		}

		.\31 2u\24\28mobile\29 + *,
		.\31 1u\24\28mobile\29 + *,
		.\31 0u\24\28mobile\29 + *,
		.\39 u\24\28mobile\29 + *,
		.\38 u\24\28mobile\29 + *,
		.\37 u\24\28mobile\29 + *,
		.\36 u\24\28mobile\29 + *,
		.\35 u\24\28mobile\29 + *,
		.\34 u\24\28mobile\29 + *,
		.\33 u\24\28mobile\29 + *,
		.\32 u\24\28mobile\29 + *,
		.\31 u\24\28mobile\29 + * {
			clear: left;
		}

		.\-11u\28mobile\29 {
			margin-left: 91.66667%;
		}

		.\-10u\28mobile\29 {
			margin-left: 83.33333%;
		}

		.\-9u\28mobile\29 {
			margin-left: 75%;
		}

		.\-8u\28mobile\29 {
			margin-left: 66.66667%;
		}

		.\-7u\28mobile\29 {
			margin-left: 58.33333%;
		}

		.\-6u\28mobile\29 {
			margin-left: 50%;
		}

		.\-5u\28mobile\29 {
			margin-left: 41.66667%;
		}

		.\-4u\28mobile\29 {
			margin-left: 33.33333%;
		}

		.\-3u\28mobile\29 {
			margin-left: 25%;
		}

		.\-2u\28mobile\29 {
			margin-left: 16.66667%;
		}

		.\-1u\28mobile\29 {
			margin-left: 8.33333%;
		}

	}



	

		body.is-loading *, body.is-loading *:before, body.is-loading *:after {
			-moz-animation: none !important;
			-webkit-animation: none !important;
			-ms-animation: none !important;
			animation: none !important;
			-moz-transition: none !important;
			-webkit-transition: none !important;
			-ms-transition: none !important;
			transition: none !important;
		}
		

	body, input, select, textarea {
		color: #7c8081;
		
		
		font-weight: 300;
		letter-spacing: 0.025em;
		line-height: 1.75em;
	}

	
		
	
	

	
		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
			color: inherit;
			text-decoration: none;
			border: 0;
		}

	
	hr {
		border-top: solid 1px rgba(124, 128, 129, 0.2);
		border: 0;
		margin-bottom: 1.5em;
	}

	blockquote {
		border-left: solid 0.5em rgba(124, 128, 129, 0.2);
		font-style: italic;
		padding: 1em 0 1em 2em;
	}

    

	section.special, article.special {
		text-align: center;
	}

	header.major {
		padding-bottom: 2em;
	}

	header.special {
		margin-bottom: 5em;
		padding-top: 7em;
		position: relative;
		text-align: center;
	}

		header.special:before, header.special:after {
			border-bottom: solid 1.5px;
			border-top: solid 1.5px;
			content: '';
			height: 7px;
			opacity: 0.1;
			position: absolute;
			top: 1.75em;
			width: 43%;
		}

		header.special:before {
			left: 0;
		}

		header.special:after {
			right: 0;
		}

		header.special h2 {
			margin-bottom: 0;
		}

		header.special h2 + p {
			margin-bottom: 0;
			padding-top: 1.5em;
		}

		header.special .icon {
			cursor: default;
			height: 7em;
			left: 0;
			position: absolute;
			text-align: center;
			top: 1em;
			width: 100%;
		}

			header.special .icon:before {
				font-size: 3.5em;
				opacity: 0.35;
			}

	footer > :last-child {
		margin-bottom: 0;
	}

	footer.major {
		padding-top: 3em;
	}



	

		

	


	.image {
		border: 0;
		position: relative;
	}

		.image:before {
			background: url("images/overlay.png");
			content: '';
			height: 100%;
			left: 0;
			position: absolute;
			top: 0;
			width: 100%;
		}

		.image.fit {
			display: block;
		}

			.image.fit img {
				display: block;
				width: 100%;
			}

		.image.featured {
			display: block;
			margin: 0 0 2em 0;
		}

			.image.featured img {
				display: block;
				width: 100%;
			}



	.icon {
		text-decoration: none;
		position: relative;
	}

		.icon:before {
			-moz-osx-font-smoothing: grayscale;
			-webkit-font-smoothing: antialiased;
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-transform: none !important;
		}

		.icon.circle {
			-moz-transition: all 0.2s ease-in-out;
			-webkit-transition: all 0.2s ease-in-out;
			-ms-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
			border: 0;
			border-radius: 100%;
			display: inline-block;
			font-size: 1.25em;
			height: 2.25em;
			left: 0;
			line-height: 2.25em;
			text-align: center;
			text-decoration: none;
			top: 0;
			width: 2.25em;
		}

			.icon.circle:hover {
				top: -0.2em;
			}

			.icon.circle.fa-twitter {
				background: #70aecd;
				color: #fff;
			}

				.icon.circle.fa-twitter:hover {
					background: #7fb7d2;
				}

			.icon.circle.fa-facebook {
				background: #7490c3;
				color: #fff;
			}

				.icon.circle.fa-facebook:hover {
					background: #829bc9;
				}

			.icon.circle.fa-google-plus {
				background: #db6b67;
				color: #fff;
			}

				.icon.circle.fa-google-plus:hover {
					background: #df7b77;
				}

			.icon.circle.fa-github {
				background: #dcad8b;
				color: #fff;
			}

				.icon.circle.fa-github:hover {
					background: #e1b89b;
				}

			.icon.circle.fa-dribbble {
				background: #da83ae;
				color: #fff;
			}

				.icon.circle.fa-dribbble:hover {
					background: #df93b8;
				}

		.icon.featured {
			cursor: default;
			display: block;
			margin: 0 0 1.5em 0;
			opacity: 0.35;
			text-align: center;
		}

			.icon.featured:before {
				font-size: 5em;
				line-height: 1em;
			}

		.icon > .label {
			display: none;
		}



	ol.default {
		list-style: decimal;
		padding-left: 1.25em;
	}

		ol.default li {
			padding-left: 0.25em;
		}

	ul.default {
		list-style: disc;
		padding-left: 1em;
	}

		ul.default li {
			padding-left: 0.5em;
		}

	ul.icons {
		cursor: default;
	}

		ul.icons li {
			display: inline-block;
			line-height: 1em;
			padding-left: 0.5em;
		}

			ul.icons li:first-child {
				padding-left: 0;
			}

	ul.featured-icons {
		cursor: default;
		margin: -0.75em 0 0 0;
		opacity: 0.35;
		overflow: hidden;
		position: relative;
	}

		ul.featured-icons li {
			display: block;
			float: left;
			text-align: center;
			width: 50%;
		}

			ul.featured-icons li .icon {

				display: inline-block;
				font-size: 6.25em;
				height: 1.25em;
				line-height: 1.25em;
				width: 1em;
			}

	ul.buttons {
		cursor: default;
	}

		ul.buttons:last-child {
			margin-bottom: 0;
		}

		ul.buttons li {
			display: inline-block;
			padding: 0 0 0 1.5em;
		}

			ul.buttons li:first-child {
				padding: 0;
			}

		ul.buttons.vertical li {
			display: block;
			padding: 1.5em 0 0 0;
		}

			ul.buttons.vertical li:first-child {
				padding: 0;
			}



	table {
		width: 100%;
	}

		table.default {
			width: 100%;
		}

			table.default tbody tr {
				border-bottom: solid 1px rgba(124, 128, 129, 0.2);
			}

			table.default td {
				padding: 0.5em 1em 0.5em 1em;
			}

			table.default th {
				font-weight: 400;
				padding: 0.5em 1em 0.5em 1em;
				text-align: left;
			}

			table.default thead {
				background: #7c8081;
				color: #fff;
			}



	

		

		input[type="button"].special,
		input[type="submit"].special,
		input[type="reset"].special,
		.button.special {
			background: #83d3c9;
			border-color: #83d3c9;
			color: #fff !important;
		}

			input[type="button"].special:hover,
			input[type="submit"].special:hover,
			input[type="reset"].special:hover,
			.button.special:hover {
				background: #96dad1 !important;
				border-color: #96dad1 !important;
			}

		input[type="button"].fit,
		input[type="submit"].fit,
		input[type="reset"].fit,
		.button.fit {
			width: 100%;
		}

		input[type="button"].small,
		input[type="submit"].small,
		input[type="reset"].small,
		.button.small {
			font-size: 0.7em;
			min-width: 14em;
			padding: 0.5em 0;
		}



	.wrapper {
		margin-bottom: 5em;
		padding: 5em;
	}

		.wrapper.style1 {
			padding: 0;
		}

		.wrapper.style2 {
			background-color: #83d3c9;
			background-image: url("images/light-bl.svg"), url("images/light-br.svg");
			background-position: bottom left, bottom right;
			background-repeat: no-repeat, no-repeat;
			background-size: 25em, 25em;
			color: #fff;
		}

			.wrapper.style2 .button:hover {
				background: rgba(255, 255, 255, 0.15) !important;
			}

			.wrapper.style2 .button.special {
				background: #fff;
				border-color: #fff;
				color: #83d3c9 !important;
			}

				.wrapper.style2 .button.special:hover {
					border-color: inherit !important;
					color: #fff !important;
				}

		.wrapper.style3 {
			background: #fff;
			color: inherit;
		}

		.wrapper.style4 {
			background: #fff;
			color: inherit;
			padding: 4em;
		}



	@-moz-keyframes reveal-header {
		0% {
			top: -5em;
		}

		100% {
			top: 0;
		}
	}

	@-webkit-keyframes reveal-header {
		0% {
			top: -5em;
		}

		100% {
			top: 0;
		}
	}

	@-ms-keyframes reveal-header {
		0% {
			top: -5em;
		}

		100% {
			top: 0;
		}
	}

	@keyframes reveal-header {
		0% {
			top: -5em;
		}

		100% {
			top: 0;
		}
	}
    
	.blogbg
	{
	box-shadow: 0px 1px 5px 1px rgba(0,0,0,0.2);
	margin-bottom:50px;
	}
	.blogbody
	{
	padding:10px;
	}
	
	
	.calendar{
	
 
	padding-top:5px;
	width:80px;
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	
	font:bold 30px/40px <?php echo $color_setts[0]->body_font;?>, sans-serif !important;
	text-align:center;
	color:#fff;
  
	text-shadow:#fff 0 1px 0;	
		
	position:absolute;
	
	}
	.donatebtn
		{
		
		background:<?php echo $color_setts[0]->button_color;?> !important;
		
		}
		.donatebtn:hover,.donatebtn:focus
		{
		background:<?php echo $color_setts[0]->theme_color;?> !important;
		color:#fff !important;
		}
	

.calendar em{
	display:block;
	font:12px/30px <?php echo $color_setts[0]->body_font;?>, sans-serif !important;
	color:#fff;
	
	border-top:1px solid #fff;	
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	
	text-transform:uppercase;
	
	
	}

.calendar:before, .calendar:after{
	content:'';
	float:left;
	position:absolute;
	top:5px;	
	width:8px;
	height:8px;
	background:#111;
	z-index:1;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	-moz-box-shadow:0 1px 1px #fff;
	-webkit-box-shadow:0 1px 1px #fff;
	box-shadow:0 1px 1px #fff;
	}
.calendar:before{left:11px;}	
.calendar:after{right:11px;}

.calendar em:before, .calendar em:after{
	content:'';
	float:left;
	position:absolute;
	top:-5px;	
	width:4px;
	height:14px;
	background:#dadada;
	background:-webkit-gradient(linear, left top, left bottom, from(#f1f1f1), to(#aaa)); 
	background:-moz-linear-gradient(top,  #f1f1f1,  #aaa); 
	z-index:2;
	-moz-border-radius:2px;
	-webkit-border-radius:2px;
	border-radius:2px;
	}
.calendar em:before{left:13px;}	
.calendar em:after{right:13px;}	
	
	#header {
		background: <?php echo $color_setts[0]->theme_color;?>;
		box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.075);
		color: inherit;
		cursor: default;
		font-size: 0.8em;
		left: 0;
		padding: 0.5em;
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 999;
		opacity:0.9;
	}
	.small_letter
	{
	text-transform:lowercase !important;
	}

		#header h1 {
			font-weight: 900;
			margin: 0;
		}

			#header h1 span {
				font-weight: 300;
			}

		#header nav {
			letter-spacing: 0.075em;
			position: absolute;
			right: 1.5em;
			text-transform: uppercase;
			top: 0.75em;
		}

			#header nav ul li {
				display: inline-block;
				
			}

				#header nav ul li > ul {
					display: none;
					
				}

				#header nav ul li a {
					border: solid 1px transparent;
					color: inherit;
					display: inline-block;
					
					padding: 0.6em 0.75em;
					text-decoration: none;
				}

				#header nav ul li input[type="button"],
				#header nav ul li input[type="submit"],
				#header nav ul li input[type="reset"],
				#header nav ul li .button {
					font-size: 1em;
					min-width: 0;
					width: auto;
				}

				#header nav ul li.submenu > a {
					text-decoration: none;
				}

					#header nav ul li.submenu > a:before {
						-moz-osx-font-smoothing: grayscale;
						-webkit-font-smoothing: antialiased;
						font-family: FontAwesome;
						font-style: normal;
						font-weight: normal;
						text-transform: none !important;
					}

					#header nav ul li.submenu > a:before {
						content: '\f107';
						margin-right: 0.65em;
					}
					
					
					

				#header nav ul li.active > a, #header nav ul li:hover > a {
					-moz-transition: all 0.2s ease-in-out;
					-webkit-transition: all 0.2s ease-in-out;
					-ms-transition: all 0.2s ease-in-out;
					transition: all 0.2s ease-in-out;
					border:1px solid #fff !important;
				}
				
				

				#header nav ul li.current > a {
					font-weight: 900;
				}

		#header.reveal {
			-moz-animation: reveal-header 0.5s;
			-webkit-animation: reveal-header 0.5s;
			-ms-animation: reveal-header 0.5s;
			animation: reveal-header 0.5s;
		}
		
		
		

		#header.alt {
			-moz-animation: none;
			-webkit-animation: none;
			-ms-animation: none;
			animation: none;
			background: transparent;
			box-shadow: none;
			color: #fff !important;
			padding: 2em 2.5em;
			position: absolute;
		}

			#header.alt nav {
				right: 2.5em;
				top: 1.75em;
			}

				#header.alt nav ul li.active > a, #header.alt nav ul li:hover > a {
					border: solid 1px;
				}
			
	#header:not(.alt) {	color: #fff !important;	}	

#header:not(.alt) nav ul li:hover > a {
background:transparent;
border:1px solid #fff !important;
}
.gold
{
color: <?php echo $color_setts[0]->theme_color;?> !important;
}

.gold:hover
{
text-decoration:none;
}
.goldbg
{
background:<?php echo $color_setts[0]->theme_color;?> !important;
font-size:12px;
padding:5px;
border-radius:5px;
margin-right:3px;
}
.goldbg:hover,.goldbg:focus
{
text-decoration:none;
color:#fff;
}


	.panel-default>.panel-heading
	{
	background:<?php echo $color_setts[0]->theme_color;?> !important;
	color:#fff;
	border:1px solid <?php echo $color_setts[0]->theme_color;?> !important;
	border-radius:0px;
	}
	.panel-body
	{
	border:1px solid <?php echo $color_setts[0]->theme_color;?>;
	border-top:none;
	border-radius:0px;
	}

	.dropotron {
		background: #fff;
		box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.075);
		line-height: 2.25em;
		min-width: 13em;
		padding: 1em 0;
		text-transform: uppercase;
		margin-top: calc(-1em + 1px);
	}

		.dropotron.level-0 {
			font-size: 0.7em;
			font-weight: 400;
			margin-top: 1em;
			 box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

			.dropotron.level-0:before {
				border-bottom: solid 0.5em #fff;
				border-left: solid 0.5em transparent;
				border-right: solid 0.5em transparent;
				content: '';
				left: 0.75em;
				position: absolute;
				top: -0.45em;
			}

		.dropotron > li {
			border-top: solid 1px rgba(124, 128, 129, 0.2);
		}

			.dropotron > li > a {
				-moz-transition: none;
				-webkit-transition: none;
				-ms-transition: none;
				transition: none;
				color: inherit;
				text-decoration: none;
				padding: 0 1em;
				border: 0;
			}

			.dropotron > li:hover > a {
				background: <?php echo $color_setts[0]->theme_color;?>;
				color: #fff;
			}

			.dropotron > li:first-child {
				border-top: 0;
			}



	@-moz-keyframes reveal-banner {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@-webkit-keyframes reveal-banner {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@-ms-keyframes reveal-banner {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	@keyframes reveal-banner {
		0% {
			opacity: 0;
		}

		100% {
			opacity: 1;
		}
	}

	#banner {
		
		color: #fff;
		cursor: default;
		
		text-align: center;
	}

		#banner .inner {
			-moz-animation: reveal-banner 1s 0.25s ease-in-out;
			-webkit-animation: reveal-banner 1s 0.25s ease-in-out;
			-ms-animation: reveal-banner 1s 0.25s ease-in-out;
			animation: reveal-banner 1s 0.25s ease-in-out;
			-moz-animation-fill-mode: forwards;
			-webkit-animation-fill-mode: forwards;
			-ms-animation-fill-mode: forwards;
			animation-fill-mode: forwards;
			background: rgba(52, 27, 43, 0.5);
			color: #fff;
			display: inline-block;
			opacity: 0;
			padding: 3em;
			text-align: center;
		}
		
		

			#banner .inner header {
				display: inline-block;
				border-bottom: solid 2px;
				border-top: solid 2px;
				margin: 0 0 2em 0;
				padding: 3px 0 3px 0;
			}

				#banner .inner header h2 {
					border-bottom: solid 2px;
					border-top: solid 2px;
					font-size: 2.5em;
					font-weight: 900;
					letter-spacing: 0.2em;
					margin: 0;
					padding-left: 0.05em;
					position: relative;
					text-transform: uppercase;
				}

			#banner .inner p {
				letter-spacing: 0.1em;
				margin: 0;
				text-transform: uppercase;
			}

				#banner .inner p a {
					color: inherit;
					font-weight: 400;
					text-decoration: none;
				}

			#banner .inner footer {
				margin: 2em 0 0 0;
			}



	#main {
		background-image: url("images/dark-tl.svg"), url("images/dark-tr.svg"), url("images/dark-bl.svg"), url("images/dark-br.svg");
		background-position: top left, top right, bottom left, bottom right;
		background-repeat: no-repeat;
		background-size: 25em;
		padding: 7em 0;
	}

		#main > :last-child {
			margin-bottom: 0;
		}

		#main .sidebar section {
			border-top: solid 1px rgba(124, 128, 129, 0.2);
			margin: 3em 0 0 0;
			padding: 3em 0 0 0;
		}

			#main .sidebar section:first-child {
				border-top: 0;
				padding-top: 0;
				margin-top: 0;
			}

	body.index #main {
		padding-top: 5em;
	}



	#cta {
		background-attachment: scroll, scroll, scroll, fixed;
		background-color: #645862;
		background-image: url("images/light-tl.svg"), url("images/light-tr.svg"), url("images/overlay.png"), url("../../images/banner.jpg");
		background-position: top left, top right, top left, bottom center;
		background-repeat: no-repeat, no-repeat, repeat, no-repeat;
		background-size: 25em, 25em, auto, cover;
		color: #fff;
		padding: 5em;
		text-align: center;
	}

		#cta header {
			margin-bottom: 2em;
		}



	#footer {
		background: #E8EEF4;
		color: #7c8081;
		padding: 5em 5em 10em 5em;
		text-align: center;
	}

		#footer .copyright {
			font-size: 0.8em;
			line-height: 1em;
		}

			#footer .copyright a {
				color: inherit;
			}

			#footer .copyright li {
				display: inline-block;
				margin-left: 1em;
				padding-left: 1em;
				border-left: dotted 1px;
			}

				#footer .copyright li:first-child {
					margin: 0;
					padding: 0;
					border: 0;
				}



	@media screen and (max-width: 1680px) {

		

			body, input, select, textarea {
				font-size: 14pt;
			}

		

			header.special {
				padding-top: 5.5em;
				margin-bottom: 4em;
			}

	}



	@media screen and (max-width: 1280px) {

		

			body, input, select, textarea {
				font-size: 13pt;
				letter-spacing: 0.025em;
				line-height: 1.65em;
			}

			h1, h2, h3, h4, h5, h6 {
				line-height: 1.5em;
			}

		

			header.major {
				padding-bottom: 1.5em;
			}

			footer.major {
				padding-top: 2em;
			}

		

			.wrapper {
				margin-bottom: 4em;
				padding: 4em 3em;
			}

				.wrapper.style4 {
					padding: 3em;
				}

		

			#header nav ul li {
				margin-left: 1em;
			}

		

			#banner {
				background-attachment: scroll;
			}

		

			#cta {
				padding: 4em;
				background-attachment: scroll;
			}

	

			#footer {
				padding: 4em;
			}

	}



	@media screen and (max-width: 980px) {

		

			body, input, select, textarea {
				font-size: 13pt;
				letter-spacing: 0.025em;
				line-height: 1.5em;
			}

		

			header br {
				display: none;
			}

			header.major {
				padding-bottom: 1em;
			}

			header.special {
				padding-left: 2.5em;
				padding-right: 2.5em;
			}

			footer.major {
				padding-top: 1.5em;
			}

		

			.wrapper {
				margin-bottom: 3em;
				padding: 3em 2.5em;
			}

				.wrapper.special br {
					display: none;
				}

				.wrapper.style1 {
					padding: 0 2.5em;
				}

				.wrapper.style2 {
					background-size: 15em;
				}

				.wrapper.style4 {
					padding: 2.5em;
				}

		

			#banner {
				background-size: 15em, 15em, auto, cover;
			}

		

			#main {
				background-size: 15em;
			}

		

			#cta {
				background-size: 15em, 15em, auto, cover;
				padding: 3em;
			}

	}



	#navPanel, #navButton {
		display: none;
	}

	@media screen and (max-width: 840px) {

		

			html, body {
				overflow-x: hidden;
			}

			header.major {
				padding-bottom: 0.25em;
			}

			header.special {
				margin-bottom: 4em;
				padding-top: 5em;
			}

				header.special:before, header.special:after {
					width: 40%;
				}

				header.special h2 + p {
					padding-top: 1.25em;
				}

		

			section {
				margin: 1em 0 1em 0;
			}
			

				section:first-child {
					margin-top: 0;
				}

		

			input[type="button"].small,
			input[type="submit"].small,
			input[type="reset"].small,
			.button.small {
				font-size: 0.8em;
				min-width: 18em;
				padding: 0.75em 0;
			}

		

			ul.featured-icons {
				margin: 0;
			}

				ul.featured-icons li {
					display: inline-block;
					float: none;
					width: auto;
				}

					ul.featured-icons li .icon {
						font-size: 4em;
						width: 1.25em;
					}

			ul.buttons li {
				display: block;
				padding: 1em 0 0 0;
			}

		

			

		

			#banner {
				margin: 0;
			}

		

			.wrapper.special-alt {
				text-align: center;
			}

			.wrapper.style4 {
				padding-bottom: 3em;
			}

		

			#main {
				padding: 5em 0;
			}

				#main .sidebar {
					border-top: solid 1px rgba(124, 128, 129, 0.1);
					padding-top: 3em;
				}

					#main .sidebar section {
						border-top: 0;
						padding-top: 0;
					}

			body.index #main {
				padding-top: 4.5em;
			}

		

			#cta {
				margin: 0;
			}

		

			#footer {
				padding: 4em 1.5em;
			}

		

			#page-wrapper {
				-moz-backface-visibility: hidden;
				-webkit-backface-visibility: hidden;
				-ms-backface-visibility: hidden;
				backface-visibility: hidden;
				-moz-transition: -moz-transform 0.5s ease;
				-webkit-transition: -webkit-transform 0.5s ease;
				-ms-transition: -ms-transform 0.5s ease;
				transition: transform 0.5s ease;
				padding-bottom: 1px;
			}

			#navButton {
				-moz-backface-visibility: hidden;
				-webkit-backface-visibility: hidden;
				-ms-backface-visibility: hidden;
				backface-visibility: hidden;
				-moz-transition: -moz-transform 0.5s ease;
				-webkit-transition: -webkit-transform 0.5s ease;
				-ms-transition: -ms-transform 0.5s ease;
				transition: transform 0.5s ease;
				display: block;
				height: 60px;
				left: 0;
				position: fixed;
				top: 0;
				width: 100%;
				z-index: 10001;
			}

				#navButton .toggle {
					text-decoration: none;
					height: 60px;
					left: 0;
					position: absolute;
					text-align: center;
					top: 0;
					width: 100%;
					border: 0;
					outline: 0;
				}

					#navButton .toggle:before {
						-moz-osx-font-smoothing: grayscale;
						-webkit-font-smoothing: antialiased;
						font-family: FontAwesome;
						font-style: normal;
						font-weight: normal;
						text-transform: none !important;
					}

					#navButton .toggle:before {
						color: #fff;
						content: '\f0c9';
						font-size: 1em;
						height: 40px;
						left: 10px;
						line-height: 40px;
						opacity: 0.5;
						position: absolute;
						top: 11px;
						width: 60px;
						z-index: 1;
					}

					#navButton .toggle:after {
						background: rgba(163, 169, 170, 0.75);
						border-radius: 2px;
						content: '';
						height: 40px;
						left: 10px;
						position: absolute;
						top: 10px;
						width: 60px;
					}

			#navPanel {
				-moz-backface-visibility: hidden;
				-webkit-backface-visibility: hidden;
				-ms-backface-visibility: hidden;
				backface-visibility: hidden;
				-moz-transform: translateX(-275px);
				-webkit-transform: translateX(-275px);
				-ms-transform: translateX(-275px);
				transform: translateX(-275px);
				-moz-transition: -moz-transform 0.5s ease;
				-webkit-transition: -webkit-transform 0.5s ease;
				-ms-transition: -ms-transform 0.5s ease;
				transition: transform 0.5s ease;
				display: block;
				height: 100%;
				left: 0;
				overflow-y: auto;
				position: fixed;
				top: 0;
				width: 275px;
				z-index: 10002;
				background: #1c2021;
				color: #fff;
				font-size: 0.8em;
				letter-spacing: 0.075em;
				text-transform: uppercase;
				padding: 0.25em 0.75em 1em 0.75em;
			}

				#navPanel .link {
					border: 0;
					border-top: solid 1px rgba(255, 255, 255, 0.05);
					color: inherit;
					display: block;
					height: 3em;
					line-height: 3em;
					opacity: 0.75;
					text-decoration: none;
				}

					#navPanel .link.depth-0 {
						font-weight: 900;
					}

					#navPanel .link:first-child {
						border-top: 0;
					}

				#navPanel .indent-1 {
					display: inline-block;
					width: 1em;
				}

				#navPanel .indent-2 {
					display: inline-block;
					width: 2em;
				}

				#navPanel .indent-3 {
					display: inline-block;
					width: 3em;
				}

				#navPanel .indent-4 {
					display: inline-block;
					width: 4em;
				}

				#navPanel .indent-5 {
					display: inline-block;
					width: 5em;
				}

			body.navPanel-visible #page-wrapper {
				-moz-transform: translateX(275px);
				-webkit-transform: translateX(275px);
				-ms-transform: translateX(275px);
				transform: translateX(275px);
			}

			body.navPanel-visible #navButton {
				-moz-transform: translateX(275px);
				-webkit-transform: translateX(275px);
				-ms-transform: translateX(275px);
				transform: translateX(275px);
			}

			body.navPanel-visible #navPanel {
				-moz-transform: translateX(0);
				-webkit-transform: translateX(0);
				-ms-transform: translateX(0);
				transform: translateX(0);
			}

	}



	@media screen and (max-width: 736px) {

		

			body {
				min-width: 320px;
			}

			h2 {
				font-size: 1.25em;
				letter-spacing: 0.1em;
			}

			h3 {
				font-size: 1em;
				letter-spacing: 0.025em;
			}

			p {
				text-align: justify;
			}

		

			header {
				text-align: center;
			}

				header.major {
					padding-bottom: 0;
				}

				header.special {
					margin-bottom: 3em;
					padding-left: 1.5em;
					padding-right: 1.5em;
				}

					header.special:before, header.special:after {
						width: 38%;
					}

					header.special .icon {
						font-size: 0.75em;
						top: 1.5em;
					}

				header p {
					text-align: center;
				}

			footer.major {
				padding-top: 0;
			}

		

			.icon.circle {
				font-size: 1em;
			}

		

			input[type="button"],
			input[type="submit"],
			input[type="reset"],
			.button {
				max-width: 20em;
				width: auto;
			}

				input[type="button"].fit,
				input[type="submit"].fit,
				input[type="reset"].fit,
				.button.fit {
					width: auto;
				}

		

			ul.icons li {
				padding-left: 0.25em;
			}

			ul.featured-icons li .icon {
				width: 1.1em;
			}

			ul.buttons {
				text-align: center;
			}

		

			.wrapper {
				margin-bottom: 2.5em;
				padding: 2.25em 1.5em;
			}

				.wrapper.special br {
					display: none;
				}

				.wrapper.style1 {
					padding: 0 1.5em;
				}

				.wrapper.style2 {
					background-size: 10em;
					padding: 2.25em 1.5em;
				}

				.wrapper.style4 {
					background-size: 10em;
					padding: 1.5em 1.5em 3em 1.5em;
				}

		
			#banner {
				background-size: 10em, 10em, auto, cover;
				
			}

				#banner .inner {
					background: none;
					display: block;
					padding: 0 1.5em;
				}

					#banner .inner header h2 {
						font-size: 1.5em;
					}

					#banner .inner p {
						text-align: center;
					}

					#banner .inner br {
						display: none;
					}

		
			#main {
				background-size: 10em;
				padding: 3.5em 0 2.5em 0;
			}

			body.index #main {
				padding: 2.5em 0 0 0;
			}

			body.contact #main {
				padding-bottom: 0;
			}

		

			#cta {
				background-size: 10em, 10em, auto, cover;
				padding: 3em 1.5em;
			}

		
			#footer {
				padding: 3em 1.5em;
			}

				#footer .copyright li {
					display: block;
					margin: 1em 0 0 0;
					padding: 0;
					border: 0;
				}

		

			#navButton .toggle:before {
				top: 8px;
				left: 8px;
				width: 50px;
				height: 34px;
				line-height: 34px;
			}

			#navButton .toggle:after {
				top: 8px;
				left: 8px;
				width: 50px;
				height: 34px;
			}

	}
	
	
	
	/************* Linearicons *************/
	
	
	@font-face {
	font-family: 'Linearicons';
	src:url('<?php echo $url;?>/fonts/Linearicons-Free.eot?w118d');
	src:url('<?php echo $url;?>/fonts/Linearicons-Free.eot?#iefixw118d') format('embedded-opentype'),
		url('<?php echo $url;?>/fonts/Linearicons-Free.woff2?w118d') format('woff2'),
		url('<?php echo $url;?>/fonts/Linearicons-Free.woff?w118d') format('woff'),
		url('<?php echo $url;?>/fonts/Linearicons-Free.ttf?w118d') format('truetype'),
		url('<?php echo $url;?>/fonts/Linearicons-Free.svg?w118d#Linearicons-Free') format('svg');
	font-weight: normal;
	font-style: normal;
}

.lnr {
	font-family: 'Linearicons';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1.5;

	/* Better Font Rendering =========== */
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.lnr-home:before {
	content: "\e800";
}
.lnr-apartment:before {
	content: "\e801";
}
.lnr-pencil:before {
	content: "\e802";
}
.lnr-magic-wand:before {
	content: "\e803";
}
.lnr-drop:before {
	content: "\e804";
}
.lnr-lighter:before {
	content: "\e805";
}
.lnr-poop:before {
	content: "\e806";
}
.lnr-sun:before {
	content: "\e807";
}
.lnr-moon:before {
	content: "\e808";
}
.lnr-cloud:before {
	content: "\e809";
}
.lnr-cloud-upload:before {
	content: "\e80a";
}
.lnr-cloud-download:before {
	content: "\e80b";
}
.lnr-cloud-sync:before {
	content: "\e80c";
}
.lnr-cloud-check:before {
	content: "\e80d";
}
.lnr-database:before {
	content: "\e80e";
}
.lnr-lock:before {
	content: "\e80f";
}
.lnr-cog:before {
	content: "\e810";
}
.lnr-trash:before {
	content: "\e811";
}
.lnr-dice:before {
	content: "\e812";
}
.lnr-heart:before {
	content: "\e813";
}
.lnr-star:before {
	content: "\e814";
}
.lnr-star-half:before {
	content: "\e815";
}
.lnr-star-empty:before {
	content: "\e816";
}
.lnr-flag:before {
	content: "\e817";
}
.lnr-envelope:before {
	content: "\e818";
}
.lnr-paperclip:before {
	content: "\e819";
}
.lnr-inbox:before {
	content: "\e81a";
}
.lnr-eye:before {
	content: "\e81b";
}
.lnr-printer:before {
	content: "\e81c";
}
.lnr-file-empty:before {
	content: "\e81d";
}
.lnr-file-add:before {
	content: "\e81e";
}
.lnr-enter:before {
	content: "\e81f";
}
.lnr-exit:before {
	content: "\e820";
}
.lnr-graduation-hat:before {
	content: "\e821";
}
.lnr-license:before {
	content: "\e822";
}
.lnr-music-note:before {
	content: "\e823";
}
.lnr-film-play:before {
	content: "\e824";
}
.lnr-camera-video:before {
	content: "\e825";
}
.lnr-camera:before {
	content: "\e826";
}
.lnr-picture:before {
	content: "\e827";
}
.lnr-book:before {
	content: "\e828";
}
.lnr-bookmark:before {
	content: "\e829";
}
.lnr-user:before {
	content: "\e82a";
}
.lnr-users:before {
	content: "\e82b";
}
.lnr-shirt:before {
	content: "\e82c";
}
.lnr-store:before {
	content: "\e82d";
}
.lnr-cart:before {
	content: "\e82e";
}
.lnr-tag:before {
	content: "\e82f";
}
.lnr-phone-handset:before {
	content: "\e830";
}
.lnr-phone:before {
	content: "\e831";
}
.lnr-pushpin:before {
	content: "\e832";
}
.lnr-map-marker:before {
	content: "\e833";
}
.lnr-map:before {
	content: "\e834";
}
.lnr-location:before {
	content: "\e835";
}
.lnr-calendar-full:before {
	content: "\e836";
}
.lnr-keyboard:before {
	content: "\e837";
}
.lnr-spell-check:before {
	content: "\e838";
}
.lnr-screen:before {
	content: "\e839";
}
.lnr-smartphone:before {
	content: "\e83a";
}
.lnr-tablet:before {
	content: "\e83b";
}
.lnr-laptop:before {
	content: "\e83c";
}
.lnr-laptop-phone:before {
	content: "\e83d";
}
.lnr-power-switch:before {
	content: "\e83e";
}
.lnr-bubble:before {
	content: "\e83f";
}
.lnr-heart-pulse:before {
	content: "\e840";
}
.lnr-construction:before {
	content: "\e841";
}
.lnr-pie-chart:before {
	content: "\e842";
}
.lnr-chart-bars:before {
	content: "\e843";
}
.lnr-gift:before {
	content: "\e844";
}
.lnr-diamond:before {
	content: "\e845";
}
.lnr-linearicons:before {
	content: "\e846";
}
.lnr-dinner:before {
	content: "\e847";
}
.lnr-coffee-cup:before {
	content: "\e848";
}
.lnr-leaf:before {
	content: "\e849";
}
.lnr-paw:before {
	content: "\e84a";
}
.lnr-rocket:before {
	content: "\e84b";
}
.lnr-briefcase:before {
	content: "\e84c";
}
.lnr-bus:before {
	content: "\e84d";
}
.lnr-car:before {
	content: "\e84e";
}
.lnr-train:before {
	content: "\e84f";
}
.lnr-bicycle:before {
	content: "\e850";
}
.lnr-wheelchair:before {
	content: "\e851";
}
.lnr-select:before {
	content: "\e852";
}
.lnr-earth:before {
	content: "\e853";
}
.lnr-smile:before {
	content: "\e854";
}
.lnr-sad:before {
	content: "\e855";
}
.lnr-neutral:before {
	content: "\e856";
}
.lnr-mustache:before {
	content: "\e857";
}
.lnr-alarm:before {
	content: "\e858";
}
.lnr-bullhorn:before {
	content: "\e859";
}
.lnr-volume-high:before {
	content: "\e85a";
}
.lnr-volume-medium:before {
	content: "\e85b";
}
.lnr-volume-low:before {
	content: "\e85c";
}
.lnr-volume:before {
	content: "\e85d";
}
.lnr-mic:before {
	content: "\e85e";
}
.lnr-hourglass:before {
	content: "\e85f";
}
.lnr-undo:before {
	content: "\e860";
}
.lnr-redo:before {
	content: "\e861";
}
.lnr-sync:before {
	content: "\e862";
}
.lnr-history:before {
	content: "\e863";
}
.lnr-clock:before {
	content: "\e864";
}
.lnr-download:before {
	content: "\e865";
}
.lnr-upload:before {
	content: "\e866";
}
.lnr-enter-down:before {
	content: "\e867";
}
.lnr-exit-up:before {
	content: "\e868";
}
.lnr-bug:before {
	content: "\e869";
}
.lnr-code:before {
	content: "\e86a";
}
.lnr-link:before {
	content: "\e86b";
}
.lnr-unlink:before {
	content: "\e86c";
}
.lnr-thumbs-up:before {
	content: "\e86d";
}
.lnr-thumbs-down:before {
	content: "\e86e";
}
.lnr-magnifier:before {
	content: "\e86f";
}
.lnr-cross:before {
	content: "\e870";
}
.lnr-menu:before {
	content: "\e871";
}
.lnr-list:before {
	content: "\e872";
}
.lnr-chevron-up:before {
	content: "\e873";
}
.lnr-chevron-down:before {
	content: "\e874";
}
.lnr-chevron-left:before {
	content: "\e875";
}
.lnr-chevron-right:before {
	content: "\e876";
}
.lnr-arrow-up:before {
	content: "\e877";
}
.lnr-arrow-down:before {
	content: "\e878";
}
.lnr-arrow-left:before {
	content: "\e879";
}
.lnr-arrow-right:before {
	content: "\e87a";
}
.lnr-move:before {
	content: "\e87b";
}
.lnr-warning:before {
	content: "\e87c";
}
.lnr-question-circle:before {
	content: "\e87d";
}
.lnr-menu-circle:before {
	content: "\e87e";
}
.lnr-checkmark-circle:before {
	content: "\e87f";
}
.lnr-cross-circle:before {
	content: "\e880";
}
.lnr-plus-circle:before {
	content: "\e881";
}
.lnr-circle-minus:before {
	content: "\e882";
}
.lnr-arrow-up-circle:before {
	content: "\e883";
}
.lnr-arrow-down-circle:before {
	content: "\e884";
}
.lnr-arrow-left-circle:before {
	content: "\e885";
}
.lnr-arrow-right-circle:before {
	content: "\e886";
}
.lnr-chevron-up-circle:before {
	content: "\e887";
}
.lnr-chevron-down-circle:before {
	content: "\e888";
}
.lnr-chevron-left-circle:before {
	content: "\e889";
}
.lnr-chevron-right-circle:before {
	content: "\e88a";
}
.lnr-crop:before {
	content: "\e88b";
}
.lnr-frame-expand:before {
	content: "\e88c";
}
.lnr-frame-contract:before {
	content: "\e88d";
}
.lnr-layers:before {
	content: "\e88e";
}
.lnr-funnel:before {
	content: "\e88f";
}
.lnr-text-format:before {
	content: "\e890";
}
.lnr-text-format-remove:before {
	content: "\e891";
}
.lnr-text-size:before {
	content: "\e892";
}
.lnr-bold:before {
	content: "\e893";
}
.lnr-italic:before {
	content: "\e894";
}
.lnr-underline:before {
	content: "\e895";
}
.lnr-strikethrough:before {
	content: "\e896";
}
.lnr-highlight:before {
	content: "\e897";
}
.lnr-text-align-left:before {
	content: "\e898";
}
.lnr-text-align-center:before {
	content: "\e899";
}
.lnr-text-align-right:before {
	content: "\e89a";
}
.lnr-text-align-justify:before {
	content: "\e89b";
}
.lnr-line-spacing:before {
	content: "\e89c";
}
.lnr-indent-increase:before {
	content: "\e89d";
}
.lnr-indent-decrease:before {
	content: "\e89e";
}
.lnr-pilcrow:before {
	content: "\e89f";
}
.lnr-direction-ltr:before {
	content: "\e8a0";
}
.lnr-direction-rtl:before {
	content: "\e8a1";
}
.lnr-page-break:before {
	content: "\e8a2";
}
.lnr-sort-alpha-asc:before {
	content: "\e8a3";
}
.lnr-sort-amount-asc:before {
	content: "\e8a4";
}
.lnr-hand:before {
	content: "\e8a5";
}
.lnr-pointer-up:before {
	content: "\e8a6";
}
.lnr-pointer-right:before {
	content: "\e8a7";
}
.lnr-pointer-down:before {
	content: "\e8a8";
}
.lnr-pointer-left:before {
	content: "\e8a9";
}

.timetxt
{
font-size:14px;
}	
	
	
.ribbon-wrapper_home {
  width: 85px;
  height: 88px;
  overflow: hidden;
  position: absolute;
  top: 50px;
  left: 50px;
  }

.ribbon-wrapper {
  width: 85px;
  height: 88px;
  overflow: hidden;
  position: absolute;
  top: 0px;
  left: 15px;
  }
  .ribbon {
    font: 14px sans-serif;
    color: #333;
    text-align: center;
    -webkit-transform: rotate(-45deg);
    -moz-transform:    rotate(-45deg);
    -ms-transform:     rotate(-45deg);
    -o-transform:      rotate(-45deg);
    position: relative;
    padding: 7px 0;
    top: 15px;
    left: -30px;
    width: 120px;
    background-color: #ebb134;
    color: #fff;
	text-transform:uppercase;
  }
	
	
.searchbox
{
border:1px solid #dddddd;
padding:10px;
}	






/* product carousel */


.carousel-inner {
  position: relative;
  width: 100%;
  min-height: 300px;
  }
 
 .carousel-control.right {
  right: 0;
  left: auto;
  background-image: none !important;
  background-repeat: repeat-x;
}
 .carousel-control.left {
  left: 0;
  right: auto;
  background-image: none !important;
  background-repeat: repeat-x;
}
#carousel-example-generic {
    margin: 20px auto;
    width: 100%;
}

#carousel-custom {
    
    max-width: 450px;
}
#carousel-custom .carousel-indicators {
    margin: 10px 0 0;
    overflow: auto;
    position: static;
    text-align: left;
    white-space: nowrap;
    width: 100%;
    overflow:hidden;
}
#carousel-custom .carousel-indicators li {
    background-color: transparent;
    -webkit-border-radius: 0;
    border-radius: 0;
    display: inline-block;
    height: auto;
    margin: 0 !important;
    width: auto;
}
#carousel-custom .carousel-indicators li img {
    display: block;
    opacity: 0.5;
}
#carousel-custom .carousel-indicators li.active img {
    opacity: 1;
}
#carousel-custom .carousel-indicators li:hover img {
    opacity: 0.75;
}
#carousel-custom .carousel-outer {
    position: relative;
}
.carousel-indicators li img {
  height: 66px;
  width: 52px;}
  
  
  
/* product carousel */  


.red_txt
{
color:#FF0000;
}
.green_txt
{
color:#006600;
}

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  

   opacity: 1;

}


.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover
{
background:<?php echo $color_setts[0]->button_color;?> !important;
color:#fff !important;
}
.nav-tabs
{
margin-bottom:20px !important;
border-bottom:1px solid <?php echo $color_setts[0]->button_color;?> !important;
}

.nav>li>a:focus, .nav>li>a:hover
{
background:<?php echo $color_setts[0]->theme_color;?> !important;
color:#fff !important;
}
.nav>li>a
{
color: #000 !important;
}






.badge
{
background:<?php echo $color_setts[0]->button_color;?> !important;
color:#fff !important;
}


.cart_tbl td,.cart_tbl input[type="number"]
{
color:#000000 !important;
}


.border_bottoms
{
border-top:1px solid #dddddd;
margin-bottom:10px;
}



.product-rating i
{
color:<?php echo $color_setts[0]->theme_color;?> !important;
font-size:18px !important;
}




	
	</style>    
        
        
	
	
    <script src="<?php echo $url;?>/js/jquery.min.js"></script>
	
	<link href="<?php echo $url;?>/css/font-awesome.css" rel="stylesheet" type="text/css" />
	
    <script src="<?php echo $url;?>/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo $url;?>/css/validationEngine.jquery.css" type="text/css"/>
	
	<script src="<?php echo $url;?>/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $url;?>/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			jQuery("#formID").validationEngine({showOneMessage:true,promptPosition : "topLeft", scroll: false});
		});

		jQuery(document).ready(function(){
			jQuery("#formID2").validationEngine({showOneMessage:true,promptPosition : "topLeft", scroll: false});
		});
	</script>
	<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});






		
</script>
	
    <script src='https://www.google.com/recaptcha/api.js'></script>
	
	 <link rel="stylesheet" href="<?php echo $url;?>/css/validationEngine.jquery.css" type="text/css"/>
	
	
	
	
	
	
	