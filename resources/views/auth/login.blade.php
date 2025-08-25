@extends('auth.layouts.main')

@section('title', 'Login')

@section('content')
    <div class="card-body">
        <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
            <img src="{{ asset('backend/assets/images/logos/dark-logo.svg') }}" width="180" alt="">
        </a>
        <p class="text-center">Welcome back, please login to continue</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus aria-describedby="emailHelp">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                    <input class="form-check-input primary" type="checkbox" value="" id="remember" name="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="remember">
                        Remember me
                    </label>
                </div>
                <a class="text-primary fw-bold ms-2" href="{{ route('password.request') }}">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login
            </button>

            <div class="d-flex align-items-center justify-content-center">
                <p class="fs-3 mb-0 fw-bold">Don't have an account?</p>
                <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div>
@endsection
