<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientAddress extends Model
{
    protected $fillable = ['patient_id','address1', 'address2', 'address3', 'city','state',
    'district','pincode','type'];

    public static function findOrCreate($id)
    {
        $obj = static::find($id);
        return $obj ?: new static;
    }

}
