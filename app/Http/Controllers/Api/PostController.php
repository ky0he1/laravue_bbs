<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
    }

    public function update(Request $request)
    {
        
    }

    public function destroy($id)
    {
        
    }
}