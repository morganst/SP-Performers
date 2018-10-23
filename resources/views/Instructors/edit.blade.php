@extends('layouts.app')

@section('content')
    <h1>New Instructor</h1>
    <p>Please enter information for editing instructor data</p>
    {!! Form::open(['action' => ['InstructorController@update', $ins->id], 'method' => 'POST']) !!}
        <form>
            <div class="form-row">
                {!! Form::label('firstName', 'First Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('firstName', $ins->firstName, ['class' => 'form-control', 'placeholder' => 'First Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('lastName', 'Last Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('lastName', $ins->lastName, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('center', 'Center', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('center', $ins->center, ['class' => 'form-control', 'placeholder' => 'Center'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Go Back</a>
                </div>
            </form>
        {!! Form::close() !!}
    @endsection