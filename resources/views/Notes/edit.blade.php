<?php $var="I/B"; $var2=$notes->student()->first(); ?>
@extends('layouts.app')

@section('content')

<h2>Edit Note for {{$var2->firstName}} {{$var2->lastName}}</h2>
    {!! Form::open(['action' => ['NotesController@update',  $notes->NId ],'method' => 'POST']) !!}
        <form>
            <div class="form-row">
                {!! Form::label('Class', 'Class', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {!!  Form::select('Class', ['Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance'],  $notes->Class, ['class' => 'form-control' ]) !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Instructor', 'Instructor', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Instructor', $notes->Instructor, ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('I/B', 'Incident/Breakthrough', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    
                    {!!  Form::select('I/B', [ 'Breakthrough' => 'Breakthrough', 'Incident' => 'Incident', 'Severe Incident' => 'Severe Incident', 'None' => 'None'], $notes->$var , ['class' => 'form-control' ]) !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Text', 'Report', ['class' => 'col-lg-2 control-label']  )  !!}
                <div class="col col-md-3">
                    {{Form::textarea('Text', $notes->Text, ['class' => 'form-control', 'placeholder' => 'Please explain'])}}
                </div>
            </div>
            &nbsp;
            {{Form::hidden('url', URL::previous())}}
            <div style="padding-top: 10px">
                <span style="float:right;">
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
                </span>
            </div>
        </form>
    {!! Form::close() !!}
@endsection