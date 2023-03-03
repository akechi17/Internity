@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Edit Berita/Artikel" formMethod="POST" spoofMethod="PUT" formAction="{{ route('news.update', encrypt($news->id)) }}" enctype="multipart/form-data">
        <x-slot:formBody>
            <x-form.input-base label="Judul" id="input-title" type="text" name="title" placeholder="Pengumuman Pengambilan Rapor" value="{{ $news->title }}"/>
            <x-form.input-base label="Gambar" id="input-image" type="file" name="image" placeholder="Pengumuman Pengambilan Rapor" value="{{ $news->image }}"/>
            <x-form.input-rich label="Isi Berita" id="input-content" name="content"
            value="{!! $news->content !!}" />
        </x-slot:formBody>
    </x-form.form>
@endsection
