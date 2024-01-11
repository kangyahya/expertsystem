<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Ikan;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class IkanController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $fishes = Ikan::all();
      $species = Species::all();
      return view('content.ikan.ikan', compact('fishes','species'));
    }
  public function trash()
  {
    $fishes = Ikan::onlyTrashed()->get();
    $species = Species::all();
    return view('content.ikan.ikan-trash', compact('fishes','species'));
  }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'fish_name'=> 'required',
        'type_id' => 'required',
        'fish_latin_name' => 'required',
        'fish_age' => 'required|numeric',
        'fish_picture' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'fish_qty' => 'numeric'
      ]);
      $picture = $request->file('fish_picture');
      $picture->storeAs('public/uploads/fishes/', $picture->hashName());
      Ikan::create([
        'fish_name' => $request->fish_name,
        'type_id' => $request->type_id,
        'fish_latin_name' => $request->fish_latin_name,
        'fish_age' => $request->fish_age,
        'fish_picture' => $picture->hashName(),
        'fish_qty' => $request->fish_qty
      ]);
      alert()->success('Hore!','Data Berhasil Disimpan');
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'fish_name'=> 'required',
        'type_id' => 'required',
        'fish_latin_name' => 'required',
        'fish_age' => 'required|numeric',
        'fish_picture' => 'image|mimes:jpeg,jpg,png|max:2048',
        'fish_qty' => 'numeric'
      ]);

      $fish = Ikan::findOrFail($id);
      if ($request->hasFile('fish_picture')){
        $picture = $request->file('fish_picture');
        $picture->storeAs('public/uploads/fishes',$picture->hashName());

        Storage::delete('public/uploads/fishes/'.$fish->fish_picture);
        $fish->update([
          'fish_name' => $request->fish_name,
          'type_id' => $request->type_id,
          'fish_latin_name' => $request->fish_latin_name,
          'fish_age' => $request->fish_age,
          'fish_picture' => $picture->hashName(),
          'fish_qty' => $request->fish_qty,
        ]);
      }else{
        $fish->update([
          'fish_name' => $request->fish_name,
          'type_id' => $request->type_id,
          'fish_latin_name' => $request->fish_latin_name,
          'fish_age' => $request->fish_age,
          'fish_qty' => $request->fish_qty,
        ]);
      }
      alert()->success('Hore!', 'Data Berhasil diupdate');
      return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $fish = Ikan::findOrFail($id);
      $fish->delete();
      alert()->success('Hore', 'Data Berhasil dihapus');
      return back();
    }
  public function restore($id)
  {
    $fish = Ikan::withTrashed()->where('id', $id)->first();
    $fish->restore();
    Alert::success('Hore!', 'Fish Restored Successfully');
    return back();
  }
  public function forceDelete($id)
  {
    $fish = Ikan::onlyTrashed()->findOrFail($id);
    $fish->forceDelete();
    Alert::success('Hore!', 'Fish Deleted Successfully');
    return back();
  }
}
