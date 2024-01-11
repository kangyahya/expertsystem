<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    public function index()
    {
      $diagnosa = Diagnosa::join('diseases', 'diseases.id','=','diagnosa.disease_id')
        ->join('fishes','fishes.id','=','diagnosa.fish_id')
        ->join('users','users.id','=','diagnosa.user_id')
        ->join('rules','rules.symptom_id','=','diagnosa.symptom_id')
        ->select(['users.name','fish_name','diagnosa.symptom_id','diseases.disease_name','rules.confidence','diagnosa.tanggal'])->get();
      return view('content.laporan.hasil', compact('diagnosa'));
    }

  public function create()
  {
    return view('content.laporan.formulir-tambah');
  }
  public function generatePDF()
  {
    $diagnosa = Diagnosa::join('diseases', 'diseases.id','=','diagnosa.disease_id')
      ->join('fishes','fishes.id','=','diagnosa.fish_id')
      ->join('users','users.id','=','diagnosa.user_id')
      ->join('rules','rules.symptom_id','=','diagnosa.symptom_id')
      ->select(['users.name','fish_name','diagnosa.symptom_id','diseases.disease_name','rules.confidence','diagnosa.tanggal'])->get();
    $pdf = PDF::loadView('pdf.diagnosa', compact('diagnosa'))->setOptions(['defaultFont' => 'sans-serif']);
    return $pdf->download('laporan.pdf');
  }
}
