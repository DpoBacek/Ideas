<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        \Debugbar::enable();

        $topUsers = Cache::remember('topUsers', 60 * 2, function () {
            return User::withCount('followers')->orderBy('followers_count', 'desc')->limit(5)->get();
        });

        View::share('topUsers', $topUsers);
    }
}
