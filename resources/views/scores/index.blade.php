{{-- @php
    dd($journals);
@endphp --}}
@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table routeCreate="{{ route('scores.create', ['user'=>request()->query('user'), 'company'=>request()->query('company')]) }}" permissionCreate="score-create" pageName="Penilaian Magang {{ $userName }}" :pagination="$scores" :tableData="$scores">

        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5">
                Subyek
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Nilai
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Predikat
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($scores as $data)
                <tr>
                    <td class="text-center">
                        @can('score-edit')
                            <a href="{{ route('scores.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                    class="bi bi-pencil-square"></i></a>
                        @endcan
                        @can('score-delete')
                            <form action="{{ route('scores.destroy', encrypt($data->id)) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="button-{{ $data->id }}" class="button-delete btn btn-danger text-xs"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" type="button"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        @endcan
                    </td>
                    <td class="text-sm text-center">{{ $data->name }}</td>
                    <td class="text-sm text-center">{{ $data->score }}</td>
                    <td class="text-sm text-center">
                        <span class="badge badge-sm" style="background-color: {{ $data->score_predicate->color }}">
                            {{ $data->score_predicate->name }}
                        </span>
                    </td>
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
