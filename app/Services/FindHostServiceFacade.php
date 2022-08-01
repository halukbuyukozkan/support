<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string hostCheck()
 */


class FindHostServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'HostService';
    }
}
