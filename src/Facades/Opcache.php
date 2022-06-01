<?php

namespace Rikj000\Opcache\Facades;

use Rikj000\Opcache\OpcacheActions;
use Illuminate\Support\Facades\Facade;

/**
 * @mixin  OpcacheActions
 */
class Opcache extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'opcache';
    }
}
