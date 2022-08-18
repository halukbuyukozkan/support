<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Services\PlatformFacade;
use App\Http\Requests\TicketRequest;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $tickets = $user->tickets;

        return view('admin.user.ticket', compact('tickets', 'user'));
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
        $statuses = Status::all();

        return view('admin.ticket.form', compact('ticket', 'platform', 'statuses', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request, User $user)
    {
        $validated = $request->validated();
        $platform = PlatformFacade::model();
        if ($validated['status_id'] == null)
            $validated['status_id'] = $platform->status_id;
        $validated['user_id'] = $user->id;
        $ticket = new Ticket($validated);

        $ticket->save();

        return redirect()->route('admin.user.ticket.index', compact('user'))->with('success', __('Ticket created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $platform = PlatformFacade::model();
        $statuses = Status::all();
        $ticket->fill($request->old());

        return view('admin.ticket.form', compact('ticket', 'platform', 'statuses', 'user'));
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
        //
    }
}
