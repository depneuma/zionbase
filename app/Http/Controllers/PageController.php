<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Hero;
use App\Models\User;
use App\Traits\Base;
use App\Models\Event;
use App\Models\Sermon;
use App\Models\Setting;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Notifications\Subscribed;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\SubscriptionStoreRequest;

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
        $heros = Hero::all();
        $event = Event::orderBy('date_time')->first();
        $blogs = Blog::orderBy('created_at', 'desc')->get()->take(3);
        return view('pages.welcome', compact(['heros', 'event', 'blogs']));
    }

    public function about()
    {
        $founder = User::where('title', Setting::get('owner_title'))->first() ?? User::first();
        $leaders = User::where('title', 'Pastor')->get()->forget($founder->id);
        $this->setPageTitle('About Us', 'About ' . config('settings.church_name'));
        return view('pages.about', compact(['founder', 'leaders']));
    }

    public function sermons()
    {
        $sermons = Sermon::latest()->paginate();
        $this->setPageTitle('Sermons', 'Download Messages');
        return view('pages.sermons', compact(['sermons']))->with('sn', 1);
    }

    public function events()
    {
        $events = Event::orderBy('date_time')->with('firstRsvp')->paginate();

        $this->setPageTitle('Events', 'Upcoming Events');
        return view('pages.events', compact(['events']));
    }

    public function blogs()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->with('author')->paginate();
        $this->setPageTitle('Blogs', 'Your Life News');
        return view('pages.blogs', compact(['blogs']));
    }

    public function showBlog(Request $request, $slug)
    {
        $search = $request->get('search', '');

        $blog = Blog::where('slug', $slug)->first();
        $blogs = Blog::search($search)
            ->orderBy('created_at', 'desc')
            ->paginate()->forget($blog->id);
        $this->setPageTitle('Article', $blog->title);
        return view('pages.blog', compact(['blog', 'blogs', 'search'])); 
    }

    public function subscribe(SubscriptionStoreRequest $request)
    {
        $validated = $request->validated();
        $isUser = User::where('email', $validated['email'])->first();
        
        if (is_null($isUser)) {
            $subscriber = Subscription::firstOrCreate($validated);
            $subscriber->notify(new Subscribed());
        }
        
        Alert::toast('You have subscribed successfully!','success');
        return redirect()->back();
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
