<?php

namespace Andali\Anaf\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string info(string $cui)
 */
class Anaf extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'anaf';
    }
}
