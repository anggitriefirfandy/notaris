<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
        if (Auth::user()->role_id == 0) {
            return view('pages.dashboard.dashboardadmin');
        } elseif (Auth::user()->role_id == 1) {
            return view('pages.dashboard.dashboardnotaris');
        } elseif (Auth::user()->role_id == 2) {
            return view('pages.dashboard.dashboardstaff');
        } else {
            return view('pages.dashboard.dashboardpeserta');
        }
    }
}
