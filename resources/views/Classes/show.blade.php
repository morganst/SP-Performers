@extends('layouts.app')

@section('content')
    <h2>{{$cla->name}}</h2>
    <div class="">Classes Information:</div>

        <div class="text-right">
             
            <a href="/classes/{{$cla->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            
            {!!Form::open(['action' => ['ClassController@destroy', $cla->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
        </div>

        <hr>
        <div>Name: {{$cla->name}}</div>
        <div>Class Size Limit: {{$cla->limit}}</div>

    <hr>
<small>Created: {{$cla->created_at}}</small>
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection