@extends('auth.layouts.main')

@section('title', 'Confirm Password')

@section('content')
    <div class="card-body">
        <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
            <img src="{{ asset('backend/assets/images/logos/dark-logo.svg') }}" width="180" alt="">
        </a>

        <h4 class="text-center mb-3">Confirm Password</h4>
        <p class="text-center mb-4">Please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                Confirm Password
            </button>

            @if (Route::has('password.request'))
                <div class="d-flex align-items-center justify-content-center">
                    <a class="text-primary fw-bold" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            @endif
        </form>
    </div>
@endsection
