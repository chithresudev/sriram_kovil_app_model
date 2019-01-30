<?php

namespace App\Http\Controllers\Precamp;

use Validator;
use Auth;
use Hash;
use App\User;
use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
      $districts = District::get();
      return view('precamps.dashboard', ['districts' => $districts]);
    }

    public function selectDistrict(District $district)
    {
        session()->put('district', $district);
        return ['status' => 'Success'];
    }

    public function changepassword()
    {
      return view('auth.changepassword');
    }

    public function admin_credential_rules(array $data)
      {
        $messages = [
          'current-password.required' => 'Please enter current password',
          'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
          'current-password' => 'required',
          'password' => 'required|same:password',
          'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
      }

      public function postCredentials(Request $request)
      {
        if(Auth::Check())
        {
          $request_data = $request->All();
          $validator = $this->admin_credential_rules($request_data);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            else
            {
            $current_password = Auth::User()->password;
            if(Hash::check($request_data['current-password'], $current_password))
            {
              $user_id = Auth::User()->id;
              $obj_user = User::find($user_id);
              $obj_user->password = Hash::make($request_data['password']);
              $obj_user->save();
              return redirect()->route('home');
            }
            else
            {
              return back()->withErrors($validator)->withInput();
            }
          }
        }
        else
        {
          return redirect()->to('/');
        }
      }

    public function users()
    {
      return view('camp.addusers');
    }

    public function addUsers(Request $request)
      {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_dash|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|string',
        ]);

        if ($validator->fails()) {
              return back()->withErrors($validator)->withInput();
          }


        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        if ($request->type == 'preuser') {

          $user->save();
          $user->assignRole('pre_user');
        }

        if ($request->type == 'campadmin') {

          $user->save();
          $user->assignRole('camp_admin');
        }

        if ($request->type == 'user') {

          $user->save();
          $user->assignRole('user');
        }

        return back();

      }
}
