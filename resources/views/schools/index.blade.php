@extends('layouts.dashboard')

@section('dashboard-content')

    {{-- search bar --}}
    <form action="{{ route('roles.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request()->search }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>

    {{-- button add --}}
    <a href="{{ route('schools.create') }}" class="btn btn-primary">Tambah</a>

    <table class="table table-dark table-striped">
        <thead>
            <th>Aksi</th>
            <th>Role</th>
            <th>Permission</th>
            <th>Status</th>
        </thead>

        <tbody>
            {{-- data yang dikasih di loop dulu --}}
            @foreach ($roles as $role)
                <tr>
                    {{-- button edit --}}
                    <td>
                        <a href="{{ route('roles.edit', encrypt($role->id)) }}" class="btn btn-primary">Edit</a>
                    </td>
                    {{-- disini dia bisa ditampilin sesuai property nya --}}
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->permissions->implode('name', ', ') }}</td>
                    <td>{{ $role->status ? "Aktif" : "Nonaktif" }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ini untuk pagination --}}
    {{ $roles->links() }}
@endsection
