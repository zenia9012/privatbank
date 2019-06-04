<?php

namespace Yevhenii\PrivatBank\Facades;

use Illuminate\Support\Facades\Facade;

class PrivatBank extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'privatbank';
    }
}
