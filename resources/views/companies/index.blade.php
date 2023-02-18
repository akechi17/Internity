{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table routeCreate="{{ route('companies.create') }}" pageName="Perusahaan" :pagination="$companies" :tableData="$companies">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-14">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kategori
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-23">
                Alamat
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-14">
                Contact Person
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-23">
                Email
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-16">
                Phone
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($companies as $data)
                <tr>
                    <td class="text-center">
                        <form action="{{ route('companies.destroy', encrypt($data->id)) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('companies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                    class="bi bi-pencil-square"></i></a>
                            <button class="btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i
                                    class="bi bi-trash"></i></button>
                            <a href="{{ route('vacancies.index', ['company' => encrypt($data->id)]) }}"
                                class="btn btn-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Lowongan"><i class="bi bi-person-workspace"></i></a>
                        </form>
                        {{-- 
                        <a href="{{ route('companies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('companies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i
                                class="bi bi-trash"></i></a> 
                        <a href="{{ route('vacancies.index', ['company' => encrypt($data->id)]) }}"
                            class="btn btn-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Lowongan"><i class="bi bi-person-workspace"></i></a>
                        --}}
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
