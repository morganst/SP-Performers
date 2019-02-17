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
    <div class="text-right">
            <a href="{{ URL::previous() }}" class="button" role="button" aria-pressed="true">Back</a>&nbsp&nbsp
            @if(Auth::user()->role==1)
            <a href="/instructors/{{$user->id}}/edit" class="button" role="button">Edit</a>
    @endif
    @if(Auth::user()->role == 0 && Auth::user()->id == $user->id)
                <a href="/instructors/{{$user->id}}/edit" class="button" role="button">Edit</a>
    @endif
        </div>

@endsection