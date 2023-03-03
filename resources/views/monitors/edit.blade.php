@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Data Monitoring" formMethod="POST" spoofMethod="PUT" formAction="{{ route('monitors.update', encrypt($monitor->id)) }}" enctype="multipart/form-data">
        <x-slot:formBody>
            <x-form.input-base label="Tanggal" id="input-date" type="date" name="date" value="{{ $monitor->date }}"/>
            <x-form.input-base label="Catatan" id="input-notes" type="text" name="notes" value="{{ $monitor->notes }}"/>
            <x-form.input-base label="Saran" id="input-suggest" type="text" name="suggest" value="{{ $monitor->suggest }}"/>
            <x-form.input-base label="Lampiran" id="input-attachment" type="file" name="attachment" placeholder="Data Monitoring" value="{{ $monitor->attachment }}"/>
            <x-form.select label="Kesesuaian" id="input-match" name="match">
                <option selected hidden>Pilih</option>
                <x-slot:options>
                    <option value="1" {{ $monitor->match == 1 ? 'selected' : '' }}>Tidak Sesuai</option>
                    <option value="2" {{ $monitor->match == 2 ? 'selected' : '' }}>Kurang Sesuai</option>
                    <option value="3" {{ $monitor->match == 3 ? 'selected' : '' }}>Sesuai</option>
                    <option value="4" {{ $monitor->match == 4 ? 'selected' : '' }}>Sangat Sesuai</option>
                </x-slot:options>
            </x-form.select>
        </x-slot:formBody>
    </x-form.form>
@endsection
