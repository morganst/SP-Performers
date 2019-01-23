@extends('layouts.app')

@section('content')
    <h1>New Class</h1>
    <p>Please enter information for creating a new class</p>
    {!! Form::open(['action' => ['ClassController@update', $cla->id], 'method' => 'POST']) !!}
        <form>
            <div class="form-row">
                {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('name', $cla->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('time', 'Class Time', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('time', $cla->time, ['class' => 'form-control', 'placeholder' => 'Class Time'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('location', 'Class Location', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('location', $cla->location, ['class' => 'form-control', 'placeholder' => 'Class Location'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('limit', 'Class Size Limit', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('limit', $cla->limit, ['class' => 'form-control', 'placeholder' => 'Limit'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a class="btn btn-secondary" href="/classes" role="button">Back</a>
            </div>
        </form>
    {!! Form::close() !!}
@endsection