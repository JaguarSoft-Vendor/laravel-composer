

# Laravel Composer - Zero Downtime Update

This package provide a composer update process with zero downtime.

Usually when you update composer packages, autoload is removed while the update and your laravel application is not accessible and shows an error when you navigate.

Updating composer packages in background helps you to continue using your laravel application without affects to users.



## Installation

### 1. Composer Install

```bash
composer require jaguarsoft/laravel-composer
```



### 2. Add Service Provider in config/app.php

```php
'providers' => [

    /*
    * Application Service Providers...
    */

    JaguarSoft\LaravelComposer\ServiceProvider::class,
],
```



### 3. Publish Vendor

```bash
php artisan vendor:publish
```

This will create a **./vendor-update/.gitignore** file for the directory used to update in background.



## Usage

Run artisan command

```bash
php artisan composer:update
```



## Support

Pacakge tested on Laravel 5.2, 5.3.

For help or suggestions, mail me to [laurence@jaguarsoft.pe](mailto:laurence@jaguarsoft.pe)