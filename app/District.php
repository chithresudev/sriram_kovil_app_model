<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    public function patients()
    {
      return $this->hasMany('App\Patient');
    }

    public function camp()
    {
      return $this->hasOne('App\Camp');
    }

    public function districtcamps()
    {
      return $this->hasMany('App\Camp');
    }

    public function venues()
    {
      return $this->hasMany('App\CampVenue');
    }

    public function cities()
    {
      return $this->hasMany('App\City');
    }

    public function getCompleteCampAttribute()
    {
      return $this->districtcamps()->where('status', 1)->get();
    }


    public function getFirstcallPatientAttribute()
    {
      return $this->patients()->whereNotNull('phone')
            ->where('flag_enquire_status', 0)
            ->where('phone', '<>', '0')->count();
    }

    public function getSecondcallPatientAttribute()
    {
      return $this->patients()->where('flag_enquire_status', 1)
            ->where('flag_camp_status', 1)
            ->where('patient_attend_camp', 1)->count();
    }


}
