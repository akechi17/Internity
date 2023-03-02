@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Tambah Kompetensi Keahlian" formMethod="POST" formAction="{{ route('departments.store') }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" placeholder="PPLG"/>
            <x-form.input-base label="Deskripsi" id="input-description" type="text" name="description" placeholder="Pengembangan Perangkat Lunak dan Gim"/>
            <input hidden type="text" name="school_id" value="{{ decrypt(request()->query('school')) }}">
        </x-slot:formBody>
    </x-form.form>
@endsection
