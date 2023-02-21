@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Jurnal Magang" :pagination="$journals" :tableData="$journals">

        <div class="card-header pb-0">
            <h5 class="text-center">JURNAL MAGANG SISWA</h5>
            {{-- <p>Nama Lengkap :</p>
            <p>Nama DU/DI :</p> --}}
        </div>

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                No
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-14">
                Bidang Pekerjaan
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Uraian Pekerjaan
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-23">
                Hari/Tanggal Pelaksanaan
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-14">
                #
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($companies as $data)
                <tr>
                    <td class="text-sm">1</td>
                    <td class="text-sm">{{ $data->work_type }}</td>
                    <td class="text-sm">{{ $data->description }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection