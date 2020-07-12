![Trans-Message](./assets/img/header.png)

Google Translation Message
--------------------------
A simple translate laravel command.

## Installation

```
composer require helmab/trans-message
```

Register `TransMessageServiceProvider` class into `config/app.php`

```php
<?php
    return [
         
        /*
         * Package Service Providers...
         */
        Helmab\TransMessage\TransMessageServiceProvider::class,
    ];
```

## Usage

```shell script
php artisan helmab:trans-message "I love Laravel Framework" en ko
```

or 

```shell script
php artisan helmab:trans-message "I love Laravel Framework" en ko error
```

## Credit

- [Stichoza](https://github.com/Stichoza/google-translate-php)

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)
