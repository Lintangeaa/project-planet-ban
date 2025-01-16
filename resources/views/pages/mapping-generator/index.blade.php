@extends('layout.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Mapping Generator</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Mapping Generator</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <!-- Tombol Generate Mapping -->
        <button class="mt-2 mb-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#generateMappingModal">
            Generate Mapping
        </button>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0 mr-4">Ban</h3>

                        <!-- Tombol Tambah Ban dengan ikon plus -->
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addBanModal">
                            <i class="fas fa-plus"></i>
                        </button>

                        <!-- Form Pencarian di sebelah kanan -->
                        <form action="{{ route('mapping-generator.index') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group">
                                <input type="search" name="searchBan" value="{{ request('searchBan') }}"
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
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Ban Sistem</th>
                                    <th class="text-center">Nama Ban Umum</th>
                                    <th class="text-center">Ukuran Ban</th>
                                    <th class="text-center">Ring Ban</th>
                                    <th class="text-center">Aksi</th>
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
                                        <td class="text-center">
                                            <!-- Button to trigger the delete modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#confirmDeleteBanModal{{ $item->idBan }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal for confirming ban deletion -->
                                    <div class="modal fade" id="confirmDeleteBanModal{{ $item->idBan }}" tabindex="-1"
                                        role="dialog" aria-labelledby="confirmDeleteBanModalLabel{{ $item->idBan }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="confirmDeleteBanModalLabel{{ $item->idBan }}">Konfirmasi
                                                        Penghapusan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus ban ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <!-- Form to delete the ban -->
                                                    <form action="{{ route('bans.destroy', ['id' => $item->idBan]) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination Tabel Ban -->
                        {{ $bans->appends(['searchBan' => request('searchBan'), 'motor_page' => request('motor_page')])->links() }}
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

                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addMotorModal">
                            <i class="fas fa-plus"></i>
                        </button>

                        <!-- Form Pencarian Tabel Motor -->
                        <form action="{{ route('mapping-generator.index') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group">
                                <input type="search" name="searchMotor" value="{{ request('searchMotor') }}"
                                    class="form-control form-control-sm" placeholder="Cari Motor">
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
                                    <th rowspan="2" class="text-center align-middle">Aksi</th>
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
                                        <td class="text-center">
                                            <!-- Button to trigger the delete modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#confirmDeleteMotorModal{{ $item->idMotor }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal for confirming motor deletion -->
                                    <div class="modal fade" id="confirmDeleteMotorModal{{ $item->idMotor }}"
                                        tabindex="-1" role="dialog"
                                        aria-labelledby="confirmDeleteMotorModalLabel{{ $item->idMotor }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="confirmDeleteMotorModalLabel{{ $item->idMotor }}">Konfirmasi
                                                        Penghapusan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus ban ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <!-- Form to delete the motor -->
                                                    <form action="{{ route('motors.destroy', ['id' => $item->idMotor]) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination Tabel Motor -->
                        {{ $motors->appends(['searchMotor' => request('searchMotor'), 'ban_page' => request('ban_page')])->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Ban -->
        <div class="modal fade" id="addBanModal" tabindex="-1" role="dialog" aria-labelledby="addBanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBanModalLabel">Tambah Ban Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('bans.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="namaBanSistem">Nama Ban Sistem</label>
                                <input type="text" name="namaBanSistem" class="form-control" id="namaBanSistem"
                                    placeholder="Masukkan nama ban" required>
                                <label class="mt-2" for="namaBanUmum">Nama Ban Umum</label>
                                <input type="text" name="namaBanUmum" class="form-control" id="namaBanUmum"
                                    placeholder="Masukkan nama umum" required>
                                <label class="mt-2" for="ukuranBan">Ukuran Ban</label>
                                <input type="text" name="ukuranBan" class="form-control" id="ukuranBan"
                                    placeholder="Masukkan ukuran ban" required>
                                <label class="mt-2" for="ringBan">Ring Ban</label>
                                <input type="text" name="ringBan" class="form-control" id="ringBan"
                                    placeholder="Masukkan ring ban" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tambah Motor -->
        <div class="modal fade" id="addMotorModal" tabindex="-1" role="dialog" aria-labelledby="addMotorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMotorModalLabel">Tambah Motor Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('motors.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="namaMotor">Nama Motor</label>
                                <input type="text" name="namaMotor" class="form-control" id="namaMotor"
                                    placeholder="Masukkan nama motor" required>
                                <label class="mt-2" for="ringMotorStd">Ring Motor</label>
                                <input type="number" name="ringMotorStd" class="form-control" id="ringMotorStd"
                                    placeholder="Masukkan ring motor" required>
                                <label class="mt-2" for="banDepan">Ban Depan</label>
                                <input type="text" name="banDepan" class="form-control" id="banDepan"
                                    placeholder="Masukkan ban depan" required>
                                <label class="mt-2" for="banBelakang">Ban Belakang</label>
                                <input type="text" name="banBelakang" class="form-control" id="banBelakang"
                                    placeholder="Masukkan ban belakang" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Generate Mapping -->
        <div class="modal fade" id="generateMappingModal" tabindex="-1" role="dialog"
            aria-labelledby="generateMappingModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="generateMappingModalLabel">Generate Mapping Motor dan Ban</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('mapping-generator.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <!-- Pilih Motor -->
                            <div class="form-group">
                                <label for="motor_id">Pilih Motor</label>
                                <select name="idMotor" class="form-control" id="motor_id" required>
                                    <option value="">Pilih Motor</option>
                                    @foreach ($motors as $motor)
                                        <option value="{{ $motor->idMotor }}">{{ $motor->namaMotor }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Pilih Ban -->
                            <div class="form-group">
                                <label for="ban_id">Pilih Ban</label>
                                <select name="idBan" class="form-control" id="ban_id" required>
                                    <option value="">Pilih Ban</option>
                                    @foreach ($bans as $ban)
                                        <option value="{{ $ban->idBan }}">{{ $ban->namaBanSistem }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
