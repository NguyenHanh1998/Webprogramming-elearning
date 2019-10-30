<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'Course'
        ];

        foreach ($models as $model) {
            app()->bind('App\Repositories\Interfaces\I'.$model.'Repository', 
                'App\Repositories\Eloquent\\'.$model.'Repository');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

}
