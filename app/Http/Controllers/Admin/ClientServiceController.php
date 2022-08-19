<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceUpdateRequest;

class ClientServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('admin.client.service', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        $service = new Service($request->old());

        return view('admin.client.service.form', compact('service', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request, User $user)
    {
        $validated = $request->validated();
        $validated['user_id'] = $user->id;
        $service = new Service($validated);
        $service->save();

        return redirect()->route('client.user.service.index', compact('user'))->with('success', __('Service created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user, Service $service)
    {
        $service->fill($request->old());
        return view('client.service.form', compact('service', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, User $user, Service $service)
    {
        $validated = $request->validated();
        $validated['user_id'] = $user->id;
        $service->fill($validated);
        $service->save();

        return redirect()->route('client.user.service.index', compact('user'))->with('success', __('Service updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Service $service)
    {
        $service->delete();

        return redirect()->route('client.user.service.index', compact('user'))->with('success', 'Service deleted successfully');
    }
}
