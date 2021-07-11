<?php

namespace Kevsuarez\LivewireNotiflix;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kevsuarez\LivewireNotiflix\LivewireNotiflixManager
 */
class LivewireNotiflix extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {        
        return 'livewire-notiflix';
    }
}