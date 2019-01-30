@extends('layouts.app')

@section('content')
    <h1>New Class</h1>
    <p>Please enter information for creating a new class</p>
    {!! Form::open(['action' => 'ClassController@store', 'method' => 'POST']) !!}
    <form class="small-form">
            <div class="form-row-inline-md">
                {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label'] )  !!}
           
                    {{Form::text('name', '', ['class' => 'form-control-right', 'placeholder' => 'Name'])}}
           
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('time', 'Class Time', ['class' => 'col-lg-2 control-label'] )  !!}
            
                    {{Form::text('time', '', ['class' => 'form-control-right', 'placeholder' => 'Class Time'])}}
             
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('location', 'Class Location', ['class' => 'col-lg-2 control-label'] )  !!}
              
                    {{Form::text('location', '', ['class' => 'form-control-right', 'placeholder' => 'Class Location'])}}
              
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('limit', 'Class Size Limit', ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{Form::text('limit', 8, ['class' => 'form-control-right', 'placeholder' => 'Limit'])}}
              
            </div>
            &nbsp;
            <div class="form-row-inline-md" style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 41px;'])}}
                <a class="form-control-right button" href="/students" role="button">Cancel</a>
            </div>
        </form>
    {!! Form::close() !!}
@endsection