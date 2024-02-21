@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Data Users
</h4>
<a href="{{route('users.create')}}" class="btn btn-primary mb-4">
  <i class="mdi mdi-plus-box"></i> Users
</a>
<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Data Users</h5>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table bordered" id="mytable">
        <thead>
        <tr>
          <th></th>
          <th>Nama</th>
          <th>E-mail</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        @forelse($users as $key => $user)
        <tr>
          <td>{{++$key}}</td>
          <td><span class="fw-medium">{{$user->name}}</span></td>
          <td>{{$user->email}}</td>
          <td>{{$user->role}}</td>
          <td>
            @if($user->role != 'super')
              <a class="btn btn-info" href="#editUsers{{$user->id}}" data-bs-toggle="modal"><i class="mdi mdi-pencil-outline me-1"></i></a>
              <a class="btn btn-danger" href="#hapusUser{{$user->id}}"data-bs-toggle="modal"><i class="mdi mdi-trash-can-outline me-1"></i></a>
            @else
              <a class="btn btn-outline-info" href="#" data-bs-toggle="modal"><i class="mdi mdi-pencil-outline me-1"></i></a>
              <a class="btn btn-outline-danger" href="#" data-bs-toggle="modal"><i class="mdi mdi-trash-can-outline me-1"></i></a>
            @endif
          </td>
        </tr>
        @empty
          <tr>
            <td colspan="5"><span class="fw-bold">Tidak Ada Data</span></td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@foreach($users as $key => $user)
    <div class="modal fade" id="editUsers{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('users.update', $user->id)}}">
        @method('put')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Bersisik" value="{{ old('name', $user->name) }}"/>
                @error('name')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
                <label for="species_name">Name</label>
              </div>
              <div class="form-floating form-floating-outline mb-4">
                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                  <option value="expert" {{($user->role=='expert' ? 'selected':'')}}>Expert</option>
                  <option value="staff" {{($user->role=='staff' ? 'selected':'')}}>Staff</option>
                </select>
                @error('role')
                <div class="alert alert-danger mt-2">
                  {{ $message }}
                </div>
                @enderror
                <label for="species_name">Role</label>
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
    <div class="modal fade" id="hapusUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form method="post" action="{{route('users.destroy', $user->id)}}">
        @method('DELETE')
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Users</h5>
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
