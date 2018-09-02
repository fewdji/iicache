<?php

namespace Fewdji\IICache;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IICacheServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([__DIR__ . '/config/' => config_path() . '/']);

        $this->loadRoutesFrom(__DIR__.'/Http/routes.php');

        /*
         * Register Blade "image" directive for image tag and link generator
         * For example:
         * @image('tag', ['path', 'filename', 'preset', ['alt' => 'Description']])
        */
        Blade::directive('image', function ($type) {
            return "<?php echo app('image')->link($type); ?>";
        });
    }

    public function register()
    {
        App::singleton('image', function(){
            return new \Fewdji\IICache\IICache();
        });
    }

}
