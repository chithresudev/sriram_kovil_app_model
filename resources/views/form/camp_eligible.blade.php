<div class="form-row custom-padding">
    <div class="form-group pl-4 pr-4 col-md-6">
        <label for="flag_camp_status">Eligible for camp </label>
        <div class="segmented-control text-blue">
            <input type="radio" name="flag_camp_status" value="1"
            id="flag_camp_status_1"{{ old('flag_camp_status',
              $patient->flag_camp_status) == 1 ? 'checked' : '' }}>
            <input type="radio" name="flag_camp_status" value="0"
            id="flag_camp_status_2"{{ old('flag_camp_status',
              $patient->flag_camp_status) == 0 ? 'checked' : '' }}>
            <label for="flag_camp_status_1" data-value="Yes">Yes</label>
            <label for="flag_camp_status_2" data-value="No">No</label>
            @if ($errors->has('flag_camp_status'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('flag_camp_status') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group pl-4 pr-4 col-md-6" id="select_camp">
        <label for="camp_id">Select Camp <span class="custom-required">*</span> </label>
           <select class="custom-select{{ $errors->has('camp_id') ? ' is-invalid' : '' }} dropdown" name="camp_id" id="camp_id">
               <option selected disabled>Please select Camp</option>
               <option value="{{ $patient->district->camp->id }}">
                 {{ $patient->district->camp->camp_date }} - {{ $patient->district->camp->district->district }}
               </option>
           </select>
           @if ($errors->has('camp_id'))
           <span class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('camp_id') }}</strong>
           </span>
           @endif
       </div>
    </div>

<div class="form-row custom-padding">
    <div class="form-group pl-4 pr-4 col-md-6">
        <label for="patient_attend_camp">Patient is willing to attend the camp?
          <span class="custom-required">*</span></label>
        <div class="segmented-control text-blue">
            <input type="radio" name="patient_attend_camp"  value="1"
            id="patient_attend_camp_1" {{ old('patient_attend_camp',
                $patient->patient_attend_camp) == '1' ? 'checked' : ''  }}>
            <input type="radio" name="patient_attend_camp" value="0"
            id="patient_attend_camp_2" {{ old('patient_attend_camp',
                $patient->patient_attend_camp) == '0' ? 'checked' : ''  }}>
            <label for="patient_attend_camp_1" data-value="Yes">Yes</label>
            <label for="patient_attend_camp_2" data-value="No">No</label>
        </div>
        @if ($errors->has('patient_attend_camp'))
        <span class="text-danger" role="alert">
            <strong>{{ $errors->first('patient_attend_camp') }}</strong>
        </span>
        @endif
    </div>
</div>

  <div  id="no_attend_reason" class="form-row custom-padding {{ $errors->has('patient_notattend_details') ? 'd-block' : ''}}">
    <div class="form-group pl-4 pr-4 col-md-6">
        <label for="patient_notattend_details">If No, Reason
          <span class="custom-required">*</span></label>
        <input type="text" class="form-control{{ $errors->has('patient_notattend_details') ? ' is-invalid' : '' }}"
        id="patient_notattend_details" name="patient_notattend_details" value="{{ old('patient_attend_camp', $patient->patient_notattend_details) }}">
        @if ($errors->has('patient_notattend_details'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('patient_notattend_details') }}</strong>
        </span>
        @endif
    </div>
  </div>
  <input type="hidden" name="firstcall" value="1">
