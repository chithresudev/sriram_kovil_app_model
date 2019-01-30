
<div class="title badge orange"><i class="material-icons">group_add</i>Sibling Details</div>
<div class="form-row custom-padding">
    <div class="form-group pr-4 col-md-3">
        <label class="control-label" for="no_of_male_sibling">No. of brothers </label>
        <input type="tel" class="form-control{{ $errors->has('no_of_male_sibling') ? ' is-invalid' : '' }}" name="no_of_male_sibling" id="no_of_male_sibling" maxlength="2"  value="{{  old('no_of_male_sibling', $patient->sibling_affected_male) }}">
        @if ($errors->has('no_of_male_sibling'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('no_of_male_sibling') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group pl-4 col-md-3">
        <label class="control-label" for="no_of_female_sibling">No. of sisters  </label>
        <input type="tel" class="form-control numbersOnly" name="no_of_male_sibling" id="no_of_female_sibling" maxlength="2"  value="{{ old('no_of_male_sibling', $patient->sibling_expired_male) }}">
        @if ($errors->has('no_of_female_sibling'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('no_of_female_sibling') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-row custom-padding">
    <div class="form-group  pr-4 col-md-3">
        <label class="control-label" for="sibling_affected_male">Affected brothers  </label>
        <input type="tel" class="form-control" name="sibling_affected_male" id="sibling_affected_male" maxlength="2" value="{{ old('sibling_affected_male', $patient->sibling_affected_male )}}">
        @if ($errors->has('sibling_affected_male'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sibling_affected_male') }}</strong>
        </span>
        @endif

        <div class="custom-padding
        {{ old('affected_male_details', $errors->has('affected_male_details')) ? 'd-block' : '' }}"  id="sibling_details_1">
            <label class="control-label" for="affected_male_details">Details <span class="custom-required">*</span> </label>
            <input type="text" class="form-control{{ $errors->has('affected_male_details') ? ' is-invalid' : '' }}" id="affected_male_details" maxlength="50" name="affected_male_details" value = "{{ old('affected_male_details') }}">
            @if ($errors->has('affected_male_details'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('affected_male_details') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group pl-4  col-md-3">
        <label class="control-label" for="sibling_expired_male">Expired brothers  </label>
        <input type="tel" class="form-control numbersOnly" name="sibling_expired_male" id="sibling_expired_male" maxlength="2"  value="{{ old('sibling_expired_male', $patient->sibling_expired_male) }}">
        @if ($errors->has('sibling_expired_male'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sibling_expired_male') }}</strong>
        </span>
        @endif
        <div class="custom-padding {{ old('expired_male_details', $errors->first('expired_male_details')) ? 'd-block' : '' }} " id="sibling_details_2">
            <label class="control-label" for="expired_male_details">Details <span class="custom-required">*</span> </label>
            <input type="text" class="form-control{{ $errors->has('expired_male_details') ? ' is-invalid' : '' }}" id="expired_male_details" maxlength="50" name="expired_male_details"
            value = "{{ old('expired_male_details') }}">
            @if ($errors->has('expired_male_details'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('expired_male_details') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group pl-4 col-md-3">
        <label class="control-label" for="sibling_affected_female">Affected sisters  </label>
        <input type="tel" class="form-control numbersOnly" name="sibling_affected_female" id="sibling_affected_female" maxlength="2" value={{ old('sibling_affected_female', $patient->sibling_affected_female) }}>
        @if ($errors->has('sibling_affected_female'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sibling_affected_female') }}</strong>
        </span>
        @endif
        <div class="custom-padding {{ old('affected_female_details', $errors->first('affected_female_details')) ? 'd-block' : '' }}" id="sibling_details_3">
            <label class="control-label" for="affected_female_details">Details <span class="custom-required">*</span> </label>
            <input type="text" class="form-control{{ $errors->has('affected_female_details') ? ' is-invalid' : '' }}" id="affected_female_details" maxlength="50" name="affected_female_details" value="{{ old('affected_female_details') }}">
            @if ($errors->has('affected_female_details'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('affected_female_details') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group pl-4  col-md-3">
        <label class="control-label" for="no_of_male_sibling">Expired sisters   </label>
        <input type="tel" class="form-control numbersOnly" name="sibling_expired_female" id="sibling_expired_female" maxlength="2"  value={{ old('sibling_expired_female', $patient->sibling_expired_female) }} >
        @if ($errors->has('sibling_expired_female'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('sibling_expired_female') }}</strong>
        </span>
        @endif
        <div class="custom-padding {{ old('expired_female_details', $errors->first('expired_female_details')) ? 'd-block' : '' }}" id="sibling_details_4">
            <label class="control-label" for="expired_female_details">Details <span class="custom-required">*</span> </label>
            <input type="text" class="form-control{{ $errors->has('expired_female_details') ? ' is-invalid' : '' }}" id="expired_female_details" maxlength="50" name="expired_female_details" value="{{ old('expired_female_details') }}">
            @if ($errors->has('expired_female_details'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('expired_female_details') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
