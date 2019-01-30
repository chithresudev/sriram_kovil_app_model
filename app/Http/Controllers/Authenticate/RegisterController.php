<?php

namespace App\Http\Controllers\Authenticate;

use Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
  public function __construct()
    {
        $this->middleware('guest');
    }

  public function registerForm()
    {
       return view('auth.register');
    }

  public function register(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:255',
          'username' => 'required|alpha_dash|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
      ]);

      if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

      $user = new User;
      $user->name = $request->name;
      $user->username = $request->username;
      $user->password = Hash::make($request->password);
      $user->save();
      return redirect()->route('precamp.dashboard');

    }
}
