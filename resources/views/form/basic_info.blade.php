
<form action="{{ route('patient.update', ['patient' => $patient, 'page' => 'basic-info']) }}"
    method="post">

@csrf
  @if ($patient->secondcall_status == 1)
    @include('form.camp_second_eligible')
  @endif

<div class="title badge orange"><i class="material-icons">group_add
  </i>Patient Details</div>
    <div class="form-row custom-padding">
        <div class="form-group pr-4  col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name"  name="name" value="{{ old('name', $patient->name) }}"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">

            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group pl-4  col-md-6">
            <label for="gender">Gender </label>
            <div class="segmented-control text-blue">
                <input type="radio" name="gender" value="male"
                  id="gender-1" {{ old('gender', $patient->gender) == 'male' ?  'checked' : '' }}>
                <input type="radio" name="gender" value="female"
                  id="gender-2" {{ old('gender', $patient->gender) == 'female' ?  'checked' : '' }}>
                <label for="gender-1" data-value="Male">Male</label>
                <label for="gender-2" data-value="Female">Female</label>
                @if ($errors->has('gender'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    <div class="form-row custom-padding">
        <div class="form-group  pr-4 col-md-6">
            <label for="dob">DOB</label>
            <input type="date" name="dob"
            class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}"
              name="dob" id="dob" value="{{ old('dob', $patient->dob) }}">

            @if ($errors->has('dob'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('dob') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group pl-4 col-md-6">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" id="age"
              value="{{ old('age', $patient->age) }}" readonly>
        </div>
    </div>

    <div class="form-row custom-padding">

        <div class="form-group  pr-4 col-md-6">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="check_box"
                  name="actual_dob_check" {{ $errors->has('actual_dob') ? ' checked' : '' }}
                    value="1" {{ old('actual_dob_check', $patient->actual_dob) ? 'checked' : '' }}>
                <label class="form-check-label" for="check_box">
                    Not Actual DOB</label>
            </div>

            <div id="check_box_show">
                <label for="actual_dob"></label>
                <input type="date" name="actual_dob"
                  class="form-control{{ $errors->has('actual_dob') ? ' is-invalid' : '' }}"
                    id="actual_dob" value="{{ old('actual_dob', $patient->actual_dob) }}">
                @if ($errors->has('actual_dob'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('actual_dob') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Disability-->
    <div class="form-row custom-padding">
        <div class="form-group pr-4 col-md-6">
            <label for="gender">Disability card no.</label>
            <div class="segmented-control text-blue">
                <input type="radio" name="disability_available_status" id="disability_available"
                  value="1" {{ old('disability_available_status' ,$patient->disability_available_status) == 1 ? 'checked' : 'checked' }}>
                <input type="radio" name="disability_available_status" id="disability_applied"
                  value="2" {{ old('disability_available_status' ,$patient->disability_available_status) == 2 ? 'checked' : '' }}>
                <input type="radio" name="disability_available_status" id="disability_notapplied"
                  value="3" {{ old('disability_available_status' ,$patient->disability_available_status) == 3 ? 'checked' : '' }}>
                <label for="disability_available" data-value="Available">Available</label>
                <label for="disability_applied" data-value="Applied">Applied</label>
                <label for="disability_notapplied" data-value="Not Applied">Not Applied</label>
            </div>

            <!-- Disability Available -->
            <div class="custom-padding" id="disability_status">
                <label for="disability_status">Status <span class="custom-required">*</span></label>
                <div class="segmented-control text-blue">
                    <input type="radio" name="disability_no_status" id="disability_in_hand"
                      value="1" {{ old('disability_no_status', $patient->disability_no_status) == 1 ? 'checked' : '' }}>
                    <input type="radio" name="disability_no_status" id="disability_call"
                      value="2" {{ old('disability_no_status', $patient->disability_no_status) == 2 ? 'checked' : '' }}>
                    <label for="disability_in_hand" data-value="In Hand">In Hand</label>
                    <label for="disability_call" data-value="Call and Check">Call and Check</label>
                </div>
            </div>

            <!-- Status In Hand -->
            <div class="custom-padding" id="disability_no_status">
                <label for="disability_no">Disability no. <span class="custom-required">*</span>
                    (Format : MD/TVL/326501)</label>
                <input type="text" name="disability_no"
                  class="form-control{{ $errors->has('disability_no') ? ' is-invalid' : '' }}"
                    id="disability_no" maxlength="60" value="{{ old('disability_no', $patient->disability_no) }}">
                @if ($errors->has('disability_no'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('disability_no') }}</strong>
                </span>
                @endif
            </div>

        </div>

        <div class="form-group pl-4  col-md-6">
            <label for="gender">Aadhar Card no.</label>
            <div class="segmented-control text-blue">
                <input type="radio" name="aadhar_available_status" id="aadhar_available"
                  value="1" {{ old('aadhar_available_status', $patient->aadhar_available_status) == 1 ? 'checked' : '' }}>
                <input type="radio" name="aadhar_available_status" id="aadhar_applied"
                  value="2" {{ old('aadhar_available_status', $patient->aadhar_available_status) == 2 ? 'checked' : '' }}>
                <input type="radio" name="aadhar_available_status" id="aadhar_notapplied"
                  value="3" {{ old('aadhar_available_status', $patient->aadhar_available_status) == 3 ? 'checked' : '' }}>
                <label for="aadhar_available" data-value="Available">Available</label>
                <label for="aadhar_applied" data-value="Applied">Applied</label>
                <label for="aadhar_notapplied" data-value="Not Applied">Not Applied</label>
            </div>

            <div class="custom-padding" id="aadhar_status">
                <label for="aadhar_status">Status <span class="custom-required">*</span></label>
                <div class="segmented-control text-blue">
                    <input type="radio" name="aadhar_status" id="aadhar_in_hand"
                      value="1" {{ old('aadhar_status', $patient->aadhar_status) == 1 ? 'checked' : '' }}>
                    <input type="radio" name="aadhar_status" id="aadhar_call"
                      value="2" {{ old('aadhar_status', $patient->aadhar_status) == 2 ? 'checked' : '' }}>
                    <label for="aadhar_in_hand" data-value="In Hand">In Hand</label>
                    <label for="aadhar_call" data-value="Call and Check">Call and Check</label>
                </div>
            </div>

            <!-- aadhar Status In Hand -->
            <div class="custom-padding" id="aadhar_no">
                <label for="inputName">Aadhar no <span class="custom-required">*</span></label>
                <input type="text" name="aadhar_no" value="{{ old('aadhar_no', $patient->aadhar_no) }}"
                  class="form-control{{ $errors->has('aadhar_no') ? ' is-invalid' : '' }}" >
                @if ($errors->has('aadhar_no'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('aadhar_no') }}</strong>
                </span>
                @endif
            </div>

            <!-- Aadhar Applied -->
            <div class="custom-padding" id="reference_no">
                <label for="inputName">Reference no .<span class="custom-required">*</span></label>
                <input type="text" name="aadhar_refer_no" value="{{ old('aadhar_refer_no', $patient->aadhar_refer_no) }}"
                  class="form-control{{ $errors->has('aadhar_refer_no') ? ' is-invalid' : '' }}" >
                @if ($errors->has('aadhar_refer_no'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('aadhar_refer_no') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right">Next</button>
</form>
