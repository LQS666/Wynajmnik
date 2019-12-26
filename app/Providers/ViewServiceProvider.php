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

        View::composer(
            ['my-account.offers'], 'App\Http\View\Composers\OffersComposer'
        );

        View::composer(
            [
                'my-account.product-new',
                'my-account.product-edit'
            ],
            'App\Http\View\Composers\ProductComposer'
        );

        View::composer(
            ['my-account.payments'], 'App\Http\View\Composers\PaymentsComposer'
        );

        // TODO
        //View::composer(
        //    ['my-account.profile'], 'App\Http\View\Composers\MyAccountComposer'
        //);
    }
}
