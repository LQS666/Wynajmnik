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
        ################################################################################################
        # GLOBAL

        View::composer(
            ['*'], 'App\Http\View\Composers\GlobalComposer'
        );

        ################################################################################################
        # ADMIN

        View::composer(
            ['admin.categories'], 'App\Http\View\Composers\Admin\CategoriesComposer'
        );

        View::composer(
            ['admin.filters'], 'App\Http\View\Composers\Admin\FiltersComposer'
        );

        View::composer(
            ['admin.sites'], 'App\Http\View\Composers\Admin\SitesComposer'
        );

        ################################################################################################
        # MY ACCOUNT

        View::composer(
            ['my-account.addresses'], 'App\Http\View\Composers\MyAccount\AddressesComposer'
        );

        View::composer(
            [
                'my-account.products',
                'admin.products',
            ],
            'App\Http\View\Composers\MyAccount\ProductsComposer'
        );

        View::composer(
            ['my-account.offers-my'], 'App\Http\View\Composers\MyAccount\OffersMyComposer'
        );

        View::composer(
            ['my-account.offers-foreign'], 'App\Http\View\Composers\MyAccount\OffersForeignComposer'
        );

        View::composer(
            [
                'my-account.product-new',
                'my-account.product-edit',
                'admin.product-edit'
            ],
            'App\Http\View\Composers\MyAccount\ProductComposer'
        );

        View::composer(
            ['my-account.payments'], 'App\Http\View\Composers\MyAccount\PaymentsComposer'
        );

        ################################################################################################
        # WEB

        View::composer(
            ['web.products'], 'App\Http\View\Composers\Web\ProductsComposer'
        );
    }
}
