@extends('layouts.app')


@section('content')
<div id="forgotpass-page">
    <div class="card d-flex align-items-center">
        <div class="card-body">
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <img src="img/logo-internity.png" alt="Internity" />
                <p>Enter your email address and we'll send you a link to reset your password.</p>
                <div class="form-group">
                    {{-- <label for="email">Email</label> --}}
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>
                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
            </form>
        </div>
    </div>
</div>
@endsection
