@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Tambah Pertanyaan" formMethod="POST" formAction="{{ route('questions.store') }}">
        <x-slot:formBody>
            <x-form.input-base id="input-school_id" type="hidden" name="school_id" value="1" />
            <x-form.input-base label="Pertanyaan" id="input-question" type="text" name="question" />
            <x-form.input-base label="Urutan" id="input-order" type="number" name="order" />
        </x-slot:formBody>
    </x-form.form>
@endsection
