<?php

namespace App\Http\Controllers\Authenticate;

use Validator;
use Auth;
use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  public function __construct()
    {
        $this->middleware('guest');
    }

  public function loginForm()
  {
    return view('auth.login');
  }

  public function authenticate(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'username' => 'required|alpha_dash|max:255',
        'password' => 'required|string|min:6',

      ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('home');
        } else {
          return redirect()->route('login')->with([
            'error' => 'These credentials do not match our records.',
          ]);
        }
    }

}
