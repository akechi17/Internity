{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table route="{{ route('departments.create', encrypt($selectedSchool)) }}" pageName="Kompetensi Keahlian"
        :pagination="$departments" :tableData="$departments">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-35">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-50">
                Deskripsi
            </th>
            {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
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
            </th> --}}
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($departments as $data)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('departments.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('departments.destroy', encrypt($data->id)) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button id="button-{{ $data->id }}" class="button-delete btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" type="button"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td class="text-sm text-center">{{ $data->name }}</td>
                    <td class="text-sm text-center">{{ $data->description }}</td>
                    {{-- <td class="text-sm">{{ $data->address }}</td>
                    <td class="text-sm">{{ $data->contact_person }}</td>
                    <td class="text-sm">{{ $data->email }}</td>
                    <td class="text-sm">{{ $data->phone }}</td>
                </tr> --}}
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
