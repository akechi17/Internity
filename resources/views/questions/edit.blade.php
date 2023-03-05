@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Pertanyaan" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('questions.update', encrypt($question->id)) }}">
        <x-slot:formBody>
            <x-form.input-base id="input-school_id" type="hidden" name="school_id"
                value="{{ $question->school_id }}" />
            <x-form.input-base label="Pertanyaan" id="input-question" type="text" name="question" value="{{ $question->question }}" />
            <x-form.input-base label="Urutan" id="input-min" type="number" name="order"
                value="{{ $question->order }}" />
        </x-slot:formBody>
    </x-form.form>
@endsection
