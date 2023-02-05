@extends('layouts.dashboard')


@section('dashboard-content')
    <x-form.form formTitle="Tambah User" formMethod="POST" formAction="{{ route('users.store') }}">
        <x-slot:formBody>
            <x-form.input-base inputLabel="Nama" inputId="input-text-1" inputType="text" />
            <x-form.input-base inputLabel="Email" inputId="input-text-2" inputType="email" />
            <x-form.checkbox id="input-checkbox-1" label="Checkbox 1" value="1" />
            <x-form.input-password label="Password" id="input-password-1" name="password" />
        </x-slot:formBody>
    </x-form.form>
@endsection
