{{-- @php
    dd($vacancies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Lowongan" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('vacancies.update', encrypt($vacancy->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" placeholder="Laravel Web Developer" value="{{ $vacancy->name }}" />
            <x-form.input-base label="Kategori" id="input-category" type="text" name="category"
                placeholder="IT" value="{{ $vacancy->category }}" />
            <x-form.input-base label="Skill Requirement (pisah dengan koma ',')" id="input-skills" type="text" name="skills" placeholder="HTML, CSS, JavaScript, PHP, Laravel, MySQL, Bootstrap" value="{{ $vacancy->skills }}"/>
            <x-form.input-rich label="Deskripsi Pekerjaan" id="input-description" name="description"
                value="{!! $vacancy->description !!}" />
            <x-form.input-base label="Kuota" id="input-slots" type="number" min="0" name="slots"
                placeholder="3" value="{{ $vacancy->slots }}" />
        </x-slot:formBody>
    </x-form.form>
@endsection

{{-- @once
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
@endonce --}}
