@extends('layouts.app')


@section('sidebar')
<aside id="sidebar">
    @include('shared.sidebar')
</aside>
@endsection

@section('content')
<section>
    <div class="row">
        <div class="{{ session()->has('district') ? 'col-md-12' : 'col-md-10' }}">
            @component('component.card')
            @slot('card_title')
            Select Camp District
            @endslot
            <div class="form-row justify-content-center">
                <div class="col-md-4 mb-3">
                    <label for="validationServer01">District</label>
                    <select class="custom-select" id="district" name="district" data-url={{ route('precamp.district') }} data-redirecturl={{ route('camp.create') }}>
                        <option selected disabled>Please select district</option>
                        @foreach ($districts as $key => $district)
                        <option value="{{ $district->id }}" {{ optional(session()->get('district'))->id == $district->id ? 'selected' : '' }}>
                            {{ $district->district }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endcomponent

            @if (session()->has('district'))
            <div class="row pt-4">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Assign Camp Completed</h5>
                            <div class="count m-auto">
                                <h3 class="text-center">{{ session('district')->complete_camp->count() }}</h3>
                            </div>
                            {{-- <a href="#" class="btn btn-green disabled">
                              View</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('patient.view', ['patientable' => 'firstcall']) }}" class="text-dark">First Call patient</a>
                            </h5>
                            <a href="{{ route('patient.view', ['patientable' => 'firstcall']) }}">
                                <div class="count m-auto">
                                    <h3 class="text-center">
                                        {{ session('district')->firstcall_patient }}</h3>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('patient.view', ['patientable' => 'secondcall']) }}" class="text-dark">Second Call patient</a>
                                <h5 class="card-title"></h5>
                                <a href="{{ route('patient.view', ['patientable' => 'secondcall']) }}">
                                    <div class="count m-auto">
                                        <h3 class="text-center">{{ session('district')->secondcall_patient }}</h3>
                                    </div>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body p-0">
                            {{-- <div class="card-header">{{ session('district')->district }} Camp List ({{ session('district')->camps->count()  }})</div> --}}
                            <table class="table table-bordered-less">
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>Camp Date</td>
                                        <td>Camp Venue</td>
                                        <td>Camp Patient</td>
                                        <td>Camp Status</td>
                                        <td>Action</td>
                                    </tr>

                                    @forelse (session('district')->districtcamps as $key => $camp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $camp->camp_date }}</td>
                                        <td>{{ $camp->venue['venue']  }}</td>
                                        <td>{{ $camp->complete_patient->count()  }}</td>
                                        <td>
                                          <span class="badge {{ $camp->status == 1 ? 'green' : 'orange' }}">
                                          {{ $camp->status == 1 ? 'Completed' : 'Pending'  }}
                                          </span>
                                        </td>
                                        <td>
                                          <a href="{{ route('camp.camplist', ['camp' => $camp]) }}" class="btn btn-blue btn-sm">View Details</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">No Camps</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/precamp.js') }}"></script>
@endpush

<style media="screen">
    .count {
        height: 50px;
        width: 50px;
        padding: 9px;
        background: var(--orange);
        border-radius: 100px;
        color: #f6f7fb;

    }
</style>
