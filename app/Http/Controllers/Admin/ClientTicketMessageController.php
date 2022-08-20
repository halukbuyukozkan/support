<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\TicketMessage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TicketMessageRequest;

class ClientTicketMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketMessageRequest $request, User $user, Ticket $ticket)
    {
        $validated = $request->validated();
        $validated['ticket_id'] = $ticket->id;
        $validated['user_id'] = Auth::user()->id;
        $validated['created_by'] = Auth::user()->id;
        $ticketMessage = new TicketMessage($validated);
        $ticketMessage->save();

        return redirect()->route('client.user.ticket.show', ['user' => $user, 'ticket' => $ticket])->with('success', __('Ticket Message Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketMessage  $ticketMessage
     * @return \Illuminate\Http\Response
     */
    public function show(TicketMessage $ticketMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketMessage  $ticketMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketMessage $ticketMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketMessage  $ticketMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketMessage $ticketMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketMessage  $ticketMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Ticket $ticket, TicketMessage $message)
    {
        $message->delete();
        return redirect()->route('client.user.ticket.show', ['user' => $user, 'ticket' => $ticket])->with('success', __('Ticket Message deleted successfully'));
    }
}
