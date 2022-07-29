<?php

namespace App\Http\Controllers\Admin;

use App\Models\Platform;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
    public function store(PlatformRequest $request, Platform $platform)
    {
        $platform = $request->validated();
        if ($request->hasFile('logo')) {
            $destination = 'public/platforms';
            $image = $request->file('logo');
            $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs($destination, $imageName);
            $platform['logo'] = $imageName;
        }

        Platform::create($platform);
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
        return view('admin.platform.form', compact('platform'));
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
        $platform->fill($request->validated());
        if ($request->hasFile('logo')) {
            $destination = 'public/platforms';
            $image = $request->file('logo');
            $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
            $path = $request->file('logo')->storeAs($destination, $imageName);
            $platform['logo'] = $imageName;
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
        //
    }
}
