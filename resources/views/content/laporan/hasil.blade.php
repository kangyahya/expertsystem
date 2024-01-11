@php use App\Models\Gejala; @endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Hasil Diagnosa')

@section('content')
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Hasil Diagnosa
  </h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Data Hasil Diagnosa</h5>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-responsive-sm table-bordered" id="mytable">
          <thead>
          <tr>
            <th>Username</th>
            <th>Ikan</th>
            <th>Gejala</th>
            <th>Penyakit</th>
            <th>Presentase</th>
            <th>Tanggal</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @forelse($diagnosa as $key => $dgs)
            <tr>
              <td>{{$dgs->name}}</td>
              <td>{{$dgs->fish_name}}</td>
              <td>@php
                  $symptomIds = explode(',', $dgs->symptom_id);
                  $no = 0;
                @endphp
                <ol>
                @foreach($symptomIds as $symptomId)
                  @php
                    $gejala = Gejala::where('id', $symptomId)->first();
                  @endphp
                 <li> {{ $gejala->symptom_name }}</li>
                @endforeach
                </ol></td>
              <td>{{$dgs->disease_name}}</td>
              <td>{{$dgs->confidence}}</td>
              <td>{{$dgs->tanggal}}</td>
            </tr>
          @empty
          <tr>
            <td colspan="6">
              <strong>Tidak Ada Data Laporan</strong>
            </td>
          </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      <a href="{{route('laporan.cetak')}}" target="_blank" class="btn btn-primary">Cetak</a>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
