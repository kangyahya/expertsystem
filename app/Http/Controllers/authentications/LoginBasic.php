<?php

namespace App\Http\Controllers\authentications;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginBasic extends Controller
{
  public function __construct()
  {
    $this->middleware('guest')->except([
      'logout', 'dashboard'
    ]);
  }
  public function register()
  {
    return view('auth.register');
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:250',
      'email' => 'required|email|max:250|unique:users',
      'password' => 'required|min:8|confirmed'
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password)
    ]);

    $credentials = $request->only('email', 'password');
    Auth::attempt($credentials);
    $request->session()->regenerate();
    return redirect()->route('dashboard')
      ->withSuccess('You have successfully registered & logged in!');
  }
  public function login()
  {
    return view('content.authentications.login');
  }
  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if(Auth::attempt($credentials))
    {
      $request->session()->regenerate();
      $user = Auth::user();
      if ($user->role === 'super'){
        Alert::success('Yeay!!','You have successfully logged in!');
        return redirect()->route('users.index');
      }elseif($user->role === 'expert'){
        Alert::success('Yeay!!','You have successfully logged in!');
        return redirect()->route('data-species.index');
      }else{
        Alert::success('Yeay!!','You have successfully logged in!');
        return redirect()->route('diagnosa.index');
      }
    }

    return back()->withErrors([
      'email' => 'Your provided credentials do not match in our records.',
    ])->onlyInput('email');

  }
  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')
      ->withSuccess('You have logged out successfully!');;
  }
}
