<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\ServiceTypes;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Services::paginate(10);
        return view('services.index', compact('services'));
    }
    public function getAllServiceTypes(){
        $services = Services::all();
        $service_types = ServiceTypes::all();
        return view('service_treatment', compact('services', 'service_types'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services = ServiceTypes::all();
        return view('services.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $request->validate($rules);

        //Upload image    
        if ($request->has('image_path')) {

            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/Services/';
            $file->move($path, $filename);
        }

        $p = new Services();
        $p->name = $request->name;
        $p->description = $request->description;
        $p->price = $request->price;
        $p->duration = $request->duration;
        $p->service_type_id = $request->service_type_id;
        $p->image_url = $request->image_url;
        $p->image_path = $path.$filename;
        $p->save();


        return redirect()->route('services.index')->with('status', 'Services created successfully!');
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
        $services = Services::find($id);
        $service_types = ServiceTypes::all();
        return view('services.edit', compact('services', 'service_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required'
            #'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $request->validate($rules);

        //Upload image    
        if ($request->has('image_path')) {

            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/Services/';
            $file->move($path, $filename);
        }

        $p = Services::find($id);
        $p->name = $request->name;
        $p->description = $request->description;
        $p->price = $request->price;
        $p->duration = $request->duration;
        $p->service_type_id = $request->service_type_id;
        $p->image_url = $request->image_url;
        $p->image_path = $path.$filename;
        $p->save();


        return redirect()->route('services.index')->with('status', 'Services updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Services::destroy($id);
        return back();
    }
    public function changeSs($id){
        $services = Services::find($id);
        $services->status = !$services->status;
        $services->save();
        return back()->with('status', 'Services status changed successfully!');
    }
}
