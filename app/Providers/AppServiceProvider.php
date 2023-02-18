<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsteller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use App\Services\SendinBlueNewsletter;
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
        Gate::define('admin', function (User $user) {
            return $user->admin;
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
