@extends('layouts.app')

@section('sidebar')
<aside id="sidebar">
    @include('shared.sidebar')
</aside>
@endsection

@section('title')
Camp : {{ session()->get('district')->district }}
@endsection

@section('content')
  <section>
      <div class="row">
          <div class="col-md-12">
              @component('component.card')
              @slot('card_title')
              Upload Patient Details
              @endslot
                    <form action="{{ route('patient.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <input type="file" name="patient_details" class="form-control{{ $errors->has('patient_details') ? ' is-invalid' : '' }}">

                                @if ($errors->has('patient_details'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('patient_details') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-blue">Upload</button>
                               @if ($temp_patients->count() != 0)
                                 <a href="{{ route('patient.addtodb') }}" class="btn btn-orange">Add To Database</a>
                               @endif
                            </div>
                        </div>
                    </form>
                  @endcomponent
                </div>
              </div>

          @if ($temp_patients->count() != 0)
            @component('component.table_card')
                  @slot('table_title')
                  Patient Details
                  @endslot
                        <thead class="thead-color">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Father's Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Source</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($temp_patients as $index => $temp_patient)
                            <tr>
                                <td>{{ $temp_patients->firstItem() +  $index }}</td>
                                <td>{{ $temp_patient->name }}</td>
                                <td>{{ $temp_patient->father_name }}</td>
                                <td>{{ $temp_patient->gender }}</td>
                                <td>{{ $temp_patient->age }}</td>
                                <td>{{ $temp_patient->phone }}</td>
                                <td>{{ $temp_patient->source }}</td>
                                @empty
                                <td colspan="8" class="text-center">No data to load</td>
                            </tr>
                            @endforelse
                        </tbody>

                      {{ $temp_patients->links() }}
                    @endcomponent

             @endif

</section>
@endsection
