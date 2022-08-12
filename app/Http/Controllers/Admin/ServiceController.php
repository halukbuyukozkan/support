<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Service;
use App\Models\Platform;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $service = new Service($request->old());
        $users = User::all();

        return view('admin.service.form', compact('service', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $validated = $request->validated();
        $service = new Service($validated);
        $service->save();

        return redirect()->route('admin.service.index')->with('success', __('Service created successfully'));
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
    public function edit(Request $request, Service $service)
    {
        $service->fill($request->old());
        $users = User::all();
        return view('admin.service.form', compact('service', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $validated = $request->validated();
        $service->fill($validated);
        $service->save();

        return redirect()->route('admin.service.index')->with('success', __('Service updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully');
    }
}
