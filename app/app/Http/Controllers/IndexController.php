<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private  $paginateNumber = 3;
    public function index()
    {
        $search = request('search');
        if ($search) {
            $allPosts = Post::with('user', 'category')
                ->where('title', 'LIKE', '%' . $search . '%')
                ->paginate($this->paginateNumber);
            return view('home', compact('allPosts'));
        }
        $allPosts = Post::with('user', 'category', 'tags')
            ->whereHas('category')
            ->paginate($this->paginateNumber);
        return view('home', compact('allPosts'));
        // return view('layouts.navbar');
    }
}
