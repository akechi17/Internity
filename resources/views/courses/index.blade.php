@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table routeCreate="{{ route('courses.create', ['department'=> encrypt($departmentId)]) }}" pageName="Kelas" :pagination="$courses" :tableData="$courses">
        <x-slot:thead>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-35">
                Kelola
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Nama
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-50">
                Deskripsi
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($courses as $data)
                <tr>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('courses.edit', encrypt($data->id)) }}" class="btn btn-info text-xs me-1"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>

                        <form action="{{ route('courses.destroy', encrypt($data->id)) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button id="button-{{ $data->id }}" class="button-delete btn btn-info text-xs ms-1"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" type="button"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td class="text-sm text-center">{{ $data->name }}</td>
                    <td class="text-sm">{{ $data->description }}</td>
                </tr>
            @endforeach
        </x-slot:tbody>
    </x-table>
@endsection
