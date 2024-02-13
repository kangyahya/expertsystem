<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeC extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    if(Auth::user()->role === 'super'){
        return redirect()->route('data-pakar.index');
    }
    elseif(Auth::user()->role === 'expert'){
      return redirect()->route('data-species.index');
  }elseif(Auth::user()->role === 'staff'){
    return redirect()->route('formulir.index');
}
  }
}
