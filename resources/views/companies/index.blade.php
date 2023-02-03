{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Perusahaan" :pagination="$companies">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-30">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kategori
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
                Alamat
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Contact Person
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Email
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Phone
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($companies as $data)
                <tr>
                    <td>
                        <a href="{{ route('companies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('companies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash"></i></a>
                        <a href="{{ route('vacancies.index', ['company' => encrypt($data->id)]) }}" class="btn btn-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lowongan"><i class="bi bi-person-workspace"></i></a>
                    </td>
                    <td class="text-sm">{{ $data->name }}</td>
                    <td class="text-sm">{{ $data->category }}</td>
                    <td class="text-sm">{{ $data->address }}</td>
                    <td class="text-sm">{{ $data->contact_person }}</td>
                    <td class="text-sm">{{ $data->email }}</td>
                    <td class="text-sm">{{ $data->phone }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
