<?php

namespace App\Providers;

use App\Interfaces\SpellChecker;
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
        $this->mergeConfigFrom(config_path("spell-checker.php"), "SpellChecker");
        $this->app->bind('SpellChecker', function () {
            // Here we want to bind our SpellChecker provider class.
            // you can change selected provider in SpellChecker config file
            $provider = config("SpellChecker.provider");
            if (class_implements($provider, SpellChecker::class))
                return new $provider;
            else {
                throw new \Exception("Invalid SpellChecker Provider");
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
