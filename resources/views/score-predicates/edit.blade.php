{{-- @php
    dd($scorePredicate);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Predikat Nilai" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('score-predicates.update', Crypt::encrypt($scorePredicate->id)) }}">
        <x-slot:formBody>
            <x-form.input-base id="input-school_id" type="hidden" name="school_id"
                value="{{ $scorePredicate->school_id }}" />
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $scorePredicate->name }}" />
            <x-form.input-base label="Deskripsi" id="input-description" type="text" name="description"
                value="{{ $scorePredicate->description }}" />
            <x-form.input-base label="Nilai Minimum" id="input-min" type="number" name="min"
                value="{{ $scorePredicate->min }}" />
            <x-form.input-base label="Nilai Maksimal" id="input-max" type="number" name="max"
                value="{{ $scorePredicate->max }}" />
            <x-form.input-base id="input-color" type="hidden" name="color" value="{{ $scorePredicate->color }}" />

            <div class="color-picker">
                <label>Warna</label>
                <div id="picker" class="picker" style="background-color: {{ $scorePredicate->color }};"></div>
            </div>
        </x-slot:formBody>
    </x-form.form>
@endsection

@once
    @push('scripts')
        <script type="module">
            let parent = document.querySelector('#picker');
            let picker = new window.Picker({
                parent: parent,
                color: '{{ $scorePredicate->color }}',
            });

            picker.onChange = function(color) {
                parent.style.background = color.rgbaString;
            };

            picker.onDone = function(color) {
                parent.style.background = color.rgbaString;
                document.querySelector('#input-color').value = color.hex;
            };

            picker.onClose = function(color) {
                parent.style.background = color.rgbaString;
                document.querySelector('#input-color').value = color.hex;
            };
        </script>
    @endpush
@endonce
