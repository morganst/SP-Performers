@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>
    <p>Please enter information for updating the student</p>
    {!! Form::open(['action' => ['StudentController@update', $stu->id], 'method' => 'POST']) !!}
        <form class="small-form">
            <div class="form-row-inline-md">
                {!! Form::label('firstName', 'First Name', ['class' => 'col-lg-2 control-label'] )  !!}
                {{Form::text('firstName', $stu->firstName, ['class' => 'form-control-right', 'placeholder' => 'First Name'])}}
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('lastName', 'Last Name', ['class' => 'col-lg-2 control-label'] )  !!}
                {{Form::text('lastName', $stu->lastName, ['class' => 'form-control-right', 'placeholder' => 'Last Name'])}}
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('DOB', 'Date of Birth', ['class' => 'col-lg-2 control-label'] )  !!}
                {{Form::date('DOB', $stu->DOB, ['class' => 'form-control-right'])}}
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('gender', 'Gender', ['class' => 'col-lg-2 control-label'] )  !!}
                {!!  Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'],  $stu->gender, ['class' => 'form-control-right' ]) !!}
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('primaryClass', 'Primary Class', ['class' => 'col-lg-2 control-label'] )  !!}
                {{Form::select('primaryClass',$array, $stu->primaryClass, ['class' => 'form-control-right'])}}
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('reference', 'Referral', ['class' => 'col-lg-2 control-label'] )  !!}
                {{Form::text('reference', $stu->reference, ['class' => 'form-control-right', 'placeholder' => 'Reference'])}}
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                    {!! Form::label('enrolled', 'Currently Enrolled', ['class' => 'col-lg-2 control-label'] )  !!}
                    {!!  Form::select('enrolled', ['0' => 'Yes', '1' => 'No'],  $stu->enrolled, ['class' => 'form-control-right' ]) !!}
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'new-btn primary-button'])}}
                <a href="{{ URL::previous() }}" class="new-btn back"><- Back</a>
            </div>
        </form>
    {!! Form::close() !!}

    {!!Form::open(['action' => ['StudentController@destroy', $stu->id], 'method' => 'POST', 'style' => 'float: right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'new-btn error-button', 'role' => 'button'])}}
    {!!Form::close()!!}
@endsection