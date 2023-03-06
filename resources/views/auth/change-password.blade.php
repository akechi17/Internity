@extends('layouts.dashboard')


@section('dashboard-content')
    <x-form.form formTitle="Ganti Password" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('update-password') }}">
        <x-slot:formBody>
            <x-form.input-base label="Password Lama *" id="input-old-password" type="password" name="old_password"/>
            <x-form.input-base label="Password Baru *" id="input-password" type="password" name="password"/>
            <x-form.input-base label="Konfirmasi Password Baru *" id="input-password-confirmation" type="password" name="password_confirmation"/>
        </x-slot:formBody>
    </x-form.form>
@endsection
