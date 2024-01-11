<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(): View
  {
    $users = User::paginate(10);
    return view('content.users.users', compact('users'));
  }

  public function create ()
  {
    return view('content.users.tambah');
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
    User::create([
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
    $symptom = User::findOrFail($id);
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
}
