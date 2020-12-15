<?php

namespace App\Http\Controllers;

use App\Traits\Base;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use Base;
    /**
     * Create a new controller instance.
     *
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['home', 'profile']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        return view('pages.welcome');
    }

    public function about()
    {
        $this->setPageTitle('About Us', 'About '. config('settings.church_name'));
        return view('pages.about');
    }

    public function sermons()
    {
        $this->setPageTitle('Sermons', 'Download Messages');
        return view('pages.sermons');
    }

    public function events()
    {
        $this->setPageTitle('Events', 'Upcoming Events');
        return view('pages.events');
    }

    public function blogs()
    {
        $this->setPageTitle('Blogs', 'Your Life News');
        return view('pages.blogs');
    }

    public function showBlog($blog)
    {
        $this->setPageTitle('Article', $blog);
        return view('pages.blog');
    }

    public function contact()
    {
        $this->setPageTitle('Contact Us', 'We Love To Hear From You');
        return view('pages.contact');
    }
    
    public function home()
    {
        return view('pages.home');
    }


    public function profile()
    {
        return view('profile.eidt');
    }
}
