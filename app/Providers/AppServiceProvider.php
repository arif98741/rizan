<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services
     * @return void
     */
    public function boot()
    {
        // if (!Cache::has('site_details')) {
        //     $setting = Setting::first();
        //     Cache::put('site_details', $setting, 300); //5minutes;
        // }
    }
}