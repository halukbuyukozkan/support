<?php

namespace App\Services;

use App\Exceptions\PlatformNotFound;
use App\Models\Platform;

class PlatformFind
{
    protected $host;

    public function model()
    {
        $host = config('app.domain');
        if ($platform = Platform::where('domain', $host)->first()) {
            return $platform;
        } else {
            throw new PlatformNotFound('Platform Not Found');
        }
    }
}
