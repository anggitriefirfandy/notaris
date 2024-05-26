<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Blade::if('IsAdmin', function () {
            return Auth::user()->role_id == 0;
        });
        Blade::if('IsNotaris', function () {
            return Auth::user()->role_id == 1;
        });
        Blade::if('IsStaff', function () {
            return Auth::user()->role_id == 2;
        });
        Blade::if('IsPetugas', function () {
            return Auth::user()->role_id == 3;
        });
        Blade::if('IsPetugas2', function () {
            return Auth::user()->role_id == 4;
        });
        Blade::if('IsPeserta', function () {
            return Auth::user()->role_id == 5;
        });
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
    }
}
