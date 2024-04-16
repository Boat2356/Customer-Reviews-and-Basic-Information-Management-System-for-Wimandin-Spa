<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Contact;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $faqs = Faq::paginate(10);
        return view('faqs.index', compact('faqs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $faqs = Faq::all();
        return view('faqs.create', compact('faqs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'question' => 'required',
            'answer' => 'required'           
            
        ];
        $request->validate($rules);       

        $p = new Faq();
        $p->question = $request->question;
        $p->answer = $request->answer;    
        
        $p->save();
        
        
        return redirect()->route('faqs.index')->with('status', 'FAQ created successfully!');
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
        $faqs = Faq::find($id);
        
        return view('faqs.edit', compact('faqs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'question' => 'required',
            'answer' => 'required'           
            
        ];
        $request->validate($rules);       

        $p = Faq::find($id);
        $p->question = $request->question;
        $p->answer = $request->answer;    
        
        $p->save();
        
        
        return redirect()->route('faqs.index')->with('status', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Faq::destroy($id);
        return back()->with('status', 'FAQ deleted successfully!');
    }
    public function changeFS($id){
        $faqs = Faq::find($id);
        $faqs->status = !$faqs->status;
        $faqs->save();
        return back()->with('status', 'FAQ status changed successfully!');
    }

    public function getAllFAQ(){
        $faqs = Faq::where('status', 1)->paginate(10);
        $contacts = Contact::where('status', 1)->get();
        return view('faq', compact('faqs', 'contacts'));
       
    }
}
