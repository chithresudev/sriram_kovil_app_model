@extends('layouts.app')

@section('sidebar')
  <aside id="sidebar">
    @include('shared.sidebar')
  </aside>
@endsection


@section('content')
  <div class="container">
      <div class="row justify-content-center pt-5">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header text-center">
                Change Password
              </div>
                <div class="card-body">
                  <form   action="{{ route('precamp.postCredentials') }}" method="POST" class="form-horizontal">
                        @csrf
                          <div class="form-group row">
                              <label for="current-password" class="col-sm-4 col-form-label text-md-right">
                                  {{ __('Current Password') }}
                              </label>
                              <div class="col-md-6">
                                  <input id="current-password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="current-password" value="{{ old('current-password') }}" required >
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="password" class="col-sm-4 col-form-label text-md-right">
                                  {{ __('New Password') }}
                              </label>
                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control"
                                    name="password" value="{{ old('password') }}" required >
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="password_confirmation" class="col-sm-4 col-form-label text-md-right">
                                  {{ __('Re-enter Password') }}
                              </label>
                              <div class="col-md-6">
                                  <input id="password_confirmation" type="password"
                                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                    name="password_confirmation" value="{{ old('password') }}" required >
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Change') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                </div>
          </div>
      </div>
  </div>
  @endsection

  @push('scripts')
  <script src="{{ asset('js/precamp.js') }}" defer></script>
  @endpush
