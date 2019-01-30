@extends('layouts.app')

@section('sidebar')
<aside id="sidebar">
    @include('shared.sidebar')
</aside>
@endsection

@section('content')
<section>
    <!--- Venue Details-->
    <div class="row">
        <div class="col-md-12">
            <div class="pb-3">
                <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'venue']) }}" class="btn  btn-blue btn-sm {{ $page == 'venue' ? 'btn-orange' : '' }} ">Venue</a>
                <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'doctor']) }}" class="btn  btn-blue btn-sm {{ $page == 'doctor' ? 'btn-orange' : '' }}">Doctor</a>

                <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'food']) }}" class="btn  btn-blue btn-sm {{ $page == 'food' ? 'btn-orange' : '' }}">Food Organizer</a>

                <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'travel']) }}" class="btn  btn-blue btn-sm {{ $page == 'travel' ? 'btn-orange' : '' }}">Travel Organizer</a>
                  <a href="{{ route('camp.page', ['camp' => $camp, 'page' => 'accomodation']) }}" class="btn  btn-blue btn-sm {{ $page == 'accomodation' ? 'btn-orange' : '' }}">Accomodation Organizer</a>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ ucfirst($page) }} Details

                </div>

            @if ($page == 'venue')
                <div class="card-body p-0">
                    <table class="table table-borderd mb-0">
                        <thead class="thead-color">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact person</th>
                                <th>Mobile</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($camp->venues as $index => $vanue)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vanue->venue }}</td>
                                    <td>{{ $vanue->address }}</td>
                                    <td>{{ $vanue->contact_name }}</td>
                                    <td>{{ $vanue->contact_mobile }}</td>
                                    <td>{{ $vanue->comment }}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-backdrop="static" data-target="#venue_{{ $vanue->id }}" class="btn btn-green">
                                            Edit
                                        </a>
                                        @if ($vanue->status == 1)
                                        <span class="badge orange">selected</span>
                                        @else

                                        <a href="{{ route('camp.venueselected', ['venue' =>$vanue]) }}" class="btn btn-orange">
                                            <i class="material-icons mr-0">
                                                done
                                            </i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @if ($camp->venues->count() != 3)
                                <td colspan="12" class="text-center">
                                    <a href="#" data-toggle="modal" data-backdrop="static" data-target="#venue" class="btn btn-green btn-sm">
                                        Add Venue
                                    </a>
                                </td>
                                @endif
                        </tbody>
                    </table>
                </div>
            @endif

            <!--- Doctor Details-->
            @if ($page == 'doctor')
                <div class="card-body p-0">
                    <table class="table table-borderd mb-0">
                        <thead class="thead-color">
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Specialist</th>
                                <th>Phone</th>
                                <th>Available From</th>
                                <th>Available To</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($camp->doctors as $index => $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->specialist }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->date_from }}</td>
                                    <td>{{ $doctor->date_to }}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-backdrop="static" data-target="#doctor_{{ $doctor->id }}" class="btn btn-green">
                                            Edit
                                        </a>
                                        @if ($doctor->status == 1)
                                        <span class="badge orange">selected</span>
                                        @else

                                        <a href="{{ route('camp.doctorselected', ['camp' =>$doctor->id]) }}" class="btn btn-orange">
                                            <i class="material-icons mr-0">
                                                done
                                            </i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                                @if ($camp->doctors->count() != 3)
                                <td colspan="12" class="text-center">
                                    <a href="#" data-toggle="modal" data-backdrop="static" data-target="#doctor" class="btn btn-green btn-sm">
                                        Add Doctors Details
                                    </a>
                                </td>
                                @endif
                        </tbody>
                    </table>
                </div>
            @endif

            <!--- Travel, Accomodation, Food Details-->
            @if ($page == 'food' || $page == 'travel' || $page == 'accomodation')

                <div class="card-body p-0">
                    <table class="table table-borderd mb-0">
                        <thead class="thead-color">
                            <tr>
                                <th>S.No</th>
                                <th>Contact Person</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($camp->$page as $index => $organizer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $organizer->name }}</td>
                                    <td>{{ $organizer->mobile }}</td>
                                    <td>{{ $organizer->email }}</td>
                                    <td>{{ $organizer->comment }}</td>
                                    <td>
                                      @if ($organizer->status == 1)
                                      <span class="badge orange">selected</span>
                                      @endif
                                    </td>
                                    <td>
                                  <a href="#" data-toggle="modal" data-backdrop="static" data-target="#modal_{{ $organizer->id }}" class="btn btn-green">
                                    Edit
                                    </a>
                                    @if ($organizer->status == 0)
                                    <a href="{{ route('camp.organizerselected', ['camp' =>$organizer->id]) }}" class="btn btn-orange">
                                         <i class="material-icons mr-0">
                                             done
                                         </i>
                                     </a>
                                     @endif

                                   @if ($organizer->status == 1)

                                   <a href="{{ route('camp.organizerunselected', ['camp' =>$organizer->id]) }}" class="btn btn-dark">
                                        <i class="material-icons mr-0">
                                            clear
                                        </i>
                                    </a>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach

                                @if ($camp->$page->count() != 3)
                                <td colspan="12" class="text-center">
                                    <a href="#" data-toggle="modal" data-backdrop="static" data-target="#organizers" class="btn btn-green btn-sm">
                                        Add {{ ucfirst($page) }} Details
                                    </a>
                                </td>
                                @endif
                        </tbody>
                    </table>
                </div>

            <!--Organizer modal-->
            @foreach($camp->$page as $index => $organizer)
            <div class="modal fade" id="modal_{{ $organizer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-75" role="document">
                    <div class="modal-content">
                        @include('camp.modal.edit_organizers')
                    </div>
                </div>
            </div>
          @endforeach

      @endif
      </div>

          <div class="modal fade" id="organizers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered mw-75" role="document">
                  <div class="modal-content">
                      @include('camp.modal.organizers')
                  </div>
              </div>
          </div>

            <!--- Create Venue Modal Form!-->
            <div class="modal fade" id="venue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-75" role="document">
                    <div class="modal-content">
                        @include('camp.modal.venue')
                    </div>
                </div>
            </div>

            <!--Edit modal venue-->

            @foreach ($camp->venues as $index => $vanue)
            <div class="modal fade" id="venue_{{ $vanue->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-75" role="document">
                    <div class="modal-content">
                        @include('camp.modal.edit_venue')
                    </div>
                </div>
            </div>
            @endforeach

            <!--- Create Doctor Modal Form!-->

            <div class="modal fade" id="doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-75" role="document">
                    <div class="modal-content">
                        @include('camp.modal.doctor')
                    </div>
                </div>
            </div>

            <!--Edit modal Doctor-->

            @foreach ($camp->doctors as $index => $doctor)
            <div class="modal fade" id="doctor_{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-75" role="document">
                    <div class="modal-content">
                        @include('camp.modal.edit_doctor')
                    </div>
                </div>
            </div>
          @endforeach
</section>


<style media="screen">
    table tr td a.show {
        display: none;
    }

    table tr:hover td a.show {
        display: inline-block;
    }
</style>
@endsection
