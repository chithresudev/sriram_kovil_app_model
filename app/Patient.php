<?php

namespace App;

use App\Searchable\PrecampSearchable;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  use PrecampSearchable;

  /**
   * Get the address record associated with the patient.
   */
    public function addresses()
    {
      return $this->hasMany('App\PatientAddress');
    }

    public function father()
    {
      return $this->families()->where('type', 'father')->first();
    }

    public function district()
    {
      return $this->belongsTo('App\District');
    }

    /**
     * Get the family record associated with the patient.
     */
    public function families()
    {
      return $this->hasMany('App\PatientFamily');
    }


    /**
     * Get the permanent address record associated with the patient.
     */
   public function getAddressAttribute()
   {
     return $this->addresses()->where('type', 'permanent')->first();
   }

   public function getFullAddressAttribute()
   {
     $full_address = $this->address->address1.','.$this->address->address2.','.$this->address->address3.','
                     .$this->address->city.','.$this->address->district.','.$this->address->pincode.'.';
     return $full_address;
   }
   /**
     * Get the temporary address record associated with the patient.
     */
   public function getTempAttribute()
   {
     return $this->addresses()->where('type', 'temp')->first();
   }

   /**
      * Get the father record associated with the patient.
      */
   public function getFatherAttribute()
   {
     return $this->families()->where('type', 'father')->first();
   }

   /**
      * Get the mother record associated with the patient.
      */
   public function getMotherAttribute()
   {
     return $this->families()->where('type', 'mother')->first();
   }

   /**
      * Get the spouse record associated with the patient.
      */
   public function getSpouseAttribute()
   {
     return $this->families()->where('type', 'spouse')->first();
   }

   /**
      * Get the guardian record associated with the patient.
      */
   public function getGuardianAttribute()
   {
     return $this->families()->where('type', 'guardian')->first();
   }

   /**
      * Get the guardian record associated with the patient.
      */

}
