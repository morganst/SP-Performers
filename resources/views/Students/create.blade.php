@extends('layouts.app')

@section('content')
    <h1>New Student</h1>
    <p>Please enter information for creating a new student</p>
    {!! Form::open(['action' => 'StudentController@store', 'method' => 'POST']) !!}
        <form>
            <div class="form-row">
                {!! Form::label('firstName', 'First Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('firstName', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('lastName', 'Last Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('lastName', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('DOB', 'Date of Birth', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::date('DOB', \Carbon\Carbon::now())}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('gender', 'Gender', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {!!  Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'],  '', ['class' => 'form-control' ]) !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('primaryClass', 'Primary Class', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('primaryClass', '', ['class' => 'form-control', 'placeholder' => 'Primary Class'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('reference', 'Referral', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('reference', '', ['class' => 'form-control', 'placeholder' => 'Reference'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a class="btn btn-secondary" href="/students" role="button">Back</a>
            </div>
        </form>
    {!! Form::close() !!}
@endsection