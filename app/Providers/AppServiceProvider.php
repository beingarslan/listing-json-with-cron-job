<?php

namespace App\Providers;

use App\View\Components\EditComponent;
use App\View\Components\ListComponent;
use Illuminate\Support\Facades\Blade;
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
        Blade::component('list-component', ListComponent::class);
        Blade::component('edit-component', EditComponent::class);
    }
}
