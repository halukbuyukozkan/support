<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Services\PlatformFacade;
use App\Http\Requests\TicketRequest;

class ClientTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $tickets = $user->tickets()->paginate();

        return view('client.ticket.index', compact('tickets', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        $ticket = new Ticket($request->old());
        $platform = PlatformFacade::model();

        return view('client.ticket.form', compact('ticket', 'platform', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request, Ticket $ticket, User $user)
    {
        $validated = $request->validated();
        $platform = PlatformFacade::model();
        if (empty($validated['status_id']))
            $validated['status_id'] = $platform->status_id;
        $validated['user_id'] = $user->id;
        $ticket = new Ticket($validated);

        $ticket->save();

        return redirect()->route('client.user.ticket.index', compact('user'))->with('success', __('Ticket created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Ticket $ticket)
    {
        $platform = PlatformFacade::model();

        return view('admin.ticket.show', compact('ticket', 'user', 'platform'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user, Ticket $ticket)
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
    public function update(TicketRequest $request, User $user, Ticket $ticket)
    {
        $ticket->fill($request->validated());
        $ticket->save();

        return redirect()->route('client.user.ticket.index', $user)->with('success', __('Ticket created successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('client.user.ticket.index', compact('user'))->with('success', __('Ticket deleted successfully'));
    }
}
