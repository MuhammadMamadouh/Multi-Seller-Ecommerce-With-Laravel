<?php

namespace App\Providers;

use App\Models\SubCategory;
use App\Observers\SubCategoryObserver;
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
        //

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        SubCategory::observe(SubCategoryObserver::class);

        app()->singleton('lang', function (){
            if (session()->has('lang')){
                return session()->get('lang');
            }else{
                return 'en';
            }
        });

    }
}
