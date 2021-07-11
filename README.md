# Livewire Notiflix

This package provides the non-blocking notifications and pop-up boxes utilities for your [**livewire**](**https://laravel-livewire.com**) components.  
Currently using [**notiflix**](https://www.notiflix.com) library under the hood.
You can now use your favorite [**notiflix**](https://www.notiflix.com) library without writing any custom Javascript.


## Installation

You can install the package via composer:

```bash
composer require kevsuarez/livewire-notiflix
```


## Requirements

This package uses [**`livewire/livewire`**](https://laravel-livewire.com) under the hood. Please make sure you include it in your dependencies before using this package.

- [**PHP v7.2 or higher**](https://www.php.net/)
- [**Laravel v7 or v8**](https://www.laravel.com)
- [**Livewire v2**](https://www.laravel-livewire.com)
- [**Notiflix**](https://www.notiflix.com)


## Register Service Provider

The service provider will automatically get registered. Or you may manually add the service provider in your `config/app.php` file:

```php
'providers' => [
    // ...
    Kevsuarez\LivewireNotiflix\LivewireNotiflixServiceProvider::class,
];
```


## Publish Config File

This package publishes a `config/livewire-notiflix.php` file:

```bash
php artisan vendor:publish --provider="Kevsuarez\LivewireNotiflix\LivewireNotiflixServiceProvider" --tag="config"
```


## Usage

Insert [**notiflix**](https://www.notiflix.com) and livewire notiflix scripts directive after livewire scripts directive.

> **NOTE: Notiflix script is not included by default so make sure you include it before @livewireNotiflixScripts**

```html
<body>
    ...
    @livewireScripts
    ...
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.0.1/dist/notiflix-aio-3.0.1.min.js"></script>
    ...
    @livewireNotiflixScripts
    ...
</body>
```

---

### `1` : `Notify`

#### Params

```php
/*
* @param1 {String}: Optional, type text in String format.
*   -> Supported values:
*       • success
*       • info
*       • warning
*       • error
*       • failure
*    
*   -> Default value: 'success'
*
* @param2 {String}: Optional, message text in String format.
*   -> Default value: 'Message'
*
* @param3 {Array}: Optional, extend the initialize options with new options and the callback for each notification element.
*   -> Default value: []
*
* @param4 {Bool}: Optional, enable the callback that is triggered when the notification element has been clicked.
    -> Default value: false
*/
```

#### Example

```php
public function triggerNotify()
{
    $type        = 'success';
    $message     = 'Thanks! for use livewire notiflix';
    $options     = [];
    $useCallback = false;

    $this->notify($type, $message, $options, $useCallback);
}
```

#### Using Callback

First, setup your action method for onNotifyClick callback. Of course you can name your method anything you want.

```php
public function onNotifyClick()
{
    $this->notify(
        'success',
        'Thanks! for choose Livewire Notiflix.'
    );
}
```

Make sure you register onNotifyClick method as event listeners. See: [**Events | Laravel Livewire**](https://laravel-livewire.com/docs/2.x/events) for more information about event listeners.

```php
protected $listeners = [
    'onNotifyClick',
    ...
];
```

Finally, create an action method that triggers the notify alert with onNotifyClick callback pointed to the event listeners you registered. 

```php
public function triggerNotify()
{
    $type        = 'success';
    $message     = 'Message text';
    $options     = [];
    $useCallback = true;

    $this->notify($type, $message, $options, $useCallback);
}
```

---

### `2` : `Alert (Report)`

#### Params

```php
/*
* @param1 {String}: Optional, type text in String format.
*   -> Supported values:
*       • success
*       • info
*       • warning
*       • error
*       • failure
*    
*   -> Default value: 'success'
*
* @param2 {String}: Optional, title text in String format.
*   -> Default value: 'Title'
*
* @param3 {String}: Optional, message text in String format.
*   -> Default value: 'Message'
*
* @param4 {String}: Optional, button text in String format.
*   -> Default value: 'Okay'
*
* @param5 {Array}: Optional, extend the initialize options with new options and the callback for each element.
*   -> Default value: []
*
* @param6 {Bool}: Optional, enable the callback that is triggered when the 'Okay' button has been clicked.
*   -> Default value: false
*/
```

#### Example

```php
public function triggerAlert()
{
    $type        = 'success';
    $title       = 'Title text';
    $message     = 'Message text';
    $buttonText  = 'Okay';
    $options     = [];
    $useCallback = false;

    $this->alert($type, $title, $message, $buttonText, $options, $useCallback);
}
```

#### Using Callback

First, setup your action method for onAlertClick callback. Of course you can name your method anything you want.

```php
public function onAlertClick()
{
    $this->notify(
        'success',
        'Thanks! for choose Livewire Notiflix.'
    );
}
```

Make sure you register onAlertClick method as event listeners. See: [**Events | Laravel Livewire**](https://laravel-livewire.com/docs/2.x/events) for more information about event listeners.

```php
protected $listeners = [
    'onAlertClick',
    ...
];
```

Finally, create an action method that triggers the notify alert with onAlertClick callback pointed to the event listeners you registered. 

```php
public function triggerAlert()
{
    $type        = 'success';
    $title       = 'Title text';
    $message     = 'Message text';
    $buttonText  = 'Okay';
    $options     = [];
    $useCallback = true;

    $this->alert($type, $title, $message, $buttonText, $options, $useCallback);
}
```

---

### `3` : `Flash`

#### Params

```php
/*
* @param1 {String}: Optional, mode text in String format.
*   -> Supported values:
*       • notify
*       • alert
*
*   -> Default value: 'notify'
*
* @param2 {Array}: Optional, arguments in Array format.  
*   -> Supports all "notify or alert" arguments as an associative array.
*
*   -> Default value: All "notify" arguments as an associative array.
*/
```

#### Example

```php
public function triggerFlash()
{
    //Mode: notify 
    $this->flash('notify', [
        'type'        => 'success',
        'message'     => 'Message text',
        'options'     => [],
        'useCallback' => false,
    ]);

    //Or

    //Mode: alert
    $this->flash('alert', [
        'type'        => 'success',
        'title'       => 'Title text',
        'message'     => 'Message text',
        'buttonText'  => 'Okay',
        'options'     => [],
        'useCallback' => false,
    ]);
}
```

>  **NOTE: Callback is enabled for both modes.**


---

### `4` : `Confirm`

#### Params

```php
/*
* @param1 {String}: Optional, title text in String format.
*   -> Default value: 'Title'
*
* @param2 {String}: Optional, message text in String format.
*   -> Default value: 'Message'
*
* @param3 {String}: Optional, confirm button text in String format.
*   -> Default value: 'Confirm'
*
* @param4 {String}: Optional, cancel button text in String format.
*   -> Default value: 'Cancel'
*
* @param5 {Array}: Optional, extend the initialize options with new options and the callbacks for each confirm box.
*   -> Default value: []
*/
```

#### Example

First, setup your action methods for confirmed and cancelled (optional) callback. Of course you can name your methods anything you want.

```php
public function confirmed($params)
{
    $this->alert(
        'success',
        'Thanks! consider giving it a star on github.'
    );
}

public function cancelled()
{
    $this->alert(
        'info',
        'Understood',
    );
}
```

Make sure you register onConfirmed and onCancelled methods as event listeners. See: [**Events | Laravel Livewire**](https://laravel-livewire.com/docs/2.x/events) for more information about event listeners.

```php
protected $listeners = [
    'onConfirmed' => 'confirmed',
    'onCancelled' => 'cancelled'
    ...
];
```

Finally, create an action method that triggers the confirmation alert with onConfirmed and onCancelled callbacks pointed to the event listeners you registered. 

```php
public function triggerConfirm()
{
    $title             = 'Livewire Notiflix';
    $message           = 'Do you love Livewire Notiflix?';
    $confirmButtonText = 'Confirm';
    $cancelButtonText  = 'Cancel';
    $options           = [
        'onConfirmed' => 'onConfirmed',
        'onCancelled' => 'onCancelled',

        //You can pass the value as an argument to the confirm method, if you want.
        'params'      => 'Thanks! for choose Livewire Notiflix.',
    ];

    $this->confirm($title, $message, $confirmButtonText, $cancelButtonText, $options);
}
```

---

### `5` : `Ask`

#### Params

```php
/*
* @param1 {String}: Optional, title text in String format.
*   -> Default value: 'Title'
*
* @param2 {String}: Optional, question text in String format.
*   -> Default value: 'Question'
*
* @param3 {String}: Optional, answer text in String format.
*   -> Default value: 'Answer'
*
* @param4 {String}: Optional, answer button text in String format.
*   -> Default value: 'Answer'
*
* @param5 {String}: Optional, cancel button text in String format.
*   -> Default value: 'Cancel'
*
* @param6 {Array}: Optional, extend the initialize options with new options and the callbacks for each confirm box.
*   -> Default value: []
*/
```

#### Example

```php
public function triggerAsk()
{
    $title             = 'Livewire Notiflix';
    $question          = 'Do you love Livewire Notiflix?';
    $answer            = 'yes';
    $answerButtonText  = 'Answer';
    $cancelButtonText  = 'Cancel';
    $options           = [];

    $this->ask($title, $question, $answer, $answerButtonText, $cancelButtonText, $options);
}
```

#### Using Callbacks

First, setup your action methods for onAskConfirmed and onAskCancelled (optional) callback. Of course you can name your methods anything you want.

```php
public function onAskConfirmed($params)
{
    $this->alert(
        'success',
        'Thanks! consider giving it a star on github.'
    );
}

public function onAskCancelled()
{
    $this->alert(
        'info',
        'Understood',
    );
}
```

Make sure you register onAskConfirmed and onAskCancelled methods as event listeners. See: [**Events | Laravel Livewire**](https://laravel-livewire.com/docs/2.x/events) for more information about event listeners.

```php
protected $listeners = [
    'onAskConfirmed',
    'onAskCancelled',
    ...
];
```

Finally, create an action method that triggers the confirmation box with onAskConfirmed and onAskCancelled callbacks pointed to the event listeners you registered. 

```php
public function triggerAsk()
{
    $title             = 'Livewire Notiflix';
    $question          = 'Do you love Livewire Notiflix?';
    $answer            = 'yes';
    $answerButtonText  = 'Answer';
    $cancelButtonText  = 'Cancel';
    $options           = [
        'onAskConfirmed' => 'onAskConfirmed',
        'onAskCancelled' => 'onAskCancelled',

        //You can pass the value as an argument to the onAskConfirmed method, if you want.
        'params'         => 'Thanks! for choose Livewire Notiflix.',
    ];

    $this->ask($title, $question, $answer, $answerButtonText, $cancelButtonText, $options);
}
```

---

## Testing

```bash
composer test
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Security

If you discover any security related issues, please email kevsuarezc@gmail.com instead of using the issue tracker.


## Credits

- [Kevin Suárez](https://github.com/kevsuarez)
- [All Contributors](../../contributors)


## Copyright

Copyright © Kevin Suárez


##  License
Livewire Notiflix is open-sourced software licensed under the [MIT license](LICENSE).