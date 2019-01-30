<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempPatient extends Model
{
      public $timestamps = false;

      public function isTemp()
      {
          $this->where('district_id', session()->get('district_id'))->count();
      }
}
