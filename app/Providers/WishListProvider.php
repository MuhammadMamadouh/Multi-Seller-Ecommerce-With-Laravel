<?php

namespace App\Providers;

use Darryldecode\Cart\Cart;
use Illuminate\Support\ServiceProvider;

class WishListProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $$this->app->singleton('cart', function($app)
        {
            $storageClass = config('shopping_cart.storage');
            $eventsClass = config('shopping_cart.events');

            $storage = $storageClass ? new $storageClass() : $app['session'];
            $events = $eventsClass ? new $eventsClass() : $app['events'];
            $instanceName = 'wishlist';

            // default session or cart identifier. This will be overridden when calling Cart::session($sessionKey)->add() etc..
            // like when adding a cart for a specific user name. Session Key can be string or maybe a unique identifier to bind a cart
            // to a specific user, this can also be a user ID
            $session_key = 'AsASDMCks0ks1';

            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
