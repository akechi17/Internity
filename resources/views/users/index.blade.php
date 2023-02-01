{{-- @php
    dd($users);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table targetTambah="kldgnlskngs" idTambah="1" labelTambah="asgasgsa" targetEdit="dgsdg" idEdit="2"
        labelEdit="asfsafas" pageName="asgasgas" :pagination="$users">

        <x-slot:thead>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Last Login</th>
            <th>Last Login IP</th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('users.edit', encrypt($user->id)) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->last_login }}</td>
                    <td>{{ $user->last_login_ip }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
