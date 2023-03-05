{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Perusahaan" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('companies.update', encrypt($company->id)) }}" enctype="multipart/form-data">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $company->name }}" />
            <x-form.input-base label="Kategori" id="input-category" type="text" name="category" placeholder="Software Housing" value="{{ $company->category }}"/>
            <x-form.input-base label="Contact Person" id="input-contact" type="text" name="contact_person" placeholder="Bapak John Doe" value="{{ $company->contact_person }}" />
            <x-form.input-base label="Phone" id="input-phone" type="text" name="phone" placeholder="081234567890" value="{{ $company->phone }}"/>
            <x-form.input-base label="Email" id="input-email" type="email" name="email" placeholder="johndoe@gmail.com" value="{{ $company->email }}" />
            <x-form.input-base label="Website" id="input-website" type="text" name="website" placeholder="www.usahamaju.com" value="{{ $company->website }}"/>
            <x-form.input-base label="Kota" id="input-city" type="text" name="city" placeholder="Jakarta Selatan" value="{{ $company->city }}"/>
            <x-form.input-base label="Provinsi" id="input-province" type="text" name="state" placeholder="DKI Jakarta" value="{{ $company->state }}"/>
            <x-form.input-base label="Negara" id="input-country" type="text" name="country" placeholder="Indonesia" value="{{ $company->country }}"/>
            <x-form.input-base label="Alamat" id="input-address" type="text" name="address" placeholder="Jalan Baru No. 50 RT 02 RW 03, Jakarta Selatan, DKI Jakarta" value="{{ $company->address }}"/>
            <x-form.select label="Kompetensi Keahlian" id="input-department" name="department_id">
                <x-slot:options>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $company->department_id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </x-slot:options>
            </x-form.select>
            {{-- image --}}
            <x-form.input-base label="Logo" id="input-logo" type="file" name="logo" placeholder="Logo Perusahaan" value="{{ $company->logo }}"/>
            <img src="{{ url($company->logo) }}" alt="Logo Perusahaan" class="img-fluid" style="max-width: 200px; max-height: 200px;">
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
