@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Penyakit')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Data Penyakit
  </h4>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Penyakit</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered" id="mytable">
        <thead>
        <tr>
          <th style="width: 5%">No</th>
          <th style="width: 15%">Kode Penyakit</th>
          <th>Penyakit</th>
          <th style="width: 10%">Actions</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        @forelse($diseases as $key => $disease)
          <tr>
            <td>{{++$key}}</td>
            <td>{{$disease->disease_code}}</td>
            <td>{{$disease->disease_name}}</td>
            <td>
              <a class="btn btn-info" href="#restorePenyakit{{$disease->id}}" data-bs-toggle="modal"><i class="mdi mdi-restore"></i></a>
              <a class="btn btn-danger" href="#hapusPenyakit{{$disease->id}}" data-bs-toggle="modal"><i class="mdi mdi-trash-can-outline"></i></a>
            </td>
          </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center">
            --Tidak Ada Data Penyakit--
          </td>
        </tr>
        @endforelse

        </tbody>
      </table>
    </div>
  </div>
  @foreach($diseases as $disease)
    <div class="modal fade" id="restorePenyakit{{$disease->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('trash.data-penyakit.restore', $disease->id)}}">
        @method('PATCH')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Restore Penyakit</h5>
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
    <div class="modal fade" id="hapusPenyakit{{$disease->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('trash.data-penyakit.force', $disease->id)}}">
      @method('DELETE')
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Penyakit</h5>
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
  <!--/ Basic Bootstrap Table -->
@endsection
