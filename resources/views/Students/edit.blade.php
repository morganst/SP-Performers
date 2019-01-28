@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>
    <p>Please enter information for updating the student</p>
    {!! Form::open(['action' => ['StudentController@update', $stu->id], 'method' => 'POST']) !!}
        <form>
            <div class="form-row-uncentered">
                {!! Form::label('firstName', 'First Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('firstName', $stu->firstName, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('lastName', 'Last Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('lastName', $stu->lastName, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('DOB', 'Date of Birth', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::date('DOB', $stu->DOB, ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('gender', 'Gender', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {!!  Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'],  $stu->gender, ['class' => 'form-control' ]) !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('primaryClass', 'Primary Class', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::select('primaryClass',$array, $stu->primaryClass, ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('reference', 'Referral', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('reference', $stu->reference, ['class' => 'form-control', 'placeholder' => 'Reference'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                    {!! Form::label('enrolled', 'Currently Enrolled', ['class' => 'col-lg-2 control-label'] )  !!}
                    <div class="col col-md-3">
                        {!!  Form::select('enrolled', ['0' => 'Yes', '1' => 'No'],  $stu->enrolled, ['class' => 'form-control' ]) !!}
                    </div>
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