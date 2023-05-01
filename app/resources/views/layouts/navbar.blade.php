<nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
    <div class="container-fluid px-4 px-lg-5">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav me-auto mt-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('post.index') }}">Home</a>
                </li>
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('post.create') }}">Create Post</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.posts') }}">My Posts</a></li>
                @endauth
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign up</a></li>
                @endguest
            </ul>
            <form class="d-flex oder-first ms-auto" action="{{ route('post.index') }}">
                <input class="form-control me-2" type="search" id="search" name="search"placeholder="Search"
                    aria-label="Search">
            </form>
        </div>
    </div>
</nav>
