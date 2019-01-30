<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientFamily extends Model
{
    protected $fillable = [
                      'patient_id',
                       'name',
                       'type',
                      'species',
                      'status',
                      'age',
                      'education',
                      'edu_other',
                      'occupation',
                      'job_other',
                      'income',
                      'phone'];
}
