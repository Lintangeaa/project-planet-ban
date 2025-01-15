@extends('layout.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Adjustment Stock Fisik</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Adjustment Stock Fisik</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0 mr-4">Adjustment Stock Fisik</h3>

                    <a href="{{ url('form') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                    </a>

                    <!-- Form Pencarian Tabel Stock Fisik -->
                    <form action="{{ url('/stockfisik') }}" method="GET" class="form-inline ml-auto">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ request('search') }}"
                                class="form-control form-control-sm" placeholder="Cari Ban">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default btn-sm">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-2">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">#</th>
                                <th class="text-center align-middle">Nama Ban</th>
                                <th class="text-center align-middle">Time Stock</th>
                                <th class="text-center align-middle">Jumlah Ban</th>
                                <th class="text-center align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fisik as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->masterBan->namaBanSistem }}</td>
                                    <td class="text-center">{{ $item->timeStock }}</td>
                                    <td class="text-center">{{ $item->jumlahBan }}</td>
                                    <td class="text-center">
                                        <!-- Button to trigger modal -->
                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#confirmDeleteModal{{ $item->idStokFisik }}">
                                            Delete
                                        </button>

                                        <!-- Modal for confirmation -->
                                        <div class="modal fade" id="confirmDeleteModal{{ $item->idStokFisik }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="confirmDeleteModalLabel{{ $item->idStokFisik }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="confirmDeleteModalLabel{{ $item->idStokFisik }}">
                                                            Konfirmasi Penghapusan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <!-- Form to delete the record -->
                                                        <form
                                                            action="{{ url('/stockfisik-delete/' . $item->idStokFisik) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    <div class="d-flex justify-content-center">
                        {{ $fisik->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
