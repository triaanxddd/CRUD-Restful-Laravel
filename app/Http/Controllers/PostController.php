<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['writer:id,username', 'comments:id,post_id,user_id,comment_content'])->get();

        // return response()->json(['data' => $posts]);
        return PostDetailResource::collection($posts);
    }

    public function show($id){
        $post = Post::with(['writer:id,username', 'comments:id,post_id,user_id,comment_content'])->findOrFail($id);

        // return response()->json(['data' => $post]);
        return new PostDetailResource($post);
    }


    public function store(Request $request){

        $validateData = $request->validate([
            'title'=> 'required|max:255',
            'news_content' => 'required'
        ]);
        $validateData['author'] = auth()->user()->id;

        if($request->hasFile('file')){
            $validateData['image'] = $request->file('file')->store('images');
        }

        $post = Post::create($validateData);

        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }
    

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'title'=> 'required|max:255',
            'news_content' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->update($validateData);

        return new PostDetailResource($post);

    }

    public function destroy($id){
        $post = Post::findOrFail($id);

        $post->delete();
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }

    public function restore($id){

        $post = Post::withTrashed()->find($id);

        $post->restore();
        
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }
}
