@extends('layouts.app')

<div>
    {{-- Sidebar Ditaro disini --}}
    <x-sidebar />
    {{-- Content Ditaro disini --}}


    {{-- dashboard content --}}
    @yield('dashboard-content')
    {{-- Dashboard content --}}
</div>
