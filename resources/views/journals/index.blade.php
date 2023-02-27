{{-- @php
    dd($journals);
@endphp --}}
@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Jurnal Magang" :pagination="$journals" :tableData="$journals">

        <div class="card-header pb-0">
            <h5 class="text-center">JURNAL MAGANG SISWA</h5>
            {{-- <p>Nama Lengkap :</p>
            <p>Nama DU/DI :</p> --}}
        </div>

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Tanggal
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Bidang Pekerjaan
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-50">
                Uraian Pekerjaan
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-14">
                Status
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($journals as $data)
                <tr>
                    <td class="text-sm text-center">{{ $data->date }}</td>
                    <td class="text-sm text-center">{{ $data->work_type }}</td>
                    <td class="text-sm">{{ $data->description }}</td>
                    <td></td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
