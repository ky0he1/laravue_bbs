<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return response()->json([
            'posts' => $posts
        ]);
    }


    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->post    = $request->post;
        $post->user_id = $request->user_id;     // test user_id
        $post->save();
        
        return response()->json([
            'post' => $post
        ]);
    }


    public function show($id)
    {
        $post = Post::find($id);
        $post->comments;

        return response()->json([
            'post' => $post
        ]);
    }


    public function update(Request $request)
    {
        
    }


    public function destroy($id)
    {
        
    }
}
