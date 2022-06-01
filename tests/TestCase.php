<?php

namespace JustRaviga\Opcache\Test;

use JustRaviga\Opcache\OpcacheServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.url', 'http://laravel7.test/');
        $app['config']->set('opcache.url', 'http://laravel7.test/');
        $app['config']->set('app.key', 'base64:Ed0VpanUWokW8AgY8jRCU8A5Cn3ou+uby8qLCQysUpg=');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [OpcacheServiceProvider::class];
    }
}
