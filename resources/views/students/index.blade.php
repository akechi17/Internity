@php
    dd($students);
@endphp

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Data Magang Siswa" route="{{ route('users.create') }}" :pagination="$students" :tableData="$students">

        <x-slot:thead>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Kelola
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Nama
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Kelas
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                DU/DI
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($students as $student)
                <tr>
                    <td>
                        <a href="{{ route('users.edit', encrypt($student->id)) }}"
                            class="btn btn-primary text-xs">Presensi</a>
                        <a href="{{ route('users.edit', encrypt($student->id)) }}" class="btn btn-primary text-xs">Jurnal</a>
                    </td>
                    <td class="text-sm">{{ $student->name }}</td>
                    {{-- <td class="text-sm">{{ $student->courses()->first()->name }}</td>
                    <td class="text-sm">{{ $student->companies()->first()?->name }}</td> --}}
                    {{-- <td class="text-sm">{{ $student->last_login_ip }}</td> --}}
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
