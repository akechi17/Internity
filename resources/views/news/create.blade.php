@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Tambah Berita/Artikel" formMethod="POST" formAction="{{ route('news.store') }}" enctype="multipart/form-data">
        <x-slot:formBody>
            <x-form.input-base label="Judul" id="input-title" type="text" name="title" placeholder="Pengumuman Pengambilan Rapor"/>
            <x-form.input-base label="Gambar" id="input-image" type="file" name="image" placeholder="Pengumuman Pengambilan Rapor"/>
            <x-form.input-rich label="Isi Berita" id="input-cotent" name="content"/>
            <input hidden type="text" name="newsable_id" value="{{ $category == 'school' ? $selectedSchool->id : $selectedDepartment->id }}">
            <input hidden type="text" name="newsable_type" value="{{ $category == 'school' ? 'App\Models\School' : 'App\Models\Department' }}">
        </x-slot:formBody>
    </x-form.form>
@endsection
