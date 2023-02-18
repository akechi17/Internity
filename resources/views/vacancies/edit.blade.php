{{-- @php
    dd($vacancies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Lowongan" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('vacancies.update', encrypt($vacancy->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $vacancy->name }}" />
            <x-form.input-base label="Kategori" id="input-category" type="text" name="category" value="{{ $vacancy->category }}"/>
            <x-form.input-base label="Deskripsi" id="input-description" type="text" name="description" value="{{ $vacancy->description }}" />
            <x-form.input-base label="Kuota" id="input-slots" type="integer" name="slots" value="{{ $vacancy->slots }}"/>
        </x-slot:formBody>
    </x-form.form>
@endsection

@once
    @push('scripts')
        <script type="module">
            axios.get('/departments/search?school=1')
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        </script>
    @endpush
@endonce
