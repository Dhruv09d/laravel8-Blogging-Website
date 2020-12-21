<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use Collective\Html\FormFacade;
use Illuminate\Support\facades\Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy('title', 'desc')->get(); 
        $posts = DB::select('SELECT * FROM posts ORDER BY created_at DESC;');
        return view('posts.index')->with('posts', $posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999' 
        ]);
        //handle file upload
        if($request->hasFile('cover_image')) {
            // file name withextension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extenstion
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // combine filename and extension to store
            // added time() to avoid name collison for same file(to upload existing file). 
            $fileNameTostore = $fileName . '_' . time() . '.' . $extension; 
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameTostore);
        }else {
            $fileNameTostore = 'noimage.jpg';
        }
        

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameTostore;
        $post->save();

        return redirect('/posts')->with('success', "Post created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page!');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999' 
        ]);
        //handle file upload
        if($request->hasFile('cover_image')) {
            // file name withextension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extenstion
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // combine filename and extension to store
            // added time() to avoid name collison for same file(to upload existing file). 
            $fileNameTostore = $fileName . '_' . time() . '.' . $extension; 
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameTostore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameTostore;
        }
        $post->save();

        return redirect('/posts')->with('success', "Post updated!");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page!');
        }

        if($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post removed');
    }
}
