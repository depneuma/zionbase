<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/










Route::get('/', 'IndexController@avigher_index');
Route::get('/index', 'IndexController@avigher_index');
Route::post('/index', ['as'=>'index','uses'=>'IndexController@avigher_subscribe']);
Route::get('/thankyou/{id}', 'IndexController@newsletter_activate');


/************* BLOG ***************/
Route::get('/blog', 'BlogController@avigher_index');
Route::get('/blog/{pid}/{id}', 'BlogController@avigher_singlepost');
Route::post('/blog', ['as'=>'blog','uses'=>'BlogController@avigher_blog_comment']);

/************ END BLOG *************/

/********** STAFF **********/

Route::get('/staff', 'StaffController@avigher_index');
Route::get('/staff/{pid}/{id}', 'StaffController@avigher_singlepost');


/********** END STAFF *************/




/**************** SOCIAL LOGIN ***************/



Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');




/**************** SOCIAL LOGIN ***************/





/****************** SHOP PAYUMONEY **********/

Route::get('/payu_failed/{cid}', 'CancelController@avigher_payu_failed');


Route::post('payu_failed/{cid}', function($cid) {
    
    
	return redirect('payu_failed/'.$cid);
});



Route::get('/payu_success/{cid}/{txtid}', 'SuccessController@avigher_payu_success');

Route::post('payu_success/{cid}/{txtid}', function($cid,$txtid) {
    
    
	return redirect('payu_success/'.$cid.'/'.$txtid);
});

/****************** SHOP PAYUMONEY **********/







/****************** DDONATION PAYUMONEY **********/

Route::get('/payumoney_failed/{cid}', 'CancelController@avigher_payumoney_failed');


Route::post('payumoney_failed/{cid}', function($cid) {
    
    
	return redirect('payumoney_failed/'.$cid);
});





Route::get('/payumoney_success/{cid}/{txtid}', 'SuccessController@avigher_payumoney_success');

Route::post('payumoney_success/{cid}/{txtid}', function($cid,$txtid) {
    
    
	return redirect('payumoney_success/'.$cid.'/'.$txtid);
});

/****************** DDONATION PAYUMONEY **********/








/************ SERMONS **************/

Route::get('/sermons', 'SermonsController@avigher_index');
Route::get('/sermons/{pid}/{id}', 'SermonsController@avigher_singlepost');
Route::post('/sermons', ['as'=>'sermons','uses'=>'SermonsController@avigher_sermons_comment']);

/*********** END SERMONS *************/


/************ EVENTS ************/

Route::get('/events', 'EventsController@avigher_events_view');
Route::get('/events/{pid}/{id}', 'EventsController@avigher_singlepost');
Route::post('/events', ['as'=>'events','uses'=>'EventsController@avigher_events_comment']);
Route::post('/event-booking', ['as'=>'event_booking','uses'=>'EventsController@avigher_event_booking']);

/*************** END EVENTS ***********/



/************** TAGS ***************/

Route::get('/tag/{type}/{id}', 'TagController@avigher_tag');



/************* END TAGS ***************/


/*********** PAGE ***********/

Route::get('/page/{pid}/{id}', 'PageController@avigher_viewpage');

/********** end page **********/


/************** DASHBOARD **********/


Route::get('/logout', 'DashboardController@avigher_logout');
Route::get('/delete-account', 'DashboardController@avigher_deleteaccount');
Route::post('/dashboard', ['as'=>'dashboard','uses'=>'DashboardController@avigher_edituserdata']);

/*********** END DASHBOARD ************/




Route::get('/cashon_success/{cid}', 'SuccessController@avigher_cashon');

Route::get('/success/{cid}', 'SuccessController@avigher_showpage');
Route::get('/shop_success/{cid}', 'SuccessController@avigher_shop_success');
Route::get('/cancel', 'CancelController@avigher_showpage');







Auth::routes();




