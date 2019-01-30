<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampUser extends Model
{
  protected $fillable = [
      'user_id', 'camp_id','role_id'
  ];

  // public function users()
  // {
  //   return $this->belongsToMany('App\User');
  // }


}
