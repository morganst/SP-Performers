@extends('layouts.app')

@section('content')
    <h1>New Student</h1>
    <p>Please enter information for creating a new student</p>
    {!! Form::open(['action' => 'StudentController@store', 'method' => 'POST']) !!}
    <form class="small-form">
            <div class="form-row-inline-md">
                {!! Form::label('firstName', 'First Name', ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{Form::text('firstName', '', ['class' => 'form-control-right', 'placeholder' => 'First Name'])}}

            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('lastName', 'Last Name', ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{Form::text('lastName', '', ['class' => 'form-control-right', 'placeholder' => 'Last Name'])}}

            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('DOB', 'Date of Birth', ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{Form::date('DOB', \Carbon\Carbon::now(), ['class' => 'form-control-right'])}}

            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('gender', 'Gender', ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {!!  Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'],  '', ['class' => 'form-control-right' ]) !!}
    
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('primaryClass', 'Primary Class', ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{Form::select('primaryClass', $array, null, ['class' => 'form-control-right'])}}
         
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('reference', 'Referral', ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{Form::text('reference', '', ['class' => 'form-control-right', 'placeholder' => 'Referral'])}}
       
            </div>
            &nbsp;
            <div class="form-row-inline-md" style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 41px;'])}}
                <a class="form-control-right button" href="/students" role="button">Cancel</a>
            </div>
        </form>
    {!! Form::close() !!}
@endsection