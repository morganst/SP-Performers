@php 
$var="Type"; $var2=$notes->student()->first();
@endphp
@extends('layouts.app')

@section('content')

<h2>Edit Note for {{$var2->firstName}} {{$var2->lastName}}</h2>
    {!! Form::open(['action' => ['NotesController@update',  $notes->NId ],'method' => 'POST']) !!}
        <form class="small-form">
            <div class="form-row-inline-md">
                {!! Form::label('Class', 'Class', ['class' => 'col-lg-2 control-label'] )  !!}

                    {!!  Form::select('Class', ['Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance'],  $notes->Class, ['class' => 'form-control-right' ]) !!}
      
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('Instructor', 'Instructor', ['class' => 'col-lg-2 control-label'] )  !!}
         
                    {{Form::text('Instructor', $notes->Instructor, ['class' => 'form-control-right'])}}
           
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('Type', 'Incident/Breakthrough', ['class' => 'col-lg-2 control-label'] )  !!}                    
                    {!!  Form::select('Type', [ 'Breakthrough' => 'Breakthrough', 'Incident' => 'Incident', 'Severe Incident' => 'Severe Incident', 'None' => 'None'], $notes->$var , ['class' => 'form-control-right' ]) !!}
     
            </div>
            &nbsp;
            <div class="form-row-inline-md">
               

                    {{Form::textarea('Text', $notes->Text, ['class' => 'form-control-text', 'placeholder' => 'Please explain'])}}
       
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('Hide From Homepage?', 'Hide From Homepage?', ['class' => 'col-lg-2 control-label'] )  !!}
            
                    {!!  Form::select('Hide', ['No' => 'No', 'Yes' => 'Yes'], null, ['class' => 'form-control-right' ]) !!}
         
            </div>
            &nbsp;
            <div class="form-row-inline-md" style="padding-top: 20px">
                    {{Form::hidden('url', URL::previous())}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 41px;'])}}
                    <a href="{{ URL::previous() }}" class="form-control-right button" role="button" aria-pressed="true">Cancel</a>
            </div>
        </form>
    {!! Form::close() !!}

    <div class="form-row-inline-md">
        {!!Form::open(['action' => ['NotesController@destroy', $notes->NId], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0', 'onsubmit' => 'return ConfirmDelete()'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'form-control-right new-btn error-button', 'role' => 'button', 'style' => 'padding-top: 10px'])}}
        {!!Form::close()!!}
    </div>
@endsection