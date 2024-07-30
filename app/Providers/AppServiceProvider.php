<?php

namespace App\Providers;

use App\Models\Logo;
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $logo = Logo::orderByDesc('id')->limit(1)->first();
        view()->share('Logo',$logo);
    }
}
