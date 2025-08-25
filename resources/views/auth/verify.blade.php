@extends('auth.layouts.main')

@section('title', 'Verify Email')

@section('content')
    <div class="card-body">
        <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
            <img src="{{ asset('backend/assets/images/logos/dark-logo.svg') }}" width="180" alt="">
        </a>

        <h4 class="text-center mb-3">Verify Your Email Address</h4>

        @if (session('resent'))
            <div class="alert alert-success text-center" role="alert">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <p class="text-center">
            Before proceeding, please check your email for a verification link.<br>
            If you did not receive the email, you can request another below.
        </p>

        <form method="POST" action="{{ route('verification.resend') }}" class="text-center mt-3">
            @csrf
            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                Resend Verification Email
            </button>
        </form>

        <div class="d-flex align-items-center justify-content-center">
            <a class="text-primary fw-bold" href="{{ route('login') }}">Back to Login</a>
        </div>
    </div>
@endsection
