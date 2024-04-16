<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rooms = Room::paginate(10);
        return view('rooms.index', compact('rooms'));
    }
    public function getAllRooms()
    {
        //
        $rooms = Room::all();
        return view('service_room', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $rooms = Room::all();
        return view('rooms.create', compact('rooms'));
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
            'size' => 'required',            
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $request->validate($rules);

        //Upload image    
        if($request->has('image_path')){

            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/Room/';
            $file->move($path, $filename);            
        }   

        $p = new Room();
        $p->name = $request->name;
        $p->description = $request->description;
        $p->size = $request->size;        
        $p->image_url = $request->image_url;
        $p->image_path = $path.$filename;
        $p->save();
        
        
        return redirect()->route('rooms.index')->with('status', 'Room created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $rooms = Room::findorFail($id);
        return view('rooms.show', compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $rooms = Room::find($id);        
        return view('rooms.edit', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'name' => 'required',
            'size' => 'required',
            'description' => 'required'            
            #'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $request->validate($rules);

        //Upload image    
        if($request->has('image_path')){

            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/Room/';
            $file->move($path, $filename);            
        }   

        $p = Room::find($id);
        $p->name = $request->name;
        $p->description = $request->description;
        $p->size = $request->size;         
        $p->image_url = $request->image_url;
        $p->image_path = $path.$filename;
        $p->save();        
        
        return redirect()->route('rooms.index')->with('status', 'Room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Room::destroy($id);
        return back()->with('status', 'Room deleted successfully!');

    }
}
