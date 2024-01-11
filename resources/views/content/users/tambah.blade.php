@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Penyakit')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master / Data Users /</span> Tambah Data Users
  </h4>

  <!-- Basic Bootstrap Table -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Form Data Users</h5>
        </div>
        <div class="card-body">
          <form method="post" action="{{route('users.store')}}">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="name">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Jihad Fiisabilillah" name="name"/>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="email">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="jihad@example.com" name="email"/>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="password">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="example" name="password" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="verify_password">Password Verify</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="verify_password" placeholder="example" name="verify_password" />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="role">Roles</label>
              <div class="col-sm-10">
                <select name="role" id="role" class="form-select">
                  <option value="expert">Expert</option>
                  <option value="staff">Staff</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
