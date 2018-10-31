@extends('layouts.app')
{{$var="I/B"}}
@section('content')
    <h1> {{$notes->Class}}</h1>

    <h1> {{$notes->$var}}</h1>
<p>Please enter information for creating a new student</p>
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
              
            </div>
        </form>
    {!! Form::close() !!}
@endsection