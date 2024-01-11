@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Penyakit')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Data Penyakit
  </h4>
  <a href="{{route('data-penyakit.create')}}" class="btn btn-primary mb-4">
    Tambah Data
  </a>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Penyakit</h5>
    <div class="card-body">
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
                <a class="btn btn-success" href="#detailPenyakit{{$disease->id}}" data-bs-toggle="modal"><i class="mdi mdi-eye-circle"></i></a>
                <a class="btn btn-info" href="{{route('data-penyakit.edit', $disease->id)}}"><i class="mdi mdi-pencil-outline"></i></a>
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
  </div>
  @foreach($diseases as $disease)
    <div class="modal fade" id="detailPenyakit{{$disease->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Penyakit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating form-floating-outline mb-4">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-company">Penyebab</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control" id="basic-default-company" placeholder="Kurang Tidur" name="reason" value="{{old('reason', $disease->reason)}}"/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="picture">Gambar</label>
                  <div class="col-sm-10">
                    <img src="{{asset('/storage/uploads/diseases/'.$disease->picture)}}" alt="" width="100px"/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="information">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea id="information" readonly class="form-control" name="information" placeholder="Hi, Do you have description?" >{{old('information', $disease->information)}}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="solution">Solusi</label>
                  <div class="col-sm-10">
                    <textarea id="solution" readonly class="form-control" placeholder="Hi, Do you have a solustion to disease?" name="solution">{{old('solution', $disease->solution)}}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="hapusPenyakit{{$disease->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('data-penyakit.destroy', $disease->id)}}">
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
