@extends('layouts.dashboard')


@section('dashboard-content')
    <x-form.form formTitle="Tambah Predikat Nilai" formMethod="POST" formAction="{{ route('score-predicates.store') }}">
        <x-slot:formBody>
            <x-form.input-base id="input-school_id" type="hidden" name="school_id" value="1" />
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" />
            <x-form.input-base label="Deskripsi" id="input-description" type="text" name="description" />
            <x-form.input-base label="Nilai Minimum" id="input-min" type="number" name="min" />
            <x-form.input-base label="Nilai Maksimal" id="input-max" type="number" name="max" />
            <x-form.input-base id="input-color" type="color" name="color" value="#ff0000" />

            <div class="color-picker">
                <label>Warna</label>
                <div id="picker" class="picker"></div>
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
                color: '#ff0000',
            });

            picker.onChange = function(color) {
                parent.style.background = color.rgbaString;
            };

            picker.onDone = function(color) {
                parent.style.background = color.rgbaString;
                document.querySelector('#input-color').value = color.hex;
            };
        </script>
    @endpush
@endonce
