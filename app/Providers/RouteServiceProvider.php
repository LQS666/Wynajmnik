<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::pattern('id', '[0-9]+');
        Route::pattern('address', '[0-9]+');

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAuthRoutes();

        $this->mapMyAccountRoutes();

        $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "auth" routes for the application.
     *
     * These routes all receive the same middlewares as web routes
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        Route::middleware(['web', 'auth'])
             ->namespace($this->namespace)
             ->group(base_path('routes/auth.php'));
    }

    /**
     * Define the "my-account" routes for the application.
     *
     * These routes all receive the same middlewares as web routes
     *
     * @return void
     */
    protected function mapMyAccountRoutes()
    {
        Route::middleware(['web', 'my-account'])
             ->namespace($this->namespace)
             ->group(base_path('routes/my-account.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive the same middlewares as web routes
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'admin'])
             ->namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }
}
