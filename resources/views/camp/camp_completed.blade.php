@extends('layouts.app')


@section('sidebar')
<aside id="sidebar">
    @include('shared.sidebar')

</aside>
@endsection

@section('content')
<section>
    <div class="row">
        <div class="col-md-4">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
              <select class="custom-select" id="field_name">
                <option value="name" selected>Name</option>
                <option value="age">Age</option>
                <option value="source">Source</option>
              </select>
          </div>
          <input class="form-control" id="field_value"  type="text" placeholder="Enter a search term" value="">
          <div class="input-group-append">
            <button class="btn btn-blue" id="search">Search</button>
          </div>
        </div>
        </div>

        <div class="col-md-12">
            @component('component.table_card')
            @slot('table_title')
            Patient {{ ucfirst($patientable) }}
            @endslot
            <thead class="thead-color">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    @if ($patientable == 'firstcall')
                    <th>Phone</th>
                    @endif
                    @if ($patientable != 'firstcall')
                    <th>Address</th>
                    @endif
                    <th>Source</th>
                    @if ($patientable == 'letter-enquire')
                    <th>Reference No</th>
                    @endif
                    @if ($patientable == 'secondcall')
                    <th>Date</th>
                    @endif

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $index => $patient)
                <tr>
                    <td>{{ $patients->firstItem() + $index }}</td>
                    <td>{{ ucfirst($patient->name) }}</td>
                    <td>{{ ucfirst($patient->father->name) }}</td>
                    <td>{{ ucfirst($patient->gender) }}</td>
                    <td>{{ $patient->age }}</td>
                    @if ($patientable == 'firstcall')
                    <td>{{ $patient->phone }}</td>
                    @endif
                    @if ($patientable != 'firstcall')
                    <td>{{ ucfirst($patient->full_address )}}</td>
                    @endif
                    <td>{{ strtoupper($patient->source) }}</td>
                    @if ($patientable == 'secondcall')
                    <td>{{ $patient->district->camp->camp_date }}</td>
                    @endif

                    {{-- @if ($patientable == 'letterEnquire')
                        <td>{{ $patient->reference_no }}</td>
                    @endif --}}

                    @if ($patientable == 'firstcall')
                    <td>
                        <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'basic-info']) }}" class="btn btn-green">Edit</a>

                        <a href="{{ route('patient.wrongnumber', ['patient' => $patient]) }}" class="btn btn-orange">Wrong Phone</a>

                        <button type="button" class="btn btn-blue" data-toggle="modal" data-url="{{ route('patient.remarks', ['patient' => $patient]) }}" data-target="#remarksmodal" data-id="{{ $patient->id }}" data-remarks="{{ $patient->call_remarks }}"
                          data-name="{{ $patient->name }} ">
                            Remarks
                        </button>
                    </td>
                    @endif

                    @if ($patientable == 'letter')
                    <td>
                        <a href="{{ route('patient.printletter', ['patient' => $patient]) }}" target="_blank" class="btn btn-orange">Print Letter</a>
                        <a href="{{ route('patient.printlabel', ['patient' => $patient]) }}" target="_blank" class="btn btn-green">Print Label</a>
                        @if ($patient->print_letter && $patient->print_label)
                        <a href="{{ route('patient.letterposted', ['patient' => $patient]) }}" class="btn btn-blue">Post Letter</a>
                        @endif
                    </td>
                    @endif

                    @if ($patientable == 'letter-enquire')
                    <td>{{ $patient->letter_code }}</td>
                    <td>
                        <a href="{{ route('patient.letterenquire', [ 'patient' => $patient]) }}" class="btn btn-warning custom-btn">Edit</a>
                    </td>
                    @endif

                    @if ($patientable == 'secondcall')
                    <td>
                        <a href="{{ route('patient.edit', ['patient' => $patient , 'page' => 'basic-info']) }}" class="btn btn-green">Edit</a>
                        @endif
                </tr>
                @empty
                <td colspan="8" class="text-center">No data to load</td>
                @endforelse
            </tbody>
            @endcomponent
            <br />
            {{ $patients->appends(session('params'))->links() }}
        </div>
    </div>

    <!-- Modal -->
    @include('component.remark_modal')

</section>
@endsection

@push('scripts')
<script src="{{ asset('js/precamp.js') }}" defer></script>

<script type="text/javascript">
$(document).ready(function() {

  $('#search').click(function(event) {

    var name = $.trim($('#field_name').val());
    var value = $.trim($('#field_value').val());

    var url = new URL(window.location.href);
    // var page = url.searchParams.get("page");
    var params = {};


    var field = 'name';
    if(name !== '' && name !== null) {
        field = name;
    }

     if(value !== '' && value !== null) {
         params.search_by = field + ':' + value;
     }

      window.location.href = '?' + $.param(params);
  });
});
</script>
@endpush
