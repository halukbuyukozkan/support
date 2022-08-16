<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StatusTypeRequest;
use App\Models\StatusType;
use Illuminate\Http\Request;

class StatusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusTypes = StatusType::all();

        return view('admin.status.type.index', compact('statusTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $statusType = new StatusType($request->old());

        return view('admin.status.type.form', compact('statusType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusTypeRequest $request)
    {
        $validated = $request->validated();
        $statusType = new StatusType($validated);

        $statusType->save();

        return redirect()->route('admin.statustype.index')->with('success', __('Status Type created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function show(StatusType $statusType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StatusType $statusType)
    {
        $statusType->fill($request->old());

        return view('admin.status.type.form', compact('statusType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusType $statusType)
    {
        $statusType->fill($request->validated());
        $statusType->save();

        return redirect()->route('admin.statustype.index')->with('success', __('Status Type created successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusType  $statusType
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusType $statusType)
    {
        $statusType->delete();

        return redirect()->route('admin.statustype.index')->with('success', __('Status Type deleted successfully'));
    }
}
