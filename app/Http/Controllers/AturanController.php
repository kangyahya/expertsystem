<?php

namespace App\Http\Controllers;

use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $aturan = Aturan::join('diseases', 'diseases.id', '=', 'rules.disease_id')
        ->select(['rules.id','rules.symptom_id', 'diseases.disease_code', 'diseases.disease_name','confidence'])->get();
      $symptoms = Gejala::all();
      $diseases = Penyakit::all();
        return view('content.aturan.aturan', compact('aturan','symptoms', 'diseases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $symptoms = Gejala::all();
      $diseases = Penyakit::all();
      return view('content.aturan.tambah', compact('symptoms', 'diseases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'symptom_id' => 'required|array',
          'symptom_id.*' => 'exists:symptoms,id',
          'disease_id' => 'required|exists:diseases,id',
          'confidence' => 'required|numeric'
        ]);
        $sysmptomIds = implode(',', $request->symptom_id);
        Aturan::create([
          'symptom_id' => $sysmptomIds,
          'disease_id' => $request->disease_id,
          'confidence' => $request->confidence,
        ]);
        Alert::success('Hore!', 'Data aturan berhasil di tambahkan');
        return redirect()->route('data-aturan.index');
    }
  public function destroy($id)
  {
    $aturan = Aturan::findOrFail($id);
    $aturan->delete();
    Alert::success('Hore!', 'Aturan Deleted Successfully');
    return back();
  }
  public function trash()
  {
    $aturan = Aturan::join('diseases', 'diseases.id', '=', 'rules.disease_id')
      ->select(['rules.id as id','rules.symptom_id', 'diseases.disease_code', 'diseases.disease_name','confidence'])->onlyTrashed()->get();
    $symptoms = Gejala::all();
    $diseases = Penyakit::all();
    return view('content.aturan.aturan-trash', compact('aturan', 'symptoms','diseases'));
  }
  public function restore($id)
  {
    $aturan = Aturan::withTrashed()->where('id', $id)->first();
    $aturan->restore();
    Alert::success('Hore!', 'Aturan Restored Successfully');
    return back();
  }
  public function forceDelete($id)
  {
    $aturan = Aturan::onlyTrashed()->findOrFail($id);
    $aturan->forceDelete();
    Alert::success('Hore!', 'Aturan Deleted Successfully');
    return back();
  }
}
