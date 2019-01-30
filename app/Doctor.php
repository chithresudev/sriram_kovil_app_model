<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['patient_id','child_walk','first_symptom_enquire',
    'enquire_questions','enquire_died_family'];
}
