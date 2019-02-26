<<<<<<< HEAD
@php 
$var="I/B"; 
@endphp
=======
<h1 class="hidden">{{$var="Type"}}</h1> 
>>>>>>> fe59e199ab65ccdd78cda3ee2c5e458e8508e565
@extends('layouts.app')

@section('content')
<h2>Make Notes for {{$stu->firstName}} {{$stu->lastName}}</h2>
<br>
    {!! Form::open(['action' => ['NotesController@store' ],'method' => 'POST']) !!}
        <form class="small-form">
            <div class="form-row-inline-md">
                {!! Form::label('Class', 'Class', ['class' => 'col-lg-2 control-label'] )  !!}

                    @if(isset($stu->classes->first()->name))
                    {!!  Form::select('Class', ['Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance', 'Rap' => 'Rap'], $stu->classes->first()->name, ['class' => 'form-control-right' ]) !!}
                    @else
                    {!!  Form::select('Class', ['Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance', 'Rap' => 'Rap'], '', ['class' => 'form-control-right' ]) !!}
                    @endif

            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('Instructor', 'Instructor', ['class' => 'col-lg-2 control-label'] )  !!}

                    {{Form::text('Instructor', ''.Auth::user()->firstName.' '.Auth::user()->lastName.'' , ['class' => 'form-control-right'])}}
         
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('Type', 'Incident/Breakthrough', ['class' => 'col-lg-2 control-label'] )  !!}
            
                    
                    {!!  Form::select('Type', ['Breakthrough' => 'Breakthrough', 'Incident' => 'Incident', 'Severe Incident' => 'Severe Incident', 'Note' => 'Note'], '' , ['class' => 'form-control-right' ]) !!}
         
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                 {{Form::textarea('Text', '', ['class' => 'form-control-text', 'placeholder' => 'Please explain'])}}
            </div>
            &nbsp;
            {!!Form::hidden('SID',  $stu->id);!!}
            {{Form::hidden('url', URL::previous())}}
            <div class="form-row-inline-md" style="padding-top: 10px">
                    {{Form::submit('Submit', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 41px;'])}}
                    <a href="{{ URL::previous() }}" class="form-control-right button" role="button" aria-pressed="true">Cancel</a>
            </div>
        </form>
    {!! Form::close() !!}
@endsection