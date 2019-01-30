<div class="form-row custom-padding">
    <div class="form-group pl-4 pr-4 col-md-6">
        <label for="flag_camp_status">Eligible for camp </label>
        <div class="segmented-control text-blue">
            <input type="radio" name="flag_camp_status" value="1" id="flag_camp_status_1" {{ ($patient->gender == '1') ?  'checked' : 'checked' }}>
            <input type="radio" name="flag_camp_status" value="0" id="flag_camp_status_2" {{ ($patient->gender == '0') ?  'checked' : '' }}>
            <label for="flag_camp_status_1" data-value="Yes">Yes</label>
            <label for="flag_camp_status_2" data-value="No">No</label>
            @if ($errors->has('gender'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group pl-4 pr-4 col-md-6" id="select_camp">
            <label for="camp_id">Select Camp </label>
            <select class="custom-select{{ $errors->has('camp_status') ? ' is-invalid' : '' }} dropdown" name="camp_status" id="camp_id">
                <option selected disabled>Please select Camp</option>
                <option value="{{ $patient->district->camp->id }}">{{ $patient->district->camp->camp_date }} // {{ $patient->district->camp->district->district }}</option>
            </select>
            @if ($errors->has('camp_status'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('camp_status') }}</strong>
            </span>
            @endif
        </div>
    </div>

<div class="form-row custom-padding">
    <div class="form-group pl-4 pr-4 col-md-6">
        <label for="patient_attend_camp">Patient is willing to attend the camp? </label>
        <div class="segmented-control text-blue">
            <input type="radio" name="patient_attend_camp" value="1" id="patient_attend_camp_1" {{ ($patient->gender == 'male') ?  'checked' : '' }}>
            <input type="radio" name="patient_attend_camp" value="0" id="patient_attend_camp_2" {{ ($patient->gender == 'female') ?  'checked' : '' }}>
            <label for="patient_attend_camp_1" data-value="Yes">Yes</label>
            <label for="patient_attend_camp_2" data-value="No">No</label>
            @if ($errors->has('patient_attend_camp'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('patient_attend_camp') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>

  <div class="form-row custom-padding" id="no_attend_reason">
    <div class="form-group pl-4 pr-4 col-md-6">
        <label for="patient_notattend_details">If No, Reason *</label>
        <input type="type" class="form-control{{ $errors->has('patient_notattend_details') ? ' is-invalid' : '' }}" id="patient_notattend_details" name="patient_notattend_details">
        @if ($errors->has('patient_notattend_details'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('patient_notattend_details') }}</strong>
        </span>
        @endif
    </div>
  </div>
