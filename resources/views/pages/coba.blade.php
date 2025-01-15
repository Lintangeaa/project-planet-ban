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
  <div>
    <h5>Input Adjustment Stock Fisik</h5>
      <br>
      <form method="POST" action="/stockfisik/input"> 
        @csrf
        <div class="mb-3">
          <div>
            
          </div>
          <label class="form-label" >Nama Ban</label>
          <select class="" data-placeholder="Pilih Ban">
            <option></option>
            @foreach ($ban as $item )
            <option>{{$item->namaBanSistem}}</option>
              
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label  class="form-label">Jumlah Ban</label>
          <input type="text" class="form-control" name="namaBanUmum">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
@endsection