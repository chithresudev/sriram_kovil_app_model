
<form action="{{ route('patient.update', ['patient' => $patient,
    'page' => 'history-info' ]) }}" method="post">
    @csrf
    <div class="title badge orange"><i class="material-icons">group_add</i> {{ str_before(ucfirst($page) , '-') }}</div>
    <div class="form-row custom-padding">
        <div class="form-group  pr-4 col-md-6">
            <label class="control-label">What age did the child walk?</label><br>
            <input type="tel" class="form-control" id="child_walk" name="child_walk" maxlength="2" steps="0.1">
            @if ($errors->has('child_walk'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('child_walk') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group pl-4  col-md-6">
            <label for="first_symptom_enquire">What was the first symptoms noted</label>
            <select class="custom-select" name="first_symptom_enquire" id="first_symptom_enquire">
                <option selected disabled>Please select</option>
                <option value="frequent">Frequent fall</option>
                <option value="gower">Gower's</option>
                <option value="toe">Toe walking</option>
                <option value="waddling">Waddling gait</option>
                <option value="stairs">Difficulty in climbling stairs</option>
                <option value="calf">Calf muscle hypertrophy</option>
            </select>
        </div>
    </div>
    <div class="form-row custom-padding ">
      <div class="title badge orange"><i class="material-icons">group_add</i> Medical investigations</div>
        <div class="form-group  col-md-12 pt-5">
            <label>Quick 7 Questions</label>
            <div class="row">
                <div class="col-md-3">
                    <div class="segmented-control text-blue ">
                        <input type="checkbox" name="enquire_questions[]" value="1" id="enquire_questions_1">
                        <label for="enquire_questions_1" data-value="Frequent fall">Frequent fall</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="segmented-control text-blue ">
                        <input type="checkbox" name="enquire_questions[]" value="2" id="enquire_questions_2">
                        <label for="enquire_questions_2" data-value="Gower's">Gower's</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="segmented-control text-blue ">
                        <input type="checkbox" name="enquire_questions[]" value="3" id="enquire_questions_3">
                        <label for="enquire_questions_3" data-value="Toe walking">Toe walking</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="segmented-control text-blue ">
                        <input type="checkbox" name="enquire_questions[]" value="4" id="enquire_questions_4">
                        <label for="enquire_questions_4" data-value="Waddling gait">Waddling gait</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="segmented-control text-blue ">
                                <input type="checkbox" name="enquire_questions[]" value="5" id="enquire_questions_5">
                                <label for="enquire_questions_5" data-value="Difficulty in climbling stairs"> Difficulty in climbling stairs</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="segmented-control text-blue ">
                                <input type="checkbox" name="enquire_questions[]" value="6" id="enquire_questions_6">
                                <label for="enquire_questions_6" data-value="Calf muscle hypertrophy"> Calf muscle hypertrophy</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="segmented-control text-blue ">
                                <input type="checkbox" name="enquire_questions[]" value="7" id="check_box">
                                <label for="check_box" data-value="Any death with similar symtoms in family"> Any death with similar symtoms in family</label>
                            </div>

                            <div class="custom-padding {{ $errors->has('enquire_died_family') ? 'd-block' : '' }}" id="check_box_show">
                            <label for="enquire_died_family">Reason *</label>
                            <input type="text" class="form-control{{ $errors->has('enquire_died_family') ? ' is-invalid' : '' }}" id="enquire_died_family" name="enquire_died_family">
                            @if ($errors->has('enquire_died_family'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('enquire_died_family') }}</strong>
                            </span>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($patient->secondcall_status == 0)
      @include('form.camp_eligible')
    @endif

        <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'guardian']) }}" class="btn btn-primary float-left">Previous</a>
        <button type="submit" class="btn btn-orange float-right">Submit</button>
</form>
