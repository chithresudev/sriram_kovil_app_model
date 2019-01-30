@php
$route = str_after(Route::currentRouteName(), '.');
$camp = session()->get('camp');
$district = session('district');
@endphp
<div class="list-group panel list-group-flush">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="{{ route('precamp.dashboard') }}" class="nav-link {{ $route == 'dashboard' ? 'custom-active' : '' }} " data-parent="#sidebar">
                <i class="material-icons">
                    dashboard
                </i>
                <span class="hidden-sm-down">Dashboard </span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('camp.create') }}" class="nav-link {{ $route == 'create' ? 'custom-active' : '' }} " data-parent="#sidebar">
                <i class="material-icons">
                    create
                </i>
                <span class="hidden-sm-down">Create Camp </span>
            </a>
        </li>
  @if (session()->has('camp'))
        <li class="nav-item">
            <a href="{{ route('camp.page', ['camp' => $camp->id, 'page' => 'venue']) }}" class="nav-link {{ $route == 'page' ? 'custom-active' : '' }} " data-parent="#sidebar">
              <i class="material-icons">
                add_comment
              </i>&nbsp;
              <span class="hidden-sm-down">Add Details </span>
            </a>
        </li>
  @endif


       {{-- @if (session()->get('camp'))
        <li class="nav-item">
            <a href="#menu3" class="nav-link" data-toggle="collapse" data-parent="#sidebar">
                <i class="material-icons">
                  add_comment
                </i>&nbsp;
                <span class="hidden-sm-down">Add Details </span>
            </a>

            <div class="collapse" id="menu3">
                <ul class="nav nav-pills flex-column">

                    <li class="sub-link">
                        <a href="{{ route('camp.campdetails', ['camp' => $camp_id ]) }}"  data-parent="#sidebar">
                            <i class="material-icons">
                                place
                            </i>
                            <span class="hidden-sm-down">Venue Details</span>
                        </a>
                    </li>

                    <li class="sub-link">
                        <a href="{{ route('camp.campdetails', ['camp' => $camp_id ]) }}" data-parent="#sidebar">
                            <i class="material-icons">
                                headset
                            </i>
                            <span class="hidden-sm-down">Doctor Details</span>
                        </a>
                    </li>

                    <li class="sub-link">
                      <a href="#" class="" data-parent="#sidebar">
                            <i class="material-icons">
                              restaurant
                            </i>
                            <span class="hidden-sm-down">Food Details</span>
                        </a>
                    </li>

                    <li class="sub-link">
                      <a href="#" class="" data-parent="#sidebar">
                            <i class="material-icons">
                                directions_transit
                            </i>
                            <span class="hidden-sm-down">Travel Details</span>
                        </a>
                    </li>

                    <li class="sub-link">
                      <a href="#" class="" data-parent="#sidebar">
                            <i class="material-icons">
                              local_hotel
                            </i>
                            <span class="hidden-sm-down">Accommodation</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
      @endif --}}

        <li class="nav-item">
            <a href="{{ route('precamp.users') }}" class="nav-link {{ $route == 'users' ? 'custom-active' : '' }}" data-parent="#sidebar">
                <i class="material-icons">
                    supervisor_account
                </i>
                <span class="hidden-sm-down">Add User</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('patient.uploadform') }}" class="nav-link {{ $route == 'uploadform' ? 'custom-active' : '' }}" data-parent="#sidebar">
                <i class="material-icons">
                    how_to_reg
                </i>
                <span class="hidden-sm-down">Add Patient</span>
            </a>
        </li>
        @php
        $active = $patientable ?? '';
        @endphp
        <li class="nav-item">
            <a href="{{ route('patient.view', ['patientable' => 'firstcall']) }}" class="nav-link
    {{ $active == 'firstcall' ? 'custom-active' : '' }}" data-parent="#sidebar">
                <i class="material-icons">
                    phone_in_talk
                </i>
                <span class="hidden-sm-down">First Call</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('patient.view', ['patientable' => 'letter']) }}" class="nav-link
    {{ $active == 'letter' ? 'custom-active' : '' }}" data-parent="#sidebar">
                <i class="material-icons">
                    receipt
                </i>
                <span class="hidden-sm-down">Letter</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('patient.view', ['patientable' => 'letter-enquire']) }}" class="nav-link
    {{ $active == 'letter-enquire' ? 'custom-active' : '' }}" data-parent="#sidebar">
                <i class="material-icons">
                    contact_phone
                </i>
                <span class="hidden-sm-down">Letter Enquire</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('patient.view', ['patientable' => 'secondcall']) }}" class="nav-link
    {{ $active == 'secondcall' ? 'custom-active' : '' }}" data-parent="#sidebar">
                <i class="material-icons">
                    phone_missed
                </i>
                <span class="hidden-sm-down">Second Call</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('patient.view', ['patientable' => 'unwilling-patients']) }}" class="nav-link
    {{ $active == 'unwilling-patients' ? 'custom-active' : '' }}" data-parent="#sidebar">
                <i class="material-icons">
                  swap_horiz
                </i>
                <span class="hidden-sm-down">UnWilling patients</span>
            </a>
        </li>


          @if (session()->has('camp'))
        <li class="nav-item">
            <a href="{{ route('camp.camplist', ['camp' => $camp]) }}" class="nav-link {{ $route == 'camplist' ? 'custom-active' : '' }} ">
                <i class="material-icons">
                    playlist_add_check
                </i>
                <span class="hidden-sm-down">Camp</span>
            </a>
        </li>
      @endif

        <li class="nav-item d-block d-md-none d-lg-none">
            <a class="nav-link bg-blue text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                <i class="material-icons m-2">
                    input
                </i> {{ __('Logout') }}
            </a>
        </li>
    </ul>
</div>
