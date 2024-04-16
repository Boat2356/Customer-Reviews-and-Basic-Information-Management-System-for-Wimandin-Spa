<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reviews = Review::paginate(10);
        return view('reviews.index', compact('reviews'));
    }
    public function getAllReviews(){
        $reviews = Review::where('status', 1)->paginate(10);        
        return view('review', compact('reviews'));
    }
    public function storeReview(Request $request){
        $rules = [
            'comment' => 'required',
            'rating' => 'required',            
            'image_path.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // กำหนดขนาดและประเภทไฟล์           
            
        ];
        $request->validate($rules);   
        $p = new Review();
        //Upload image
        
        if ($request->has('image_path')) {
            #$files = $request->file('image_path');
            $image_paths = [];
            foreach ($request->file('image_path') as $file){
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid() . '.' . $extension;
                $path = 'uploads/Review/';
                $file->move($path, $filename);
                
                // บันทึกชื่อไฟล์ลงใน database
                $image_paths[] = $path.$filename;                
                #$p->image_path = $path.$filename;
            }
            $p->image_path = $image_paths;
        }

        

        #$p = new Review();
        $p->comment = $request->comment;
        $p->rating = $request->rating;
        #$p->image_path = $path.$filename; 
        #$p->users_id = $request->users_id;
        #$p->users_id = 1;
        #$p->users_id = $request->users_id;
        $p->users_id = auth()->user()->id;
        $p->save();
        
        
        return redirect()->route('review_add')->with('status', 'Review created successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $reviews = Review::all();
        return view('reviews.create', compact('reviews'));
    }
    public function createReview()
    {
        //
        $reviews = Review::all();
        return view('review_add', compact('reviews'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'comment' => 'required',
            'rating' => 'required',            
            'image_path.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // กำหนดขนาดและประเภทไฟล์           
            
        ];
        $request->validate($rules);   
        $p = new Review();
        //Upload image
        
        if ($request->has('image_path')) {
            #$files = $request->file('image_path');
            $image_paths = [];
            foreach ($request->file('image_path') as $file){
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid() . '.' . $extension;
                $path = 'uploads/Review/';
                $file->move($path, $filename);
                
                // บันทึกชื่อไฟล์ลงใน database
                $image_paths[] = $path.$filename;                
                #$p->image_path = $path.$filename;
            }
            $p->image_path = $image_paths;
        }

        

        #$p = new Review();
        $p->comment = $request->comment;
        $p->rating = $request->rating;
        #$p->image_path = $path.$filename; 
        #$p->users_id = $request->users_id;
        #$p->users_id = 1;
        #$p->users_id = $request->users_id;
        $p->users_id = auth()->user()->id;
        
        $p->save();
        
        
        return redirect()->route('review')->with('status', 'Review created successfully!');
        #return redirect('review')->back()->with('status', 'Review created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $reviews = Review::findorFail($id);
        return view('reviews.show', compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $reviews = Review::find($id);
        
        return view('reviews.edit', compact('reviews'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'comment' => 'required',
            'rating' => 'required'           
            
        ];
        $request->validate($rules);   
        
        //Upload image    
        if($request->has('image_path')){

            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/Review/';
            $file->move($path, $filename);            
        }   

        $p = Review::find($id);
        $p->comment = $request->comment;
        $p->rating = $request->rating;
        $p->image_path = $path.$filename; 
        
        $p->save();
        
        
        return redirect()->route('reviews.index')->with('status', 'Review updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Review::destroy($id);
        return back()->with('status', 'Review deleted successfully!');
    }
    public function changeRS($id){
        $reviews = Review::find($id);
        $reviews->status = !$reviews->status;
        $reviews->save();
        return back()->with('status', 'Review status changed successfully!');
    }
}
