<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Service;
use App\Models\Platform;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\TicketMessage;
use App\Services\PlatformFacade;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserTicketRequest;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate()->filter(function ($value, $key) {
            return $value->created_by == Auth::user()->id;
        });

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
        $platforms = Platform::all();
        $departments = Department::all();
        $services = Service::all();

        return view('user.ticket.form', compact('ticket', 'platforms', 'departments', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTicketRequest $request, Ticket $ticket, TicketMessage $ticketmessage)
    {
        $validated = $request->validated();
        $validated['platform_id'] = PlatformFacade::model()->id;
        $validated['user_id'] = Auth::user()->id;

        $ticket = new Ticket($validated);
        $ticket->save();

        $data['message'] = $validated['message'];
        $data['ticket_id'] = $ticket->id;
        $data['user_id'] = Auth::user()->id;
        $data['created_by'] = Auth::user()->id;
        $ticketmessage = new TicketMessage($data);
        $ticketmessage->save();

        return redirect()->route('user.ticket.index')->with('success', __('Ticket created successfully'));
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
