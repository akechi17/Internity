@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Status Kehadiran" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('presence-statuses.update', encrypt($presenceStatus->id)) }}">
        <x-slot:formBody>
            <x-form.input-base id="input-school_id" type="hidden" name="school_id"
                value="{{ $presenceStatus->school_id }}" />
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $presenceStatus->name }}" />
            <x-form.input-base label="Deskripsi" id="input-description" type="text" name="description"
                value="{{ $presenceStatus->description }}" />
            <x-form.input-base id="input-color" type="hidden" name="color" value="{{ $presenceStatus->color }}" />
            <div class="color-picker">
                <label>Warna</label>
                <div id="picker" class="picker" style="background-color: {{ $presenceStatus->color }};"></div>
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
                color: '{{ $presenceStatus->color }}',
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
