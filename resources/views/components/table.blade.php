<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="text-uppercase">{{ $pageName }}</h6>

                {{-- Table Function --}}
                <div class="header-function d-flex align-items-center justify-content-between">
                    <!-- Add data Start -->
                    <a href="{{ $route }}" class="btn bg-gradient-info mb-0">
                        TAMBAH DATA
                    </a>
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
