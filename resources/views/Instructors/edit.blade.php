@extends('layouts.app')

@section('content')
    <h1>Edit Instructor</h1>
    <form method="POST"  action="{{route('instructors.update', $user->id )}}">
        @csrf
        <div class="form-row-inline-md">
            <label for="firstName" class="col-lg-2 control-label">{{ __('First Name') }}</label>
            <input id="firstName" type="text" class="form-control-right{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ $user->firstName }}" required autofocus>

            @if ($errors->has('firstName'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('firstName') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-row-inline-md">
            <label for="lastName" class="col-lg-2 control-label">{{ __('Last Name') }}</label>
                <input id="lastName" type="text" class="form-control-right{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ $user->lastName }}" required autofocus>
                @if ($errors->has('lastName'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('lastName') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-row-inline-md">
            <label for="email" class="col-lg-2 control-label">{{ __('E-Mail Address') }}</label>
                <input id="email" type="text" class="form-control-right{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email  }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-row-inline-md">
            <label for="center" class="col-lg-2 control-label">{{ __('Center') }}</label>
                <input id="center" type="text" class="form-control-right{{ $errors->has('center') ? ' is-invalid' : '' }}" name="center" value="{{ $user->center  }}" autofocus>
                @if ($errors->has('center'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('center') }}</strong>
                    </span>
                @endif
        </div>

        @if(Auth::user()->role==1)
        <div class="form-row-inline-md">
            <label for="center" class="col-lg-2 control-label">{{ __('Role') }}</label>                              
                <select class="form-control-right" name="role" id="role">
                    <option <?php if ($user->role == 0) echo 'selected' ; ?> value="0">Instructor</option>
                    <option <?php if ($user->role == 1) echo 'selected' ; ?> value="1">Admin</option>
                </select>
        </div>
        @endif
        <hr>
        Reset Password
        <br><br>
        <div class="form-row-inline-md{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-lg-2 control-label">Password</label>

                <div class="col-md-6">
                    <input type="password" class="form-control-right" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-row-inline-md{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="col-lg-2 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input type="password" class="form-control-right" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        <hr>
        <div class="form-row-inline-md" style="padding-top: 20px">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Save', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 41px;'])}}
                <a href="{{ URL::previous() }}" class="form-control-right button">Cancel</a>
        </div>
        <div class="form-row-inline-md">
                {!!Form::open(['action' => ['InstructorController@destroy', $user->id], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete Instructor', ['class' => 'form-control-right new-btn error-button', 'role' => 'button', 'style' => 'padding-top: 10px'])}}
                {!!Form::close()!!}
        </div>
    </form>
@endsection