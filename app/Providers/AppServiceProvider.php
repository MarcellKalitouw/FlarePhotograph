<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $notif = Notifikasi::where('from', 'Pelanggan')->where('status_notifikasi', 'Baru')->get();
        $request = request()->segment(1);
        View::share('notif', $notif);
        View::share('request',$request);

        // dd($notif);
        Schema::defaultStringLength(191);
    }
}