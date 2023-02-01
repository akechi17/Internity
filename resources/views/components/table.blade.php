<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6 class="text-uppercase">{{ $pageName }}</h6>
                <!-- Button trigger modal -->
                <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal"
                    data-bs-target="{{ $targetTambah }}">
                    TAMBAH DATA
                </button>


                <!-- Modal Tambah Data-->
                {{-- <div class="modal fade" id="{{ $idTambah }}" tabindex="-1" role="dialog"
                    aria-labelledby="{{ $labelTambah }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="{{ $labelTambah }}">
                                    {{ $pageName }}
                                </h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ $modalBody }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn bg-gradient-info" id="save-data" onclick="simpan()">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div>
                    <label style="font-weight: normal">
                        <select id="limit"
                            style=" border-radius: 7px; font-size: smaller; text-align: center; outline-color: #17c1e8; ">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        entries per page
                    </label>
                </div>
            </div>

            {{-- Table --}}
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="table-data" class="table align-items-center mb-0">
                        <thead>
                            {{ $thead }}
                        </thead>
                        <tbody>
                            <tr>
                                {{ $tbody }}

                                <td class="align-middle text-center" style="white-space: nowrap">
                                    <!-- Button trigger modal Edit Data -->
                                    <button type="button" class="btn btn-link text-dark p-0" data-bs-toggle="modal"
                                        data-bs-target="{{ $targetEdit }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <button type="button" class="btn btn-link text-danger text-gradient p-0"
                                        onclick="hapus()">
                                        <i class="bi bi-trash ms-3"></i>
                                    </button>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="{{ $idEdit }}" tabindex="-1" role="dialog"
                                    aria-labelledby="{{ $labelEdit }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="{{ $labelEdit }}">
                                                    {{ $pageName }}
                                                </h5>
                                                <button type="button" class="btn-close text-dark"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            {{-- <div class="modal-body">
                                                {{ $modalBody }}
                                            </div> --}}

                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn bg-gradient-info" id="save-data"
                                                    onclick="simpan()">
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

                {{-- Pagination --}}
                {{ $pagination ? $pagination->links() : '' }}
            </div>
        </div>
    </div>
</div>
