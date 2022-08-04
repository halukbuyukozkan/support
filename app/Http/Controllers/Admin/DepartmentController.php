<?php

namespace App\Http\Controllers\Admin;

use App\Models\Platform;
use App\Models\Department;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Services\PlatformFacade;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate();

        return view('admin.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $department = new Department($request->old());
        return view('admin.department.form', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $validated = $request->validated();
        $department = new Department($validated);

        $platform = PlatformFacade::model();

        $department->platform()->associate($platform->id);
        $department->save();

        return redirect()->route('admin.department.index')->with('success', __('Department created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Department $department)
    {
        $department->fill($request->old());
        return view('admin.department.form', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->fill($request->validated());
        $department->save();

        return redirect()->route('admin.department.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('admin.department.index')->with('success', 'Department deleted successfully');
    }
}
