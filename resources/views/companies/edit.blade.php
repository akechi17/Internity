{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Perusahaan" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('companies.update', encrypt($company->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $company->name }}" />
            <x-form.input-base label="Kategori" id="input-category" type="text" name="category" value="{{ $company->category }}"/>
            <x-form.input-base label="Contact Person" id="input-contact" type="text" name="contact_person" value="{{ $company->contact_person }}" />
            <x-form.input-base label="Phone" id="input-phone" type="text" name="phone" value="{{ $company->phone }}"/>
            <x-form.input-base label="Email" id="input-email" type="email" name="email" value="{{ $company->email }}" />
            <x-form.input-base label="Website" id="input-website" type="text" name="website" value="{{ $company->website }}"/>
            <x-form.input-base label="Alamat" id="input-address" type="text" name="address" value="{{ $company->address }}"/>
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
