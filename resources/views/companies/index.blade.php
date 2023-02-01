{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Perusahaan" :pagination="$companies">

        <x-slot:thead>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Kelola
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Nama
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Kategori
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Alamat
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($companies as $data)
                <tr>
                    <td>
                        <a href="{{ route('companies.edit', encrypt($data->id)) }}" class="btn btn-primary text-xs">Edit</a>
                        <a href="{{ route('companies.edit', encrypt($data->id)) }}" class="btn btn-primary text-xs">Delete</a>
                    </td>
                    <td class="text-sm">{{ $data->name }}</td>
                    <td class="text-sm">{{ $data->category }}</td>
                    <td class="text-sm">{{ $data->address }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
