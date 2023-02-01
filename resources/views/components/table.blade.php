<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="text-uppercase">{{ $pageName }}</h6>

                {{-- Table Function --}}
                <div class="header-function d-flex align-items-center justify-content-between">
                    <!-- Add data Start -->
                    <button type="button" class="btn bg-gradient-info mb-0" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        TAMBAH DATA
                    </button>

                    <x-modal modalId="modalAdd" modalLable="modalAddLabel" modalTitle="Tambah Data">
                        <x-slot:modal-body>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-data" class="form-label">Logo
                                                Perusahaan</label>
                                            <input type="file" class="form-control" id="input-data" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input-data">Nama
                                                Perusahaan</label>
                                            <input type="text" class="form-control" id="input-data" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-data">Website</label>
                                        <input type="text" class="form-control" id="input-data" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="input-data">Alamat</label>
                                        <input type="text" class="form-control" id="input-data" />
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="input-data">Nama
                                            Narahubung</label>
                                        <input type="text" class="form-control" id="input-data" required />
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="input-data">Kontak
                                            Narahubung</label>
                                        <input type="text" class="form-control" id="input-data" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="input-data">Deskripsi</label>
                                        <input id="input-data" type="hidden" name="content" required />
                                        <trix-editor class="trix-content" input="input-data"></trix-editor>
                                    </div>
                                </div>
                            </form>
                        </x-slot:modal-body>

                        <x-slot:modal-footer>
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn bg-gradient-info" id="save-data" onclick="simpan()">
                                Save
                            </button>
                        </x-slot:modal-footer>
                    </x-modal>
                    <!-- Add data End -->

                    <div class="card-header p-0">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text text-body">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Type here..." />
                            </div>
                        </div>
                    </div>
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
                            {{ $tbody }}
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                {{ $pagination ? $pagination->links() : '' }}
            </div>
        </div>
    </div>
</div>
