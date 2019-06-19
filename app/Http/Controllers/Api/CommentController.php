<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
// use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();

        return response()->json([
            'comments' => $comments
        ]);
    }


    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;

        $comment->save();

        return response()->json([
            'comment' => $comment
        ]);
    }


    public function show($id)
    {
        $comment = Comment::find($id);

        return response()->json([
            'comment' => $comment
        ]);
    }


    public function update(Request $request)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
