<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use Illuminate\Http\Request;

class PostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post_types = PostType::all();
        return view('post_types.index', compact('post_types'));
    }
    public function getAllPostType()
    {
        $post_types = PostType::all();
        return view('layouts.header', compact('post_types'));
    }
    
public function showAllPostType(PostType $postType)
{
    // ดึง Posts ที่เกี่ยวข้องกับ PostType
    $posts = $postType->posts()->get();

    // แสดงหน้า Detail ของ PostType
    return view('showEachPostType', compact('postType', 'posts'));
}
    
    

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $post_types = PostType::all();
        return view('post_types.create', compact('post_types'));
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

        $p = new PostType();
        $p->name = $request->name;
        $p->save();


        return redirect()->route('post_types.index')->with('status', 'PostType created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post_types = PostType::find($id);
        return view('post_types.show', compact('post_types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post_types = PostType::find($id);
        return view('post_types.edit', compact('post_types'));
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

        $p = PostType::find($id);
        $p->name = $request->name;
        $p->save();


        return redirect()->route('post_types.index')->with('status', 'PostType updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PostType::destroy($id);
        return back();

        /*
        $postType = PostType::find($id);

        // ตรวจสอบว่ามีการอ้างอิง PostType ในตาราง Post หรือไม่
        if ($postType->posts()->exists()) {
            return back()->with('error', 'ไม่สามารถลบ PostType ที่มี Post อ้างอิงอยู่ได้');
        } else {
            // ถ้าไม่มีการอ้างอิง ให้ลบ PostType
            $postType->delete();
            return back()->with('success', 'ลบ PostType เรียบร้อยแล้ว');
        }
        */
    }
}
