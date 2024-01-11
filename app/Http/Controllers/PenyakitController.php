<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function __construct()
  {
    $this->middleware('auth');
  }
    public function index()
    {
      $diseases = Penyakit::paginate(10);
        return view('content.penyakit.penyakit', compact('diseases'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.penyakit.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'disease_code' => 'required',
        'disease_name' => 'required',
        'reason' => 'required',
        'picture' => 'image|mimes:jpg,png,jpeg|max:2048',
        'information' => 'required',
        'solution' => 'required'
      ]);
      $picture = $request->file('picture');
      $picture->storeAs('public/uploads/diseases/', $picture->hashName());
      Penyakit::create([
        'disease_code' => $request->disease_code,
        'disease_name' => $request->disease_name,
        'reason' => $request->reason,
        'picture' => $picture->hashName(),
        'information' => $request->information,
        'solution' => $request->solution
      ]);
      Alert::success('Hore!', 'Data Berhasil di simpan');
      return redirect()->route('data-penyakit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $penyakit = Penyakit::findOrFail($id);
        return view('content.penyakit.edit', compact('penyakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'disease_name' => 'required',
        'reason' => 'required',
        'picture' => 'image|mimes:jpg,png,jpeg|max:2048',
        'information' => 'required',
        'solution' => 'required'
      ]);
      $disease = Penyakit::findOrFail($id);
      if ($request->hasFile('picture')){
        $picture = $request->file('picture');
        $picture->storeAs('public/uploads/diseases', $picture->hashName());
        Storage::delete('public/uploads/diseases/'.$disease->picture);
        $disease->update([
          'disease_name' => $request->disease_name,
          'reason' => $request->reason,
          'picture' => $picture->hashName(),
          'information' => $request->information,
          'solution' => $request->solution
        ]);
      } else {
        $disease->update([
          'disease_name' => $request->disease_name,
          'reason' => $request->reason,
          'information' => $request->information,
          'solution' => $request->solution
        ]);
      }
      Alert::success('Hore!', 'Data penyakit berhasil di update');
      return redirect()->route('data-penyakit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $disease = Penyakit::findOrFail($id);
      $disease->delete();
      Alert::success('Hore!', 'Disease Deleted Successfully');
      return redirect()->route('data-penyakit.index');
    }
  public function trash()
  {
    $diseases = Penyakit::onlyTrashed()->get();
    return view('content.penyakit.penyakit-trash', compact('diseases'));
  }
  public function restore($id)
  {
    $disease = Penyakit::withTrashed()->where('id', $id)->first();
    $disease->restore();
    Alert::success('Hore!', 'Disease Restored Successfully');
    return back();
  }
  public function forceDelete($id)
  {
    $disease = Penyakit::onlyTrashed()->findOrFail($id);
    $disease->forceDelete();
    Alert::success('Hore!', 'Disease Deleted Successfully');
    return back();
  }
}
