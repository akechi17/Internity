@extends('layouts.app')

<div>
    {{-- Sidebar Ditaro disini --}}
    <x-sidebar />
    {{-- Content Ditaro disini --}}


    {{-- dashboard content --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid py-4">
            @yield('dashboard-content')
        </div>
    </main>
    {{-- Dashboard content --}}
</div>
