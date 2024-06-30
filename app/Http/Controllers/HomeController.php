<?php

namespace App\Http\Controllers;

use App\Models\tugas_model;
use Carbon\Carbon;
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
        $user = Auth::user();

        if ($user->role_id == 0) {
            return view('pages.dashboard.dashboardadmin');
        } elseif ($user->role_id == 1) {
            return view('pages.dashboard.dashboardnotaris');
        } elseif ($user->role_id == 2) {
            $tugas = tugas_model::where('user_id', $user->id)
                ->where(function ($query) {
                    $query->where('status', 0) // Tugas yang masih dalam proses
                        ->orWhere(function ($query) {
                            $query->where('status', 1) // Tugas yang selesai
                                ->whereDate('created_at', Carbon::today()); // Hanya yang dibuat hari ini
                        });
                })
                ->orderBy('status', 'asc')
                ->get();
            return view('pages.dashboard.dashboardstaff', compact('tugas', 'user'));

        } elseif ($user->role_id == 3) {
            $tugas = tugas_model::where('user_id', $user->id)->orderBy('status', 'asc')->get();
            return view('pages.dashboard.dashboardpetugascek', compact('tugas', 'user'));
        } elseif ($user->role_id == 4) {
            return view('pages.dashboard.dashboardpetugascek');
        } else {
            return view('pages.dashboard.dashboardpeserta');
        }
    }

}
