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
            <a class="btn btn-outline-info" href="javascript:void(0);"><i class="mdi mdi-pencil-outline me-1"></i></a>
            <a class="btn btn-outline-danger" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i></a>
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
<!--/ Basic Bootstrap Table -->
@endsection
