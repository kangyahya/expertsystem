@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Penyakit')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master / Data Penyakit /</span> Tambah Data Penyakit
  </h4>

  <!-- Basic Bootstrap Table -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Form Data Penyakit</h5>
        </div>
        <div class="card-body">
          <form method="post" action="{{route('data-penyakit.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="disease_code">Kode Penyakit</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="disease_code" placeholder="P1" name="disease_code"/>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Penyakit</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-name" placeholder="Mimisan" name="disease_name"/>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-company">Penyebab</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-company" placeholder="Kurang Tidur" name="reason" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="picture">Gambar</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="picture" placeholder="Kurang Tidur" name="picture"/>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="information">Keterangan</label>
              <div class="col-sm-10">
                <textarea id="information" class="form-control" name="information" placeholder="Hi, Do you have description?" ></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="solution">Solusi</label>
              <div class="col-sm-10">
                <textarea id="solution" class="form-control" placeholder="Hi, Do you have a solustion to disease?" name="solution"></textarea>
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
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
