<?php

namespace App\Providers;

use App\Http\Resources\ActivityResource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        ActivityResource::withoutWrapping();
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
