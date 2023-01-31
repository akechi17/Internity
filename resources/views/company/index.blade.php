@extends('layouts.dashboard')

@section('dashboard-content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            Perusahaan
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">
                        Perusahaan
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
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill me-sm-1"></i>
                                <span class="d-sm-inline d-none">User</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
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
    <!-- End Navbar -->

    <!-- Start Content -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>DATA PERUSAHAAN/INSTANSI</h6>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#TambahDataModal" >
                            TAMBAH DATA
                        </button>

                        <!-- Modal Tambah Data-->
                        <div class="modal fade" id="TambahDataModal" tabindex="-1" role="dialog" aria-labelledby="DataModal" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-centered" role="document" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="DataModal">
                                            Data Perusahaan/Instansi
                                        </h5>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" >
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="input-data" class="form-label"
                                                        >Logo Perusahaan</label
                                                    >
                                                    <input
                                                        type="file"
                                                        class="form-control"
                                                        id="input-data"
                                                    />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="input-data">Nama Perusahaan</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="input-data"
                                                        required
                                                    />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-data">Website</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="input-data"
                                                    required
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-data">Alamat</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="input-data"
                                                    />
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="input-data">Nama Narahubung</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="input-data"
                                                    required
                                                    />
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="input-data">Kontak Narahubung</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="input-data"
                                                    required
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-data">Deskripsi</label>
                                                    <input
                                                    id="input-data"
                                                    type="hidden"
                                                    name="content"
                                                    required
                                                    />
                                                    <trix-editor
                                                    class="trix-content"
                                                    input="input-data"
                                                    ></trix-editor>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" >
                                            Close
                                        </button>
                                        <button type="button" class="btn bg-gradient-info" id="save-data" onclick="simpan()" >
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label style="font-weight: normal">
                            <select id="limit" style=" border-radius: 7px; font-size: smaller; text-align: center; outline-color: #17c1e8; " >
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </select>
                            entries per page
                            </label>
                        </div> 
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="table-data" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-20"
                                    >
                                        Nama
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10"
                                    >
                                        Website
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-15"
                                    >
                                        Alamat
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-10"
                                    >
                                        Contact Person
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-25"
                                    >
                                        Deskripsi
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-5"
                                    >
                                        Kelola
                                    </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                        <div>
                                            <img
                                            src="../assets/img/team-2.jpg"
                                            class="avatar avatar-sm me-3"
                                            alt="user1"
                                            />
                                        </div>
                                        <div
                                            class="d-flex flex-column justify-content-center"
                                        >
                                            <h6 class="mb-0 text-sm">PT Honda Imora</h6>
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                        https://www.hondaimora.com/
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                        Jakarta Pusat
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <!-- <span class="badge badge-sm bg-gradient-success"
                                                            >Online</span
                                                        > -->
                                        <p class="text-xs font-weight-bold mb-0">Nina</p>
                                        <p class="text-xs text-secondary mb-0">
                                        +62 849384937
                                        </p>
                                    </td>
                                    <td class="text-xs font-weight-bold mb-0">
                                        <span class="text-secondary text-xs font-weight-bold">
                                        Lorem ipsum dolor sit amet. PT Imora Honda ada di
                                        Jakarta
                                        </span>
                                    </td>
                                    <td
                                        class="align-middle text-center"
                                        style="white-space: nowrap"
                                    >
                                        <!-- Button trigger modal Edit Data -->
                                        <button
                                        type="button"
                                        class="btn btn-link text-dark p-0"
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditDataModal"
                                        >
                                        <i class="bi bi-pencil-square"></i>
                                        <!-- EDIT -->
                                        </button>

                                        <button
                                        type="button"
                                        class="btn btn-link text-danger text-gradient p-0"
                                        onclick="hapus()"
                                        >
                                        <i class="bi bi-trash ms-3"></i>
                                        <!-- DELETE -->
                                        </button>
                                    </td>

                                    <!-- Modal -->
                                    <div
                                        class="modal fade"
                                        id="EditDataModal"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="EditData"
                                        aria-hidden="true"
                                    >
                                        <div
                                        class="modal-dialog modal-dialog-centered"
                                        role="document"
                                        >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="EditData">
                                                Data Perusahaan/Instansi
                                            </h5>
                                            <button
                                                type="button"
                                                class="btn-close text-dark"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            >
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label
                                                        for="input-data"
                                                        class="form-label"
                                                        >Logo Perusahaan</label
                                                    >
                                                    <input
                                                        type="file"
                                                        class="form-control"
                                                        id="input-data"
                                                    />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="input-data"
                                                        >Nama Perusahaan</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="input-data"
                                                        required
                                                    />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-data">Website</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="input-data"
                                                    required
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-data">Alamat</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="input-data"
                                                    />
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="input-data"
                                                    >Nama Narahubung</label
                                                    >
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="input-data"
                                                    required
                                                    />
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="input-data"
                                                    >Kontak Narahubung</label
                                                    >
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="input-data"
                                                    required
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-data">Deskripsi</label>
                                                    <input
                                                    id="input-data"
                                                    type="hidden"
                                                    name="content"
                                                    required
                                                    />
                                                    <trix-editor
                                                    class="trix-content"
                                                    input="input-data"
                                                    ></trix-editor>
                                                </div>
                                                </div>
                                            </form>
                                            </div>
                                            <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn bg-gradient-secondary"
                                                data-bs-dismiss="modal"
                                            >
                                                Close
                                            </button>
                                            <button
                                                type="button"
                                                class="btn bg-gradient-info"
                                                id="save-data"
                                                onclick="simpan()"
                                            >
                                                Save
                                            </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <ul class="pagination pagination-info justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#link" aria-label="Previous">
                                    <span aria-hidden="true"
                                        ><i class="ni ni-bold-left" aria-hidden="true"></i
                                    ></span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#link">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#link">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#link">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#link">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#link">5</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#link" aria-label="Next">
                                    <span aria-hidden="true"
                                        ><i class="ni ni-bold-right" aria-hidden="true"></i
                                    ></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer fixed-bottom d-flex justify-content-end mb-2">
            <div class="container-fluid">
            <div class="copyright text-sm text-muted text-lg-center">
                ©
                <script>
                document.write(new Date().getFullYear());
                </script>
                , made with <i class="fa fa-heart"></i> by
                <a
                href="https://www.creative-tim.com"
                class="font-weight-bold"
                target="_blank"
                >Internity Tim</a
                >
                for a better web.
            </div>
            </div>
        </footer>
    </div>
    <!-- End Content -->
    </main>
@endsection