Route::get('/lang','PageController@sampleview');	
	Route::get('/lang/{id}','PageController@sample');
	

	
	Route::get('/about-us','PageController@avigher_about_us');
	
	Route::get('/support','PageController@avigher_support');
	
	Route::get('/faq','PageController@avigher_faq');
	
	Route::get('/terms-of-use','PageController@avigher_terms');
	
	Route::get('/privacy-policy','PageController@avigher_privacy');
	
	
	
	Route::get('/404','PageController@avigher_404');
	
	
	/******** Forgot Password *********/
	
	
	Route::get('/forgot-password','ForgotpasswordController@avigher_forgot_view');
	Route::post('/forgot-password', ['as'=>'forgot-password','uses'=>'ForgotpasswordController@avigher_forgot_password']);
	
	
	/************* End Forgot Password **********/
	
	
	/************** Reset Password ***********/
	
	
	
	Route::get('/reset-password/{id}', 'ResetpasswordController@avigher_reset_view');
	
	Route::post('/reset-password', ['as'=>'reset-password','uses'=>'ResetpasswordController@avigher_reset_password']);
	/************** End Reset Password *************/
	
	
	
	
	Route::get('/contact-us','PageController@avigher_contact');
	
	Route::post('/contact-us', ['as'=>'contact-us','uses'=>'PageController@avigher_mailsend']);
	
	
	Route::get('/donate-now','PageController@avigher_donate_now');
	Route::post('/payment', ['as'=>'payment','uses'=>'PageController@avigher_donate_payment']);
	
	Route::post('/stripe-success', ['as'=>'stripe-success','uses'=>'StripeController@avigher_stripe']);
	
Route::post('/stripe_shop_success', ['as'=>'stripe_shop_success','uses'=>'StripeController@avigher_shop_stripe']);



Route::get('/gallery','GalleryController@avigher_index');


Route::get('/shop','ShopController@avigher_index');
Route::post('/shop', ['as'=>'shop','uses'=>'ShopController@avigher_shop_search']);
Route::get('/product-details/{id}/{slug}','ShopController@avigher_product_details');
Route::post('/product-details', ['as'=>'product-details','uses'=>'ShopController@avigher_cart_details']);

Route::post('/rating', ['as'=>'rating','uses'=>'ShopController@avigher_rating']);

Route::get('/cart','ShopController@avigher_view_cart');
Route::get('/cart/{delete}/{id}','ShopController@avigher_cart_delete');

Route::get('/checkout','ShopController@avigher_checkout');
Route::post('/shop_payment', ['as'=>'shop_payment','uses'=>'ShopController@avigher_checkout_details']);

