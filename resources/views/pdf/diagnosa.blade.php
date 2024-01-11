@php use App\Models\Gejala; @endphp
@extends('layouts/commonMaster' )

@section('layoutContent')

  <!-- Content -->
  @yield('content')
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-responsive-sm table-bordered" border="1" cellspacing="0" id="mytable">
          <thead>
          <tr bgcolor="#8a2be2">
            <th height="30px">Username</th>
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
  </div>
  <!--/ Content -->

@endsection
