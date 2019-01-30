<?php

namespace App\Http\Controllers\Precamp;

use Validator;
use Carbon\Carbon;
use App\Camp;
use App\User;
use App\CampVenue;
use App\CampUser;
use App\CampDoctor;
use App\CampOrganizer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampController extends Controller
{

    public function index()
    {

       return view('camp.dashboard');
    }

    public function user($role)
    {
       return $role;
    }

    public function create()
    {
        return view('camp.create');
    }

    public function store(Request $request)
    {
      $district_id = session()->get('district')->id;

      $validator = Validator::make($request->all(), [
           'camp_date' => 'required|date|unique:camps,camp_date| after:' . Carbon::now()->subDays(1)
           ->format('d-m-Y')
       ]);

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }

       $camp = new Camp;
       $camp->district_id = $district_id;
       $camp->camp_date = $request->camp_date;
       $camp->save();
       session()->put('camp', $camp);
       return redirect()->route('camp.page', ['camp' => $camp, 'page' => 'venue']);
    }


    public function campDetails(Camp $camp)
    {
        return view('camp.camp_details', ['camp' => $camp]);
    }

    public function campPage(Camp $camp, $page)
    {
         return view('camp.camp_details', ['camp' => $camp, 'page' => $page]);

    }

    public function createCamp(Camp $camp, Request $request, $create)
    {
       if ($create == 'venue') {

           $venue = new CampVenue;
           $venue->venue = $request->venue;
           $venue->address = $request->address;
           $venue->contact_name = $request->contact_name;
           $venue->contact_mobile = $request->contact_mobile;
           $venue->contact_email = $request->contact_email;
           $venue->comment = $request->comment;
           $camp->venues()->save($venue);
           return back();
         }

       if ($create == 'doctor') {

           $doctor = new CampDoctor;
           $doctor->name = $request->name;
           $doctor->specialist = $request->specialist;
           $doctor->phone = $request->phone;
           $doctor->date_from = $request->date_from;
           $doctor->date_to = $request->date_to;
           $camp->doctors()->save($doctor);
           return back();
       }

       if ($create == 'travel' || $create == 'food' || $create == 'accomodation') {

           $organizers = new CampOrganizer;
           $organizers->name = $request->name;
           $organizers->mobile = $request->mobile;
           $organizers->email = $request->email;
           $organizers->comment = $request->comment;
           $organizers->type = $request->type;
           $camp->organizers()->save($organizers);
           return back();

       }

    }

    public function venueUpdate(CampVenue $venue, Request $request)
    {
        $venue->venue = $request->venue;
        $venue->address = $request->address;
        $venue->contact_name = $request->contact_name;
        $venue->contact_mobile = $request->contact_mobile;
        $venue->contact_email = $request->contact_email;
        $venue->comment = $request->comment;
        $venue->save();
        return redirect()->back();

    }

    public function venueSelected(CampVenue $venue)
    {
        $exitvenue= CampVenue::where('camp_id', $venue->camp_id)
                            ->update(['status' => 0]);
        $venue->status = 1;
        $venue->save();
        return redirect()->back();
  }

  public function doctorUpdate(CampDoctor $doctor, Request $request)
  {
        $doctor->name = $request->name;
        $doctor->specialist = $request->specialist;
        $doctor->phone = $request->phone;
        $doctor->date_from = $request->date_from;
        $doctor->date_to = $request->date_to;
        $doctor->save();
        return redirect()->back();

  }

  public function doctorSelected(CampDoctor $doctor)
  {
      $exitdoctor= CampDoctor::where('camp_id', $doctor->camp_id)
                          ->update(['status' => 0]);
      $doctor->status = 1;
      $doctor->save();
      return redirect()->back();
  }


  public function organizerUpdate(CampOrganizer $organizer, Request $request)
  {
      $organizer->name = $request->name;
      $organizer->mobile = $request->mobile;
      $organizer->email = $request->email;
      $organizer->comment = $request->comment;
      $organizer->save();
      return back();
  }

  public function organizerSelected(CampOrganizer $organizer)
  {
      $organizer->status = 1;
      $organizer->save();
      return redirect()->back();
  }

  public function organizerUnSelected(CampOrganizer $organizer)
  {
      $organizer->status = 0;
      $organizer->save();
      return redirect()->back();
  }

  public function campList($camp)
  {

     $camp_details = Camp::find($camp);
     session()->put('camp', $camp_details);

      $users = User::get();
      return view('camp.camp_list', [
        'users' => $users
      ]);
  }

  public function assignRole(Request $request, $camp)
  {

    // $validator = Validator::make($request->all(), [
    //       'admin' => 'required',
    //       'medical' => 'required',
    //       'reception' => 'required',
    //       'doctor' => 'required',
    //       'counselling' => 'required',
    //       'blooddraw' => 'required',
    //       'physiotheraphy' => 'required',
    //       'hobbies' => 'required',
    //       'settled' => 'required',
    //  ]);
    //
    //  if ($validator->fails()) {
    //      return back()->withErrors($validator)->withInput();
    //  }

     // $id = str_after($roles['role_id'], ',');
     // $user_id = str_before($roles['role_id'], ',');
     //
     // foreach ($roles as $role) {
     //  $roles = new CampUser;
     //  $roles->user_id = $id;
     //  $roles->camp_id = $camp;
     //  $roles->role_id = $camp;
     //  $roles->save();
     //  }

     // return back();
     $roles = $request->except(['_token']);
     $exits = CampUser::where('user_id', $roles['role_id'])
               ->where('camp_id', $camp)->first();

     if(!$exits) {
       $campuser = CampUser::updateOrCreate(
         [
         'role_id' => $roles['role_row'],
          'camp_id' => $camp
        ],
         [
           'user_id' => $roles['role_id'],
           'camp_id' => $camp,
           'role_id' => $roles['role_row']
         ]);
         return 'ok';
     }

     else {
       return 'exit';
     }





      // $exits = CampUser::where('user_id', $request->role_id)->where('camp_id', $camp)->first();
      //
      // $exits->user_id = $request->role_id;
      // $exits->save();
      //
      // $roles = new CampUser;
      // $roles->user_id = $request->role_id;
      // $roles->camp_id = $camp;
      // // $roles->role_id = $camp;
      // $roles->save();
  }

  public function campComplete(Request $request, $camp)
  {
      $camp_status = Camp::find($camp);
      $camp_status->status = 1;
      $camp_status->save();
      return back()->with(['message' => 'Camp Completed SuccessFully']);
  }


}
