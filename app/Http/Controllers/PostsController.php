<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        
        $validate_rule = [
            'user_id' => 'required',
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ];
        $this->validate($request,$validate_rule);
        $params = $request->all();
        

        Post::create($params);

       
        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        

        $validate_rule = [
            'title' => 'required',
            'body' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $params = $request->all();
        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();
        return redirect()->route('posts.show', ['post' => $post]);

    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->comments()->delete();
        $post->delete();
       
        return redirect()->route('top');
    }
    
}
