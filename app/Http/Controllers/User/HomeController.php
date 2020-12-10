<?php

namespace App\Http\Controllers\User;

use App\Traits\Base;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use Base;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except([
            'home'
        ]);
    }

    public function home()
    {
        $this->setPageTitle('Home', '');
        return view('guests.home');
    }

    public function dashboard()
    {
        $user = Auth::user();

        $this->setPageTitle('Dashboard', 'Welcome Investor');
        return view('users.dashboard');
    }

    public function profile()
    {
        $this->setPageTitle('Edit Profile', 'Edit Your Profile');
        return view('profile.edit');
    }
}
