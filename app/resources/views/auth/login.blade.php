@extends('layouts.index')
@extends('layouts.navbar')

@section('content')

<div class="container d-flex justify-content-center align-items-center mt-5 ">
    <form class="" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <h2>login</h2>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email"  value="joao@joao.com" required>
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="123456789" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
                : '' }}>
            <label class="form-check-label" for="remember">
                Remember me
            </label>
        </div>
        <div class="text-end">
            <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        
    </form>
</div>

@endsection

    {{-- 
        <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-5 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <h4 class="text-center mb-4">Login</h4>
                            <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="joao@joao.com" "
                                    required autocomplete=" email" autofocus />
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>F
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    autocomplete="current-password" value="123456789" />
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <!-- Remember me -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <a href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="button" class="btn btn-outline-secondary">Register</button>
                            <button type="submit" class="btn btn-outline-primary btn-block ">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
     --}}