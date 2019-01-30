<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
  /**
     * Get the venues record associated with the camp.
     */
    public function venues()
    {
      return $this->hasMany('App\CampVenue');
    }

    public function venue()
    {
      return $this->hasOne('App\CampVenue');
    }

    /**
       * Get the doctors record associated with the camp.
       */
    public function doctors()
    {
      return $this->hasMany('App\CampDoctor');
    }

    public function doctor()
    {
      return $this->hasOne('App\CampDoctor');
    }

    /**
       * Get the organizers record associated with the camp.
       */
    public function organizers()
    {
      return $this->hasMany('App\CampOrganizer');
    }

    /**
       * Get the venue selected record associated with the camp.
       */
    public function getVenueAttribute()
    {
      return $this->venues()->where('status', 1)->first();
    }

    /**
       * Get the food selected record associated with the camp.
       */
    public function getFoodAttribute()
    {
      return $this->organizers()->where('type', 'food')->get();
    }

    /**
       * Get the accomodation selected record associated with the camp.
       */
    public function getAccomodationAttribute()
    {
      return $this->organizers()->where('type', 'accomodation')->get();
    }

    /**
       * Get the travel selected record associated with the camp.
       */
    public function getTravelAttribute()
    {
      return $this->organizers()->where('type', 'travel')->get();
    }

    /**
       * Get the camp record associated with the district.
       */
    public function district()
    {
      return $this->belongsTo('App\District');
    }

    public function districts()
    {
      return $this->belongsToMany('App\District');
    }

    /**
       * Get the users record associated with the from camps.
       */
    public function users()
    {
      return $this->hasMany('App\User');
    }

    // public function campuser()
    // {
    //   return $this->hasOne('App\CampUser' ,'user_id');
    // }


    /**
       * Get the patients record associated with the from camps.
       */
    public function patients()
    {
      return $this->hasMany('App\Patient');
    }

    public function getCompletePatientAttribute()
    {
      return $this->patients()->where('flag_enquire_status', 2)
            ->where('flag_camp_status', 1)
            ->where('patient_attend_camp', 1)->get();
    }

    public function isVenue()
    {
      $status= $this->venues()->where('status', 1)->count();
      return $status ? true : false;
    }

    public function isDoctor()
    {
      $status= $this->doctors()->where('status', 1)->count();
      return $status ? true : false;
    }

    public function isFood()
    {
      $status= $this->organizers()->where('status', 1)->where('type','food')->count();
      return $status ? true : false;
    }

    public function isTravel()
    {
      $status= $this->organizers()->where('status', 1)->where('type','travel')->count();
      return $status ? true : false;
    }

    public function isAccomodation()
    {
      $status= $this->organizers()->where('status', 1)->where('type','accomodation')->count();
      return $status ? true : false;
    }

    public function getVenueAddressAttribute()
    {
      $venue_address = $this->venues()->venue.','.$this->venues()->address;
      return $venue_address;
    }


}
