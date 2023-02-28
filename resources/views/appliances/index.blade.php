{{-- @php
    dd($appliances);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table routeCreate="{{ route('appliances.create', ['vacancies' => encrypt($vacancy->id)]) }}" pageName="Pendaftar {{ $vacancy->name }}" :pagination="$appliances" :tableData="$appliances">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
                Tanggal Daftar
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Kompetensi Keahlian
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-50">
                Keahlian
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                CV
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Status
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($appliances as $data)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('appliances.index', ['vacancy' => encrypt($data->id)]) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pendaftar"><i
                                class="bi bi-people"></i></a>
                        <a href="{{ route('vacancies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>
                    </td>
                    <td class="text-sm text-center">{{ $data->created_at->format('d-m-Y') }}</td>
                    <td class="text-sm text-center">{{ $data->user->name }}</td>
                    <td class="text-sm text-center">{{ $data->user->departments()->first()->name }}</td>
                    <td class="text-sm text-center">{{ $data->user->skills }}</td>
                    <td class="text-sm">{{ $data->user->resume }}</td>
                    <td class="text-sm text-center">{{ $data->status }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
