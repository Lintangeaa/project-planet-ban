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
      <h5>Pilih MOTOR - cocoknya ban apa saja</h5>
      <br>
      <div class="row mb-2">
        <div class="col-sm-2">
          Motor Customer
        </div>
        <div>
          <form action="/mappingtools/search" class="form-inline" method="GET">
            <input type="search" name="search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
      <div>
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Nama Ban Sistem</th>
                        <th>Nama Ban Umum</th>
                        <th>Ukuran Ban</th>
                        <th>Ring Ban</th>
                        <th>URL Shopee</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($ban as $item )
                        <div>
                        <tr>
                          <td>{{$item -> namaBanSistem}}</td>
                          <td>{{$item -> namaBanUmum}}</td>
                          <td>{{$item -> ukuranBan}}</td>
                          <td>{{$item -> ringBan}}</td>
                          <td>{{$item -> urlBan}}</td>
                        </tr>
                      </div>
                      @endforeach
                        </div>
                    </tbody>
                  </table>
                  {{$ban->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      
      <h5>Pilih BAN - cocoknya motor apa saja</h5>
      <br>
      <div class="row mb-2">
        <div class="col-sm-2">
          Pilihan Ban
        </div>
        <div>
          <form action="/mappingtools/search" class="form-inline" method="GET">
            <input type="search" name="search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Motor</th>
                    <th>Ukuran Ring Motor</th>
                    <th>Ukuran Ban Depan</th>
                    <th>Ukuran Ban Belakang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($motor as $item )
                    <div>
                    <tr>
                      <td>{{$item -> namaMotor}}</td>
                      <td>{{$item -> ringMotorStd}}</td>
                      <td>{{$item -> banDepan}}</td>
                      <td>{{$item -> banBelakang}}</td>
                    </tr>
                  </div>
                  @endforeach
                    </div>
                </tbody>
              </table>
              {{$motor->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>


    
    
@endsection