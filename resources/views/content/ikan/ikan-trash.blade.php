@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Ikan')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Sampah /</span> Data Ikan
  </h4>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Sampah Ikan</h5>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="mytable">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Ikan</th>
          <th>Jenis Ikan</th>
          <th>Nama Latin</th>
          <th>Gambar</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        @php $no = 1; @endphp
        @forelse($fishes as $fish)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$fish->fish_name}}</td>
          <td>
            @foreach($species as $speci)
              {{($speci->id == $fish->type_id) ? $speci->species_name : ''}}
            @endforeach
          </td>
          <td>{{$fish->fish_latin_name}}</td>
          <td>
            <a href="#zoomImage{{$fish->fish_picture}}" data-bs-toggle="modal"><img src="{{asset('/storage/uploads/fishes/'.$fish->fish_picture)}}" alt="gambar {{$fish->fish_name}}" class="rounded" style="width: 150px"></a>
          </td>
          <td style="width: 5%">
            <a class="btn btn-info" href="#editIkan{{$fish->id}}" data-bs-toggle="modal"><i class="mdi mdi-restore me-1"></i></a>
            <a class="btn btn-danger" href="#hapusIkan{{ $fish->id }}" data-bs-toggle="modal"><i class="mdi mdi-trash-can-outline me-1"></i></a>
          </td>
        </tr>
        @empty
          <tr>
            <td colspan="5">
              Tidak Ada Data Ikan
            </td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
@foreach($fishes as $fish)
  <div class="modal fade" id="zoomImage{{$fish->fish_picture}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Gambar Ikan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <img src="{{asset('/storage/uploads/fishes/'.$fish->fish_picture)}}" style="width: 100%" alt="">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
  </div>
  @endforeach
  <!--/ Basic Bootstrap Table -->
  @foreach($fishes as $fish)
    <div class="modal fade" id="editIkan{{$fish->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('trash.data-ikan.restore', $fish->id)}}">
        @method('PATCH')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Restore Ikan</h5>
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
    <div class="modal fade" id="hapusIkan{{$fish->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('trash.data-ikan.force', $fish->id)}}">
        @method('DELETE')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Ikan</h5>
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
