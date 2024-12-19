<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;

class PemilikPostingan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUser = auth()->user();
        $post = Post::withTrashed()->find($request->id);

        if ($currentUser->id != $post->author) {
            return response()->json([
                "message"=> "Data Not Found"
            ], 404);

        }

        return $next($request);
    }
}
