@extends('layouts.index')
@extends('layouts.navbar')
@section('content')

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
  <div class="container position-relative px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-md-10 col-lg-8 col-xl-7">
              <div class="post-heading">
                  <h1>{{ $post->title }}</h1>
              
                  <span class="meta">
                      Published by
                      <a href="#!">{{ $post->user->name }}</a>
                      on {{ date("F j, Y", strtotime($post->published_at)) }}
                  </span>
              </div>
          </div>
      </div>
  </div>
</header>
<!-- Post Content-->
<article class="mb-4">
  <div class="container px-4 px-lg-5">
      <div class="row gx-4 gx-lg-5 justify-content-center">
        {{   $post->body }}}}
      </div>
  </div>
</article>

@endsection

</div> 