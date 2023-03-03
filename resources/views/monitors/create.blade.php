@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Tambah Data Monitoring" formMethod="POST" formAction="{{ route('monitors.store') }}" enctype="multipart/form-data">
        <x-slot:formBody>
            <x-form.input-base label="Tanggal" id="input-date" type="date" name="date"/>
            <x-form.input-base label="Catatan" id="input-notes" type="text" name="notes"/>
            <x-form.input-base label="Saran" id="input-suggest" type="text" name="suggest"/>
            <x-form.input-base label="Lampiran" id="input-attachment" type="file" name="attachment" placeholder="Data Monitoring"/>
            <x-form.select label="Kesesuaian" id="input-match" name="match">
                <option selected hidden>Pilih</option>
                <x-slot:options>
                    <option value="1">Tidak Sesuai</option>
                    <option value="2">Kurang Sesuai</option>
                    <option value="3">Sesuai</option>
                    <option value="4">Sangat Sesuai</option>
                </x-slot:options>
            </x-form.select>
            <input hidden type="text" name="user_id" value="{{ $userId }}" />
            <input hidden type="text" name="company_id" value="{{ $companyId }}" />
        </x-slot:formBody>
    </x-form.form>
@endsection
