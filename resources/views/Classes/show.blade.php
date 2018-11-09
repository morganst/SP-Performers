@extends('layouts.app')

@section('content')
    <h2>{{$cla->name}}</h2>
    <div class="">Classes Information:</div>
        @if(Auth::user()->role==1)
            <div class="text-right">
                <a href="/classes/{{$cla->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
                {!!Form::open(['action' => ['ClassController@destroy', $cla->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
                {!!Form::close()!!}
            </div>
        @endif
        <hr>
        <div>Name: {{$cla->name}}</div>
        <div>Class Size Limit: {{$cla->limit}}</div>
        <br>
        <div>Instructors: </div>
        @foreach($cla->user as $user)
        <div class="row">
            <div class="col-3 col-lg-3">{{$user->firstName}} {{$user->lastName}}</div>
        </div>
        <br>
    @endforeach
    <hr>
<small>Created: {{$cla->created_at}}</small>
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection