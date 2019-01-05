<h1 class="hidden">{{$var="I/B"}}</h1> 
@extends('layouts.app')

@section('content')
<h2>Make Notes for {{$stu->firstName}} {{$stu->lastName}}</h2>
<br>
    {!! Form::open(['action' => ['NotesController@store' ],'method' => 'POST']) !!}
        <form>
            <div class="form-row">
                {!! Form::label('Class', 'Class', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    @if(isset($stu->classes->first()->name))
                    {!!  Form::select('Class', ['Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance', 'Rap' => 'Rap'], $stu->classes->first()->name, ['class' => 'form-control' ]) !!}
                    @else
                    {!!  Form::select('Class', ['Music' => 'Music', 'Art' => 'Art', 'Dance' => 'Dance', 'Rap' => 'Rap'], '', ['class' => 'form-control' ]) !!}
                    @endif
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('SID', 'StudentID', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                        {!!Form::number('SID',  $stu->id, ['readonly']);!!}
                    </div> 
        </div>
        &nbsp;
            <div class="form-row">
                {!! Form::label('Instructor', 'Instructor', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Instructor', ''.Auth::user()->firstName.' '.Auth::user()->lastName.'' , ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('I/B', 'Incident/Breakthrough', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    
                    {!!  Form::select('I/B', ['Incident' => 'Incident', 'Breakthrough' => 'Breakthrough', 'None' => 'None'], '' , ['class' => 'form-control' ]) !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Text', 'Report', ['class' => 'col-lg-2 control-label']  )  !!}
                <div class="col col-md-3">
                    {{Form::textarea('Text', '', ['class' => 'form-control', 'placeholder' => 'Please explain'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                <span style="float:right;">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
                </span>
            </div>
        </form>
    {!! Form::close() !!}
@endsection