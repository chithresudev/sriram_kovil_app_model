<form action="{{ route('patient.update', ['patient' => $patient,
    'page' => 'parent-info' ]) }}" method="post">
    @csrf

    @if ($page == 'father')
    @include('form.sibling_info')
    @endif


    <div class="title badge orange"><i class="material-icons">group_add</i> {{ ucfirst($page) }}'s details </div>
    <div class="form-row custom-padding">
        <div class="form-group pr-4 col-md-6">
            <label class="control-label">{{ ucfirst($page) }}'s name </label>
            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" maxlength="60" value="{{ old('name', optional($patient->$page)->name) }}">
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group pl-4  col-md-6">
            <label for="status">Status </label>
            <div class="row">
                <div class="col-md-6">
                    @php
                    if(!is_null(optional($patient->$page)->status))
                    {
                    if(optional($patient->$page)->status != 'null'){
                    $status = json_decode(optional($patient->$page)->status);
                    } else{
                    $status = array(-1);
                    }
                    } else{
                    $status = array(-1);
                    }
                    @endphp
                    <div class="segmented-control text-blue ">
                        <input type="checkbox" name="status[]" value="0" id="status_1" {{  (in_array(0, $status)) ? 'checked' : '' }}>
                        <label for="status_1" data-value="Separated">Separated</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="segmented-control text-blue">
                        <input type="checkbox" name="status[]" value="1" id="status_2" {{  (in_array(1, $status)) ? 'checked' : '' }}>
                        <label for="status_2" data-value="Deceased">Deceased</label>

                        @if ($errors->has('status'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-row custom-padding">
        <div class="form-group  pr-4 col-md-6">
            <label class="control-label">{{ ucfirst($page) }}'s age</label>
            <input type="text" name="age" id="age" class="form-control" value="{{ old('age', optional($patient->$page)->age) }}">
        </div>

        <div class="form-group pl-4 col-md-6">
            <label class="control-label">{{ ucfirst($page) }}'s phone no. </label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', optional($patient->$page)->phone) }}">
        </div>
    </div>

    @include('form.parent_form')

    <div class="form-row custom-padding">
        <div class="form-group pr-4 col-md-6">
            <label for="father_month_income">{{ ucfirst($page) }}'s Monthly Income</label>
            <input type="number" id="month" name="month_income" value="{{ old('month_income', optional($patient->$page)->income /12) }}" class="form-control">
        </div>

        <div class="form-group pl-4  col-md-6">
            <label for="father_income">{{ ucfirst($page) }}'s Annual Income</label>
            <input type="number" name="income" id="year" value="{{ old('income',  optional($patient->$page)->income) }}" class="form-control" min="1" maxlength="10" />
        </div>
    </div>


   <!-- Each page Direct next Page with type include -->


    <!-- Father page -->
    @if ($page == 'father')
    <button type="submit" name="parent_type" value="mother" class="btn btn-primary float-right">Next</button>
    <input type="hidden" name="type" value="father">
    <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'temp']) }}" class="btn btn-primary float-left">Previous</a>

   <!-- Mother page -->

    @elseif ($page == 'mother')

      @php
        $marital = $patient->marital_status == 'no' || $patient->marital_status == 'single' ? 'guardian' : 'spouse';

      @endphp

    <button type="submit" name="parent_type" value="{{ $marital }}" class="btn btn-primary float-right">Next</button>
    <input type="hidden" name="type" value="mother">
    <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'father']) }}" class="btn btn-primary float-left">Previous</a>

    <!-- spouse page -->
    @elseif ($page == 'spouse')
    <button type="submit" name="parent_type" value="guardian" class="btn btn-primary float-right">Next</button>
    <input type="hidden" name="type" value="spouse">
    <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'mother']) }}" class="btn btn-primary float-left">Previous</a>

     <!-- guardian page -->
    @elseif ($page == 'guardian')
      @php
        $marital = $patient->marital_status == 'no' || $patient->marital_status == 'single' ? 'mother' : 'spouse';
      @endphp

    <button type="submit" name="parent_type" value="history-info" class="btn btn-primary float-right">Next</button>
    <input type="hidden" name="type" value="guardian">
    <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => $marital ]) }}" class="btn btn-primary float-left">Previous</a>
    @endif
</form>
