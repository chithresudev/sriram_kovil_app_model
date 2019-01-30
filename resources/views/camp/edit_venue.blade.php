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
            <div class="card">
                <div class="card-header border-bottom-0" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="title badge orange"><i class="material-icons">place
                                </i>Add Venue Details</div>
                        </button>
                    </h5>
                </div>

                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="venue">Venue name</label>
                                        <input type="text" class="form-control textOnly"  id="venue" name="venue" maxlength="60" value="{{ $campvenue->venue }}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="address">Venue address</label>
                                        <input type="text" class="form-control" id="address" name="address" maxlength="60"
                                        value="{{ $campvenue->address }}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contact_name">Venue Contact Person Name</label>
                                        <input type="text" class="form-control textOnly" id="contact_name" name="contact_name" maxlength="60" value="{{ $campvenue->contact_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contact_mobile">Venue contact mobile</label>
                                        <input type="tel" class="form-control numbersOnly" id="contact_mobile" title="10 characters to be filled" maxlength="10" name="contact_mobile"
                                        value="{{ $campvenue->contact_mobile }}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contact_email">Venue contact email</label>
                                        <input type="email" class="form-control" id="contact_email" name="contact_email" maxlength="60"
                                        value="{{ $campvenue->contact_email }}">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="comment">Comment</label>
                                        <input type="text" class="form-control" id="comment" name="comment" maxlength="50"
                                        value="{{ $campvenue->comment }}">
                                    </div>
                                </div>
                            </div>
                            @if (session()->has('msg'))
                            <span class="text-danger float-left" role="alert">
                                <strong><i class="material-icons">
                                        error_outline
                                    </i> {{ session('msg') }}</strong>
                            </span>
                            @endif
                            <button type="submit" class="btn btn-blue float-right mb-3" name="button">Submit</button>
                    </div>
                    </form>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="title badge orange"><i class="material-icons">place
                                </i>Venue Details</div>
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">

                    <div class="card-body p-0">

                        {{-- <table class="table table-borderd mb-0">
                            <thead class="thead-color">
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact person</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($campvenue->venues as $index => $vanue)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vanue->venue }}</td>
                                    <td>{{ $vanue->address }}</td>
                                    <td>{{ $vanue->contact_name }}</td>
                                    <td>{{ $vanue->contact_mobile }}</td>
                                    <td>{{ $vanue->contact_email }}</td>
                                    <td>{{ $vanue->comment }}</td>
                                    <td><a href="" class="btn btn-green">Edit</a></td>
                                    @empty
                                    <td colspan="12">No Venue Details</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
