@extends('layouts/contentNavbarLayout')

@section('title', 'ExpertSystem - Penyakit')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data Master /</span> Data Aturan / Tambah Data
  </h4>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Aturan</h5>
    <div class="card-body">
      <form method="post" action="{{route('data-aturan.store')}}">
        @csrf
        <div class="form-floating form-floating-outline mb-4">
          <fieldset>
            <legend>Silahkan Pilih Pilihan Berikut :</legend>
            @foreach($symptoms as $symptom)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="check{{$symptom->id}}" name="symptom_id[]" value="{{$symptom->id}}">
              <label class="form-check-label" for="check{{$symptom->id}}">{{$symptom->symptom_code}} - {{$symptom->symptom_name}}</label>
            </div>
            @endforeach
          </fieldset>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <select name="disease_id" id="disease_id" class="form-select">
            @forelse($diseases as $disease)
              <option value="{{$disease->id}}">
                {{$disease->disease_code}} - {{$disease->disease_name}}
              </option>
            @empty
              <option>
                - Tidak Ada Data
              </option>
            @endforelse
          </select>
          <label for="disease_id">THEN</label>
        </div>
        <div class="form-floating form-floating-outline mb-4">
          <input inputmode="decimal" class="form-control" id="confidence" placeholder="0.5" name="confidence" pattern="[0-9]*[.,]?[0-9]*"/>
          <label for="confidence">Persentase</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
