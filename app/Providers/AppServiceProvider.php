<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Notifikasi;

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

        View::share('notif', $notif);

        // dd($notif);
        Schema::defaultStringLength(191);
    }
}