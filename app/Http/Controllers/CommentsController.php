<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        $validate_rule = [
            'user_id' => 'required',
            'name' => 'required',
            'post_id' => 'required',
            'body' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $params = $request->all();
        $post = Post::findOrFail($params['post_id']);
        $post->comments()->create($params);
        return redirect()->route('posts.show',['post' => $post]);


        
    }
    //
}
