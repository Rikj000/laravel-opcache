# Laravel OPcache

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rikj000/laravel-opcache.svg?style=flat-square)](https://packagist.org/packages/rikj000/laravel-opcache)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/rikj000/laravel-opcache.svg?style=flat-square)](https://packagist.org/packages/rikj000/laravel-opcache)

This package contains some useful Artisan commands to work with PHP OPcache.

#### If you want to learn more about OPcache and what it can do for your Laravel application, [read the article on Medium](https://medium.com/rikj000/make-your-laravel-app-fly-with-php-opcache-9948db2a5f93#.bjrpj4h1c).

## Requirements
This package requires Laravel 7 or newer.

## Installation

You can install the package via Composer:

``` bash
composer require rikj000/laravel-opcache
```

If you need to change config values, you can publish the config file with:

```bash
php artisan vendor:publish --provider="Rikj000\Opcache\OpcacheServiceProvider" --tag="config"
```

Make sure your APP_URL is set correctly in .env.

If you want to set a different url to call the OPcache routes (for use with a load balancer for example),
you can set OPCACHE_URL.

## Usage

Clear OPcache:
``` bash
php artisan opcache:clear
```

Show OPcache config:
``` bash
php artisan opcache:config
```

Show OPcache status:
``` bash
php artisan opcache:status
```

Pre-compile your application code:
``` bash
php artisan opcache:compile {--force}
```
Note: `opcache.dups_fix `must be enabled, or use the `--force` flag.
If you run into "Cannot redeclare class" errors, enable `opcache.dups_fix` or add the class path to the exclude list.

Programmatic usage:

```php
use Rikj000\Opcache\Facades\Opcache as OPcache;

...

OPcache::clear();
```

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/rikj000/laravel-opcache/graphs/contributors) :)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
