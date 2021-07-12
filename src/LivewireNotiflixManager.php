<?php

namespace Kevsuarez\LivewireNotiflix;

use Str;
use Exception;

class LivewireNotiflixManager
{
    private const NOTIFLIX = 'Notiflix';

    public function scripts()
    {
        $debug = config('app.debug');

        $scripts = $this->javaScriptAssets();

        // HTML Label
        $html = $debug ? ['<!-- Livewire Notiflix Scripts -->'] : [];

        // JavaScript assets
        $html[] = $debug ? $scripts : $this->minify($scripts);

        return implode("\n", $html);
    }

    public function getNotiflixFnName($boxType, $messageType): String
    {
        return implode('.', [
            self::NOTIFLIX,
            $boxType,
            self::getNamingConventionOf(($messageType === 'error') ? 'failure': $messageType),
        ]);
    }

    private function getNamingConventionOf($string)
    {
        $namingConvention = config('livewire-notiflix.naming_convention') ?? null;

        throw_unless(
            in_array($namingConvention, ['PascalCase', 'camelCase']),
            Exception::class,
            'Unsupported naming convention. Please use one of the naming conventions available in the config "config/livewire-notiflix.php" file.'
        );

        if($namingConvention === 'PascalCase'){
            return Str::studly($string);
        }else if($namingConvention === 'camelCase'){
            return Str::camel($string);
        }
    }

    private function javaScriptAssets()
    {
        $windowLivewireCheck = '';
        $windowNotiflixCheck = '';
        $callFnWarning       = '';

        if (config('app.debug')) {
	        $windowLivewireCheck = <<<HTML
                                    if (!window.livewire) {
                                        console.warn("Livewire: It looks like Livewire's @livewireScripts JavaScript assets haven't already been loaded. Make sure you are loading.\\n Reference docs for more info: https://laravel-livewire.com/")
                                    }
HTML;

	        $windowNotiflixCheck = <<<HTML
                                    if (!window.Notiflix) {
                                        console.warn("Notiflix: It looks like Notiflix´s JavaScript assets hasn't already been loaded. Make sure you are loading.\\n Reference docs for more info: https://www.notiflix.com/")
                                    }
HTML;
            $callFnWarning       = <<<HTML
                                    console.warn(['Function "', fn, '" undefined'].join(''));
HTML;
        }
        
        $scripts = implode('', [
            $windowLivewireCheck,
            $windowNotiflixCheck,
            str_replace(['<script>', '</script>'], '', view('livewire-notiflix::includes.scripts')->render()),
        ]);

        return <<<HTML
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function callFn(fnName) {            
            var fn = fnName.split('.').reduce(function index(ele,index) {
                return ele[index] || '';
            }, window);

            if(typeof fn !== 'function'){
                {$callFnWarning}
                return;
            }

            const args = Array.prototype.slice.call(arguments, 1);
            const flatten = arr => arr.reduce((acc, el) => acc.concat(el), []);

            fn(...flatten(args));
        }

        {$scripts}
    });
</script>
HTML;
    }

    private function minify($subject)
    {
        return preg_replace('~(\v|\t|\s{2,})~m', '', $subject);
    }
}