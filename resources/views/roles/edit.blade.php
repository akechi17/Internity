@extends('layouts.dashboard')


@section('dashboard-content')
    <x-form.form formTitle="Edit Role" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('roles.update', encrypt($role->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $role->name }}" />

            <x-form.checkbox label="Permission" name="permissions">
                <x-slot:checkboxItem>
                    @foreach ($permissions as $key => $value)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $value->id }}"
                                id="input-permission-{{ $value->id }}" name="permissions[]"
                                {{ $role->permissions->contains($value->id) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="input-permission-{{ $value->id }}">{{ $value->name }}</label>
                        </div>
                    @endforeach
                </x-slot:checkboxItem>
            </x-form.checkbox>

            <x-form.radio label="Status" name="status">
                <x-slot:checkboxItem>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" id="input-status-1" name="status"
                            {{ $role->status == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-status-1">Aktif</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" id="input-status-2" name="status"
                            {{ $role->status == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="input-status-2">Inaktif</label>
                    </div>
                </x-slot:checkboxItem>
            </x-form.radio>
        </x-slot:formBody>
    </x-form.form>
@endsection
