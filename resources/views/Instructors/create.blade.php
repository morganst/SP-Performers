@extends('layouts.app')

@section('content')
    <h1>New Instructor</h1>
    <p>Please enter information for creating a new instructor</p>
    {!! Form::open(['action' => 'InstructorController@store', 'method' => 'POST']) !!}
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
                {!! Form::label('center', 'Center', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('center', '', ['class' => 'form-control', 'placeholder' => 'Center'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a class="btn btn-secondary" href="/instructors" role="button">Back</a>
            </div>
        </form>
    {!! Form::close() !!}
@endsection