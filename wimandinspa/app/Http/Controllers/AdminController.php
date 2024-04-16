<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    //
    public function myspashop(){
        return view('myspashop');
    }
    public function myshop(){
        
            $name = "Laravel";
            $version = "8.0";
            $author = "Taylor Otwell";
        
        return view('myshop', [
            'name' => $name,
            'version' => $version,
            'author' => $author
        ]);
    }
    public function contact()
    {
        //
        $contacts = Contact::paginate(10);
        return view('contacts.index', compact('contacts'));
    }
}
