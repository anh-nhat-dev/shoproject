<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Composers\CatesComposers;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerComposer();
    }

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
     * Register Composer view
     *
     * @return void
     */
    public function registerComposer()
    {
        view()->composer([
            'backend.cates.index', 
            'backend.cates.components.form',
            'backend.products.components.form',
            'backend.products.add'
        ], CatesComposers::class);
    }
}
