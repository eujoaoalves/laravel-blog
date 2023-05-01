@extends('layouts.index')
@extends('layouts.navbar')
{{-- @foreach ($allPosts as $post) --}}

@section('content')
    <div class="containert">
        <div class="row">
            @foreach ($allPosts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <div class="style-2 mb-4 p-2 fill">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('posts-images/default/' . $post->image_url) }}"
                                class="img-fluid" alt="">
                        </div>
                        <div class="body p-2">
                            <strong
                                class="d-inline-block mb-2 text-primary">{{ $post->category->first()->description }}</strong>
                            <h5 class="font-weight-bold my-2">{{ $post->title }}</h5>
                            <p class="small">{{ $post->user->name }}</p>
                            <small>Published at {{ date('d-m-y', strtotime($post->published_at)) }}</small>
                            <div class="row d-flex align-items-center">
                                <div class="col-6 text-right">
                                    <a href="{{ route('post.show', $post->slug) }}"
                                        class="btn radius-50 btn-gray-transparent btn-animated">Read More <i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
            @if ($allPosts->currentPage() != 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $allPosts->previousPageUrl() }}" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $allPosts->previousPageUrl() }}" aria-disabled="true">
                        {{ $allPosts->currentPage() - 1 }}</a>
                </li>
            @endif
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#"> {{ $allPosts->currentPage() }} <span class="sr-only"></span></a>
            </li>
            @if ($allPosts->hasMorePages())
                <li class="page-item"><a class="page-link"
                        href="{{ $allPosts->nextPageUrl() }}">{{ $allPosts->currentPage() + 1 }}</a></li>
                <li class="page-item">
                    <a class="page-link" href="{{ $allPosts->nextPageUrl() }}">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endsection
