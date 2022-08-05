<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceObserver
{
    public function creating(Service $service)
    {
        $service->user_id = Auth::user()->id;
    }
}
