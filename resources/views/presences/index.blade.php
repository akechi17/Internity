{{-- @php
    dd($presences);
@endphp --}}
@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Riwayat Kehadiran" :pagination="$presences" :tableData="$presences">

        <div class="card-header pb-0">
            <h5 class="text-center">RIWAYAT KEHADIRAN</h5>
        </div>

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Tanggal
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Nama Siswa
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-50">
                Jam Masuk
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-14">
                Jam Keluar
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($presences as $data)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection