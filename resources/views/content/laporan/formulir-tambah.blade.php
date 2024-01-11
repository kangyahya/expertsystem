@extends('layouts/contentNavbarLayout')

@section('title', 'Formulir')

@section('content')
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Formulir</h5>
    <div class="card-body">
      <form method="post" action="{{route('formulir.store')}}">
        @csrf
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="staff">Staff</label>
          <div class="col-sm-10">
              <select name="user_id" class="form-select" id="staff">
                @foreach($staff as $staf)
                  <option value="{{$staf->id}}">{{$staf->name}}</option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="jabatan">Jabatan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Staff" name="jabatan" />
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="jk">Jenis Kelamin</label>
          <div class="col-sm-10">
            <select name="jenis_kelamin" id="jk" class="form-select">
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
          <div class="col-sm-10">
            <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Cakung Barat" ></textarea>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
