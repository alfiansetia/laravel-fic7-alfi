@extends('layouts.template-auth')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>

        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf<button class="btn btn-link" type="submit">Back Login</button></form>
    </div>
@endsection
