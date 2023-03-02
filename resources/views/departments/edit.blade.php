@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Kompetensi Keahlian" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('departments.update', encrypt($department->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" placeholder="PPLG" value="{{ $department->name }}" />
            <x-form.input-base label="Deskripsi" id="input-description" type="text" name="description" placeholder="Pengembangan Perangkat Lunak dan Gim" value="{{ $department->description }}"/>
            <input hidden type="text" name="school_id" value="{{ $department->school_id }}">
        </x-slot:formBody>
    </x-form.form>
@endsection
