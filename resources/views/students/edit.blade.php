@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Siswa" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('students.update', encrypt($student->id)) }}">
        <x-slot:formBody>
            <x-form.input-base label="Nama" id="input-name" type="text" name="name" value="{{ $student->name }}" />
            <x-form.select label="Kelas" id="input-course" name="course_id">
                <option selected hidden>Pilih</option>
                <x-slot:options>
                    @foreach ($courses as $key => $value)
                        <option value="{{ $key }}" {{ $student->courses()->first()?->id == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </x-slot:options>
            </x-form.select>
            <x-form.input-base label="Keahlian" id="input-skills" type="text" name="skills" value="{{ $student->skills }}" />
            <x-form.input-base disabled label="IDUKA" id="input-companies" type="text" name="company" value="{{ $company->name }}" />
            <x-form.input-base label="Tanggal Mulai" id="input-start-date" type="date" name="start_date"
                value="{{ $student->start_date }}" />
            <x-form.input-base label="Tanggal Selesai" id="input-end-date" type="date" name="end_date"
                value="{{ $student->end_date }}" />
        </x-slot:formBody>
    </x-form.form>
@endsection
