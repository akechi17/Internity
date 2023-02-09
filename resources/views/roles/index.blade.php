{{-- @php
    dd($roles);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table route="{{ route('roles.create') }}" pageName="Access Control List" :pagination="$roles">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Role
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-55">
                Permission
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Status
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Kelola
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($roles as $data)
                <tr>
                    <td class="text-sm text-center">{{ $data->name }}</td>
                    <td class="text-sm">{{ $data->permissions->implode('name', ', ') }}</td>
                    <td class="text-center badge badge-sm bg-gradient-success d-flex align-items-center">
                        <p>{{ $data->status ? "Aktif" : "Nonaktif" }}</p>
                    </td>
                    <td>
                        <a href="{{ route('roles.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>
                        <a href="{{ route('roles.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i
                                class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
    {{-- ini untuk pagination --}}
    {{ $roles->links() }}
@endsection