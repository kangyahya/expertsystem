@php use App\Models\Gejala; @endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Penyakit')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Sampah /</span> Data Aturan
  </h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Aturan</h5>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered table-sm" id="mytable">
          <thead>
          <tr>
            <th style="width: 10px">No</th>
            <th>IF</th>
            <th>THEN</th>
            <th>Keterangan</th>
            <th>Presentase</th>
            <th style="width: 10px">Actions</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @forelse($aturan as $key => $atur)
            <tr>
              <td>{{++$key}}</td>
              <td>
                @php
                  $symptomIds = explode(',', $atur->symptom_id);
                @endphp

                @foreach($symptomIds as $symptomId)
                  @php
                    $gejala = Gejala::where('id', $symptomId)->first();
                  @endphp

                  <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="{{ $gejala->symptom_name }}">
                    {{ $gejala->symptom_code }}
                  </button>
                @endforeach
              </td>
              <td><span class="badge bg-info">{{$atur->disease_code}}</span></td>
              <td>{{$atur->disease_name}}</td>
              <td>{{$atur->confidence}}</td>
              <td>
                <a class="btn btn-info" href="#detailAturan{{$atur->id}}" data-bs-toggle="modal"><i class="mdi mdi-eye-circle"></i></a>
                <a class="btn btn-info" href="#restoreAturan{{$atur->id}}" data-bs-toggle="modal"><i class="mdi mdi-restore"></i></a>
                <a class="btn btn-danger" href="#hapusAturan{{$atur->id}}" data-bs-toggle="modal"><i class="mdi mdi-trash-can-outline"></i></a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center"><strong>Tidak Ada Data Aturan</strong></td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <!--/ Basic Bootstrap Table -->
  @foreach($aturan as $atur)
    <div class="modal fade" id="restoreAturan{{$atur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('trash.data-aturan.restore', $atur->id)}}">
        @method('PATCH')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Restore Aturan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating form-floating-outline mb-4">
                Yakin Anda Ingin Mengembalikan data ini ?
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Restore</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="modal fade" id="hapusAturan{{$atur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('trash.data-aturan.force', $atur->id)}}">
        @method('DELETE')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Aturan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating form-floating-outline mb-4">
                Yakin Anda Ingin Menghapus data ini ?
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  @endforeach
@endsection
