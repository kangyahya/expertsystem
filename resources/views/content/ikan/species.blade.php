@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Species')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Species
  </h4>
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-end justify-content-between">
          <h5 class="mb-0">Add Species</h5> <small class="text-muted float-end">Jenis Ikan</small>
        </div>
        <div class="card-body">
          <form action="{{route('data-species.store')}}" method="post">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" name="species_name"/>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
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
                <th>Jumlah</th>
                <th style="width: 10%">Actions</th>
              </tr>
              </thead>
              <tbody class="table-border-bottom-0">
              @forelse($species as $key => $specie)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$specie->species_name}}</td>
                  <td>{{$specie->total_qty}}</td>
                  <td>
                    <a class="btn btn-info" href="#editSpecies{{$specie->id}}" data-bs-toggle="modal"><i class="mdi mdi-pencil-outline me-1"></i></a>
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
      <form method="post" action="{{route('data-species.update', $specie->id)}}">
        @method('put')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Species</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control @error('species_name') is-invalid @enderror" id="species_name" name="species_name" placeholder="Bersisik" value="{{ old('species_name', $specie->species_name) }}"/>
                @error('species_name')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
                <label for="species_name">Species</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>

          </div>
        </div>
      </form>
    </div>
    <div class="modal fade" id="hapusSpecies{{$specie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('data-species.destroy', $specie->id)}}">
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
