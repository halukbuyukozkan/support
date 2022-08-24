<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Services\PlatformFacade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:management.client');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = User::doesntHave('roles')->platformusers()->paginate();

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new User($request->old());

        return view('admin.user.form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['platform_id'] = PlatformFacade::model()->id;

        $user = User::create($data);
        $user->assignRole('Client');
        $user->save();

        return redirect()->route('client.user.index')->with('success', __('User created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $activeTickets = Ticket::whereHas('status', function (Builder $query) {
            $query->where('type', '!=', 'CLOSED');
        })->userticket($user)->get();


        return view('client.show', compact('user', 'activeTickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $user->fill($request->old());

        return view('admin.user.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('client.user.index')->with('success', __('User updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('client.user.index')->with('success', __('User deleted successfully'));
    }
}
