
<div class="form-row custom-padding">
      <div class="form-group  pr-4 col-md-6">
      <label for="education">{{ ucfirst($page) }}'s education</label>
        <select name="education" id="parent_education" class="custom-select">
        <option selected disabled>Please select</option>
        <option {{ old('education', optional($patient->$page)->education) == '' ? 'selected' : 'uneducated' }} value="uneducated">Uneducated</option>
        <option {{ old('education', optional($patient->$page)->education) == 'primary' ? 'selected' : '' }} value="primary">Primary</option>
        <option {{ old('education', optional($patient->$page)->education) == 'middle' ? 'selected' : '' }} value="middle">Middle</option>
        <option {{ old('education', optional($patient->$page)->education) == 'high' ? 'selected' : '' }} value="high">High school</option>
        <option {{ old('education', optional($patient->$page)->education) == 'higher' ? 'selected' : '' }} value="higher">Higher secondary school</option>
        <option {{ old('education', optional($patient->$page)->education) == 'ug' ? 'selected' : '' }} value="ug">UG</option>
        <option {{old('education', optional($patient->$page)->education) == 'pg' ? 'selected' : '' }} value="pg">PG</option>
        <option {{ old('education', optional($patient->$page)->education) == 'discontinued' ? 'selected' : '' }} value="discontinued">Discontinued</option>
        <option {{ old('education', optional($patient->$page)->education) == 'vocational' ? 'selected' : '' }} value="vocational">Vocational</option>
        <option {{ old('education', optional($patient->$page)->education) == 'diploma' ? 'selected' : '' }} value="diploma">Diploma</option>
        <option {{ old('education', optional($patient->$page)->education) == 'other' ? 'selected' : '' }} value="other">Other</option>
    </select>
        <div class="custom-padding {{ $errors->has('edu_other') ? 'd-block' : '' }}" id="edu_other">
       <label class="control-label">{{ ucfirst($page) }}'s education details <span class="custom-required">*</span></label>
       <input type="text" name="edu_other"class="form-control{{ $errors->has('edu_other') ? ' is-invalid' : '' }}" value="{{ optional($patient->$page)->edu_other }}">
       @if ($errors->has('edu_other'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('edu_other') }}</strong>
       </span>
       @endif
       </div>
  </div>

  <div class="form-group pl-4 col-md-6">
      <label for="occupation">{{ ucfirst($page) }}'s occupation</label>
      <select id="parent_occupation" name="occupation" class="custom-select">
          <option selected disabled>Please select</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'coolie' ? 'selected' : ' '  }}  value="coolie">Coolie</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'farmer' ? 'selected' : ' '  }}  value="farmer">Farmer</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'business' ? 'selected' : ' '  }}  value="business">Business</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'teacher' ? 'selected' : ' '  }}  value="teacher">Teacher</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'odd' ? 'selected' : ' '  }}  value="odd">Odd job</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'self' ? 'selected' : ' '  }}  value="self">Self employed</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'driver' ? 'selected' : ' '  }}  value="driver">Driver</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'police' ? 'selected' : ' '  }}  value="police">Police</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'private' ? 'selected' : ' '  }}  value="private">Private jobs</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'govt' ? 'selected' : ' '  }}  value="govt">Government employee</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'media' ? 'selected' : ' '  }}  value="media">Media person</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'artist' ? 'selected' : ' '  }}  value="artist">Artist</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'unemployee' ? 'selected' : ' '  }}  value="unemployee">Unemployed</option>
          <option {{ old('occupation', optional($patient->$page)->occupation) == 'other' ? 'selected' : ' '  }}  value="other">Other</option>
      </select>
      <div class="custom-padding {{ $errors->has('job_other') ? 'd-block' : '' }}" id ="job_other">
      <label class="control-label">{{ ucfirst($page) }}'s job details <span class="custom-required">*</span></label>
      <input type="text" name="job_other" class="form-control{{ $errors->has('job_other') ? ' is-invalid' : '' }}" value="{{ old('job_other', optional($patient->$page)->job_other) }}">
      @if ($errors->has('job_other'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('job_other') }}</strong>
      </span>
      @endif
      </div>
  </div>
</div>
