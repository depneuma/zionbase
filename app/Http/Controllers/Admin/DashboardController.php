<?php namespace Responsive\Http\Controllers\Admin;

use Responsive\Http\Controllers\Admin\AdminController;
/*use App\Article;
use App\ArticleCategory;
use App\User;
use App\Photo;
use App\PhotoAlbum;*/
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        view()->share('type', '');
    }

	public function index()
	{
        $title = "Dashboard";
		
		$total_user = DB::table('users')
		              ->where('id','!=','1')
			           ->count();

		
        $total_sermons = DB::table('sermons')
		                ->where('parent', '=', 0)
			            ->count();
		
		
        $total_blog = DB::table('post')
			           ->where('post_type','=', 'blog')
					   ->where('parent', '=', 0)
					   ->count();
					   
					   
		$total_booking = DB::table('booking')
			             ->count();


		 $total_events = DB::table('post')
			           ->where('post_type','=', 'event')
					   ->where('parent', '=', 0)
					   ->count();

         $curdate = date("Y-m-d H:i:s");			   
		$today_booking = DB::table('booking')
			           ->where('entrydatetime','=', $curdate)
					   ->count();
					  
					  
					  
					  
			$curr_date=date("Y-m-d");

$last_date1=date('Y-m-d',strtotime("-1 days"));
$last_date2=date('Y-m-d',strtotime("-2 days"));
$last_date3=date("Y-m-d", strtotime("-3 days"));
$last_date4=date("Y-m-d", strtotime("-4 days"));
$last_date5=date("Y-m-d", strtotime("-5 days"));
$last_date6=date("Y-m-d", strtotime("-6 days"));


                      $date1 = DB::table('booking')
			           ->where('bookdate','=', $curr_date)
					   ->count();
					   $date2 = DB::table('booking')
			           ->where('bookdate','=', $last_date1)
					   ->count();
					   $date3 = DB::table('booking')
			           ->where('bookdate','=', $last_date2)
					   ->count();
					   $date4 = DB::table('booking')
			           ->where('bookdate','=', $last_date3)
					   ->count();
					   $date5 = DB::table('booking')
			           ->where('bookdate','=', $last_date4)
					   ->count();
					   $date6 = DB::table('booking')
			           ->where('bookdate','=', $last_date5)
					   ->count();
					   $date7 = DB::table('booking')
			           ->where('bookdate','=', $last_date6)
					   ->count();



$javas="{ label: '$last_date6', y: $date7 },";
$javas.="{ label: '$last_date5', y: $date6 },";
$javas.="{ label: '$last_date4', y: $date5 },";
$javas.="{ label: '$last_date3', y: $date4 },";
$javas.="{ label: '$last_date2', y: $date3 },";
$javas.="{ label: '$last_date1', y: $date2 },";
$javas.="{ label: '$curr_date', y: $date1 },";
		  
					  
					  $booking	= DB::table('booking')
			           
			           ->orderBy('booking.entrydatetime','desc')
					   ->limit(5)->offset(0)
					   ->get();
			
					  
				$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();	   
		
		$users = DB::table('users')
		         ->where('id','!=','1')
		         ->orderBy('id','desc')
				 ->limit(4)->offset(0)
				 ->get();
				 
			$testimonials = DB::table('testimonials')
			     ->where('parent','=',0)
		         ->orderBy('id','desc')
				 ->limit(3)->offset(0)
				 ->get();	


       



				 
		
		$data = array('total_sermons' => $total_sermons, 'total_user' => $total_user, 'total_blog' => $total_blog, 'total_booking' => $total_booking,
		'total_events' => $total_events, 'today_booking' => $today_booking, 'javas' => $javas, 'booking' => $booking,  'setting' => $setting, 'users' => $users,
		'testimonials' => $testimonials);
		
		return view('admin.index')->with($data);
		
		
		
		
	}
}