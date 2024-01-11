@extends('layouts/contentNavbarLayout')

@section('title', 'Hasil Diagnosa')

@section('content')
  <!-- Basic Bootstrap Table -->
  <a class="btn btn-primary mb-4" href="{{route('formulir.create')}}">
    Tambah Formulir
  </a>
  <a class="btn btn-outline-info mb-4" href="{{route('formulir.export')}}"><i class="mdi mdi-printer-outline me-1"></i> Cetak</a>
  <div class="card">
    <h5 class="card-header">Data Formulir</h5>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-responsive-sm table-bordered" id="mytable">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Staff</th>
            <th>Jabatan</th>
            <th>Tanggal</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @forelse($Staff as $key => $staff)
            <tr>
              <td>{{++$key}}</td>
              <td>{{$staff->name}}</td>
              <td>{{$staff->jabatan}}</td>
              <td>{{$staff->tanggal}}</td>
              <td>{{$staff->jenis_kelamin}}</td>
              <td>{{$staff->alamat}}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5">
                <strong>Tidak Ada Data Laporan</strong>
              </td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
