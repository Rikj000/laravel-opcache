<?php

namespace JustRaviga\Opcache\Facades;

use JustRaviga\Opcache\OpcacheActions;
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
        return OpcacheActions::class;
    }
}
