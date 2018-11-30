<?php $var="I/B"; $var2=$notes->student()->first(); ?>
@extends('layouts.app')

@section('content')

<h2>Edit Notes</h2>
<p>Feel free to make any edits for {{$var2['firstName']}}</p>
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
                    
                    {!!  Form::select('I/B', ['Incident' => 'Incident', 'Breakthrough' => 'Breakthrough', 'None' => 'None'], $notes->$var , ['class' => 'form-control' ]) !!}
                </div>
            </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Text', 'Text' )  !!}
                <div class="col col-md-3">
                    {{Form::textarea('Text', $notes->Text, ['class' => 'form-control', 'placeholder' => 'Reference'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    <div class="text-right">
                            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
                        </div>
            </div>
        </form>
    {!! Form::close() !!}
@endsection