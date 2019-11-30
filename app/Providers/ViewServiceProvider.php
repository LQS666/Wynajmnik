<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['*'], 'App\Http\View\Composers\GlobalComposer'
        );

        View::composer(
            ['my-account.addresses'], 'App\Http\View\Composers\AddressesComposer'
        );

        View::composer(
            ['my-account.products'], 'App\Http\View\Composers\ProductsComposer'
        );

        // TODO
        //View::composer(
        //    ['my-account.profile'], 'App\Http\View\Composers\MyAccountComposer'
        //);
    }
}
