<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GejalaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    public function index(): View
    {
      $symptoms = Gejala::all();
      return view('content.gejala.gejala', compact('symptoms'));
    }

  /**
   * store
   * @param mixed $request
   * @return RedirectResponse
   * @throws ValidationException
   */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
          'symptom_code' => 'required',
          'symptom_name' => 'required'
        ]);
        Gejala::create([
          'symptom_code' => $request->symptom_code,
          'symptom_name' => $request->symptom_name
        ]);
        Alert::success('Hore!', 'Data Berhasil disimpan!');
        return redirect()->route('data-gejala.index');
    }

  /**
   * Update the specified resource in storage.
   * @throws ValidationException
   */
    public function update(Request $request, $id): RedirectResponse
    {
      $this->validate($request, [
        'symptom_code' => 'required',
        'symptom_name' => 'required'
      ]);
      $symptom = Gejala::findOrFail($id);
      $symptom->update(['symptom_code'=>$request->symptom_code,'symptom_name'=> $request->symptom_name]);
      return redirect()->route('data-gejala.index')->with(['success'=> 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $symptom = Gejala::findOrFail($id);
      $symptom->delete();
      Alert::success('Hore!', 'Data Berhasil dihapus');
      return back();
    }
  public function trash()
  {
    $symptoms = Gejala::onlyTrashed()->get();
    return view('content.gejala.gejala-trash', compact('symptoms'));
  }
  public function restore($id)
  {
    $symptom = Gejala::withTrashed()->where('id', $id)->first();
    $symptom->restore();
    Alert::success('Hore!', 'Symptom Restored Successfully');
    return back();
  }
  public function forceDelete($id)
  {
    $symptom = Gejala::onlyTrashed()->findOrFail($id);
    $symptom->forceDelete();
    Alert::success('Hore!', 'Gejala Deleted Successfully');
    return back();
  }
}
