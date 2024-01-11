@extends('layouts/contentNavbarLayout')

@section('title', 'EduTechSolutions - Data Aturan')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Data Aturan
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">Data Aturan</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>Rule</th>
          <th>If</th>
          <th>Then</th>
          <th>Keterangan</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><i class="mdi mdi-wallet-travel mdi-20px text-danger me-3"></i><span class="fw-medium">Tours Project</span></td>
          <td>Albert Cook</td>
          <td></td>
          <td><span class="badge rounded-pill bg-label-primary me-1">Active</span></td>
          <td>
                <a class="btn btn-info" href="javascript:void(0);"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                <a class="btn btn-danger" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->
@endsection
