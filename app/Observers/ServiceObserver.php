<?php

namespace App\Observers;

use App\Models\Service;
use App\Models\Platform;
use App\Services\PlatformFacade;

class ServiceObserver
{
    public function creating(Service $service)
    {
        $service->platform_id = PlatformFacade::model()->id;
    }
}