Route::post('/cash-on-delivery', ['as'=>'cash-on-delivery','uses'=>'DashboardController@avigher_cash_on_delivery']);
/* Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {*/

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin','Admin\DashboardController@index');
    Route::get('/admin/index','Admin\DashboardController@index');
	
	/* user */
	Route::get('/admin/users','Admin\UsersController@index');
	Route::get('/admin/adduser','Admin\AdduserController@formview');
	Route::post('/admin/adduser', ['as'=>'admin.adduser','uses'=>'Admin\AdduserController@adduserdata']);
    
	Route::get('/admin/users/{id}','Admin\UsersController@destroy');
	Route::get('/admin/edituser/{id}','Admin\EdituserController@showform');
	Route::post('/admin/edituser', ['as'=>'admin.edituser','uses'=>'Admin\EdituserController@edituserdata']);
	/* end user */
	
	
	
	
	
	
	/* administrator */
	Route::get('/admin/administrators','Admin\UsersController@admin_index');
	Route::get('/admin/add_administrator','Admin\AdduserController@admin_formview');
	Route::post('/admin/add_administrator', ['as'=>'admin.add_administrator','uses'=>'Admin\AdduserController@adduserdata']);
    
	Route::get('/admin/administrators/{id}','Admin\UsersController@destroy');
	Route::get('/admin/administrators/{status}/{sid}/{id}','Admin\UsersController@status');
	
	Route::get('/admin/edit_administrator/{id}','Admin\EdituserController@admin_showform');
	Route::post('/admin/edit_administrator', ['as'=>'admin.edit_administrator','uses'=>'Admin\EdituserController@edituserdata']);
	
	
	
	
	/* end administrator */
	
	
	
	
	
	
	
	/* Newletter */
	Route::get('/admin/newsletter','Admin\NewsletterController@index');
	Route::get('/admin/newsletter/{action}/{id}/{sid}','Admin\NewsletterController@status');
	Route::get('/admin/newsletter/{id}','Admin\NewsletterController@destroy');
	Route::get('/admin/sendupdates','Admin\AddnewsletterController@formview');
	Route::post('/admin/sendupdates', ['as'=>'admin.sendupdates','uses'=>'Admin\AddnewsletterController@addupdatedata']);
	
	
	/* End Newsletter */
	
	
	
	/* gallery */
	Route::get('/admin/gallery','Admin\GalleryController@index');
	Route::get('/admin/addgallery','Admin\AddgalleryController@formview');
	Route::post('/admin/addgallery', ['as'=>'admin.addgallery','uses'=>'Admin\AddgalleryController@addgallerydata']);
	Route::get('/admin/gallery/{id}','Admin\GalleryController@destroy');
	Route::get('/admin/editgallery/{id}','Admin\EditgalleryController@showform');
	Route::post('/admin/editgallery', ['as'=>'admin.editgallery','uses'=>'Admin\EditgalleryController@editgallerydata']);
	Route::post('/admin/gallery', ['as'=>'admin.gallery','uses'=>'Admin\GalleryController@delete_all']);
	/* end gallery */
	
	
	
	/* category */
	
	Route::get('/admin/category','Admin\CategoryController@index');
	Route::get('/admin/add_category','Admin\AddcategoryController@formview');
	Route::post('/admin/add_category', ['as'=>'admin.add_category','uses'=>'Admin\AddcategoryController@addcategorydata']);
	Route::get('/admin/category/{id}','Admin\CategoryController@destroy');
	Route::get('/admin/edit_category/{id}','Admin\EditcategoryController@showform');
	Route::post('/admin/edit_category', ['as'=>'admin.edit_category','uses'=>'Admin\EditcategoryController@editcategorydata']);
	
	Route::post('/admin/category', ['as'=>'admin.category','uses'=>'Admin\CategoryController@delete_all']);
	/* end category */
	
	
	
	
	
	/* translate */
	Route::get('/admin/translate','Admin\TranslateController@index');
	Route::get('/admin/addtranslate','Admin\AddtranslateController@formview');
	Route::post('/admin/addtranslate', ['as'=>'admin.addtranslate','uses'=>'Admin\AddtranslateController@addtranslatedata']);
	Route::get('/admin/edittranslate/{id}','Admin\EdittranslateController@showform');
	Route::post('/admin/edittranslate', ['as'=>'admin.edittranslate','uses'=>'Admin\EdittranslateController@edittranslatedata']);
	/* end translate */
	
	
	/* gallery images */
	
	Route::get('/admin/galleryimages','Admin\GalleryimagesController@index');
	Route::get('/admin/addgalleryimages','Admin\AddgalleryimagesController@formview');
	Route::get('/admin/addgalleryimages','Admin\AddgalleryimagesController@getgallery');
	Route::post('/admin/addgalleryimages', ['as'=>'admin.addgalleryimages','uses'=>'Admin\AddgalleryimagesController@addgalleryimages']);
	Route::get('/admin/galleryimages/{id}','Admin\GalleryimagesController@destroy');
	
	
	
	Route::get('/admin/editgalleryimages/{id}','Admin\EditgalleryimagesController@edit');
	
	Route::post('/admin/editgalleryimages', ['as'=>'admin.editgalleryimages','uses'=>'Admin\EditgalleryimagesController@editgalleryimagesdata']);
	
	Route::post('/admin/galleryimages', ['as'=>'admin.galleryimages','uses'=>'Admin\GalleryimagesController@delete_all']);
	/* end gallery images */
	
	
	
	/* Testimonials */
	
	Route::get('/admin/testimonials','Admin\TestimonialsController@index');
	Route::get('/admin/add-testimonial','Admin\AddtestimonialController@formview');
	Route::post('/admin/add-testimonial', ['as'=>'admin.add-testimonial','uses'=>'Admin\AddtestimonialController@addtestimonialdata']);
	Route::get('/admin/testimonials/{id}','Admin\TestimonialsController@destroy');
	Route::get('/admin/edit-testimonial/{id}','Admin\EdittestimonialController@showform');
	Route::post('/admin/edit-testimonial', ['as'=>'admin.edit-testimonial','uses'=>'Admin\EdittestimonialController@testimonialdata']);
	Route::post('/admin/testimonials', ['as'=>'admin.testimonials','uses'=>'Admin\TestimonialsController@delete_all']);
	
	/* end Testimonials */
	
	
	
	
	/* Blogs */
	
	Route::get('/admin/blog','Admin\BlogController@index');
	Route::get('/admin/add-blog','Admin\AddblogController@formview');
	Route::post('/admin/add-blog', ['as'=>'admin.add-blog','uses'=>'Admin\AddblogController@addblogdata']);
	Route::get('/admin/blog/{id}','Admin\BlogController@destroy');
	Route::get('/admin/edit-blog/{id}','Admin\EditblogController@showform');
	Route::post('/admin/edit-blog', ['as'=>'admin.edit-blog','uses'=>'Admin\EditblogController@blogdata']);
	
	Route::get('/admin/comment/{blog}/{comment}/{id}','Admin\BlogController@view_comment');
	Route::get('/admin/comment/{pid}/{sid}','Admin\BlogController@status_comment');
	Route::get('/admin/comment/{id}','Admin\BlogController@comment_destroy');
	
	Route::post('/admin/blog', ['as'=>'admin.blog','uses'=>'Admin\BlogController@delete_all']);
	/* end Blogs */
	
	
	
	/* Products */
	
	Route::get('/admin/product','Admin\ProductController@index');
	Route::get('/admin/add-product','Admin\AddproductController@formview');
	Route::post('/admin/add-product', ['as'=>'admin.add-product','uses'=>'Admin\AddproductController@addproductdata']);
	Route::get('/admin/edit-product/{id}','Admin\EditproductController@showform');
	Route::get('/admin/edit-product/{delete}/{id}','Admin\EditproductController@one_delete');
	Route::post('/admin/edit-product', ['as'=>'admin.edit-product','uses'=>'Admin\EditproductController@productdata']);
	Route::post('/admin/product', ['as'=>'admin.product','uses'=>'Admin\ProductController@delete_all']);
	Route::get('/admin/product/{id}','Admin\ProductController@destroy');
	/* end products */
	
	
	
	
	/* Events */
	
	Route::get('/admin/events','Admin\EventsController@index');
	Route::get('/admin/add-event','Admin\AddeventController@formview');
	Route::post('/admin/add-event', ['as'=>'admin.add-event','uses'=>'Admin\AddeventController@addeventdata']);
	Route::get('/admin/events/{id}','Admin\EventsController@destroy');
	Route::get('/admin/edit-event/{id}','Admin\EditeventController@showform');
	Route::post('/admin/edit-event', ['as'=>'admin.edit-event','uses'=>'Admin\EditeventController@eventdata']);
	Route::post('/admin/events', ['as'=>'admin.events','uses'=>'Admin\EventsController@delete_all']);
	
	
	Route::get('/admin/comment/{event}/{comment}/{id}','Admin\BlogController@view_comment');
	Route::get('/admin/events-booking','Admin\EventsController@avigher_events_booking');
	Route::get('/admin/events-booking/{sid}/{bid}','Admin\EventsController@status_booking');
	Route::get('/admin/events-booking/{id}','Admin\EventsController@booking_destroy');
	/* End Events */
	
	
	
	
	
	/* Staff */
	
	
	
	
	Route::get('/admin/staff','Admin\StaffController@index');
	Route::get('/admin/add-staff','Admin\AddstaffController@formview');
	Route::post('/admin/add-staff', ['as'=>'admin.add-staff','uses'=>'Admin\AddstaffController@addstaffdata']);
	Route::get('/admin/staff/{id}','Admin\StaffController@destroy');
	Route::get('/admin/edit-staff/{id}','Admin\EditstaffController@showform');
	Route::post('/admin/edit-staff', ['as'=>'admin.edit-staff','uses'=>'Admin\EditstaffController@staffdata']);
	Route::post('/admin/staff', ['as'=>'admin.staff','uses'=>'Admin\StaffController@delete_all']);
	
	/* End staff */
	
	
	
	/* Staff Type */
	
	
	Route::get('/admin/staff-type','Admin\StafftypeController@index');
	Route::get('/admin/add-staff-type','Admin\AddstafftypeController@formview');
	Route::post('/admin/add-staff-type', ['as'=>'admin.add-staff-type','uses'=>'Admin\AddstafftypeController@stafftypedata']);
	Route::get('/admin/staff-type/{id}','Admin\StafftypeController@destroy');
	Route::get('/admin/edit-staff-type/{id}','Admin\EditstafftypeController@showform');
	Route::post('/admin/edit-staff-type', ['as'=>'admin.edit-staff-type','uses'=>'Admin\EditstafftypeController@stafftypedata']);
	Route::post('/admin/staff-type', ['as'=>'admin.staff-type','uses'=>'Admin\StafftypeController@delete_all']);
	
	
	/* End Staff Type */
	
	
	
	
	
	
	/* Sermons */
	
	Route::get('/admin/sermons','Admin\SermonsController@index');
	Route::get('/admin/add-sermon','Admin\AddsermonController@formview');
	Route::post('/admin/add-sermon', ['as'=>'admin.add-sermon','uses'=>'Admin\AddsermonController@addsermondata']);
	Route::get('/admin/sermons/{id}','Admin\SermonsController@destroy');
	Route::get('/admin/edit-sermon/{id}','Admin\EditsermonController@showform');
	Route::post('/admin/edit-sermon', ['as'=>'admin.edit-sermon','uses'=>'Admin\EditsermonController@sermondata']);
	Route::post('/admin/sermons', ['as'=>'admin.sermons','uses'=>'Admin\SermonsController@delete_all']);
	
	/* end Sermons */
	
	
	
	
	/* pages */
	
	Route::get('/admin/pages','Admin\PagesController@index');
	Route::get('/admin/edit-page/{id}','Admin\PagesController@showform');
	Route::post('/admin/edit-page', ['as'=>'admin.edit-page','uses'=>'Admin\PagesController@pagedata']);
	Route::get('/admin/pages/{action}/{id}/{sid}','Admin\PagesController@status');
	Route::get('/admin/pages/{id}','Admin\PagesController@destroy');
	
	Route::get('/admin/add-page','Admin\PagesController@formview');
	Route::post('/admin/add-page', ['as'=>'admin.add-page','uses'=>'Admin\PagesController@addpagedata']);
	Route::post('/admin/pages', ['as'=>'admin.pages','uses'=>'Admin\PagesController@delete_all']);
	/* end pages */
	
	
	
	/* start settings */
	
	
	Route::get('/admin/settings','Admin\SettingsController@showform');
	Route::post('/admin/settings', ['as'=>'admin.settings','uses'=>'Admin\SettingsController@editsettings']);
	
	/* end settings */
	
	
	/* media settings */
	
	Route::get('/admin/media-settings','Admin\MediasettingsController@showform');
	Route::post('/admin/media-settings', ['as'=>'admin.media-settings','uses'=>'Admin\MediasettingsController@editsettings']);
	
	/* end media settings */
	
	
	
	/* home background */
	
	Route::get('/admin/home-backgrounds','Admin\MediasettingsController@avigher_technologies_bgform');
	Route::post('/admin/home-backgrounds', ['as'=>'admin.home-backgrounds','uses'=>'Admin\MediasettingsController@avigher_editsettings']);
	/* end home background */
	
	
	
	/* color settings */
	
	Route::get('/admin/color-settings','Admin\ColorsettingsController@showform');
	Route::post('/admin/color-settings', ['as'=>'admin.color-settings','uses'=>'Admin\ColorsettingsController@editsettings']);
	
	/* end color settings */
	
	
	/* start slideshow */
	
	Route::get('/admin/slideshow','Admin\SlideshowController@index');
	Route::get('/admin/add-slideshow','Admin\AddslideshowController@formview');
	Route::post('/admin/add-slideshow', ['as'=>'admin.add-slideshow','uses'=>'Admin\AddslideshowController@addslideshowdata']);
	Route::get('/admin/slideshow/{id}','Admin\SlideshowController@destroy');
	Route::get('/admin/edit-slideshow/{id}','Admin\EditslideshowController@showform');
	Route::post('/admin/edit-slideshow', ['as'=>'admin.edit-slideshow','uses'=>'Admin\EditslideshowController@slideshowdata']);
	Route::post('/admin/slideshow', ['as'=>'admin.slideshow','uses'=>'Admin\SlideshowController@delete_all']);
	/* end slideshow */
	
	
	
	/* start language */
	
	
	Route::get('/admin/language','Admin\LanguageController@index');
	Route::get('/admin/add-language','Admin\AddlanguageController@formview');
	Route::get('/admin/language/{action}/{id}/{sid}','Admin\LanguageController@status');
	Route::post('/admin/add-language', ['as'=>'admin.add-language','uses'=>'Admin\AddlanguageController@addlanguagedata']);
	Route::get('/admin/language/{id}','Admin\LanguageController@destroy');
	Route::get('/admin/edit-language/{id}','Admin\EditlanguageController@showform');
	Route::post('/admin/edit-language', ['as'=>'admin.edit-language','uses'=>'Admin\EditlanguageController@languagedata']);
	Route::get('/admin/language/{id}/{sid}','Admin\LanguageController@asdefault');
	
	/* end language */
	
	
	
	
	
	/* donate history */
	
	Route::get('/admin/donate','Admin\DonateController@index');
	Route::get('/admin/donate/{id}','Admin\DonateController@destroy');
	
	
	/*  end donate history */
	
	
	/* order history */
	
	Route::get('/admin/orders','Admin\OrdersController@index');
	Route::get('/admin/orders/{id}','Admin\OrdersController@destroy');
	Route::get('/admin/orders/{id}/{status}','Admin\OrdersController@payment_confirm');
	Route::get('/admin/order_more/{id}','Admin\OrdersController@order_more');
	
	/* end order history */
	
	
	
	
	
   
});


Route::group(['middleware' => 'web'], function (){
    
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/my-comments', 'DashboardController@mycomments');
	Route::get('/my-comments/{id}', 'DashboardController@mycomments_destroy');
	
	Route::get('/my-orders', 'DashboardController@myorders');
    Route::get('/my-orders/{delete}/{id}', 'DashboardController@myorders_destroy');
	
	Route::get('/view_order/{id}', 'DashboardController@view_orders');
});




