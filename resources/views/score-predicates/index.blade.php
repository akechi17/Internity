{{-- @php
    dd($companies);
@endphp --}}

@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table routeCreate="{{ route('score-predicates.create', ['school' => Crypt::encrypt(1)]) }}"
        pageName="Master Predikat Nilai" :pagination="$scorePredicates" :tableData="$scorePredicates">

        <x-slot:thead>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-30">
                Kelola
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Nama
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
                Deskripsi
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Warna
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Min
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Max
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($scorePredicates as $data)
                <tr>
                    <td>
                        <a href="{{ route('score-predicates.edit', encrypt($data->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('score-predicates.destroy', encrypt($data->id)) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="button-{{ $data->id }}" class="button-delete btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" type="button"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td class="text-sm">{{ $data->name }}</td>
                    <td class="text-sm">{{ $data->description }}</td>
                    <td class="text-sm">{{ $data->color }}</td>
                    <td class="text-sm">{{ $data->min }}</td>
                    <td class="text-sm">{{ $data->max }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection

@once
    @push('scripts')
        <script type="module">
            // Delete Data Function
            $('.button-delete').on('click', function(){
                const buttonId = $(this).attr('id');

                utils.useDeleteButton({buttonId: buttonId});
            });
        </script>
    @endpush
@endonce
