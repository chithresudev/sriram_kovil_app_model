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
            Select Camp District
            @endslot
            <form class="" action="index.html" method="post">
                <div class="form-row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">District</label>
                        <select class="border-radius custom-select" name="district">
                            <option value="">Select District</option>
                            @forelse ($districts as $key => $district)
                            <option value="">{{ $district->district }}</option>
                            @empty

                            @endforelse

                        </select>
                        <div class="valid-feedback"></div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer02">Select Date</label>
                        <input type="date" class="form-control" id="validationServer02" placeholder="Select Date" value="create_date" required>
                        <div class="valid-feedback"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="button" class="btn btn-info" name="button">
                        Create Camp
                    </button>
                </div>
            </form>
            @endcomponent
        </div>
    </div>
</section>
@endsection
