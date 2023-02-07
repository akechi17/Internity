{{-- @php
    dd($user);
@endphp --}}

@extends('layouts.dashboard')


@section('dashboard-content')
    <x-form.form formTitle="Edit User" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('users.update', encrypt($user->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $user->name }}" />
            <x-form.input-base label="Email" id="input-email" type="email" name="email" value="{{ $user->email }}" />
            <x-form.input-password label="Password" id="input-password" name="password" />
            <x-form.input-password label="Ulangi Password" id="input-confirm-password" name="confirm-password" />
            <x-form.select label="Role" id="input-role" name="role_id">
                <option selected hidden>Pilih</option>
                <x-slot:options>
                    @foreach ($roles as $key => $value)
                        <option value="{{ $key }}" {{ $user->role->id == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </x-slot:options>
            </x-form.select>

            <x-form.select label="Sekolah" id="input-school" name="school_id">
                <option selected hidden>Pilih</option>
                <x-slot:options>
                    @foreach ($schools as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-slot:options>
            </x-form.select>

            <x-form.select label="Departemen" id="input-department" name="department_id">
                <option selected hidden>Pilih</option>
                <x-slot:options>
                    @foreach ($departments as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-slot:options>
            </x-form.select>

            <x-form.select label="Kelas" id="input-courses" name="course_id">
                <option selected hidden>Pilih</option>
                <x-slot:options>
                    @foreach ($courses as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-slot:options>
            </x-form.select>

            <x-form.radio label="Status" name="status">
                <x-slot:checkboxItem>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" id="input-status-1" name="status">
                        <label class="form-check-label" for="input-status-1">Aktif</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" id="input-status-2" name="status">
                        <label class="form-check-label" for="input-status-2">Inaktif</label>
                    </div>
                </x-slot:checkboxItem>
            </x-form.radio>
        </x-slot:formBody>
    </x-form.form>
@endsection
