@extends('layouts.app')


@section('content')
    <div id="resetpass-page">
        <div class="card d-flex align-items-center">
            <div class="card-body">
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <img src="img/logo-internity.png" alt="Internity" />
                    <p>Reset Password</p>
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="form-group">
                        {{-- <label for="email">Email</label> --}}
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                            required autofocus>
                    </div>
                    <div class="form-group">
                        {{-- <label for="password">Password</label> --}}
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                            required>
                    </div>
                    <div class="form-group">
                        {{-- <label for="password_confirmation">Confirm Password</label> --}}
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Confirm Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                    <a href="{{ url()->previous() }}"> Back to Login </a>
                </form>
            </div>
        </div>
    </div>
@endsection
