@extends('layouts/contentNavbarLayout')

@section('title', 'Hasil Diagnosa')

@section('content')
  <!-- Basic Bootstrap Table -->
  <div class="card mb-4">
    <h5 class="card-header bg-primary-subtle">Pilih Ikan</h5>
    <div class="card-body">

          <label for="fish_id"></label>
          <select id="fish_id" name="fish_id" class="form-select">
            @foreach($fishes as $fish)
              <option value="{{$fish->id}}">{{$fish->fish_name}}</option>
            @endforeach
          </select>
    </div>
  </div>
  <div class="card mb-4">
    <h5 class="card-header bg-primary-subtle">Pilih Gejala</h5>
    <div class="card-body">
      @foreach($symptoms as $symptom)
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="check{{$symptom->id}}" name="symptom_id[]" value="{{$symptom->id}}">
          <label class="form-check-label" for="check{{$symptom->id}}">{{$symptom->symptom_code}} - {{$symptom->symptom_name}}</label>
        </div>
      @endforeach
    </div>
    <div class="card-footer bg-primary-subtle">
      <button class="btn btn-primary" onclick="tambahkanGejala()">
        Tambahkan
      </button>
      <button class="btn btn-info" onclick="resetGejala()">
        Reset
      </button>
    </div>
    <script>
      function tambahkanGejala() {
        var checkboxes = document.querySelectorAll('input[name="symptom_id[]"]:checked');
        var selectedSymptomsDiv = document.getElementById('selectedSymptoms');
        selectedSymptomsDiv.innerHTML = '';
        checkboxes.forEach(function (checkbox) {
          var label = document.querySelector('label[for="' + checkbox.id + '"]').innerText;
          selectedSymptomsDiv.innerHTML += '<p>' + label + '</p>';
        });
      }
      function resetGejala() {
        document.getElementById('selectedSymptoms').innerHTML = 'TIDAK ADA GEJALA YANG DIPILIH';
        document.getElementById('hasilDiagnosa').innerHTML = 'TIDAK ADA HASIL DIAGNOSA';
        document.getElementById('solusiDiagnosa').innerHTML = 'TIDAK ADA SOLUSI';
        var checkboxes = document.querySelectorAll('input[name="symptom_id[]"]:checked');
        checkboxes.forEach(function (checkbox) {
          checkbox.checked = false;
        });
      }
    </script>
  </div>
  <div class="card mb-4">
    <h5 class="card-header bg-primary-subtle">Gejala Yang Anda Pilih</h5>
    <div class="card-body" id="selectedSymptoms">
      Menampilkan Data Gejala pada saat tombol Tambahkan di klik
    </div>
    <div class="card-footer bg-primary-subtle">
      <button class="btn btn-primary" onclick="diagnosa()">
        Diagnosa
      </button>
    </div>
    <script>
      function diagnosa() {
        let checkboxes = document.querySelectorAll('input[name="symptom_id[]"]:checked');
        let fishId = document.getElementById('fish_id').value;
        let gejalaIds = Array.from(checkboxes).map(function (checkbox) {
          return checkbox.value;
        });
        console.log(fishId);
        fetch('/diagnosa', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Sesuaikan dengan cara Laravel Anda menangani CSRF
          },
          body: JSON.stringify({ symptom_id: gejalaIds, fish_id: fishId }),
        })
          .then(response => response.json())
          .then(data => {
            // Menampilkan hasil diagnosa
            document.getElementById('hasilDiagnosa').innerText = ' Berdasarkan data gejala yang di pilih, kemungkinan IKAN Mengalami Penyakit ' + data.hasil_diagnosa;

            // Menampilkan solusi
            document.getElementById('solusiDiagnosa').innerText = data.solusi_diagnosa;
          })
          .catch(error => console.error('Error:', error));
      }
    </script>
  </div>
  <div class="card mb-4">
    <h5 class="card-header bg-primary-subtle">Hasil Diagnosa</h5>
    <div class="card-body" id="hasilDiagnosa">
      Menampilkan Hasil Diagnosa ketika tombol diagnosa di klik
    </div>
  </div>
  <div class="card mb-4">
    <h5 class="card-header bg-primary-subtle">Solusi</h5>
    <div class="card-body" id="solusiDiagnosa">
      Menampilkan Solusi ketika Hasil diagnosa di dapatkan.
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
@endsection
