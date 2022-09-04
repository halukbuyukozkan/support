<?php

namespace App\Observers;

use App\Models\Platform;
use Illuminate\Support\Str;

class PlatformObserver
{
    public function creating(Platform $platform)
    {
        $platform->api_token = Str::random(60);
        $platform->status_id = 1;
    }
}
