<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function store(Request $request){
        $validateData = $request->validate([
            "post_id" => "required|exists:posts,id",
            "comment_content" => "required",
        ]);
        $validateData["user_id"] = auth()->user()->id;

        $comment = Comment::create($validateData);

        return new CommentResource($comment->loadMissing("commentator:id,username"));
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            "comment_content" => "required",
        ]);
        $validateData["user_id"] = auth()->user()->id;
        $validateData["post_id"] = $id;

        $comment = Comment::findOrFail($id);
        $comment->update($validateData);

        return new CommentResource($comment->loadMissing("commentator:id,username"));
    }

    public function destroy($id){
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return new CommentResource($comment->loadMissing("commentator:id,username"));
    }
}
