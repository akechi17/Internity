{{-- @php
    dd($vacancies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table routeCreate="{{ route('vacancies.create', ['company' => encrypt($company)]) }}" pageName="Lowongan" :pagination="$vacancies" :tableData="$vacancies">

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
                        <a href="{{ route('appliances.index', ['vacancy' => encrypt($data->id)]) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pendaftar"><i
                                class="bi bi-people"></i></a>
                        <a href="{{ route('vacancies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('vacancies.destroy', encrypt($data->id)) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="button-{{ $data->id }}" class="button-delete btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" type="button"><i
                                    class="bi bi-trash"></i></button>
                        </form>

                        {{--
                        <a href="{{ route('vacancies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('vacancies.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i
                                class="bi bi-trash"></i></a>
                        <a href="{{ route('companies.index', ['company' => encrypt($data->id)]) }}"
                            class="btn btn-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Perusahaan"><iconify-icon icon="mdi:building"></iconify-icon></a>
                        --}}
                    </td>
                    <td class="text-sm text-center">{{ $data->name }}</td>
                    <td class="text-sm text-center">{{ $data->category }}</td>
                    <td class="text-sm">{{ $data->description }}</td>
                    <td class="text-sm text-center">{{ $data->slots }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
