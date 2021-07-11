<?php

namespace Kevsuarez\LivewireNotiflix;

class LivewireNotiflixBladeDirectives
{
    public static function livewireNotiflixScripts($expression = [])
    {
        return '{!! \Kevsuarez\LivewireNotiflix\LivewireNotiflix::scripts('.$expression.') !!}';
    }
}