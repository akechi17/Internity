{{-- @php
    dd($users);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <table class="table table-dark table-striped">
        <thead>
            <th>Nama</th>
            <th>Email</th>
        </thead>

        <tbody>
            {{-- data yang dikasih di loop dulu --}}
            @foreach ($users as $user)
                <tr>
                    {{-- disini dia bisa ditampilin sesuai property nya --}}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
