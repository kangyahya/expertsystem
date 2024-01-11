@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Ikan')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Data Ikan
  </h4>
  <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addIkan">
    Tambah Ikan
  </button>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Ikan</h5>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered" id="mytable">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Ikan</th>
            <th>Jenis Ikan</th>
            <th>Nama Latin</th>
            <th>Gambar</th>
            <th>Jumlah</th>
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
              <td>{{$fish->fish_qty}}</td>
              <td style="width: 5%">
                <a class="btn btn-info" href="#editIkan{{$fish->id}}" data-bs-toggle="modal"><i class="mdi mdi-pencil-outline me-1"></i></a>
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

  </div>
  <div class="modal fade" id="addIkan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('data-ikan.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Ikan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" name="fish_name" class="form-control @error('fish_name') is-invalid @enderror" id="fish_name" placeholder="G1" />
              @error('fish_name')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
              <label for="fish_name">Nama Ikan</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              <select name="type_id" id="type_id" class="form-select">
                @forelse($species as $speci)
                  <option value="{{$speci->id}}">
                    {{$speci->species_name}}
                  </option>
                @empty
                  <option>
                    - Tidak Ada Data
                  </option>
                @endforelse
              </select>
              <label for="type_id">Jenis Ikan</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" name="fish_latin_name" class="form-control @error('fish_latin_name') is-invalid @enderror" id="fish_latin_name" placeholder="G1" />
              @error('fish_latin_name')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
              <label for="fish_latin_name">Nama Latin</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" name="fish_age" class="form-control @error('fish_age') is-invalid @enderror" id="fish_age" placeholder="2" />
              @error('fish_age')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
              <label for="fish_age">Umur Ikan</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              <input type="file" name="fish_picture" class="form-control @error('fish_picture') is-invalid @enderror" id="fish_picture" />
              @error('fish_picture')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
              <label for="fish_picture">Gambar</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" name="fish_qty" class="form-control @error('fish_qty') is-invalid @enderror" id="fish_qty" placeholder="1" />
              @error('fish_qty')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
              <label for="fish_qty">Jumlah</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </form>
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
      <form method="post" action="{{route('data-ikan.update', $fish->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Ikan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" name="fish_name" class="form-control @error('fish_name') is-invalid @enderror" id="fish_name" value="{{old('fish_name', $fish->fish_name)}}" />
                @error('fish_name')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
                <label for="fish_name">Nama Ikan</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <select name="type_id" id="type_id" class="form-select">
                  @forelse($species as $speci)
                    <option value="{{$speci->id}}" {{$speci->id == $fish->type_id ? "selected":""}}>
                      {{$speci->species_name}}
                    </option>
                  @empty
                    <option>
                      - Tidak Ada Data
                    </option>
                  @endforelse
                </select>
                <label for="type_id">Jenis Ikan</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" name="fish_latin_name" class="form-control @error('fish_latin_name') is-invalid @enderror" id="fish_latin_name" value="{{old('fish_latin_name', $fish->fish_latin_name)}}" />
                @error('fish_latin_name')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
                <label for="fish_latin_name">Nama Latin</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" name="fish_age" class="form-control @error('fish_age') is-invalid @enderror" id="fish_age" value="{{old('fish_age', $fish->fish_age)}}" />
                @error('fish_age')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
                <label for="fish_age">Umur Ikan</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="file" name="fish_picture" class="form-control @error('fish_picture') is-invalid @enderror" id="fish_picture" value="{{old('fish_picture', $fish->fish_picture)}}"/>
                @error('fish_picture')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
                <label for="fish_picture">Gambar</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" name="fish_qty" class="form-control @error('fish_qty') is-invalid @enderror" id="fish_qty" placeholder="1" value="{{old('fish_qty', $fish->fish_qty)}}" />
                @error('fish_qty')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
                <label for="fish_qty">Jumlah</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="modal fade" id="hapusIkan{{$fish->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('data-ikan.destroy', $fish->id)}}">
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
