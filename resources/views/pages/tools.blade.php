@extends('layout.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Mapping Tools</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Mapping Tools</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <!-- Tabel Ban -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0 mr-4">Ban</h3>

                        <form action="{{ route('mapping-tools.index') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group">
                                <input type="search" name="searchBan" value="{{ request('searchBan') }}"
                                    class="form-control form-control-sm" placeholder="Cari Berdasarkan Motor">
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
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Ban Sistem</th>
                                    <th class="text-center">Nama Ban Umum</th>
                                    <th class="text-center">Ukuran Ban</th>
                                    <th class="text-center">Ring Ban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bans as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->namaBanSistem }}</td>
                                        <td>{{ $item->namaBanUmum }}</td>
                                        <td>{{ $item->ukuranBan }}</td>
                                        <td class="text-center">{{ $item->ringBan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination Tabel Ban -->
                        {{ $bans->appends(['searchBan' => request('searchBan')])->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Motor -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0 mr-4">Mapping Motor</h3>

                        <!-- Form Pencarian Tabel Motor -->
                        <form action="{{ route('mapping-tools.index') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group">
                                <input type="search" name="searchMotor" value="{{ request('searchMotor') }} "
                                    class="form-control form-control-sm" placeholder="Cari Berdasarkan Ban">
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
                                    <th rowspan="2" class="text-center align-middle">#</th>
                                    <th rowspan="2" class="text-center align-middle">Nama</th>
                                    <th rowspan="2" class="text-center align-middle">Ring Motor</th>
                                    <th colspan="2" class="text-center align-middle">Ban</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle">Depan</th>
                                    <th class="text-center align-middle">Belakang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($motors as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->namaMotor }}</td>
                                        <td class="text-center">{{ $item->ringMotorStd }}</td>
                                        <td>{{ $item->banDepan }}</td>
                                        <td>{{ $item->banBelakang }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination Tabel Motor -->
                        {{ $motors->appends(['searchMotor' => request('searchMotor')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
