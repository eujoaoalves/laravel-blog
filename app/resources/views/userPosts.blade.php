@extends('layouts.index')
@extends('layouts.navbar')

@section('content')
    <div class="table-responsive">


        <table class="table  table-striped mx-auto w-auto">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">cover</th>
                    <th scope="col">title</th>
                    <th scope="col">summary</th>
                    <th scope="col">options</th>
                </tr>
            </thead>
            @foreach ($userPosts as $post)
                <tbody>
                    <tr>
                        <td id="">{{ $loop->iteration }}</td>
                        <td class="user-post-image"> <img
                                src="{{ \Illuminate\Support\Facades\Storage::url('posts-images/default/' . $post->image_url) }}"
                                alt="" class="img-fluid user-posts-img"></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->summary }}</td>
                        <td>
                            <div id="options">
                                <div>

                                    <a href="{{ route('post.edit', $post->slug) }}"
                                        class="text-decoration-none bg-primary text-white font-weight-bold p-1  rounded-1">edit</a>
                                </div>
                                <div id="delete-post">
                                    <a href="{{ route('post.destroy', $post->id) }}"
                                        class="text-decoration-none bg-danger  text-white p-1 rounded-1 "
                                        id="">delete
                                    </a>

                                </div>

                            </div>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
            @if ($userPosts->currentPage() != 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $userPosts->previousPageUrl() }}" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $userPosts->previousPageUrl() }}" aria-disabled="true">
                        {{ $userPosts->currentPage() - 1 }}</a>
                </li>
            @else
            @endif
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#"> {{ $userPosts->currentPage() }} <span class="sr-only"></span></a>
            </li>
            @if ($userPosts->hasMorePages())
                <li class="page-item"><a class="page-link"
                        href="{{ $userPosts->nextPageUrl() }}">{{ $userPosts->currentPage() + 1 }}</a></li>
                <li class="page-item">
                    <a class="page-link" href="{{ $userPosts->nextPageUrl() }}">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endsection
