<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">

    @vite(['resources/js/app.js'])

    {{-- Internal Javascript --}}
    @stack('scripts')

    <title>Laravel</title>
</head>

<body class="antialiased">
    <div class="content">
        @yield('content')
    </div>
</body>

</html>
