<?php

namespace Kevsuarez\LivewireNotiflix;

use Str;
use Exception;
use ReflectionMethod;
use Livewire\Component;

class LivewireNotiflixMacros
{
    public static function registerMacros()
    {
        $instance = new static;

        //Register Notify Macro
        $instance->registerNotifyMacros();
        //Register Alert Macro
        $instance->registerAlertMacros();
        //Register Flash Macro
        $instance->registerFlashMacro();
        //Register Confirm Macro
        $instance->registerConfirmMacro();
        //Register Ask Macro
        $instance->registerAskMacro();
    }

    protected function registerNotifyMacros()
    {        
        // Register Notify Macro
        Component::macro('notify', function ($type = 'success', $message = 'Message', $options = [], $useCallback = false) {
            $options = array_merge(config('livewire-notiflix.notify') ?? [], $options);

            $this->dispatchBrowserEvent('livewire-notiflix:notify', [
                'fnName'        => LivewireNotiflix::getNotiflixFnName('Notify', $type),
                'message'       => $message,
                'options'       => collect($options)->except([
                                        'onNotifyClick',
                                    ])->toArray(),
                'onNotifyClick' => $useCallback ? $options['onNotifyClick']: null,
            ]);
        });
    }

    protected function registerAlertMacros()
    {    
        // Register Alert Macro
        Component::macro('alert', function ($type = 'success', $title = 'Title', $message = 'Message', $buttonText = 'Okay', $options = [], $useCallback = false) {    
            $options    = array_merge(config('livewire-notiflix.alert') ?? [], $options);

            $this->dispatchBrowserEvent('livewire-notiflix:alert', [
                'fnName'       => LivewireNotiflix::getNotiflixFnName('Report', $type),
                'title'        => $title,
                'message'      => $message,
                'buttonText'   => $buttonText,
                'options'      => collect($options)->except([
                                    'onAlertClick',
                                ])->toArray(),
                'onAlertClick' => $useCallback ? $options['onAlertClick']: null,
            ]);
        });
    }

    protected function registerFlashMacro()
    {
        //Register Flash Macro
        Component::macro('flash', function ($mode = 'notify', $arguments = []){

            throw_unless(
                in_array($mode, ['notify', 'alert']),
                Exception::class,
                'unsupported mode.'
            );
            
            $defaultArgs = [
                'type' => 'success',
                'message' => 'Message',
                'options' => [],
                'useCallback' => false
            ];

            if($mode == 'alert'){
                $defaultArgs['title']      = 'Title';
                $defaultArgs['buttonText'] = 'Okay';
            }

            //Merge the defaultArgs and arguments arrays
            $arguments            = array_merge($defaultArgs, is_array($arguments) ? $arguments: []);
            
            //Remove all keys that aren´t defined in defaultArgs from the args array.
            $arguments            = array_intersect_key($arguments, $defaultArgs);
            
            //Set fnName key into args array
            $arguments['fnName']  = LivewireNotiflix::getNotiflixFnName(ucfirst(($mode == 'alert') ? 'report': $mode), $arguments['type']);

            //Merge the options that were passed in the arguments with the default options
            $arguments['options'] = array_merge(config('livewire-notiflix.' . $mode) ?? [], $arguments['options'] ?? []);

            //Unset all key that is numeric
            $arguments['options'] = array_filter($arguments['options'], function($value) {
                return !is_numeric($value);
            }, ARRAY_FILTER_USE_KEY);

            //Set callback
            $callback = ($mode == 'alert') ? 'onAlertClick': 'onNotifyClick';
            $arguments[$callback] = ($arguments['useCallback']) ? $arguments['options'][$callback]: null;

            //Remove options array callback
            $arguments['options'] = collect($arguments['options'])->except([
                                    'onAlertClick',
                                    'onNotifyClick',
                                ])->toArray();

            //Flash into session
            session()->flash('livewire-notiflix', [
                'mode' => $mode,
                'args' => collect($arguments)->except([
                                'type',
                                'useCallback',
                            ])->toArray(),
            ]);
        });
    }

    protected function registerConfirmMacro()
    {
        //Register Confirm Macro
        Component::macro('confirm', function ($title = 'Title', $message = 'Message', $confirmButtonText = 'Confirm', $cancelButtonText = 'Cancel', $options = []) {
            $options = array_merge(config('livewire-notiflix.confirm') ?? [], $options);

            $identifier = Str::uuid()->toString();

            $this->dispatchBrowserEvent('livewire-notiflix:confirming', $identifier);

            $this->dispatchBrowserEvent($identifier, [
                'fnName'            => LivewireNotiflix::getNotiflixFnName('Confirm', 'show'),
                'title'             => $title,
                'message'           => $message,
                'confirmButtonText' => $confirmButtonText,
                'cancelButtonText'  => $cancelButtonText,
                'options'           => collect($options)->except([
                                            'onConfirmed',
                                            'onCancelled'
                                        ])->toArray(),
                'onConfirmed'       => $options['onConfirmed'],
                'onCancelled'       => $options['onCancelled'] ?? null
            ]);
        });
    }

    protected function registerAskMacro()
    {
        //Register Ask Macro
        Component::macro('ask', function ($title = 'Title', $question = 'Question', $answer = 'Answer', $answerButtonText = 'Answer', $cancelButtonText = 'Cancel', $options = []) {
            $options = array_merge(config('livewire-notiflix.ask') ?? [], $options);

            $identifier = Str::uuid()->toString();

            $this->dispatchBrowserEvent('livewire-notiflix:asking', $identifier);

            $this->dispatchBrowserEvent($identifier, [
                'fnName'           => LivewireNotiflix::getNotiflixFnName('Confirm', 'ask'),
                'title'            => $title,
                'question'         => $question,
                'answer'           => $answer,
                'answerButtonText' => $answerButtonText,
                'cancelButtonText' => $cancelButtonText,
                'options'          => collect($options)->except([
                                            'onAskConfirmed',
                                            'onAskCancelled'
                                        ])->toArray(),
                'onAskConfirmed'   => $options['onAskConfirmed'],
                'onAskCancelled'   => $options['onAskCancelled'] ?? null
            ]);
        });
    }
}