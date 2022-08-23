<?php

namespace App\Providers;

use App\Models\Platform;
use App\Services\PlatformFind;
use Illuminate\Support\Collection;
use App\Observers\PlatformObserver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use NascentAfrica\Jetstrap\JetstrapFacade;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PlatformService', function () {
            return new PlatformFind();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.domain' => request()->getHost()]);

        Paginator::useBootstrap();
        if (App::environment('local')) {
            JetstrapFacade::useAdminLte3();
        }
        if (config('app.force_https')) {
            URL::forceScheme('https');
        }
    }
}
