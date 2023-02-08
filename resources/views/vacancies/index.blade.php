{{-- @php
    dd($vacancies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table route="{{ route('vacancies.create', encrypt($company)) }}" pageName="Lowongan" :pagination="$vacancies">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Kategori
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-50">
                Deskripsi
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kuota
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($vacancies as $data)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('vacancies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('vacancies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i
                                class="bi bi-trash"></i></a>
                        <a href="{{ route('appliances.index', encrypt($data->id)) }}"
                            class="btn btn-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Lowongan"><i class="bi bi-person-workspace"></i></a>
                    </td>
                    <td class="text-sm">{{ $data->name }}</td>
                    <td class="text-sm">{{ $data->category }}</td>
                    <td class="text-sm">{{ $data->description }}</td>
                    <td class="text-sm text-center">{{ $data->slots }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
