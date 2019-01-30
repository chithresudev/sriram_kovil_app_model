<?php

namespace App\Imports;

use App\TempPatient;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PatientsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public  function model(array $row)
    {
      if (isset($row['name'])) {
        $temp_patient = new TempPatient;
        $temp_patient->name = $row['name'];
        $temp_patient->district_id = session()->get('district')->id;
        $temp_patient->dob = $this->transformDate($row['dob'])->format('Y-m-d');
        $temp_patient->age = $row['age'];
        $temp_patient->gender = $row['gender'];
        $temp_patient->mdcrc_no = $row['mdcrc_no'];
        $temp_patient->source = $row['source'];
        $temp_patient->patient_education = $row['patient_education'];
        $temp_patient->aadhar_no = $row['aadhar_no'];
        $temp_patient->disability_no = $row['disability_no'];
        $temp_patient->address1 = $row['address1'];
        $temp_patient->address2 = $row['address2'];
        $temp_patient->taluk = $row['taluk'];
        $temp_patient->city = $row['city'];
        $temp_patient->district = $row['district'];
        $temp_patient->pincode = $row['pincode'];
        $temp_patient->state = $row['state'];
        $temp_patient->phone = $row['phone'];
        //Father Details
        $temp_patient->phone_relation = $row['phone_relation'];
        $temp_patient->father_name = $row['father_name'];
        $temp_patient->father_age = $row['father_age'];
        $temp_patient->father_education = $row['father_education'];
        $temp_patient->father_occupation = $row['father_occupation'];
        $temp_patient->father_income = $row['father_income'];
        $temp_patient->father_phone = $row['father_phone'];
        //Mother Details
        $temp_patient->mother_name = $row['mother_name'];
        $temp_patient->mother_age = $row['mother_age'];
        $temp_patient->mother_education = $row['mother_education'];
        $temp_patient->mother_occupation = $row['mother_occupation'];
        $temp_patient->mother_income = $row['mother_income'];
        $temp_patient->mother_phone = $row['mother_phone'];
        $temp_patient->camp_district = $row['district'];
        $temp_patient->save();
        return $temp_patient;
      }
    }

    /**
     * Transform a date value into a Carbon object.
     *
     * @return \Carbon\Carbon|null
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

}
