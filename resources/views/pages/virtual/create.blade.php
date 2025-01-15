@extends('layout.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Create Adjustment Stock Virtual</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Create Adjustment Stock Virtual</li>
      </ol>
    </div>
  </div>
@endsection

@section('content')
  <div>
    <h5>Form untuk Menambahkan Data Stock Virtual</h5>
      <br>
      <form action="{{ route('stockvirtual.store') }}" method="POST">
        @csrf
        <div class="row mb-2">
          <!-- Stok Fisik -->
          <div class="col-sm-6">
            <label for="idStokFisik" class="form-label">Stok Fisik</label>
            <select name="idStokFisik" class="form-control" required>
              <option value="">-- Pilih Stok Fisik --</option>
              @foreach ($stokFisik as $stok)
                <option value="{{ $stok->idStokFisik }}">{{ $stok->masterBan->namaBanSistem }} ({{ $stok->jumlahBan }})</option>
              @endforeach
            </select>
            @error('idStokFisik')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- Marketplace -->
          <div class="col-sm-6">
            <label for="idMarketplace" class="form-label">Marketplace</label>
            <select name="idMarketplace" class="form-control" required>
              <option value="">-- Pilih Marketplace --</option>
              @foreach ($marketplace as $market)
                <option value="{{ $market->idMarketplace }}">{{ $market->namaMarketplace }}</option>
              @endforeach
            </select>
            @error('idMarketplace')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-2">
          <!-- Time Stock -->
          <div class="col-sm-6">
            <label for="timeStok" class="form-label">Time Stock</label>
            <input type="datetime-local" name="timeStok" class="form-control" required>
            @error('timeStok')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <!-- Jumlah Ban -->
          <div class="col-sm-6">
            <label for="jumlahBan" class="form-label">Jumlah Ban</label>
            <input type="number" name="jumlahBan" class="form-control" required min="1">
            @error('jumlahBan')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ url('/stockvirtual') }}" class="btn btn-secondary">Cancel</a>
          </div>
        </div>
      </form>
  </div>
@endsection
