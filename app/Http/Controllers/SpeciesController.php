<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function __construct()
  {
    $this->middleware('auth');
  }
    public function index(): View
    {
      $species = Species::select('species.id', 'species.species_name', DB::raw('SUM(fishes.fish_qty) as total_qty'))
        ->leftJoin('fishes', 'species.id', '=', 'fishes.type_id')
        ->groupBy('species.id')
        ->get();
        return view('content/ikan/species', compact('species'));
    }
    public function trash(): View
    {
      $species = Species::onlyTrashed()->get();
      return view('content/ikan/trash-species', compact('species'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'species_name' => 'required',
      ]);
      Species::create([
        'species_name' => $request->species_name,
        'quantity' => 0
      ]);
      toast('Your Species as been submitted','success');
      return back();
    }
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'species_name' => 'required',
      ]);
      $species = Species::findOrFail($id);
      $species->update([
        'species_name' => $request->species_name,
      ]);
      toast('Your Species as been updatted','success');
      return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $species = Species::findOrFail($id);
      $species->delete();
      Alert::success('Hore!', 'Species Deleted Successfully');
        return back();
    }
  public function restore($id)
  {
    $species = Species::withTrashed()->where('id', $id)->first();
    $species->restore();
    Alert::success('Hore!', 'Species Restored Successfully');
    return back();
  }
  public function forceDelete($id)
  {
    $species = Species::onlyTrashed()->findOrFail($id);
    $species->forceDelete();
    Alert::success('Hore!', 'Species Deleted Successfully');
    return back();
  }
}
