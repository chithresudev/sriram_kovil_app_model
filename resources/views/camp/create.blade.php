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
            @component('component.card')
            @slot('card_title')
            Create Camp
            @endslot
            <form class="" action="{{ route('camp.store') }}" method="post">
                @csrf
                <div class="form-row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">District</label>
                        <select class="custom-select" id="district" disabled name="district">
                            <option value="{{ optional(session()->get('district'))->id }}" selected disabled>
                                {{ optional(session()->get('district'))->district }}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01" class="">Tentative Camp date<span class="custom-required"> *</span></label>
                        <input type="date" name="camp_date" class="form-control{{ $errors->has('camp_date') ? ' is-invalid' : '' }}">

                        @if ($errors->has('camp_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('camp_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-blue">Create Camp</button>
                </div>
            </form>
            @endcomponent
        </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/precamp.js') }}" defer></script>
@endpush
