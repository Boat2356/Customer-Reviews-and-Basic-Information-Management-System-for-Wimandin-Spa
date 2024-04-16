<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contacts = Contact::paginate(10);        
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $contacts = Contact::all();
        return view('contacts.create', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'openTime'  => 'required',
            'facebook' => 'required'      
            
        ];
        $request->validate($rules);       

        $p = new Contact();
        $p->address = $request->address;
        $p->phone = $request->phone;
        $p->email = $request->email;
        $p->facebook = $request->facebook;  
        $p->openTime = $request->openTime;
        $p->line = $request->line;  
        
        $p->save();        
        
        return redirect()->route('contacts.index')->with('status', 'Contact created successfully!');
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
        $contacts = Contact::find($id);
        
        return view('contacts.edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'facebook' => 'required'      
            
        ];
        $request->validate($rules);       

        $p = Contact::find($id);
        $p->address = $request->address;
        $p->phone = $request->phone;
        $p->email = $request->email;
        $p->facebook = $request->facebook;
        $p->line = $request->line; 
        
        $p->save();        
        
        return redirect()->route('contacts.index')->with('status', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Contact::destroy($id);
        return back()->with('status', 'Contact deleted successfully!');
    }
    public function changeCS($id){
        $contacts = Contact::find($id);
        $contacts->status = !$contacts->status;
        $contacts->save();
        return back()->with('status', 'Contact status changed successfully!');
    }

    public function getLastContact(){
        $contacts = Contact::latest()->first();
        return view('faq', compact('contacts'));
    }

}
