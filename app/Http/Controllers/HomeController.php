<?php

namespace App\Http\Controllers;

use App\Traits\Base;
use Illuminate\Http\Request;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function profile()
    {
        $this->setPageTitle('Edit Profile', 'Edit Your Profile');
        return view('profile.edit');
    }
}
