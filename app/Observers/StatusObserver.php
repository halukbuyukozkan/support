<?php

namespace App\Observers;

use App\Models\Status;
use App\Services\PlatformFacade;

class StatusObserver
{
    public function creating(Status $status)
    {
        $status->platform_id = PlatformFacade::model()->id;
    }
}
