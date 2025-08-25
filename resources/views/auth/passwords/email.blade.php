@extends('auth.layouts.main')

@section('title', 'Reset Password')

@section('content')
    <div class="card-body">
        <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
            <img src="{{ asset('backend/assets/images/logos/dark-logo.svg') }}" width="180" alt="">
        </a>
        <p class="text-center">Enter your email address and we'll send you a link to reset your password</p>

        @if (session('status'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                Send Password Reset Link
            </button>

            <div class="d-flex align-items-center justify-content-center">
                <a class="text-primary fw-bold" href="{{ route('login') }}">Back to Login</a>
            </div>
        </form>
    </div>
@endsection
