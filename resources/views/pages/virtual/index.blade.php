@extends('layout.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Adjustment Stock Virtual</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Adjustment Stock Virtual</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div>
        <h5>Update Stok Harian atau Setiap Kali Diperlukan</h5>
        <br>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0 mr-4">Adjustment Stock Virtual</h3>
                        <!-- Tombol Tambah Data -->
                        <a href="{{ route('stockvirtual.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i>
                        </a>

                        <!-- Form Pencarian -->
                        <form action="{{ route('stockvirtual.index') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group">
                                <input type="search" name="search" value="{{ request('search') }}"
                                    class="form-control form-control-sm" placeholder="Cari Stock Virtual">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default btn-sm">
                                        <i class="fas fa-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">#</th>
                                    <th class="text-center align-middle">Nama Ban</th>
                                    <th class="text-center align-middle">Nama Marketplace</th>
                                    <th class="text-center align-middle">Time Stock</th>
                                    <th class="text-center align-middle">Jumlah Ban</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Tampilkan Data -->
                                @forelse ($virtual as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->stokBan->masterBan->namaBanSistem }}</td>
                                        <td>{{ $item->marketplace->namaMarketplace }}</td>
                                        <td class="text-center">{{ $item->timeStok }}</td>
                                        <td class="text-center">{{ $item->jumlahBan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br>
                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">
                            {{ $virtual->appends(['search' => request('search')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
