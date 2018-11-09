@extends('layouts.app')

@section('content')
    <h2>{{$user->firstName}} {{$user->lastName}}</h2>
    <div class="">Instructors Information:</div>
    @if(Auth::user()->role==1)
        <div class="text-right">
            <a href="/instructors/{{$user->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            {!!Form::open(['action' => ['InstructorController@destroy', $user->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
        </div>
    @endif
        <hr>
        <div>First Name: {{$user->firstName}}</div>
        <div>Last Name: {{$user->lastName}}</div>
        <div>Center: {{$user->center}}</div>
    <hr>
<small>Created: {{$user->created_at}}</small>
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection