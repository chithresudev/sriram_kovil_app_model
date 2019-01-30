<?php

namespace App\Searchable;

trait PrecampSearchable {

  public static function precampSearch($table = '')
  {
        $model = static::query();
        $columns = \Schema::getColumnListing('patients');
        $query = app('request');
        session(['params' =>  $query->except(['page'])]);

        //default
        $district_id = session()->get('district')->id;
        $model->where('district_id', $district_id);

        if ($table == 'firstcall') {
          $model->whereNotNull('phone')
                ->where('flag_enquire_status', 0)
                ->where('phone', '<>', '0');
        }

        if ($table == 'letter-enquire') {
          $model->whereNull('phone')
                ->where('letter_status', 1);
        }

        if ($table == 'secondcall') {
          $model->where('flag_enquire_status', 1)
                ->where('flag_camp_status', 1)
                ->where('patient_attend_camp', 1);
        }

        if ($table == 'unwilling-patients') {
          $model->where('flag_enquire_status', 1)
                ->where('flag_camp_status', 0)
                ->where('patient_attend_camp', 0);
        }

        if ($query->has('search_by')) {
          if ($query->search_by != '') {
                [$column, $value] = explode(':', $query->search_by);
                if (in_array($column, $columns)) {
                    $model->where($column, 'like', $value . '%');
                }
            }
        }

        if ($table == 'letter') {
          $model->whereNull('phone')
                ->where('letter_status', 0)
                ->orWhere('phone', '=', '0');
        }


        return $model->orderBy('id', 'desc')->paginate(10);
  }
}
