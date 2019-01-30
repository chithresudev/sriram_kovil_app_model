@extends('layouts.app')


@section('sidebar')
<aside id="sidebar">
@include('shared.sidebar')

</aside>
@endsection

@php
$camp = session()->get('camp');
@endphp

@section('content')
<section>
<div class="row">
    <div class="col-md-12">

      <div id="camp-url" data-campurl="{{ route('camp.campcomplete', ['camp' => $camp]) }}"></div>

        @component('component.table_card')
        @slot('table_title')
        Patient
        @endslot

        <table class="table table-borde#dc3545  m-0">
        <thead class="thead-color">
            <tr>
                <th style="width:10px">#</th>
                <th class="w-75">Camp Details</th>
                <th style="width:10px;"></th>
             </tr>
            <tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                @if ($camp->isVenue())
                <td id="venue" data-venue="{{$camp->venue->venue}}">
                Camp Venue :
                    <span class="badge orange">{{ ucfirst($camp->venue->venue . ',' .$camp->venue->address . ',' . $camp->phone) }}</span>
                </td>
                <td><a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'venue']) }}" class="btn btn-sm btn-blue">Change</a></td>
                @else
                <td>
                  Camp Venue : <span id="venue-error"></span>
                </td>
                <td><a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'venue']) }}" class="btn btn-sm btn-green">Add</a></td>
                @endif
            </tr>
            <tr>
                <td>2</td>
                @if ($camp->isDoctor())
                <td id="doctor" data-doctor="{{$camp->doctor->name}}">
                Camp Doctor :
                    <span class="badge orange">{{ $camp->doctor->name . ',' .$camp->doctor->specialist . ',' . $camp->phone }}
                    </span>
                </td>
                <td><a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'doctor']) }}" class="btn btn-sm btn-blue">Change</a></td>
                @else
                <td>
                  Camp Doctor : <span id="doctor-error"></span>
                </td>
                <td><a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'doctor']) }}" class="btn btn-sm btn-green">Add</a></td>
                @endif
            </tr>
            <tr>
                <td>3</td>
                <td id="oraganizer" data-oraganizer="{{$camp->organizers}}">Camp Organizer <span id="oraganizer-error"></span></td>
                <td><a href="#" data-target="#organizer" data-toggle="modal" class="btn btn-sm btn-orange">View</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Camp Role Assign</td>
                <td><a href="#" data-target="#role" data-backdrop="static" data-toggle="modal" class="btn btn-sm btn-orange">Assign</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Camp patient <span id="patient-error"></span></td>
                <td><a href="#" data-target="#patient_details" data-toggle="modal" class="btn btn-sm btn-blue">View</td>
            </tr>
        </tbody>
        @endcomponent
        <br />
    </div>
</div>


<!---Food Details Modal--->

<div class="modal fade" id="organizer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title badge orange"><i class="material-icons">supervised_user_circle
                </i>Camp Organizer
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <table class="table table-borde#dc3545 mb-0">
                <div class="badge orange">
                  Food Organizer
                </div>
                @if ($camp->food->count() == 0)
                <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'food']) }}" class="btn btn-sm btn-orange float-right">Add</a>
                @endif
                  <tbody>
                    @foreach ($camp->food as $index => $food)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td id='food' data-food="{{ $food->name }}">{{ $food->name }}</td>
                      <td>{{ $food->email }}</td>
                      <td>
                        <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'food']) }}" class="btn btn-sm btn-blue">Change</a>
                      </td>
                    @endforeach
                  </tbody>
              </table>
            </div>
            <div class="modal-body">
              <table class="table table-borde#dc3545 mb-0">
                <div class="badge orange">
                  Travel Organizer
                </div>

                @if ($camp->travel->count() == 0)
                <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'travel']) }}" class="btn btn-sm btn-orange float-right">Add</a>
                @endif
                <tbody>
                  @foreach ($camp->travel as $index => $travel)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td id='travel' data-travel="{{ $travel->name }}">{{ $travel->name }}</td>
                    <td>{{ $travel->email }}</td>
                    <td>
                        <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'travel']) }}" class="btn btn-sm btn-blue">Change</a>
                    </td>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="modal-body">
              <table class="table table-borde#dc3545 mb-0">
                <div class="badge orange">
                  Accomodation Organizer
                </div>
                @if ($camp->accomodation->count() == 0)
                <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'accomodation']) }}" class="btn btn-sm btn-orange float-right">Add</a>
                @endif
                <tbody>
                  @foreach ($camp->accomodation as $index => $accomodation)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td id='accomodation' data-accomodation="{{ $accomodation->name }}">{{ $accomodation->name }}</td>
                    <td>{{ $accomodation->email }}</td>
                    <td>
                        <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'accomodation']) }}" class="btn btn-sm btn-blue">Change</a>
                    </td>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
    </div>

<!---Patient Details Modal--->
    <div class="modal fade" id="patient_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog mw-75" role="document">

            <div class="modal-content ">
                <div class="modal-header">
                    <div class="title badge orange"><i class="material-icons">supervised_user_circle
                    </i>Camp Patient
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <table class="table table-striped text-center mb-0">
                    <thead class="thead-color">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Father's Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                      <tbody  id="camp-patient" data-patient= "{{ $camp->complete_patient->count() }}">
                        @forelse ($camp->complete_patient as $index => $camp_patient)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ ucfirst($camp_patient->name) }}</td>
                          <td>{{ ucfirst($camp_patient->father->name) }}</td>
                          <td>{{ $camp_patient->phone }}</td>
                          <td>{{ ucfirst($camp_patient->full_address )}}</td>
                          <td>{{ strtoupper($camp_patient->source) }}</td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="12">No Patients</td>
                        </tr>
                        <tr>
                          <td colspan="12"><a href="{{ route('patient.view', ['patientable' => 'firstcall']) }}" class="btn btn-sm btn-orange">Add patient</a></td>
                        </tr>
                      @endforelse
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
        </div>

    <!--- Assign Role modal--->
    @include('camp.modal.assign_role')
    <button type="button" class="btn btn-green text-center" id="camps">Complete Camp</button>
    @if (session()->has('message'))
      <strong class="text-center">
        <span class="text-success">{{ session('message') }}
        </span>
      </strong>
    @endif
</section>

@endsection

@push('styles')
<style>
.custom-select {
    line-height: inherit;
}
.error-msg {
  font-weight: 600!important;
  font-size: 13px;
}
</style>
@endpush

@push('scripts')
  <script src="{{ asset('js/precamp.js') }}" ></script>
  <script>

    @if($errors->any())
      $('#role').modal({show: true});
    @endif

$(document).ready(function(){
var role_url = $('#role-url').data('roleurl');

$('select[data-role]').each(function(index){
    $(this).change(function() {
    var role_row = $(this).data('row');
    var role_id = $(this).val();
      $.ajax({
          type: "POST",
          url: role_url,
          data: { 'role_id' : role_id, 'role_row' : role_row },
          success: function (res) {
           if(res == 'ok') {
            $('#error_msg_' + role_row).css('color','#0e7d27').html('Assign Role');
           }

           if(res == 'exit') {

            $('#error_msg_' + role_row).css('color','#dc3545').html('Already assign role, please Select another role');
           }

          },
        });
    });

});

});
</script>

@endpush
