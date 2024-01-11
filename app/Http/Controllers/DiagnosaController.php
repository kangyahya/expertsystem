<?php

namespace App\Http\Controllers;
use App\Models\Aturan;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Ikan;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnosaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index ()
  {
    $symptoms = Gejala::all();
    $fishes = Ikan::all();
    return view('content.laporan.diagnosa',compact('symptoms', 'fishes'));
  }
  public function store(Request $request){
    $symptomIds = implode(',', $request->symptom_id);
    $disease  = Aturan::select('symptom_id', 'disease_id')->where('symptom_id', $symptomIds)->first();
    $hasilDiagnosa = Penyakit::find($disease->disease_id)->disease_name;
    $solusiDiagnosa = Penyakit::find($disease->disease_id)->solution;
    if(!empty($disease)){
      Diagnosa::create([
        'fish_id' => $request->fish_id,
        'user_id' => auth()->user()->id,
        'symptom_id'=> $symptomIds,
        'disease_id' => $disease->disease_id,
        'tanggal'=> now()->toDateTimeString()
      ]);
      Alert::success('Hore!!!','Diagnosa berhasil di simpan');
    }
    return response()->json(['hasil_diagnosa'=> $hasilDiagnosa, 'solusi_diagnosa'=> $solusiDiagnosa]);
  }

}
