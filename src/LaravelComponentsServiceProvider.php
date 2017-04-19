<?php

namespace Peterombao\LaravelComponents;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\ServiceProvider;
use Peterombao\LaravelComponents\Ui\Theme\Command\LoadCurrentTheme;

class LaravelComponentsServiceProvider extends ServiceProvider
{
    use DispatchesJobs;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/form', 'form');

        $this->loadViewsFrom(__DIR__ . '/../resources/views/table', 'table');

        //$this->dispatch(new LoadCurrentTheme());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
