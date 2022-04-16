<?php

namespace App\Providers;

use App\Services\LanguageTool;
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
        $this->app->bind('SpeckChecker', function () {
            $provider = config("SpellChecker.provider");
            return new $provider;
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
