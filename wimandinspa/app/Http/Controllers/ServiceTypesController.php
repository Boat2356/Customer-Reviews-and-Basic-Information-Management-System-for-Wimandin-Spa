<?php

namespace App\Http\Controllers;

use App\Models\ServiceTypes;
use Illuminate\Http\Request;

class ServiceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $service_types = ServiceTypes::all();
        return view('service_types.index', compact('service_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $service_types = ServiceTypes::all();
        return view('service_types.create', compact('service_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required',
        ];
        $request->validate($rules);

        $p = new ServiceTypes();
        $p->name = $request->name;
        $p->save();


        return redirect()->route('service_types.index')->with('status', 'ServiceTypes created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $service_types = ServiceTypes::find($id);
        return view('service_types.edit', compact('service_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'name' => 'required',
        ];
        $request->validate($rules);

        $p = ServiceTypes::find($id);
        $p->name = $request->name;
        $p->save();


        return redirect()->route('service_types.index')->with('status', 'ServiceTypes updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        ServiceTypes::destroy($id);
        return back();
    }
}
