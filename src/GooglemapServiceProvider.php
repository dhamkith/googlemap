<?php

namespace Dhamkith\Googlemap;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Dhamkith\Googlemap\Facades\Map;

class GooglemapServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/../config/googlemap.php' => config_path('googlemap.php'),

            __DIR__.'/../resources/views/all.blade.php' => resource_path('views/vendor/googlemap/all.blade.php'),
            __DIR__.'/../resources/views/create.blade.php' => resource_path('views/vendor/googlemap/create.blade.php'),
            __DIR__.'/../resources/views/edit.blade.php' => resource_path('views/vendor/googlemap/edit.blade.php'),
            __DIR__.'/../resources/views/view.blade.php' => resource_path('views/vendor/googlemap/view.blade.php'),

            __DIR__.'/../public/css/googlemap.css' => public_path('css/googlemap.css'),
            __DIR__.'/../public/js/googlemap.js' => public_path('js/googlemap.js')
        ], 'googlemap');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();

        $this->loadViewComponentsAs('map', [
            \Dhamkith\Googlemap\View\Components\LocationCreate::class,
            \Dhamkith\Googlemap\View\Components\LocationEdit::class,
            \Dhamkith\Googlemap\View\Components\LocationAll::class,
            \Dhamkith\Googlemap\View\Components\LocationView::class,
            \Dhamkith\Googlemap\View\Components\Massages::class,
        ]);
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'googlemap');

        $this->registeFacades();
        $this->registeRoutesr();
    }

    protected function registeRoutesr()
    {
        Route::group($this->routeConfiguration(), function (){
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            'prefix' => Map::path(),
            'namespace' => 'Dhamkith\Googlemap\Http\Controllers',
            'middleware' => 'web'
        ];
    }

    protected function registeFacades()
    {
        $this->app->singleton('Map', function ($app) {
            return new \Dhamkith\Googlemap\Map();
        });
    }
}
