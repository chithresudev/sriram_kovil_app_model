@extends('layouts.app')

@section('sidebar')
  <aside id="sidebar">
    @include('shared.sidebar')
  </aside>
@endsection

@section('content')

<section>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-0">
                  <div class="card-header">
                    Letter Enquiry
                  </div>
                    <form  action="{{ route('patient.firstcall', ['patient' => $patient]) }}" method="post">
                      @csrf
                      <div class="row p-4">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <!-- Patient Name -->
                            <div class="form-group ">
                              <label class="control-label">Name</label>
                                <input type="text" class="form-control" value="{{ $patient->name ? $patient->name : old('name') }}"
                                name="name" id="name" required >
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="control-label">Father's name </label>
                            <input type="text" name="father_name" id="father_name"
                            class="form-control" value="{{ $patient->father->name }}" >
                          </div>
                        </div>
                      </div>

                      <div class="row p-4">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group" id="phone_id">
                              <label class="control-label">Phone number <span class="custom-required">*</span></label>
                              <input type="tel" name="phone" id="phone" value="{{ $patient->phone }}"
                              pattern="[1-9]{1}[0-9]{9}" maxlength="10"
                              class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}">
                               @if ($errors->has('phone'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('phone') }}</strong>
                               </span>
                               @endif
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                          <div class="form-group" id="relative_id">
                              <label class="control-label">Relationship <span class="custom-required">*</span></label>
                                <select class="custom-select form-control{{ $errors->has('phone_relation') ? ' is-invalid' : '' }}"
                                   name="phone_relation" id="phone_relation">
                                    <option value="" disabled  selected>Please select</option>
                                    <option {{ $patient->phone_relation == 'father' ? 'selected' : '' }} value="father"  >
                                      Father</option>
                                    <option {{ $patient->phone_relation == 'mother' ? 'selected' : '' }} value="mother"  >
                                      Mother</option>
                                    <option {{ $patient->phone_relation == 'wife' ? 'selected' : '' }} value="wife" >
                                      Wife</option>
                                    <option {{ $patient->phone_relation == 'husband' ? 'selected' : '' }} value="husband" >
                                      Husband</option>
                                    <option {{ $patient->phone_relation == 'grandparent' ? 'selected' : '' }} value="grandparent" >
                                      Grandparent</option>
                                    <option {{ $patient->phone_relation == 'friend' ? 'selected' : '' }} value="friend" >
                                      Friend</option>
                                    <option {{ $patient->phone_relation == 'neighbour' ? 'selected' : '' }} value="neighbour" >
                                      Neighbour</option>
                                    <option {{ $patient->phone_relation == 'sibling' ? 'selected' : '' }} value="sibling" >
                                      Sibling</option>
                                    <option {{ $patient->phone_relation == 'relative' ? 'selected' : '' }} value="relative" >
                                      Relative</option>
                                    <option {{ $patient->phone_relation == 'spl' ? 'selected' : '' }} value="spl" >
                                      SPL Teacher</option>
                                    <option {{ $patient->phone_relation == 'self' ? 'selected' : '' }} value="self" >
                                      Self</option>
                              </select>
                              @if ($errors->has('phone_relation'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('phone_relation') }}</strong>
                              </span>
                              @endif
                          </div>
                        </div>
                      </div>
                      <div class="row p-3 justify-content-center">
                        <div class="form-group">
                          <button type="submit" value="first_call" class="btn btn-blue">First Call</button>
                          <button type="submit" name="page" value="basic-info" class="btn btn-orange">Second Call</button>
                        </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/precamp.js') }}" defer></script>
@endpush
