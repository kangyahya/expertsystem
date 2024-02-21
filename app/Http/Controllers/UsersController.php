<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

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
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
      'role' => 'required'
    ]);
    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->role
    ]);
    Alert::success('Hore!', 'Data Berhasil disimpan!');
    return redirect()->route('users.index');
  }

  /**
   * Update the specified resource in storage.
   * @throws ValidationException
   */
  public function update(Request $request, $id): RedirectResponse
  {
    $this->validate($request, [
      'name' => 'required',
      'role' => 'required'
    ]);
    $user = User::findOrFail($id);
    $query = $user->update(
      [
        'name' => $request->name,
        'role' => $request->role,
      ]);
      if ($query) {
        Alert::success('Hore!', 'Data Berhasil diubah!');
      }
    return redirect()->route('users.index');
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
