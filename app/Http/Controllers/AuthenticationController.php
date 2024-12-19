<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->email)->plainTextToken;
        // dd($user);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }

    public function me(Request $request){
        $user = auth()->user();
        $posts = Post::where('author', $user->id)->get();

        return response()->json($user);
    }
}
