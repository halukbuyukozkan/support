<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Services\PlatformFacade;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platform = PlatformFacade::model();
        $tickets = $platform->tickets;

        return view('admin.ticket.index', compact('tickets'));
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
        $statuses = Status::all();

        return view('admin.ticket.form', compact('ticket', 'platform', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $validated = $request->validated();
        $platform = PlatformFacade::model();
        if ($validated['status_id'] == null)
            $validated['status_id'] = $platform->status_id;

        $ticket = new Ticket($validated);

        $ticket->save();

        return redirect()->route('admin.ticket.index')->with('success', __('Ticket created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('admin.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Ticket $ticket)
    {
        $platform = PlatformFacade::model();
        $statuses = Status::all();
        $ticket->fill($request->old());

        return view('admin.ticket.form', compact('ticket', 'platform', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        $ticket->fill($request->validated());
        $ticket->save();

        return redirect()->route('admin.ticket.index')->with('success', __('Ticket created successfully'));
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

        return redirect()->route('admin.ticket.index')->with('success', __('Ticket deleted successfully'));
    }
}
