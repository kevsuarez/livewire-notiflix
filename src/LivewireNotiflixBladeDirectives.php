<?php

namespace Kevsuarez\LivewireNotiflix;

class LivewireNotiflixBladeDirectives
{
    public static function livewireNotiflixScripts()
    {
        return '{!! \Kevsuarez\LivewireNotiflix\LivewireNotiflix::scripts() !!}';
    }
}