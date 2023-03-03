@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Riwayat Kehadiran" permissionCreate="course-create" :pagination="$presences" :tableData="$presences">
        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Tanggal
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Jam Masuk
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Jam Keluar
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Lampiran
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Status

        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($presences as $data)
                <tr>
                    <td class="d-flex justify-content-center">
                        @can('course-edit')
                            <a href="{{ route('courses.edit', encrypt($data->id)) }}" class="btn btn-info text-xs me 1"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                    class="bi bi-pencil-square"></i></a>
                        @endcan
                        @can('course-delete')
                            <form action="{{ route('courses.destroy', encrypt($data->id)) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button id="button-{{ $data->id }}" class="button-delete btn btn-info text-xs ms-1"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" type="button"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        @endcan
                    </td>
                    <td class="text-sm text-center">{{ $data->user->name }}</td>
                    <td class="text-sm text-center">{{ $data->date }}</td>
                    <td class="text-sm text-center">{{ $data->check_in }}</td>
                    <td class="text-sm text-center">{{ $data->check_out }}</td>
                    <td class="text-sm text-center">{{ $data->attachment }}</td>
                    <td class="text-sm text-center">
                            {{-- 1 = Hadir
                            2 = Terlambat
                            3 = Alpa
                            4 = Izin
                            5 = Sakit
                            6 = Libur --}}
                            @if ($data->status == 1)
                                <span class="badge badge-sm bg-gradient-success">Hadir</span>
                            @elseif ($data->status == 2)
                                <span class="badge badge-sm bg-gradient-warning">Terlambat</span>
                            @elseif ($data->status == 3)
                                <span class="badge badge-sm bg-gradient-danger">Alpa</span>
                            @elseif ($data->status == 4)
                                <span class="badge badge-sm bg-gradient-info">Izin</span>
                            @elseif ($data->status == 5)
                                <span class="badge badge-sm bg-gradient-primary">Sakit</span>
                            @elseif ($data->status == 6)
                                <span class="badge badge-sm bg-gradient-secondary">Libur</span>
                            @endif
                    </td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
    <div style="float:right">
        <a href="{{ route('students.index', encrypt($data->id)) }}" class="btn bg-gradient-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Siswa">
            <i class="bi bi-arrow-left"></i></a>
    </div>
@endsection
