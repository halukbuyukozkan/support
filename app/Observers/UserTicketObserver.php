<?php

namespace App\Observers;

use App\Models\Ticket;
use App\Services\PlatformFacade;
use Illuminate\Support\Facades\Auth;

class UserTicketObserver
{
    public function creating(Ticket $ticket)
    {
        $ticket->created_by = Auth::user()->name;
        $ticket->platform_id = PlatformFacade::model()->id;
        $ticket->user_id = Auth::user()->id;
    }
}
