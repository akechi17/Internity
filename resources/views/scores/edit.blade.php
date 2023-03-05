@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Nilai" formMethod="POST" spoofMethod="PUT" formAction="{{ route('scores.update', encrypt($score->id)) }}" enctype="multipart/form-data">
        <x-slot:formBody>
            <x-form.input-base label="Subyek" id="input-name" type="text" name="name" value="{{ $score->name }}"/>
            <x-form.input-base label="Nilai" id="input-score" type="numeric" name="score" value="{{ $score->score }}"/>
        </x-slot:formBody>
    </x-form.form>
@endsection
