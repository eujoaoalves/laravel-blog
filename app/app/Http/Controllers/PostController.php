<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Show the form for creating or editing a post.
     */
    public function create()
    {
        $allCategories = $this->getAllCategories();
        return view('create', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $this->preparePostData($request);
        Post::create($data);
        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    private function preparePostData(StorePostRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $data['image_url'] = $this->createImageUniqueName($request);
        $data['summary'] = substr($data['body'], 0, 30);
        $data['user_id'] = $user->id;
        $data['published_at'] = now()->format('Y-m-d H:i:s');
        $data['slug'] = Str::slug($data['title']);
        return $data;
    }
    private function createImageUniqueName($request)
    {
        if ($request->hasFile('post-cover')) {
            $image = $request->file('post-cover');
            $extension = $image->getClientOriginalExtension();

            // Generante a unique file using a timestamp and uniqid 
            $imageName = time() . '_' . uniqid() . '.' . $extension;
            $path = $image->storeAs('public/posts-images/default/' . $imageName);

            return $imageName;
        }

        return '';
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('layouts.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $allCategories = $this->getAllCategories();
        return view('create', compact('post', 'allCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        if ($request->hasFile('post-cover')) {
            $imagePath = 'public/posts-images/default/' . $post->image_url;
            Storage::delete($imagePath);
        }
        $image_url = $this->createImageUniqueName($request);
        $post->image_url = $image_url;
        $postValidated = $request->validated();
        $post->fill($postValidated);
        $post->save();
        return redirect()->route('user.posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('user.posts');
    }

    private function getAllCategories()
    {
        $allCategories = Category::orderBy('description', 'asc')->get();
        return $allCategories;
    }
}
