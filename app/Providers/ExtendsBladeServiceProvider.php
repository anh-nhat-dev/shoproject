<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use App\Blade\Facades\CheckIssetDirective;
use App\Blade\Facades\StatusLabelDirective;

class ExtendsBladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->registerBlade();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('check.isset.diretive', function () {
            return new \App\Blade\CheckIssetDirective();
        });
        $this->app->bind('status.diretive', function () {
            return new \App\Blade\StatusLabelDirective();
        });

        $this->regiterAlias();
    }

    /**
     * Register Blade
     * 
     * @return void
     */

     public function registerBlade()
     {
        $this->checkIsset();
     }


     public function regiterAlias()
     {
        $this->app->booting(function(){
            AliasLoader::getInstance()->alias('CheckIssetDirective', CheckIssetDirective::class);
            AliasLoader::getInstance()->alias('StatusLabelDirective', StatusLabelDirective::class);
        });
     }

     public function checkIsset()
     {
        $this->app['blade.compiler']->directive('isset', function ($value) {
            return CheckIssetDirective::show($value);
        });
        $this->app['blade.compiler']->directive('status', function ($value) {
            // dd($value);
            return "<?php echo StatusLabelDirective::show($value); ?>";
        });
     }
}
