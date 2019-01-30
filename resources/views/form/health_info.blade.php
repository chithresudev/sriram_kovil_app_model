
<form class="" action="{{ route('patient.update', ['patient' => $patient, 'page' => 'health-info' ]) }}" method="post">
    @csrf
<div class="title badge orange"><i class="material-icons">group_add</i> Patient Health Details</div>
    <div class="form-row custom-padding">
        <div class="form-group  pr-4 col-md-6">
            <label for="ambulant_status">Ambulation status </label>
            <select id="ambulation_status" name="ambulation_status" class="custom-select">
                <option selected disabled>Please select</option>
                <option {{ old('ambulation_status', $patient->ambulation_status) == "1" ? 'selected' : '' }} value="1">Ambulant</option>
                <option {{ old('ambulation_status', $patient->ambulation_status) == "2" ? 'selected' : '' }} value="2">Semi ambulant</option>
                <option {{ old('ambulation_status', $patient->ambulation_status) == "3" ? 'selected' : '' }} value="3">Non ambulant</option>
            </select>

            <div class="custom-padding {{ $errors->has('lost_of_ambulation') ? 'd-block' : '' }}" id="non_ambulant_yes">
                <label class="control-label">Age at loss of ambulation <span class="custom-required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('lost_of_ambulation') ? ' is-invalid' : '' }}"
                  name="lost_of_ambulation"
                  value="{{  old('lost_of_ambulation', $patient->lost_of_ambulation) }}"
                  maxlength="4" id="lost_of_ambulation">
                @if ($errors->has('lost_of_ambulation'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lost_of_ambulation') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group  pl-4 col-md-6">
            <label for="demographic_status">Demographic details</label>
            <select name="demographic_status" id="demographic_status" class="custom-select dropdown">
                <option  disabled>Please select</option>
                <option {{ old('demographic_status', $patient->demographic_status) == 'urban' ? 'selected' : '' }} value="urban">Urban</option>
                <option {{ old('demographic_status', $patient->demographic_status)== 'rural' ? 'selected' : '' }} value="rural">Rural</option>
            </select>
        </div>
    </div>

    <div class="form-row custom-padding">
        <div class="form-group pr-4 col-md-6">
            <label for="education"> Patient's eductational status</label>
            <select id="education" name="patient_education" class="custom-select">
            <option value="" disabled>Please select</option>
            <option {{ old('patient_education', $patient->patient_education) == 'uneducated' ? 'selected': '' }} value="uneducated">Uneducated</option>
            <option {{ old('patient_education', $patient->patient_education) == 'primary' ? 'selected ': '' }} value="primary">Primary</option>
            <option {{ old('patient_education', $patient->patient_education) == 'middle' ? 'selected ': '' }} value="middle">Middle</option>
            <option {{ old('patient_education', $patient->patient_education) == 'high' ? 'selected ': '' }} value="high">High school</option>
            <option {{ old('patient_education', $patient->patient_education) == 'higher' ? 'selected ': '' }} value="higher">Higher secondary school</option>
            <option {{ old('patient_education', $patient->patient_education) == 'ug' ? 'selected ': '' }} value="ug">UG</option>
            <option {{ old('patient_education', $patient->patient_education) == 'pg' ? 'selected ': '' }} value="pg">PG</option>
            <option {{ old('patient_education', $patient->patient_education) == 'vocational' ? 'selected ': '' }} value="vocational">Vocational</option>
            <option {{ old('patient_education', $patient->patient_education) == 'diploma' ? 'selected ': '' }} value="diploma">Diploma</option>
            <option {{ old('patient_education', $patient->patient_education) == 'discontinued' ? 'selected ': '' }} value="discontinued">Discontinued</option>
            <option {{ old('patient_education', $patient->patient_education) == 'other' ? 'selected ': '' }} value="other">Other</option>
            </select>

            <div class="custom-padding {{ $errors->has('patient_discon_reason') ? 'd-block' : '' }}" id="patient_discon">
                <label for="patient_discon_reason">Discontinued details <span class="custom-required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('patient_discon_reason') ? ' is-invalid' : '' }}" name="patient_discon_reason" id="patient_discon_reason"
                value="{{ old('patient_discon_reason' , $patient->patient_discon_reason)  }}" maxlength="60" value="">
                @if ($errors->has('patient_discon_reason'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('patient_discon_reason') }}</strong>
                </span>
                @endif
            </div>

            <div class="custom-padding {{ $errors->has('patient_edu_other') ? 'd-block' : '' }}" id="patient_education">
                <label for="patient_edu_other">Other education <span class="custom-required">*</span></label>
                <input type="text" class="form-control{{ $errors->has('patient_edu_other') ? ' is-invalid' : '' }}" value ="{{ old('patient_edu_other', $patient->patient_edu_other) }}" name="patient_edu_other" id="patient_edu_other" maxlength="60">
                @if ($errors->has('patient_edu_other'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('patient_edu_other') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group pl-4 col-md-6">
            <label for="name">Patient's Occupation</label>
            <select id="patient_occupation" name="patient_occupation" class="custom-select">
          <option value="" selected disabled>Please Select</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'coolie' ? 'selected' : '' }} value="coolie">Coolie</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'farmer' ? 'selected' : '' }} value="farmer">Farmer</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'business' ? 'selected' : '' }} value="business">Business</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'teacher' ? 'selected' : '' }} value="teacher">Teacher</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'odd' ? 'selected' : '' }}value="odd">Odd job</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'self' ? 'selected' : '' }} value="self">Self employed</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'driver' ? 'selected' : '' }} value="driver">Driver</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'police' ? 'selected' : '' }} value="police">Police</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'private' ? 'selected' : '' }} value="private">Private jobs</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'govt' ? 'selected' : '' }} value="govt">Government employee</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'media' ? 'selected' : '' }} value="media">Media person</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'artist' ? 'selected' : '' }} value="artist">Artist</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'unemployee' ? 'selected' : '' }} value="unemployee">Unemployed</option>
          <option {{ old('patient_occupation', $patient->patient_occupation) == 'others' ? 'selected' : '' }} value="others">Other</option>
            </select>

          <div class="custom-padding {{ $errors->has('patient_job_other') ? ' d-block' : '' }}" id="patient_job">
              <label for="name">Patient's job details <span class="custom-required">*</span> </label>
              <input type="text" class="form-control{{ $errors->has('patient_job_other') ? ' is-invalid' : '' }}" name="patient_job_other" maxlength="60" id="patient_job_other" value="{{ old('patient_job_other', $patient->patient_job_other) }}">
              @if ($errors->has('patient_job_other'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('patient_job_other') }}</strong>
              </span>
              @endif
          </div>

        </div>
    </div>

    <div class="form-row custom-padding">
        <div class="form-group pr-4 col-md-6">
            <label for="name">Patient's monthly income</label>
            <input type="number"  id="month" name="month_income" value="{{ old('month_income', $patient->patient_income /12) }}" class="form-control">
        </div>

        <div class="form-group pl-4  col-md-6">
            <label for="name">Patient's annual income</label>
            <input type="number" name="patient_income" id="year" value="{{ old('patient_income', $patient->patient_income) }}" class="form-control" min="1" maxlength="10" />
        </div>
    </div>

    <div class="form-row custom-padding">
        <div class="form-group  pr-4 col-md-6">
            <label for="healthy">Health Status</label>
            <div class="segmented-control text-blue">
                <input type="radio" name="patient_health_status" id="healthy" value="1" {{ old('patient_health_status', $patient->patient_health_status) == 1 ? 'checked' : '' }}>
                <input type="radio" name="patient_health_status" id="not_healthy" value="2" {{ old('patient_health_status', $patient->patient_health_status) == 2 ? 'checked' : '' }}>
                <input type="radio" name="patient_health_status" id="deceased" value="3" {{ old('patient_health_status', $patient->patient_health_status) == 3 ? 'checked' : '' }}>
                <label for="healthy" data-value="Healthy">Healthy</label>
                <label for="not_healthy" data-value="Not-Healthy">Not-Healthy</label>
                <label for="deceased" data-value="Deceased">Deceased</label>
            </div>

            <div class="custom-padding
            {{ $errors->has('patient_decease_details') ? 'd-block' : '' }}" id="deceased_detail">
                <label for="name">Patient's decease details
                    <span class="custom-required">*</span>
                </label>
                <input type="text" class="form-control{{ $errors->has('patient_decease_details') ? ' is-invalid' : '' }}" name="patient_decease_details" value="{{ old('patient_decease_details', $patient->patient_decease_details) }}" maxlength="60" id="patient_decease_details">
                @if ($errors->has('patient_decease_details'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('patient_decease_details') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group pl-4  col-md-6">
            <label for="name"> Marital status <span class="custom-required">*</span></label>
            <select name="marital_status" id="marital_status" class="custom-select{{ $errors->has('marital_status') ? ' is-invalid' : '' }}">
                <option  selected disabled>Please select</option>
                <option {{ old('marital_status', $patient->marital_status) == "no" ? 'selected' : '' }} value="no">Not applicable</option>
                <option {{ old('marital_status', $patient->marital_status) == "single" ? 'selected' : '' }} value="single">Single</option>
                <option {{ old('marital_status', $patient->marital_status) == "married" ? 'selected' : '' }} value="married">Married</option>
                <option {{ old('marital_status', $patient->marital_status) == "separated" ? 'selected' : '' }} value="separated">Separated</option>
                <option {{ old('marital_status', $patient->marital_status) == "multiple" ? 'selected' : '' }} value="multiple">Multiple</option>
            </select>

            @if ($errors->has('marital_status'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('marital_status') }}</strong>
            </span>
            @endif

            <div class="custom-padding {{ $errors->has('no_of_male') ||  $errors->has('no_of_female') ? 'd-block' : '' }}" id="gender">
                <label>Male<span class="custom-required">*</span></label>
                <input type="tel" class="form-control{{ $errors->has('no_of_male') ? ' is-invalid' : '' }}" name="no_of_male" id="no_of_male" min="0" value="{{ old('no_of_male', $patient->no_of_male) }} " maxlength="2">
                @if ($errors->has('no_of_male'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('no_of_male') }}</strong>
                </span>
                @endif

                <br>
                <label>Female <span class="custom-required">*</span></label>
                <input type="tel" class="form-control{{ $errors->has('no_of_female') ? ' is-invalid' : '' }}" name="no_of_female" id="no_of_female" min="0" value="{{ old('no_of_female', $patient->no_of_female) }}" maxlength="2">
                @if ($errors->has('no_of_female'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('no_of_female') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <br />
    <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'basic-info']) }}" class="btn btn-primary float-left">Previous</a>
    <button type="submit" name="address_type" value="permanent" class="btn btn-primary float-right">Next</button>
</form>
