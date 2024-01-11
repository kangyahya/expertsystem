<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Basic extends Controller
{
  public function index()
  {
    return view('content.tables.tables-basic');
  }
  public function pakar()
  {
    return view('content.tables.pakar');
  }
  public function ikan()
  {
    return view('content.tables.ikan');
  }
  public function penyakit()
  {
    return view('content.tables.penyakit');
  }
  public function gejala()
  {
    return view('content.tables.gejala');
  }
  public function aturan()
  {
    return view('content.tables.aturan');
  }
}
