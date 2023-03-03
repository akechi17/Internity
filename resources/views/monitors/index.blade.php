{{-- @php
    dd($journals);
@endphp --}}
@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="Data Monitoring {{ $userName }}" :pagination="$monitors" :tableData="$monitors">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Tanggal
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Catatan
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Saran
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Lampiran
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kesesuaian
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($monitors as $data)
                <tr>
                    <td class="text-center">
                        {{-- @can('journal-approve')
                            <form action="{{ route('journals.approve', encrypt($data->id)) }}" method="POST" id="formApprove">
                                @csrf
                                @method('PUT')
                                <button id="approve" class="btn {{ $data->is_approved ? 'btn-secondary' : 'btn-success' }} text-xs" style="{{ $data->is_approved ? 'pointer-events: none' : '' }}"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ubah Status" type="button"><i
                                        class="bi bi-check-lg"></i></button>
                            </form>
                        @endcan --}}
                    </td>
                    <td class="text-sm text-center">{{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}</td>
                    <td class="text-sm text-center">{{ $data->notes }}</td>
                    <td class="text-sm">{{ $data->suggest }}</td>
                    <td class="text-sm text-center">
                        @if ($data->attachment)
                            <a href="{{ url('storage/' . $data->attachment) }}" target="_blank"
                                class="btn btn-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Lihat Lampiran"><i class="bi bi-file-earmark-text"></i></a>
                        @else
                            <span class="badge badge-sm bg-gradient-danger">Tidak ada</span>
                        @endif
                    </td>
                    <td class="text-sm text-center">
                        @if ($data->match == 1)
                            <span class="badge badge-sm bg-danger">Tidak Sesuai</span>
                        @elseif($data->match == 2)
                            <span class="badge badge-sm bg-warning">Kurang Sesuai</span>
                        @elseif($data->match == 3)
                            <span class="badge badge-sm bg-info">Sesuai</span>
                        @elseif ($data->match == 4)
                            <span class="badge badge-sm bg-success">Sangat Sesuai</span>
                        @endif
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
    <div style="float:right">
        <a href="{{ route('students.index', encrypt($data->id)) }}" class="btn bg-gradient-info text-xs" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Siswa">
            <i class="bi bi-arrow-left"></i></a>
    </div>
@endsection

@push('scripts')
<script type="module">
    $(document).ready(function() {
        $('#approve').on('click', function() {
            window
            .swal({
                title: "Apakah anda yakin?",
                text: "Anda akan menyetujui tindakan ini",
                icon: "warning",
                buttons: {
                cancel: {
                    text: "Batal",
                    value: null,
                    visible: true,
                    className: "btn btn-primary",
                    closeModal: true,
                },
                confirm: {
                    text: "Setuju",
                    value: true,
                    visible: true,
                    className: "btn btn-success",
                    closeModal: true,
                },
                },
            })
            .then((value) => {
                if (value) {
                    $('#formApprove').trigger('submit');
                }
            });
        });
    });
</script>
@endpush
