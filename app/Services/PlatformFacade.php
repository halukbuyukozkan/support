<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string model()
 */


class PlatformFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PlatformService';
    }
}
