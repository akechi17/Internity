@extends('layouts.app')


@section('content')
    <form action="{{ route('login') }}" method="POST" class="w-80">
        @csrf
        <div class="form-group
        @error('email')
            has-error
        @enderror
    ">
            <x-form.input type='text' id='text-input1'>
                <x-slot name='label'>

                </x-slot>
            </x-form.input>

        </div>
        <div class="form-group
        @error('password')
            has-error
        @enderror
    ">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
                <span
                    class="help-block
                @error('email')
                    help-block-email
                @enderror
            ">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
    </form>
@endsection
