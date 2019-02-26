<h1 class="hidden">{{$var="I/B"}} {{$var2=$notes[0]->student()->first()}}</h1> 
@extends('layouts.app')

@section('content')
<h2>Make Notes</h2>
<p>Feel free to create note for {{$var2['firstName']}} {{$var2['lastName']}} </p>
    {!! Form::open(['action' => ['NotesController@store' ],'method' => 'POST']) !!}
        <form>
           
            
            <div class="form-row">
                {!! Form::label('Class', 'Class', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {!!  Form::select('Class', ['Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance'],  '', ['class' => 'form-control' ]) !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('SID', 'StudentID', ['class' => 'col-lg-2 control-label','readonly'] )  !!}
                <div class="col col-md-3">
                        {!!Form::number('SID', $notes[0]['SID'], ['readonly']);!!}
                    </div> 
        </div>
        &nbsp;
            <div class="form-row">
                {!! Form::label('Instructor', 'Instructor', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Instructor', ' ' , ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('I/B', 'Incident/Breakthrough', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    
                    {!!  Form::select('I/B', ['Incident' => 'Incident', 'Breakthrough' => 'Breakthrough', 'None' => 'None'], '' , ['class' => 'form-control' ]) !!}
                </div>
            </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Text', 'Note' )  !!}
                <div class="col col-md-3">
                    {{Form::textarea('Text', '', ['class' => 'form-control', 'placeholder' => 'Notes'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                 
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    <div class="text-right">
                            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
                        </div>
            </div>
        </form>
    {!! Form::close() !!}
@endsection