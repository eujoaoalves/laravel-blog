<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('post.index');
    }

    public function listAllUserPosts()
    {
        $userId = auth()->id();

        $userPosts = Post::with('category')
            ->where('user_id', '=', $userId)
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        return view('userPosts', compact('userPosts'));
    }
}
