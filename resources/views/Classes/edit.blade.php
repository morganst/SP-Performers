@extends('layouts.app')

@section('content')
    <h1>Update Class</h1>
    
    {!! Form::open(['action' => ['ClassController@update', $cla->id], 'method' => 'POST']) !!}
    <form class="small-form">
            <div class="form-row-inline-md">
                {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label'] )  !!}
                    {{Form::text('name', $cla->name, ['class' => 'form-control-right', 'placeholder' => 'Name'])}}
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('time', 'Class Time', ['class' => 'col-lg-2 control-label'] )  !!}

                    {{Form::text('time', $cla->time, ['class' => 'form-control-right', 'placeholder' => 'Class Time'])}}

            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('location', 'Class Location', ['class' => 'col-lg-2 control-label'] )  !!}
         
                    {{Form::text('location', $cla->location, ['class' => 'form-control-right', 'placeholder' => 'Class Location'])}}
        
            </div>
            &nbsp;
            <div class="form-row-inline-md">
                {!! Form::label('limit', 'Class Size Limit', ['class' => 'col-lg-2 control-label'] )  !!}
         
                    {{Form::text('limit', $cla->limit, ['class' => 'form-control-right', 'placeholder' => 'Limit'])}}
          
            </div>
            &nbsp;
            <div class="form-row-inline-md" style="padding-top: 20px">
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Save', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 41px;'])}}
                <a href="{{ URL::previous() }}" class="form-control-right button">Cancel</a>
            </div>
        </form>
    {!! Form::close() !!}

    <div class="form-row-inline-md">
        {!!Form::open(['action' => ['ClassController@destroy', $cla->id], 'method' => 'POST', 'onsubmit' => 'return ConfirmDelete()'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete Class', ['class' => 'form-control-right new-btn error-button', 'role' => 'button', 'style' => 'padding-top: 10px'])}}
        {!!Form::close()!!}
    </div>
@endsection