<?php

namespace App\Http\Controllers\Precamp;

use Validator;
use App\Patient;
use App\PatientAddress;
use App\PatientFamily;
use App\Doctor;
use App\Camp;
use App\TempPatient;
use PDF;
use App\Imports\PatientsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{

    public function uploadForm()
    {
       $temp_patients = TempPatient::where('status', 1)->whereNotNull('name')->paginate(10);
       return view('camp.patient_upload', ['temp_patients' => $temp_patients]);
    }

    public function upload(Request $request)
    {
      $validator = Validator::make($request->all(), [
           'patient_details' => 'required|max:10000|mimes:xlsx'
        ]);

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }
        Excel::import(new PatientsImport, $request->file('patient_details'));

        return back()->with('success', 'Insert SuccessFully');
    }

    public function addToDb()
    {
      $district_id = session()->get('district')->id;
      $lists = TempPatient::where('status', 1)
                           ->where('district_id', $district_id)
                           ->whereNotNull('name')
                           ->get();
      $count = count($lists);

      foreach($lists as $list){
        $patient = new Patient;
        $patient->name = $list->name;
        $patient->district_id = $list->district_id;
        $patient->dob = $list->dob;
        $patient->age = $list->age;
        $patient->phone = $list->phone;

        if (title_case($list->phone_relation) == 'Special Teacher') {
          $patient->phone_relation = 'spl';
        }

        if ($list->phone_relation != '') {
          $patient->phone_relation = strtolower($list->phone_relation);
        }

        if ($list->gender != '') {
          $patient->gender = strtolower($list->gender);
        }

        $patient->source = $list->source;
        if(strtoupper($list->source) == 'DDAWO') {
            $patient->source = 'others';
            $patient->source_others = $list->source;
          } elseif (strtoupper($list->source) == 'DDRO/SSA') {
             $patient->source = 'ddro2';
          }else {
            $patient->source = strtolower($list->source);
          }

          if ($list->patient_education != '') {
            $patient->patient_education = strtolower($list->patient_education);
          }

          if($list->aadhar_no != '')
          {
            $patient->aadhar_status = 1;
            $patient->aadhar_available_status = 1;
            $patient->aadhar_no = $list->aadhar_no;
          }

          if($list->disability_no != '')
          {
            $patient->disability_no_status = 1;
            $patient->disability_available_status = 1;
            $patient->disability_no =  $list->disability_no;
          }

          $patient->save();

          $this->addAddress($patient, $list);
          $this->addFamily($patient, $list);
          }

          foreach($lists as $list){
            TempPatient::where('id', $list->id)->delete();
          }

      return redirect()->route('patient.view', ['patientable' => 'firstcall']);
    }

    private function addAddress($patient, $list)
    {
        $address = new PatientAddress;
        $address->patient_id = $patient->id;
        $address->address1 = $list->address1;
        $address->address2 = $list->address2;
        $address->address3 = $list->taluk;
        $address->city = $list->city;
        $address->district = $list->district;
        $address->pincode = $list->pincode;
        $address->state = $list->state;
        $address->save();

    }

    private function addFamily($patient, $list)
    {
        $mother = new PatientFamily;
        $mother->patient_id = $patient->id;
        $mother->type = 'mother';
        $mother->name = $list->mother_name;
        $mother->age = $list->mother_age;
        $mother->education = strtolower($list->mother_education);
        $mother->occupation = strtolower($patient->mother_occupation);
        $mother->income = $list->mother_income;
        $mother->phone = $list->mother_phone;
        $mother->save();

        $father = new PatientFamily;
        $father->patient_id = $patient->id;
        $father->type = 'father';
        $father->name = $list->father_name;
        $father->age = $list->father_age;
        $father->education = strtolower($list->father_education);
        $father->occupation = strtolower($patient->father_occupation);
        $father->income = $list->father_income;
        $father->phone = $list->father_phone;
        $father->save();
    }

    //First call

    public function patientTable($patientable)
    {
      if(session()->get('district')== '') {
        \Auth::logout();
        return redirect()->route('login-form');
      }

      $patients = Patient::precampSearch($patientable);

      return view('camp.patient_table', [
        'patients' => $patients,
        'patientable' => $patientable
      ]);
    }

    public function editPatient(Patient $patient, $page)
    {
        if($page == 'basic-info') {
          return view('camp.addpatient_details', [
            'patient' => $patient,
            'page' => $page
          ]);
        }

       if($page == 'health-info') {
         return view('camp.addpatient_details', [
           'patient' => $patient,
           'page' => $page
         ]);
       }


       if($page == 'permanent' || $page == 'temp' || $page == 'father') {
         return view('camp.addpatient_details', [
           'patient' => $patient,
           'page' => $page
         ]);
       }

       if($page == 'father' || $page == 'mother' || $page == 'spouse' || $page == 'guardian') {
         return view('camp.addpatient_details', [
           'patient' => $patient,
           'page' => $page
         ]);
       }

       if($page == 'sibling-info') {
         return view('camp.addpatient_details', [
           'patient' => $patient,
           'page' => $page
         ]);
       }

       if($page == 'history-info') {
         return view('camp.addpatient_details', [
           'patient' => $patient,
           'page' => $page
         ]);
       }

    }

    public function updatePatient(Patient $patient, Request $request, $page)
    {
          if($page == 'basic-info') {
            return $this->basicInfo($patient, $request);
          }

         if($page == 'health-info') {
           return $this->healthInfo($patient, $request);
         }

         if($page == 'address-info') {
           return $this->addressInfo($patient, $request);
         }

         if($page == 'parent-info') {
           return $this->parentsInfo($patient, $request);
         }

         if($page == 'history-info') {
           return $this->historyInfo($patient, $request);
         }

    }


    private function basicInfo(Patient $patient, Request $request)
    {
        $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
             'dob' => 'required|date',
             'gender' => 'required',
             'age' => 'required|numeric',
             'actual_dob' => 'required_if:actual_dob_check,==,1',
             'aadhar_refer_no' => 'required_if:aadhar_available_status,==,2',
             'camp_id' => 'required_if:flag_camp_status,==,1',
             'patient_notattend_details' => 'required_if:patient_attend_camp,==,0',
         ]);

         $validator->sometimes('disability_no', 'required', function($request) {
            return ($request->disability_no_status == '1' && $request->disability_available_status == '1');
         });

         $validator->sometimes('aadhar_no', 'required|numeric', function($request) {
            return ($request->aadhar_available_status == '1' && $request->aadhar_status == '1');
         });

         if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
         }

          if ($request->secondcall == 1) {
            $camp = Camp::find($request->camp_id);
            $patient->camp_date = $camp->camp_date;
          }

         $patient->name = $request->name;
         $patient->dob = $request->dob;
         $patient->actual_dob = $request->actual_dob;
         $patient->age = $request->age;
         $patient->disability_no_status = $request->disability_no_status;
         $patient->disability_available_status = $request->disability_available_status;
         $patient->disability_no = $request->disability_no;
         $patient->aadhar_available_status = $request->aadhar_available_status;
         $patient->aadhar_status = $request->aadhar_status;
         $patient->aadhar_refer_no = $request->aadhar_refer_no;
         $patient->aadhar_no = $request->aadhar_no;

         $patient->flag_camp_status = $request->flag_camp_status;
         $patient->patient_attend_camp = $request->patient_attend_camp;
         $patient->patient_notattend_details = $request->patient_notattend_details;
         $patient->camp_id = $request->camp_id;


         $patient->save();

         return redirect()->route('patient.edit', [
           'patient' => $patient,
           'page' => 'health-info'
         ]);
    }


    private function healthInfo(Patient $patient, Request $request)
    {

        $validator = Validator::make($request->all(), [
             'lost_of_ambulation' => 'required_if:ambulation_status,==,3',
             'patient_edu_other' => 'required_if:patient_education,==,other',
             'patient_discon_reason' => 'required_if:patient_education,==,discontinued',
             'patient_job_other' => 'required_if:patient_occupation,==,others',
             'patient_decease_details' => 'required_if:patient_health_status,==,3',
             'marital_status' => 'required',

         ]);

         $validator->sometimes(['no_of_male','no_of_female'], 'required|numeric', function($request) {
            return ($request->marital_status == 'married' || $request->marital_status == 'separated'
               || $request->marital_status == 'multiple');
         });

         if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
         }

         $patient->ambulation_status = $request->ambulation_status;
         $patient->lost_of_ambulation = $request->lost_of_ambulation;
         $patient->demographic_status = $request->demographic_status;
         $patient->source = $request->source;
         $patient->source_others = $request->source_others;
         $patient->patient_education = $request->patient_education;
         $patient->patient_edu_other = $request->patient_edu_other;
         $patient->patient_discon_reason = $request->patient_discon_reason;
         $patient->patient_occupation = $request->patient_occupation;
         $patient->patient_income = $request->patient_income;
         $patient->patient_health_status = $request->patient_health_status;
         $patient->patient_job_other = $request->patient_job_other;
         $patient->patient_decease_details = $request->patient_decease_details;
         $patient->marital_status = $request->marital_status;
         $patient->no_of_male = $request->no_of_male;
         $patient->no_of_female = $request->no_of_female;
         $patient->save();

         return redirect()->route('patient.edit', [
           'patient' => $patient,
           'page' => $request->address_type
         ]);
    }

    private function addressInfo(Patient $patient, Request $request)
    {

      $page = $request->address_type == '' ? 'father' : $request->address_type;
      // return $page;
      if($page == 'temp') {
        $patient->phone = $request->phone;
        $patient->phone_relation = $request->phone_relation;
        $patient->save();

      }

      if($page == 'father') {
        $patient->alternative_phone = $request->phone;
        $patient->alternative_phone_relation = $request->phone_relation;
        $patient->save();

      }

      $patientaddress = PatientAddress::updateOrCreate(
        [
        'patient_id' => $patient->id,
        'type' => $page == 'temp' ? 'permanent' : 'temp'
        ],
        [
        'address1' => $request->address1,
        'address2' => $request->address2,
        'address3' =>  $request->address3,
        'city' => $request->city,
        'state' => $request->state,
        'pincode' => $request->pincode,
        'district' => $request->district
         ]);

      return redirect()->route('patient.edit', [
        'patient' => $patient,
        'page' => $page
      ]);

    }

    private function parentsInfo(Patient $patient, Request $request)
    {
      // return $request;

      $validator = Validator::make($request->all(), [
           'affected_male_details' => 'required_with:sibling_affected_male|alpha_dash|nullable',
           'expired_male_details' => 'required_with:sibling_expired_male|alpha_dash|nullable',
           'affected_female_details' => 'required_with:sibling_affected_female|alpha_dash|nullable',
           'expired_female_details' => 'required_with:sibling_expired_female|alpha_dash|nullable',
           'job_other' => 'required_if:occupation,==,other',
           'edu_other' => 'required_if:education,==,other',
       ]);


       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }
      $patient->affected_male_details = $request->affected_male_details;
      $patient->sibling_affected_male = $request->sibling_affected_male;
      $patient->expired_male_details = $request->expired_male_details;
      $patient->sibling_expired_male = $request->sibling_expired_male;
      $patient->affected_female_details = $request->affected_female_details;
      $patient->sibling_affected_female = $request->sibling_affected_female;
      $patient->expired_female_details = $request->expired_female_details;
      $patient->sibling_expired_female = $request->sibling_expired_female;
      $patient->no_of_male_sibling = $request->no_of_male_sibling;
      $patient->no_of_female_sibling = $request->no_of_female_sibling;
      $patient->save();

      $page = $request->parent_type;
      $type = $request->type;

      $patientaddress = PatientFamily::updateOrCreate(
        [
        'patient_id' => $patient->id,
        'type' => $type
        ],
        [
        'name' => $request->name,
        'species' => $request->species,
        'status' => json_encode($request->status),
        'age' =>  $request->age,
        'education' => $request->education,
        'edu_other' => $request->edu_other,
        'occupation' => $request->occupation,
        'job_other' => $request->job_other,
        'income' => $request->income,
        'phone' => $request->phone,
         ]);

      return redirect()->route('patient.edit', [
        'patient' => $patient,
        'page' => $page
      ]);

    }

    private function historyInfo(Patient $patient, Request $request)
    {
      // return $request;
      $validator = Validator::make($request->all(), [
           'enquire_died_family' => 'required_with:enquire_questions|nullable',
           'patient_notattend_details' => 'required_if:patient_attend_camp,==,0',
           'camp_id' => 'required_if:flag_camp_status,==,1',
           'patient_attend_camp' => 'required',

       ]);

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }

       $patientdoctor = Doctor::updateOrCreate(
         [
         'patient_id' => $patient->id,
         ],
         [
         'patient_id' => $patient->id,
         'child_walk' => $request->child_walk,
         'first_symptom_enquire' => $request->first_symptom_enquire,
         'enquire_questions' => json_encode($request->enquire_questions),
         'enquire_died_family' =>  $request->enquire_died_family,
          ]);

           if ($request->firstcall == 1) {
              $camp = Camp::find($request->camp_id);
              $patient->flag_camp_status = $request->flag_camp_status;
              $patient->flag_enquire_status = 1;
              $patient->secondcall_status = 1;

              $patient->patient_attend_camp = $request->patient_attend_camp;
              $patient->patient_notattend_details = $request->patient_notattend_details;
              $patient->camp_date = $camp->camp_date;
              $patient->camp_id = $request->camp_id;
              $patient->save();
              return redirect()->route('patient.view', ['patientable' => 'firstcall']);
           }

          return redirect()->route('patient.view', ['patientable' => 'secondcall']);

    }

    //Wrong Number
    public function wrongNumber(Patient $patient)
    {
       $patient->phone = NULL;
       $patient->letter_status = 0;
       $patient->letter_code = rand(10000,99999);
       $patient->print_letter = 0;
       $patient->print_label = 0;
       $patient->save();
       return back();
    }

    public function remarks(Patient $patient, Request $request)
    {

      $patient->call_remarks = $request->call_remarks;
      $patient->save();
    }

    //Letter PDF
    public function printLetter(Patient $patient)
    {
        $pdf = PDF::loadView('precamps.pdf.letter-pdf', ['patient' => $patient]);
        $patient->print_letter = 1;
        $patient->save();

        return $pdf->stream(strtolower($patient->name.'_'.$patient->id.'_Letter.pdf'));
    }

    public function printLabel(Patient $patient)
    {
      $pdf = PDF::loadView('precamps.pdf.label-pdf', ['patient' => $patient]);
      $patient->print_label = 1;
      $patient->save();

      return $pdf->stream(strtolower($patient->name.'_'.$patient->id.'_label.pdf'));
    }

    public function letterPosted(Patient $patient)
    {
        $patient->flag_enquire_status = 1;
        $patient->flag_camp_status = 1;
        $patient->letter_status = 1;
        $patient->phone = null;
        $patient->save();

        return back();
    }

    //second call

    public function letterEnquire(Patient $patient)
    {
      return view('component.secondcall_modal', ['patient' => $patient]);
    }

    public function firstCall(Patient $patient, Request $request)
    {
      $validator = Validator::make($request->all(), [
           'phone_relation' => 'required',
           'phone' => 'required|numeric'
       ]);

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }

        $patient->name = $request->name;
        $patient->father->name = $request->father_name;
        $patient->phone = $request->phone;
        $patient->phone_relation = $request->phone_relation;
        $patient->flag_enquire_status = 0;
        $patient->flag_camp_status = 0;
        $patient->save();

        if($request->page == 'basic-info') {
          $patient->flag_enquire_status = 1;
          $patient->secondcall_status = 1;
          $patient->save();
          return redirect()->route('patient.edit', ['patient' => $patient , 'page' => 'basic-info']);
        }
        return redirect()->route('patient.view', ['patientable' => 'firstcall']);
    }

    public function eligible(Patient $patient)
    {
        $patient->patient_attend_camp = 2;
        $patient->flag_camp_status = 1;
        $patient->flag_enquire_status = 1;
        $patient->save();
        return back();
    }

}
