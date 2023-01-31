{{-- @php
    dd($users);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    {{-- search bar --}}
    <form action="{{ route('users.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request()->search }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    {{-- button add --}}
    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>

    <table class="table table-dark table-striped">
        <thead>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Last Login</th>
            <th>Last Login IP</th>
        </thead>

        <tbody>
            {{-- data yang dikasih di loop dulu --}}
            @foreach ($users as $user)
                <tr>
                    {{-- button edit --}}
                    <td>
                        <a href="{{ route('users.edit', encrypt($user->id)) }}" class="btn btn-primary">Edit</a>
                    </td>
                    {{-- disini dia bisa ditampilin sesuai property nya --}}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->last_login }}</td>
                    <td>{{ $user->last_login_ip }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ini untuk pagination --}}
    {{ $users->links() }}
@endsection
