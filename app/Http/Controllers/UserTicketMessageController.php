<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketMessage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TicketMessageRequest;

class UserTicketMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ticket)
    {
        $messages = TicketMessage::paginate();
        return view('user.index', compact('messages', 'ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ticketMessage = new TicketMessage($request->old());


        return view('', compact('ticketMessage', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketMessageRequest $request, $ticket)
    {
        $validated = $request->validated();
        $validated['ticket_id'] = $ticket;
        $validated['user_id'] = Auth::user()->id;
        $validated['created_by'] = Auth::user()->name;

        $ticketMessage = new TicketMessage($validated);
        $ticketMessage->save();

        return redirect()->route('user.ticket.message.index', $ticket)->with('success', __('Ticket Message Created Successfully'));
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
    public function destroy(TicketMessage $ticketMessage)
    {
        //
    }
}
