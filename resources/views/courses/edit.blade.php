{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Kelas" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('courses.update', encrypt($course->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" placeholder="XII SIJA 3" value="{{ $course->name }}" />
            <x-form.input-base label="Deskripsi" id="input-description" type="text" name="description" placeholder="Kelas 12 SIJA 3 angkatan 2022, total murid 35" value="{{ $course->description }}"/>
            {{-- <x-form.input-base label="Status" id="input-status" type="text" name="status" value="{{ $course->status }}" /> --}}
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
