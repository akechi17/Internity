@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div
            class="col-md-6 d-flex flex-column align-items-center justify-content-center text-center side-left"
        >
            <img src="img/logo-internity.png" alt="Internity" />
            <h1>Welcome to Internity!</h1>
            <p>
            Kontrol dan pantau kegiatan
            <span>Magang</span> dengan mudah.
            </p>
        </div>

        <div
            class="col-md-6 text-white d-flex align-items-center justify-content-center side-right input-box"
        >
            <form action="{{ route('login') }}" method="POST" class="w-80">
                @csrf
                <h1 class="text-center">Sign In</h1>
                <div class="form-group input-field
                @error('email')
                    has-error
                @enderror
            ">
                    <label for="email">Email</label>
                    <input
                    type="email"
                    class="input"
                    id="email"
                    required
                    autocomplete="off"
                    />
                    {{-- <x-form.input type='text' id='text-input1'>
                        <x-slot name='label'>

                        </x-slot>
                    </x-form.input> --}}

                </div>
                <div class="form-group input-field
                @error('password')
                    has-error
                @enderror
            ">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input" required>
                    <span class="eye" onclick="myFunction()">
                        <i id="show" class="bi bi-eye-fill"></i>
                        <i id="hide" class="bi bi-eye-slash-fill"></i>
                    </span>
                    @error('password')
                        <span
                            class="help-block
                        @error('email')
                            help-block-email
                        @enderror
                    ">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 form-check remember">
                    <input type="checkbox" class="form-check-input" id="remember" />
                    <label class="form-check-label" for="remember">Remember Me</label>
                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                </div>

                <div class="input-field">
                    <button type="submit" class="submit">Login</button>
                </div>

                <div class="signup">
                    <p>Not registered yet? <a href="#">Create an account</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
