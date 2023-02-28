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
                Kelola
            </th>
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
                    <td class="text-center">
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            {{-- <input type="hidden" name="is_approved" value="{{ $data->is_approved ? 0 : 1 }}"> --}}
                            <button type="submit" class="btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Status">
                                <i class="bi bi-clipboard-check"></i></button>
                        </form>
                    </td>
                    <td class="text-sm text-center">{{ $data->date }}</td>
                    <td class="text-sm text-center">{{ $data->work_type }}</td>
                    <td class="text-sm">{{ $data->description }}</td>
                    <td class="text-sm text-center">
                        <p class="badge badge-sm {{ $data->is_approved ? 'bg-gradient-success' : 'bg-gradient-danger' }}">
                            {{ $data->is_approved ? 'Disetujui' : 'Belum disetujui' }}
                        </p>
                    </td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection