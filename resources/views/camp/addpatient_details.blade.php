@extends('layouts.app')

@section('title')
Camp : {{ $patient->district->district }}
@endsection

@section('content')
  @php
    $secondcall = $patient->flag_camp_status && $patient->patient_attend_camp && $patient->flag_enquire_status;
  @endphp

      <div class="row">
          <div class="col-md-12">
              @component('component.card')
              @slot('card_title')
              Patient Name: {{ ucfirst($patient->name) }}
              @endslot
                <!-- Patients First page -->
                @if ($page == 'basic-info' )
                @include('form.basic_info')
                @endif

                <!-- Patients second page -->

                @if ($page == 'health-info')
                @include('form.health_info')
                @endif

                <!-- Patients Address page (Permanent and temporary) -->
                @if ($page == 'permanent' || $page == 'temp')
                @include('form.address_info')
                @endif

                <!-- Patients Parents page (father, mother, spouse, guardian) -->
                @if ($page == 'father' || $page == 'mother' || $page == 'spouse' || $page == 'guardian')

                <!-- Patients father only Show sibling_info -->

                @include('form.parents_info')
                @endif

                @if ($page == 'history-info')
                @include('form.history_info')
                @endif

    @endcomponent
    @endsection

    @push('scripts')
    <script src="{{ asset('js/jquery.inputmask.bundle.js') }}" defer></script>
    <script src="{{ asset('js/patient.js') }}" defer></script>
    @endpush

    @push('styles')
      <style media="screen">
        main {
          padding: 100px 25px 25px 25px;

        }
        footer {
          padding: inherit;
        }
      </style>
    @endpush
