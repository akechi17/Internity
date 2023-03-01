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
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kelas
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Keahlian
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                IDUKA
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Tanggal Mulai
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Tanggal Selesai
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Lama Perpanjangan
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($students as $student)
                @if (count($student->companies()->get()) == 0)
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('presences.index', encrypt($student->id)) }}" class="btn btn-secondary text-xs" style="pointer-events: none"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Presensi">
                                    <i class="bi bi-calendar-check"></i></a>
                            <a href="{{ route('journals.index', encrypt($student->id)) }}" class="btn btn-secondary text-xs" style="pointer-events: none"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jurnal">
                                    <i class="bi bi-journal-bookmark-fill"></i></a>
                            <a href="{{ route('students.edit', encrypt($student->id)) }}" class="btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                    <i class="bi bi-pencil-square"></i></a>
                        </td>
                        <td class="text-sm">{{ $student->name }}</td>
                        <td class="text-sm">{{ $student->courses()->first()?->name }}</td>
                        <td class="text-sm">
                            <ul>
                                @if ($student->skills)
                                    @foreach (explode(",", $student->skills) as $skill)
                                        <li>{{ $skill }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                        <td class="text-sm">{{ $student->companies()->first()?->name }}</td>
                        <td class="text-sm">{{ $student->internDates()->first()?->start_date }}</td>
                        <td class="text-sm">{{ $student->internDates()->first()?->end_date }}</td>
                        <td class="text-sm">{{ $student->internDates()->first()?->extend }}</td>
                    </tr>
                @else
                    @foreach ($student->companies()->get() as $company)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('presences.index', encrypt($student->id)) }}" class="btn btn-info text-xs"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Presensi">
                                        <i class="bi bi-calendar-check"></i></a>
                                <a href="{{ route('journals.index', ['user' => encrypt($student->id)]) }}" class="btn btn-info text-xs"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jurnal">
                                        <i class="bi bi-journal-bookmark-fill"></i></a>
                                <a href="{{ route('students.edit', ['id'=>encrypt($student->id),'company'=>encrypt($company->id)]) }}" class="btn btn-info text-xs"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                        <i class="bi bi-pencil-square"></i></a>
                            </td>
                            <td class="text-sm">{{ $student->name }}</td>
                            <td class="text-sm">{{ $student->courses->first()?->name }}</td>
                            <td class="text-sm">
                                <ul>
                                    @if ($student->skills)
                                        @foreach (explode(",", $student->skills) as $skill)
                                            <li>{{ $skill }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </td>
                            <td class="text-sm">{{ $company->name }}</td>
                            <td class="text-sm">
                                {{ \Carbon\Carbon::parse($student->internDates()->where('company_id', $company->id)->first()?->start_date)->format('d-m-Y') }}</td>
                            <td class="text-sm">
                                {{ \Carbon\Carbon::parse($student->internDates()->where('company_id', $company->id)->first()?->end_date)->format('d-m-Y') }}</td>
                            <td class="text-sm text-center">
                                {{ $student->internDates()->where('company_id', $company->id)->first()?->extend }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
