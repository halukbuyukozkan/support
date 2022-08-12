<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Services\PlatformFacade;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserTicketRequest;

class CustomerTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Auth::user()->tickets;
        return view('user.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ticket = new Ticket($request->old());
        $platform = PlatformFacade::model();

        return view('user.ticket.form', compact('ticket', 'platform'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTicketRequest $request, Ticket $ticket)
    {
        $validated = $request->validated();
        $validated['platform_id'] = PlatformFacade::model()->id;
        $validated['user_id'] = Auth::user()->id;
        $ticket = new Ticket($validated);
        $ticket->save();

        $ticket->ticketmessages()->create([
            'message' => $validated['message'],
            'ticket_id' => $ticket->id,
            'user_id' => Auth::user()->id,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('customer.ticket.index')->with('success', __('Ticket created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('user.message.index', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('user.ticket.index')->with('success', __('Ticket deleted successfully'));
    }
}
