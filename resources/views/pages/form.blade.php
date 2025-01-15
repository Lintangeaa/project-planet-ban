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
  <div>
    <h5>Input Adjustment Stock Fisik</h5>
      <br>
      <form method="POST" action="{{url('insert-data')}}"> 
        @csrf
        <div class="mb-3" action="">
          <label class="form-label" >Nama Ban</label>
          <select class="form-control" name="idBan">
            <option value="">-- Pilih Ban --</option>
            @foreach ($ban as $item)
            <option value="{{$item->idBan}}">{{$item->namaBanSistem}}</option>
              
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label  class="form-label">Jumlah Ban</label>
          <input type="number" class="form-control" name="jumlahBan">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
@endsection

