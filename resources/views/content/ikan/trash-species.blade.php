@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Species')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Species
  </h4>
  <div class="row">
    <div class="col-xl">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Data Species</h5> <small class="text-muted float-end">Data Jenis Ikan</small>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="mytable">
              <thead>
              <tr>
                <th style="width: 5%">No</th>
                <th>Jenis</th>
                <th style="width: 10%">Actions</th>
              </tr>
              </thead>
              <tbody class="table-border-bottom-0">
              @forelse($species as $key => $specie)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$specie->species_name}}</td>
                  <td>
                    <a class="btn btn-info" href="#editSpecies{{$specie->id}}" data-bs-toggle="modal"><i class="mdi mdi-restore me-1"></i></a>
                    <a class="btn btn-danger" href="#hapusSpecies{{$specie->id}}" data-bs-toggle="modal" ><i class="mdi mdi-trash-can-outline me-1"></i></a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="3">Tidak Ada Jenis Ikan</td>
                </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Basic Layout -->
  </div>
  @foreach($species as $key => $specie)
    <div class="modal fade" id="editSpecies{{$specie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('trash.data-species.restore', $specie->id)}}">
        @method('patch')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Restore Species</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating form-floating-outline mb-4">
                Yakin Anda Ingin Restore data ini ?
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
    <div class="modal fade" id="hapusSpecies{{$specie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('trash.data-species.force', $specie->id)}}">
        @method('DELETE')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Species</h5>
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
