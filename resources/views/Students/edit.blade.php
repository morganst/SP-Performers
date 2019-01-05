@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>
    <p>Please enter information for updating the student</p>
    {!! Form::open(['action' => ['StudentController@update', $stu->id], 'method' => 'POST']) !!}
        <form>
            <div class="form-row">
                {!! Form::label('firstName', 'First Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('firstName', $stu->firstName, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('lastName', 'Last Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('lastName', $stu->lastName, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('DOB', 'Date of Birth', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::date('DOB', $stu->DOB)}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('gender', 'Gender', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {!!  Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'],  $stu->gender, ['class' => 'form-control' ]) !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('primaryClass', 'Primary Class', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('primaryClass', $stu->primaryClass, ['class' => 'form-control', 'placeholder' => 'Primary Class'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('reference', 'Reference', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('reference', $stu->reference, ['class' => 'form-control', 'placeholder' => 'Reference'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                    {!! Form::label('enrolled', 'Currently Enrolled', ['class' => 'col-lg-2 control-label'] )  !!}
                    <div class="col col-md-3">
                        {!!  Form::select('enrolled', ['0' => 'Yes', '1' => 'No'],  $stu->enrolled, ['class' => 'form-control' ]) !!}
                    </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    {!! Form::close() !!}
@endsection