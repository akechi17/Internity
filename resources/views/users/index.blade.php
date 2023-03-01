@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table routeCreate="{{ route('users.create') }}" pageName="user" :pagination="$users" :tableData="$users">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Email
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Role
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Last Login
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Last Login IP
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('users.edit', encrypt($user->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>

                        <form action="{{ route('users.destroy', encrypt($user->id)) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="button-{{ $user->id }}" class="button-delete btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" type="button"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td class="text-sm text-center">{{ $user->name }}</td>
                    <td class="text-sm text-center">{{ $user->email }}</td>
                    <td class="text-sm text-center">{{ $user->roles()->first()->name }}</td>
                    <td class="text-sm text-center">{{ $user->last_login?->format('d-m-Y H:i:s') }}</td>
                    <td class="text-sm text-center">{{ $user->last_login_ip }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
