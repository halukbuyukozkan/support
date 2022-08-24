<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use App\Models\Platform;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\PlatformFacade;
use App\Http\Requests\PlatformRequest;
use App\Http\Requests\PlatformUpdateRequest;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = Platform::paginate();

        return view('admin.platform.index', compact('platforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $platform = new Platform($request->old());

        return view('admin.platform.form', compact('platform'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlatformRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('logo')) {
            $validated['logo'] = $validated['logo']->storeAs('', Str::random(16) . '.' . $validated['logo']->extension(), 'platforms');
        }
        $platform = new Platform($validated);
        $platform->save();

        return redirect()->route('admin.platform.index')->with('success', __('Platform created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function show(Platform $platform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Platform $platform)
    {
        $platform->fill($request->old());
        $statuses = PlatformFacade::model()->statuses;

        return view('admin.platform.form', compact('platform', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(PlatformUpdateRequest $request, Platform $platform)
    {
        $validated = $request->validated();
        $platform->fill($validated);

        if ($request->hasFile('logo')) {
            $platform->logo = $validated->logo->storeAs('', Str::random(16) . '.' . $validated->logo->getClientOriginalExtension(), 'platforms');
        }
        $platform->save();
        return redirect()->route('admin.platform.index')->with('success', __('Platform updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platform $platform)
    {
        $platform->delete();

        return redirect()->route('admin.platform.index')->with('success', 'Platform deleted successfully');
    }
}
