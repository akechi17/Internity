{{-- @extends('layouts.dashboard')

@section('dashboard-content')
<div class="row">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="pb-3">PERUSAHAAN</h6>
                <form action="#" method="#">
                    <div class="row">
                        <div class="col-md-4 pb-3 form-group">
                            <label for="input-data" class="form-label">Logo</label>
                            <input type="file" class="form-control" id="input-data"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="input-data">Nama</label>
                            <input type="text" class="form-control" id="input-data" required/>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="input-data">Kategori</label>
                            <input type="text" class="form-control" id="input-data" required/>
                        </div>
                        <div class="col-md-6 pb-3 form-group">
                            <label for="input-data">Contact Person</label>
                            <input type="text" class="form-control" id="input-data" required/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="input-data">Phone</label>
                            <input type="text" class="form-control" id="input-data" required/>
                        </div>
                        <div class="col-md-6 pb-3 form-group">
                            <label for="input-data">Email</label>
                            <input type="email" class="form-control" id="input-data" required/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="input-data">Website</label>
                            <input type="text" class="form-control" id="input-data" required/>
                        </div>
                        <div class="col-md-6 pb-3 form-group">
                            <label for="input-data">Alamat</label>
                            <input type="text" class="form-control" id="input-data"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="input-data">Kota</label>
                            <input type="text" class="form-control" id="input-data"/>
                        </div>
                        <div class="col-md-6 pb-3 form-group">
                            <label for="input-data">Provinsi</label>
                            <input type="text" class="form-control" id="input-data"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="input-data">Negara</label>
                            <input type="text" class="form-control" id="input-data"/>
                        </div>
                        <button type="button" class="btn bg-gradient-info w-10" id="save-data" onclick="#">
                            Simpan
                        </button>
                        <button type="button" class="btn bg-gradient-danger w-10" id="cancel" onclick="#">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection --}}

{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Tambah Perusahaan" formMethod="POST" formAction="{{ route('companies.store') }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" />
            <x-form.input-base label="Jenis Usaha" id="input-category" type="text" name="category" />
            <x-form.input-base label="Contact Person" id="input-contact" type="text" name="contact_person" />
            <x-form.input-base label="Nomor Telepon" id="input-phone" type="text" name="phone" />
            <x-form.input-base label="Email" id="input-email" type="email" name="email" />
            <x-form.input-base label="Alamat" id="input-address" type="text" name="address" />
            <x-form.select label="Kompetensi Keahlian" id="input-department" name="department_id">
                @if (count($departments) == 1)
                    <option selected value="{{ $departments[0]->id }}">{{ $departments[0]->name }}</option>
                @else
                    <option selected disabled>Pilih Kompetensi Keahlian</option>
                @endif
                <x-slot:options>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </x-slot:options>
            </x-form.select>
        </x-slot:formBody>
    </x-form.form>
@endsection
