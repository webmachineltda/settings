# Settings for Laravel 5

## Install

Via Composer

``` bash
$ composer require webmachine/settings
```

Next, you must install the service provider and facade alias:

```php
// config/app.php
'providers' => [
    ...
    Webmachine\Settings\SettingsServiceProvider::class,
];

...

'aliases' => [
    ...
    'Settings' => Webmachine\Settings\SettingsFacade::class,
];
```

Publish

``` bash
$ php artisan vendor:publish --provider="Webmachine\Settings\SettingsServiceProvider"
```

## Usage

In your models or controllers:
``` php
...
use Webmachine\Settings\SettingsFacade as Settings;

class Foo extends ... {
    ...
    public function myfoo() {
        $my_setting = Settings::get('mygroup.mysetting');
    }
}
```

In your views
``` php
Settings::get('mygroup.mysetting')
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
