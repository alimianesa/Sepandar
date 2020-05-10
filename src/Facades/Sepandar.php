<?php

namespace Alimianesa\Sepandar\Facades;

use Illuminate\Support\Facades\Facade;

class Sepandar extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sepandar';
    }
}
