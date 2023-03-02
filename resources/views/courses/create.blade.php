@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Tambah Kelas" formMethod="POST" formAction="{{ route('courses.store') }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" placeholder="XII SIJA 3"/>
            <x-form.input-base label="Deskripsi" id="input-description" type="text" name="description" placeholder="Kelas 12 SIJA 3 angkatan 2022, total murid 35"/>
            <input hidden type="text" name="department_id" value="{{ decrypt(request()->query('department')) }}">
        </x-slot:formBody>
    </x-form.form>
@endsection
