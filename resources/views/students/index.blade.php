{{-- @php
    dd($students);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Data Magang Siswa" route="{{ route('users.create') }}" :pagination="$students" :tableData="$students">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Kelas
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                DU/DI
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Tanggal Mulai
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Tanggal Selesai
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Status Perpanjang
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($students as $student)
                @if (count($student->companies()->get()) == 0)
                    <tr>
                        <td>
                            {{-- <a href="{{ route('users.edit', encrypt($student->id)) }}"
                                class="btn btn-primary text-xs">Presensi</a>
                            <a href="{{ route('users.edit', encrypt($student->id)) }}" class="btn btn-primary text-xs">Jurnal</a> --}}
                        </td>
                        <td class="text-sm">{{ $student->name }}</td>
                        <td class="text-sm">{{ $student->courses()->first()?->name }}</td>
                        <td class="text-sm">{{ $student->companies()->first()?->name }}</td>
                        <td class="text-sm">{{ $student->internDates()->first()?->start_date }}</td>
                        <td class="text-sm">{{ $student->internDates()->first()?->end_date }}</td>
                        <td class="text-sm">{{ $student->internDates()->first()?->extend }}</td>
                    </tr>
                @else
                    @foreach ($student->companies()->get() as $company)
                        <tr>
                            <td>
                                <a href="{{ route('users.edit', encrypt($student->id)) }}"
                                    class="btn btn-primary text-xs">Presensi</a>
                                <a href="{{ route('users.edit', encrypt($student->id)) }}" class="btn btn-primary text-xs">Jurnal</a>
                            </td>
                            <td class="text-sm">{{ $student->name }}</td>
                            <td class="text-sm text-center">{{ $student->courses->first()?->name }}</td>
                            <td class="text-sm">{{ $company->name }}</td>
                            <td class="text-sm text-center">{{ $student->internDates()->where('company_id', $company->id)->first()?->start_date }}</td>
                            <td class="text-sm text-center">{{ $student->internDates()->where('company_id', $company->id)->first()?->end_date }}</td>
                            <td class="text-sm text-center">{{ $student->internDates()->where('company_id', $company->id)->first()?->extend }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
