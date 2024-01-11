@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Gejala')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Data Gejala
  </h4>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Gejala</h5>
    <div class="card-body">
      <div class="card-datatable table-responsive">
        <table class="table table-bordered data-table" id="mytable">
          <thead>
          <tr>
            <th style="width: 3%">No</th>
            <th style="width: 10%">Kode Gejala</th>
            <th>Nama Gejala</th>
            <th style="width: 10%">Actions</th>
          </tr>
          </thead>
          <tbody>
          @php $no = 1; @endphp
          @forelse($symptoms as $symptom)
            <tr>
              <td>{{ $no++  }}</td>
              <td>{{$symptom->symptom_code}}</td>
              <td>{{$symptom->symptom_name}}</td>
              <td>
                <a class="btn btn-outline-info" href="#editGejala{{$symptom->symptom_code}}" data-bs-toggle="modal"><i class="mdi mdi-restore me-1"></i></a>
                <a class="btn btn-outline-danger" href="#hapusGejala{{$symptom->id}}" data-bs-toggle="modal"><i class="mdi mdi-delete-outline me-1"></i></a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">There are no symptoms.</td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @foreach($symptoms as $symptom)
  <div class="modal fade" id="editGejala{{$symptom->symptom_code}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('trash.data-gejala.restore', $symptom->id)}}">
      @method('PATCH')
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Restore Gejala</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating form-floating-outline mb-4">
              Yakin Anda Ingin Mengembalikan data ini ?
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Restore</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="modal fade" id="hapusGejala{{$symptom->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('trash.data-gejala.force', $symptom->id)}}">
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
  <!--/ Basic Bootstrap Table -->
@endsection
