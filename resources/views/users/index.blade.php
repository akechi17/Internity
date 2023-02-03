@extends('layouts.dashboard')

@section('dashboard-content')
    <x-table pageName="user" :pagination="$users">

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
                        <a href="{{ route('users.edit', encrypt($user->id)) }}" class="btn btn-primary text-xs">Edit</a>
                        <form action="{{ route('users.destroy', encrypt($user->id)) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button-submit btn btn-primary text-xs" type="button">Delete</button>
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
            $('.button-submit').on('click', function(){
                window.swal({
                    title: 'Apakah anda yakin?',
                    text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    buttons: {
                        cancel: {
                            text: "Batal",
                            value: null,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true,
                        },
                        confirm: {
                            text: "Hapus",
                            value: true,
                            visible: true,
                            className: "btn btn-danger",
                            closeModal: true
                        }
                    }
                }).then((value) => {
                    if (value) {
                        $(this).closest('form').submit();
                    }
                });
            })
        </script>
    @endpush
@endonce
