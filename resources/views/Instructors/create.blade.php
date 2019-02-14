@extends('layouts.app')

@section('content')
    <h1>New Instructor</h1>
    <p>Please enter information for creating a new instructor</p>
        <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-row-inline-md">
                    <label for="firstName" class="col-lg-2 control-label">{{ __('First Name') }}</label>


                        <input id="firstName" type="text" class="form-control-right{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                        @if ($errors->has('firstName'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('firstName') }}</strong>
                            </span>
                        @endif

                </div>

                <div class="form-row-inline-md">
                    <label for="lastName" class="col-lg-2 control-label">{{ __('Last Name') }}</label>


                        <input id="lastName" type="text" class="form-control-right{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                        @if ($errors->has('lastName'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                        @endif

                </div>

                <div class="form-row-inline-md">
                    <label for="email" class="col-lg-2 control-label">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email" class="form-control-right{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                </div>

                <div class="form-row-inline-md">
                    <label for="password" class="col-lg-2 control-label">{{ __('Password') }}</label>


                        <input id="password" type="password" class="form-control-right{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                </div>

                <div class="form-row-inline-md">
                    <label for="password-confirm" class="col-lg-2 control-label">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form-control-right" name="password_confirmation" required>
                </div>

                <div class="form-row-inline-md">
                    <label for="center" class="col-lg-2 control-label">{{ __('Center') }}</label>


                        <input id="center" type="text" class="form-control-right{{ $errors->has('center') ? ' is-invalid' : '' }}" name="center" value="{{ old('center') }}" autofocus>

                        @if ($errors->has('center'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('center') }}</strong>
                            </span>
                        @endif

                </div>

                <div class="form-row-inline-md">
                        <label for="center" class="col-lg-2 control-label">{{ __('Role') }}</label>                
                        <select class="form-control-right" name="role" id="role">
                            <option value="0">Instructor</option>
                            <option value="1">Admin</option>
                        </select>
                </div>

                        <div class="form-row-inline-md" style="padding-top: 20px">
                                <button type="submit" class="form-control-right new-btn primary-button" style = 'width: 75px; height: 41px;'>
                                        {{ __('Register') }}
                                </button>
                                <a href="{{ URL::previous() }}" class="form-control-right button">Cancel</a>
                        </div>
            </form>
@endsection
