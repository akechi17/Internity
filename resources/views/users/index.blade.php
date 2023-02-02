@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="user" :pagination="$users">

        <x-slot:thead>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Kelola
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Nama
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Email
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Last Login
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
                Last Login IP
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('users.edit', encrypt($user->id)) }}" class="btn btn-primary text-xs">Edit</a>
                        <a href="{{ route('users.edit', encrypt($user->id)) }}" class="btn btn-primary text-xs">Delete</a>
                    </td>
                    <td class="text-sm">{{ $user->name }}</td>
                    <td class="text-sm">{{ $user->email }}</td>
                    <td class="text-sm">{{ $user->last_login }}</td>
                    <td class="text-sm">{{ $user->last_login_ip }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
