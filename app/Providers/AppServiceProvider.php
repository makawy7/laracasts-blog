<?php

namespace App\Providers;

use App\Services\Newsteller;
use App\Services\SendinBlueNewsletter;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(Newsteller::class, function () {
            return new SendinBlueNewsletter();
        });
        // $this->app->bind('foo', fn () => 'bar');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();
    }
}
