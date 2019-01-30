@extends('layouts.app')

@section('sidebar')
  <aside id="sidebar">
    @include('shared.sidebar')
  </aside>
@endsection


@section('content')
<section>
  <div class="row">
      <div class="col-md-12">
          <div class="card custom-card">
              <div class="card-body">
                <form  action="{{ route('camp.update', ['camp' => $camp]) }}" method="post">
                  @csrf
                    <div class="form-row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">District</label>
                            <select class="border-radius custom-select" id="district" disabled name="district">
                                <option value="{{ $camp->district->district }}" selected disabled>
                                  {{ $camp->district->district }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Select Date</label>
                          <input type="date" name="camp_date" value="{{ $camp->camp_date }}"
                          class="border-radius form-control{{ $errors->has('camp_date') ? ' is-invalid' : '' }}">

                          @if ($errors->has('camp_date'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('camp_date') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      @for ($i=1; $i <=3; $i++)
                        <h3>Venue Details</h3>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <input type="hidden" name="venue_type{{ $i }}" value="venue_type{{ $i }}">
                              <div class="form-group">
                                  <label class="control-label" for="venue">Venue name</label>
                                  <input type="text" class="form-control "
                                  id="venue{{ $i }}" name="venue{{ $i }}" maxlength="60" placeholder="Venue name"
                                   value="">
                              </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label class="control-label" for="address">Venue address</label>
                                  <input type="text" class="form-control" id="address{{ $i }}" maxlength="60"
                                  name="address{{ $i }}" placeholder="Venue address"
                                  value="">
                              </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label class="control-label" for="contact_name">Venue contact person</label>
                                  <input type="text" class="form-control " id="contact_name{{ $i }}"
                                   name="contact_name{{ $i }}" maxlength="60" placeholder="Venue contact person"
                                    value="">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label class="control-label" for="contact_mobile">Venue contact mobile</label>
                                  <input type="tel" class="form-control numbersOnly" id="contact_mobile{{ $i }}"
                                   pattern=".{10,}" title="10 characters to be filled" maxlength="10"
                                   name="contact_mobile{{ $i }}" placeholder="Venue contact mobile"
                                   value="">
                              </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label class="control-label" for="contact_email">Venue contact email</label>
                                  <input type="email" class="form-control" id="contact_email{{ $i }}"
                                   name="contact_email{{ $i }}" placeholder="Venue contact email" maxlength="60"
                                   value="">
                              </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label class="control-label" for="comment">Comment</label>
                                  <input type="text" class="form-control" id="comment{{ $i }}"
                                  name="comment{{ $i }}" maxlength="50" placeholder="Venue contact comment"
                                   value="">
                              </div>
                            </div>
                        </div>
                      @endfor
                      <hr>
                      @for ($i=1; $i<=3; $i++)
                        <h3>Doctor Details</h3>
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <input type="hidden" name="doctor_type{{ $i }}" value="doctor_type{{ $i }}">
                              <div class="form-group">
                                  <label class="control-label" for="name">Doctor name</label>
                                  <input type="text" class="form-control"
                                  id="name{{ $i }}" name="name{{ $i }}" maxlength="60" placeholder="Doctor name">
                              </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label class="control-label" for="specialist">Doctor's specialisation</label>
                                  <input type="text" class="form-control" id="specialist{{ $i }}"
                                  name="specialist{{ $i }}" placeholder="Doctor's specialisation" maxlength="60">
                              </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                              <div class="form-group">
                                  <label class="control-label" for="phone">Doctor's phone no.</label>
                                  <input type="tel" class="form-control" id="phone{{ $i }}"
                                    pattern=".{10,}" title="10 characters to be filled" maxlength="10"
                                  name="phone{{ $i }}" placeholder="Doctor's phone no.">
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <!-- row 2 -->
                              <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                 <label class="control-label" for="date_from">Doctor available from</label>
                                  <div class="input-group">
                                    <input type="date" name="date_from{{ $i }}" class="border-radius form-control">
                                       <i class="fa fa-calendar"></i>
                                     </span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="control-label" for="date_to">Doctor available to</label>
                                    <div class="input-group">
                                      <input type="date" name="date_to{{ $i }}" class="border-radius form-control">
                                         <i class="fa fa-calendar"></i>
                                       </span>
                                    </div>
                                </div>
                              </div>
                        </div>
                      @endfor
                      <div class="row justify-content-center">
                      <button type="submit" class="btn border-radius blue btn-blue">Create Camp</button>
                     </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</section>
  @endsection

  @push('scripts')
  <script src="{{ asset('js/precamp.js') }}" defer></script>
  @endpush
