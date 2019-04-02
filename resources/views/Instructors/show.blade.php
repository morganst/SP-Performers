@extends('layouts.app')

@section('content')
    <h2>{{$user->firstName}} {{$user->lastName}}</h2>
    <div class="">Instructors Information:</div>
        <hr>
        <div><b>First Name:</b> {{$user->firstName}}</div>
        <div><b>Last Name:</b> {{$user->lastName}}</div>
        <div><b>Email:</b> {{$user->email}}</div>
        <div><b>Center:</b> {{$user->center}}</div>
    <hr>    
    @foreach($user->classes as $class)
            <div class="w3-card-4" style="width:80%; max-width: 350px; display: inline-block">
                <div class="w3-container w3-light-grey">
                    <h3>{{$class->name}}</h3>
                </div>
                <div class="w3-container">
                    <p>Time: {{$class->time}}</p>
                    <p>Location: {{$class->location}}</p>
                </div>
                    <a class="w3-button w3-block w3-dark-grey" href="/classes/{{$class->id}}" role="button">View Class</a>
            </div>
        @endforeach   
        <hr> 
    <div style="float: right">
        @if(Auth::user()->role==1)
            <a href="/instructors/{{$user->id}}/edit" class="button" role="button">Edit</a>
        @endif
        <a href="{{ URL::previous() }}" class="button" role="button" aria-pressed="true">Back</a>
        @if(Auth::user()->role == 0 && Auth::user()->id == $user->id)
            <a href="/instructors/{{$user->id}}/edit" class="button" role="button">Edit</a>
        @endif
    </div>

@endsection