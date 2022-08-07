<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\TicketMessage;
use App\Http\Requests\TicketMessageRequest;

class TicketMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketMessages = TicketMessage::paginate();

        return view('admin.ticketmessage.index', compact('ticketMessages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ticketMessage = new TicketMessage($request->old());
        $tickets = Ticket::all();
        $users = User::all();
        return view('admin.ticketmessage.form', compact('ticketMessage', 'tickets', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketMessageRequest $request)
    {
        $validated = $request->validated();
        $ticketMessage = new TicketMessage($validated);
        $ticketMessage->save();

        return redirect()->route('admin.ticketmessage.index')->with('success', __('Ticket Message Created Successfully'));
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
    public function edit(Request $request, TicketMessage $ticketmessage)
    {
        $ticketmessage->fill($request->old());

        $tickets = Ticket::all();
        $users = User::all();

        return view('admin.ticketmessage.form', compact('ticketmessage', 'tickets', 'users'));
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
        $ticketMessage->delete();
        return redirect()->route('admin.ticketmessage.index')->with('success', __('Ticket Message deleted successfully'));
    }
}
