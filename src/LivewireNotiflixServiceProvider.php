<?php

namespace Kevsuarez\LivewireNotiflix;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireNotiflixServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //Register Views
        $this->registerViews();
        //Register Blade Directives
        $this->registerBladeDirectives();
        // //Register Macros
        $this->registerMacros();
        //Register Publishables
        $this->registerPublishables();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //Register Config
        $this->registerConfig();
        //Register Singleton
        $this->registerLivewireNotiflixSingleton();
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php',
            'livewire-notiflix'
        );
    }

    protected function registerLivewireNotiflixSingleton()
    {
        $this->app->singleton(LivewireNotiflixManager::class);

        $this->app->alias(LivewireNotiflixManager::class, 'livewire-notiflix');
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'livewire-notiflix'
        );
    }

    protected function registerBladeDirectives()
    {
        Blade::directive('livewireNotiflixScripts', [LivewireNotiflixBladeDirectives::class, 'livewireNotiflixScripts']);
    }

    protected function registerMacros()
    {
        LivewireNotiflixMacros::registerMacros();
    }

    protected function registerPublishables()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('livewire-notiflix.php'),
            ], 'config');
        }
    }
}