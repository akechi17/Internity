@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table route="{{ route('users.create') }}" pageName="user" :pagination="$users">

        <x-slot:thead>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20">
                Kelola
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Nama
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15">
                Email
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10">
                Last Login
            </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25">
                Last Login IP
            </th>
        </x-slot:thead>

        <x-slot:tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('users.edit', encrypt($user->id)) }}" class="btn btn-info text-xs"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i
                                class="bi bi-pencil-square"></i></a>

                        <form action="{{ route('users.destroy', encrypt($user->id)) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="button-{{ $user->id }}" class="button-delete btn btn-info text-xs"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" type="button"><i
                                    class="bi bi-trash"></i></button>
                        </form>
                    </td>
                    <td class="text-sm">{{ $user->name }}</td>
                    <td class="text-sm">{{ $user->email }}</td>
                    <td class="text-sm">{{ $user->last_login }}</td>
                    <td class="text-sm">{{ $user->last_login_ip }}</td>
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
