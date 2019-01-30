<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

         if ($user->hasRole('pre_admin')) {
             return redirect()->route('precamp.dashboard');
         }

         if ($user->hasRole('pre_user')) {
           return redirect()->route('precamp.dashboard');
         }

         if ($user->hasRole('camp_admin')) {
             return redirect()->route('camp.dashboard');
         }

         if ($user->hasRole('user')) {
             return redirect()->route('camp.user', ['role' => 'reception']);
         }
    }

}
