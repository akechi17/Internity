@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Tambah Lowongan" formMethod="POST" formAction="{{ route('vacancies.store') }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" placeholder="Laravel Web Developer"/>
            <x-form.input-base label="Kategori" id="input-category" type="text" name="category" placeholder="IT"/>
            <x-form.input-base label="Skill Requirement (pisah dengan koma ',')" id="input-skills" type="text" name="skills" placeholder="HTML, CSS, JavaScript, PHP, Laravel, MySQL, Bootstrap"/>
            <x-form.input-rich label="Deskripsi Pekerjaan" id="input-description" name="description"/>
            <x-form.input-base label="Kuota" id="input-slots" type="text" name="slots" placeholder="3"/>
            <input hidden type="text" name="company_id" value="{{ decrypt(request()->query('company')) }}">
        </x-slot:formBody>
    </x-form.form>
@endsection
