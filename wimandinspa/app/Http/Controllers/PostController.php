<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PostType;
use App\Models\Post;




class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
        #return view('post.index',['post' => Post::paginate(5)]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ptype = PostType::all();
        return view('post.create', compact('ptype'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'post_type_id' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $request->validate($rules);

        //Upload image    
        if($request->has('image_path')){

            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/Post/';
            $file->move($path, $filename);            
        }   

        $p = new Post();
        $p->title = $request->title;
        $p->content = $request->content;
        $p->post_type_id = $request->post_type_id;
        $p->image_url = $request->image_url;
        $p->image_path = $path.$filename;
        #$p->users_id = auth()->user()->id;
        $p->save();
        
        
        return redirect()->route('post.index')->with('status', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)    //       
    
    {
        //
        $post_types = PostType::find($id);
        $posts = $post_types->posts;
        return view('showEachPostType', compact('post_types','posts'));
    }

    public function showPost(string $id){
        $post_types = PostType::find($id);
        $posts = $post_types->posts;
        $posts_detail = Post::find($id);

        return view('showEachPostType', compact('post_types','posts','posts_detail'));        

        #return view('showEachPostType', compact('post_types','posts'));
    }
    public function showPostDetail($post_type_id, $post_id)
{
    $postType = PostType::find($post_type_id);

    $post = Post::find($post_id);

    return view('postDetail', compact('postType', 'post'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $ptypes = PostType::all();
        return view('post.edit', compact('ptypes', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $rules = [
            'title' => 'required',
            'content' => 'required'
            
            #'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
        $request->validate($rules);

        //Upload image    
        if($request->has('image_path')){

            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/Post/';
            $file->move($path, $filename);            
        }   

        $p = Post::find($id);
        $p->title = $request->title;
        $p->content = $request->content;
        $p->post_type_id = $request->post_type_id;
        $p->image_url = $request->image_url;
        $p->image_path = $path.$filename;
        #$p->users_id = auth()->user()->id;
        $p->save();
        
        
        return redirect()->route('post.index')->with('status', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Post::destroy($id);
        return back()->with('status', 'Post deleted successfully!');
    }
    public function change($id){
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();
        return back()->with('status', 'Post status changed successfully!');
    }
    
    public function upload(Request $request){
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $originName = $request->file('upload')->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;
        $request->file('upload')->move(public_path('media'), $fileName);
        $url = asset('media/'.$fileName);
        
        //$img->resize(300, 200); // Adjust dimensions as needed
        //$img->save();        
        return response()->json(['filename' => $fileName,'uploaded' => 1,'url' => $url]);       
        
    }
    



}
