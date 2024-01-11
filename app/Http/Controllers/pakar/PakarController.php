<?php

namespace App\Http\Controllers\pakar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PakarController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('content.pakar.pakar');
  }
}
