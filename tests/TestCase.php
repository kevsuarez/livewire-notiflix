<?php

namespace Kevsuarez\LivewireNotiflix\Tests;

use Orchestra\Testbench\TestCase as BaseCase;
use Livewire\LivewireServiceProvider;
use Kevsuarez\LivewireNotiflix\LivewireNotiflixServiceProvider;

class TestCase extends BaseCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            LivewireNotiflixServiceProvider::class,
        ];
    }

}