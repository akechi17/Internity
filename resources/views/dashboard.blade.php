@extends('layouts.dashboard')

@section('dashboard-content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <!-- Content Start -->
        <div class="container-fluidd-flex flex-column justify-content-between py-4" style="height: 100vh">
            <div>
                <!-- Navbar Start -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
                    navbar-scroll="true">
                    <div class="container-fluid py-1 px-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                <li class="breadcrumb-item text-sm">
                                    <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                                </li>
                                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                            <h6 class="font-weight-bolder mb-0">
                                Dashboard
                            </h6>
                        </nav>
                        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group">
                                    <span class="input-group-text text-body">
                                        <i class="bi bi-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Type here..." />
                                </div>
                            </div>
                            <ul class="navbar-nav justify-content-end">
                                <li class="justify-content-end dropdown pe-2 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-fill me-sm-1"></i>
                                        <span class="d-sm-inline d-none">User</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="profile.html">
                                                <div class="d-flex py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            Settings
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="#">
                                                {{-- <a class="dropdown-item border-radius-md" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> --}}
                                                <div class="d-flex py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            Log Out
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                            {{-- <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                                @csrf
                                            </form> --}}
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                        <div class="sidenav-toggler-inner">
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Navbar End -->

                {{-- Dashboard Data Start --}}
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                Siswa
                                            </p>
                                            <h5 class="font-weight-bolder mb-0">
                                                300
                                                <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                DU/DI
                                            </p>
                                            <h5 class="font-weight-bolder mb-0">
                                                70
                                                <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                Magang
                                            </p>
                                            <h5 class="font-weight-bolder mb-0">
                                                700
                                                <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                Jurnal Magang
                                            </p>
                                            <h5 class="font-weight-bolder mb-0">
                                                300
                                                <!-- <span class="text-success text-sm font-weight-bolder">+5%</span> -->
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Dashboard Data End --}}
            </div>
        </div>
        <!-- Content End -->
    </main>
@endsection
