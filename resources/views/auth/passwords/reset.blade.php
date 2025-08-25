@extends('auth.layouts.main')

@section('title', 'Reset Password')

@section('content')
    <div class="card-body">
        <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
            <img src="{{ asset('backend/assets/images/logos/dark-logo.svg') }}" width="180" alt="">
        </a>
        <p class="text-center">Set your new password below</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" readonly class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" autocomplete="new-password" autofocus>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="form-label">Confirm New Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                Reset Password
            </button>

            <div class="d-flex align-items-center justify-content-center">
                <a class="text-primary fw-bold" href="{{ route('login') }}">Back to Login</a>
            </div>
        </form>
    </div>
@endsection
