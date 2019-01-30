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
          Create Role Users
          @endslot
                <form action="{{ route('precamp.addusers') }}"  method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-4">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name" value="{{ old('name') }}"  autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                        <div class="col-md-4">
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                              name="username" value="{{ old('username') }}"  >

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                             name="password" >

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-4">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Users Type') }}</label>

                        <div class="col-md-4">
                          <select class="custom-select" name="type" id="exampleFormControlSelect1" required>
                            <option selected disabled >Please Select User Type</option>
                            <option value="preuser">Precamp User</option>
                            <option value="campadmin">Camp Admin</option>
                            <option value="user">Camp User</option>
                          </select>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-4">
                            <button type="submit" class="btn btn-blue">
                                {{ __('Register') }}
                            </button>
                            {{-- <button type="button" data-target="#userdetails" data-toggle="modal" class="btn btn-orange">
                                {{ __('User Details') }}
                            </button> --}}
                        </div>
                    </div>
                </form>
          @endcomponent
        </div>
    </div>
</section
  @endsection

  @push('scripts')
  <script src="{{ asset('js/precamp.js') }}"></script>
  @endpush
