@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Tambah Data Nilai" formMethod="POST" formAction="{{ route('scores.store') }}" enctype="multipart/form-data">
        <x-slot:formBody>
            <x-form.input-base label="Subyek" id="input-name" type="text" name="name"/>
            <x-form.input-base label="Nilai (skala 100)" id="input-score" type="numeric" name="score"/>
            <input hidden type="text" name="user_id" value="{{ $userId }}" />
            <input hidden type="text" name="company_id" value="{{ $companyId }}" />
        </x-slot:formBody>
    </x-form.form>
@endsection
