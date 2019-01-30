<form action="{{ route('patient.update', ['patient' => $patient,
    'page' => 'address-info' ]) }}" method="post">
    @csrf
  <div class="title badge orange"><i class="material-icons">group_add</i> Patient {{ ucfirst($page) }} Details</div>
    <div class="form-row custom-padding">
        <div class="form-group  pr-4 col-md-6">
            <label for="ambulant_status">{{ ucfirst($page) }} Phone Number </label>
            <input type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
              pattern="[1-9]{1}[0-9]{9}" maxlength="10" value="{{ $page == 'permanent' ? $patient->phone :  $patient->alternative_phone }}" id="phone">
            @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
        </div>
        @if ($page == 'permanent')
        <div class="form-group pl-4 col-md-6">
            <label for="demographic_status">{{ ucfirst($page) }} Relationship</label>
            <select class="custom-select" name="phone_relation" id="phone_relation">
                <option selected disabled>Please select</option>
                <option {{ $patient->phone_relation  == 'father' ? 'selected' : '' }} value="father">Father</option>
                <option {{ $patient->phone_relation  == 'mother' ? 'selected' : '' }} value="mother">Mother</option>
                <option {{ $patient->phone_relation  == 'wife' ? 'selected' : '' }} value="wife">Wife</option>
                <option {{ $patient->phone_relation  == 'husband' ? 'selected' : '' }} value="husband">Husband</option>
                <option {{ $patient->phone_relation  == 'grandparent' ? 'selected' : '' }} value="grandparent">Grandparent</option>
                <option {{ $patient->phone_relation  == 'friend' ? 'selected' : '' }} value="friend">Friend</option>
                <option {{ $patient->phone_relation  == 'neighbour' ? 'selected' : '' }} value="neighbour">Neighbour</option>
                <option {{ $patient->phone_relation  == 'sibling' ? 'selected' : '' }} value="sibling">Sibling</option>
                <option {{ $patient->phone_relation  == 'relative' ? 'selected' : '' }} value="relative">Relative</option>
                <option {{ $patient->phone_relation  == 'spl' ? 'selected' : '' }} value="spl">SPL Teacher</option>
                <option {{ $patient->phone_relation  == 'self' ? 'selected' : '' }} value="self">Self</option>
            </select>
        </div>
        @endif

        @if ($page == 'temp')

        <div class="form-group pl-4 col-md-6">
            <label for="demographic_status">{{ ucfirst($page) }} Relationship</label>
            <select class="custom-select" name="phone_relation" id="phone_relation">
                <option selected disabled>Please select</option>
                <option {{ $patient->alternative_phone_relation == 'father' ? 'selected' : '' }} value="father">Father</option>
                <option {{ $patient->alternative_phone_relation == 'mother' ? 'selected' : '' }} value="mother">Mother</option>
                <option {{ $patient->alternative_phone_relation == 'wife' ? 'selected' : '' }} value="wife">Wife</option>
                <option {{ $patient->alternative_phone_relation == 'husband' ? 'selected' : '' }} value="husband">Husband</option>
                <option {{ $patient->alternative_phone_relation == 'grandparent' ? 'selected' : '' }} value="grandparent">Grandparent</option>
                <option {{ $patient->alternative_phone_relation == 'friend' ? 'selected' : '' }} value="friend">Friend</option>
                <option {{ $patient->alternative_phone_relation == 'neighbour' ? 'selected' : '' }} value="neighbour">Neighbour</option>
                <option {{ $patient->alternative_phone_relation == 'sibling' ? 'selected' : '' }} value="sibling">Sibling</option>
                <option {{ $patient->alternative_phone_relation == 'relative' ? 'selected' : '' }} value="relative">Relative</option>
                <option {{ $patient->alternative_phone_relation == 'spl' ? 'selected' : '' }} value="spl">SPL Teacher</option>
                <option {{ $patient->alternative_phone_relation == 'self' ? 'selected' : '' }} value="self">Self</option>
            </select>
        </div>
        @endif

    </div>
    <div class="form-row custom-padding">
        <div class="form-group pr-4 col-md-6">
            <label class="control-label">{{ ucfirst($page) }} Address line 1 </label>
            <input type="text" name="address1" id="address1" class="form-control" placeholder="Address line 1" value="{{ $page == 'permanent' ? optional($patient->address)->address1 :
                      optional($patient->temp)->address1 }}">
        </div>

        <div class="form-group pl-4 col-md-6">
            <label class="control-label">{{ ucfirst($page) }} Address line 2 </label>
            <input type="text" name="address2" id="address2" class="form-control" placeholder="Address line 2" value="{{ $page == 'permanent' ? optional($patient->address)->address2 :
                                              optional($patient->temp)->address2 }}">
        </div>
    </div>

    <div class="form-row custom-padding">
        <div class="form-group  pr-4 col-md-6">
            <label class="control-label">Taluk</label>
            <input type="text" name="address3" id="address3" class="form-control" maxlength="60" placeholder="Address line 3"
            value="{{ $page == 'permanent' ? optional($patient->address)->address3 :optional($patient->temp)->address3 }}">
        </div>
    </div>

    <div class="form-row custom-padding">
        <div class="form-group pr-4  col-md-6">
            <label class="control-label ">City </label>
            <input type="text" name="city" id="city" class="form-control" placeholder="Search city name" value="{{ $page == 'permanent' ? optional($patient->address)->city : optional($patient->temp)->city }}">
        </div>

        <div class="form-group  pl-4 col-md-6">
            <label class="control-label ">District </label>
            <input type="text" name="district" id="district" class="form-control"
            value="{{ $page == 'permanent' ? optional($patient->address)->district : optional($patient->temp)->district }}"readonly>
        </div>
    </div>

    <div class="form-row custom-padding">
        <div class="form-group pr-4  col-md-6">
    <label class="control-label">State </label>
    <input type="text" name="state" id="state" class="form-control" placeholder="State" value="{{ $page == 'permanent' ? optional($patient->address)->state :optional($patient->temp)->state }}" readonly>
        </div>

        <div class="form-group  pl-4 col-md-6">
            <label class="control-label">Pincode</label>
            <input type="tel" pattern="[0-9]{6}" name="pincode" id="pincode" class="form-control" maxlength="6" placeholder="Pincode" value="{{ $page == 'permanent' ? optional($patient->address)->pincode :optional($patient->temp)->pincode }}">
        </div>
    </div>
    <br />

    @if ($page == 'permanent')
    <button type="submit" name="address_type" value="temp" class="btn btn-primary float-right">Next</button>
    <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'health-info']) }}" class="btn btn-primary float-left">Previous</a>
    @else
    <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'permanent']) }}" class="btn btn-primary float-left">Previous</a>

    <button type="submit" name="parent_type" value="father" class="btn btn-primary float-right">Next</button>
    @endif
</form>
