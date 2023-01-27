@extends('layouts.app')


@section('content')
    <div class="container-fluid" id="login-page">
        <div class="row">
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center text-center side-left">
                <img src="{{ asset('/img/logo-internity.png') }}" alt="Internity" />
                <h1>Welcome to Internity!</h1>
                <p>
                    Kontrol dan pantau kegiatan
                    <span>Magang</span> dengan mudah.
                </p>
            </div>

            <div class="col-md-6 text-white d-flex align-items-center justify-content-center side-right input-box">
                <form action="{{ route('login') }}" method="POST" class="w-80">
                    @csrf
                    <h1 class="text-center">Sign In</h1>
                    
                    <div class="form-group input-field
                        @error('email')
                            has-error
                        @enderror
                    ">
                        <label for="email">Email</label>
                        <input type="email" class="input" id="email" name="email" required autocomplete="off"
                            name="email" />
                        {{-- <x-form.input type='text' id='text-input1'>
                        <x-slot name='label'>
                            </x-slot>
                        </x-form.input> --}}

                    </div>
                    <div
                        class="form-group input-field
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
                                class="alert-danger help-block
                                @error('email')
                                    help-block-email
                                @enderror
                            ">{{ $message }}</span>
                        @enderror
                    </div>

                    <x-latihan.checkbox class='form-check remember' id='remember'>
                        <x-slot name='label'>
                            <label class="form-check-label" for="remember">Remember Me</label>
                            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </x-slot>
                    </x-latihan.checkbox>

                    {{-- <div class="mb-4 form-check remember">
                    <input type="checkbox" class="form-check-input" id="remember" />
                    <label class="form-check-label" for="remember">Remember Me</label>
                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                </div> --}}

                    <div class="input-field">
                        <button type="submit" class="submit">Login</button>
                    </div>

                    {{-- <div class="signup">
                        <p>Not registered yet? <a href="#">Create an account</a></p>
                    </div> --}}
                </form>

            </div>
        </div>
    </div>
@endsection

<script>
    function myFunction() {
        var passField = document.getElementById("password");
        var showPass = document.getElementById("show");
        var hidePass = document.getElementById("hide");

        if (passField.type === "password") {
            passField.type = "text";
            showPass.style.display = "block";
            hidePass.style.display = "none";
        } else {
            passField.type = "password";
            showPass.style.display = "none";
            hidePass.style.display = "block";
        }
    }
</script>
{{-- <script src="js/login/showpass.js"></script> --}}

{{-- Latihan
    <x-latihan.select class='select'>
    <x-slot name='options'>
        <option value="1">SIJA</option>
        <option value="2">TKJ</option>
    </x-slot>
</x-latihan.select>
<x-latihan.select class='select'>
    <x-slot name='options'>
        <option value="1">11</option>
        <option value="2">12</option>
        <option value="3">13</option>
    </x-slot>
</x-latihan.select class='select'>
    <x-latihan.checkbox id='1' for='2' label='satu' />
    <x-latihan.checkbox id='3' for='4' label='dua' />
    <x-latihan.radios radio='30hz' fm='80' nama='FM' /> --}}
