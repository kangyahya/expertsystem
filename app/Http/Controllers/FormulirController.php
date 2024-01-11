<?php

namespace App\Http\Controllers;

use App\Exports\StaffExport;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FormulirController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $Staff = DB::table('staff')
      ->join('users', 'staff.user_id', '=', 'users.id')
      ->groupBy('staff.id')
      ->get();
    return view('content.laporan.formulir', compact('Staff'));
  }

  public function create()
  {
    $staff = User::where('role','staff')->get();
    return view('content.laporan.formulir-tambah', compact('staff'));
  }
  public function store(Request $request)
  {
    $this->validate($request, [
      'user_id' => 'required',
      'jabatan' => 'required',
      'jenis_kelamin' => 'required',
      'alamat'=> 'required'
    ]);
    Staff::create([
      'user_id' => $request->user_id,
      'jabatan' => $request->jabatan,
      'jenis_kelamin' => $request->jenis_kelamin,
      'alamat'=> $request->alamat
    ]);
    toast('Your Formulir has been submitted','success');
    return back();
  }
  public function export()
  {
    return Excel::download(new StaffExport,'staff.xlsx');
  }
}
