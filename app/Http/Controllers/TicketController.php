<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Platform;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate();
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
        $platforms = Platform::all();
        $departments = Department::all();
        $users = User::all();
        $services = Service::all();

        return view('admin.ticket.form', compact('ticket', 'platforms', 'departments', 'users', 'services'));
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
        $ticket->fill($request->old());

        $platforms = Platform::all();
        $departments = Department::all();
        $users = User::all();
        $services = Service::all();

        return view('admin.ticket.form', compact('ticket', 'platforms', 'departments', 'users', 'services'));
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
