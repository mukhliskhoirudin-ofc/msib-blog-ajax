@extends('auth.layouts.main')

@section('title', 'Register')

@section('content')
    <div class="card-body">
        <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
            <img src="{{ 'backend/assets/images/logos/dark-logo.svg' }}" width="180" alt="">
        </a>
        <p class="text-center">Create your account to get started</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" autocomplete="name" autofocus aria-describedby="textHelp">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                    autocomplete="email" aria-describedby="emailHelp">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password"
                    class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control"
                    autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>

            <div class="d-flex align-items-center justify-content-center">
                <p class="fs-3 mb-0 fw-bold">Already have an Account?</p>
                <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
@endsection
