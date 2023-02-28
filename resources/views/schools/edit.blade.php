{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Info Sekolah" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('schools.update', encrypt($school->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $school->name }}" />
            <x-form.input-base label="Email" id="input-email" type="text" name="email" value="{{ $school->email }}"/>
            <x-form.input-base label="Nomor Telepon" id="input-phone" type="text" name="phone" value="{{ $school->phone }}"/>
            <x-form.input-base label="Alamat" id="input-address" type="text" name="address" value="{{ $school->address }}"/>
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
