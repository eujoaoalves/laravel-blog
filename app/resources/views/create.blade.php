@extends('layouts.index')
@extends('layouts.navbar')

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <form enctype="multipart/form-data" action="{{ isset($post) ? route('post.update', $post) : route('post.store') }}"
            method="POST" class="needs-validation">
            @csrf
            @if (isset($post))
                @method('PUT')
            @endif
            <div class="mb-3">
                <h2>{{ isset($post) ? 'Editing you post' : 'Create a new Post' }}</h2>
            </div>
            <div class="form-outline mb-3">
                <label for="title"></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    aria-describedby="post title" placeholder="your title" name="title"
                    value="{{ isset($post) ? $post->title : old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="body">Content</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30"
                        rows="10"> {{ isset($post) ? $post->body : old('body') }}</textarea>
                </div>

                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="">
                    <label for="category_id">Chosse your category</label>
                </div>
                <select name="category_id" class=" mb-3 form-control form-select" id="">
                    @foreach ($allCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->description }}</option>
                    @endforeach
                </select>
                @if (isset($post))
                    <div class="mb-3 "><img
                            src="{{ \Illuminate\Support\Facades\Storage::url('posts-images/default/' . $post->image_url) }}"
                            alt="" class="user-post-image"></div>
                @endif
                <div class="mb-3 ">
                    <input type="file" class="form-control @error('post-cover') is-invalid @enderror" name="post-cover">
                </div>

                @error('post-cover')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit" class=" btn btn-primary ">{{ isset($post) ? 'save' : 'create' }} </button>
        </form>

    </div>
@endsection
