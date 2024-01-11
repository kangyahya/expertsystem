@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Pakar')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Data Pakar
  </h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Pakar</h5>
    <div class="table-responsive text-nowrap">
      <table class="table bordered">
        <thead>
        <tr>
          <th>Username</th>
          <th>Nama</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <tr>
          <td><i class="mdi mdi-wallet-travel mdi-20px text-danger me-3"></i><span class="fw-medium">Tours Project</span></td>
          <td></td>
          <td>
            <a class="btn btn-outline-info" href="javascript:void(0);"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
            <a class="btn btn-outline-danger" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
