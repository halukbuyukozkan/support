<?php

namespace App\Observers;

use App\Models\TicketMessage;
use Illuminate\Support\Facades\Auth;

class MessageObserver
{
    public function creating(TicketMessage $ticketMessage)
    {
        $ticketMessage->user_id = Auth::user()->id;
        $ticketMessage->created_by = Auth::user()->id;
    }
}
