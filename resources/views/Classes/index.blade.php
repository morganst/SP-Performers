@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <h1>Class Index</h1>
    <br>
    @if(Auth::user()->role==1)
    <div class="new-btn primary-button"><a href="/classes/create">Add New</a></div>
    @endif
    <hr>
    @if(count($classes) > 0)
            @foreach($classes as $class)
            <div class="w3-card-4" style="width:80%; max-width: 350px; display: inline-block">
                <div class="w3-container w3-light-grey">
                    <h3>{{$class->name}}</h3>
                </div>
                <div class="w3-container">
                    <p>Time: {{$class->time}}</p>   
                    <p>Location: {{$class->location}}</p>
                    <hr>
                </div>
                    
                @if(Auth::user()->role==1)
                    <a class="new-btn edit-button" href="/classes/{{$class->id}}/edit" style="float: right" role="button">Edit</a>
                @endif
                
                @if(Auth::user()->role==1)
                    <a class="w3-button w3-block w3-dark-grey" href="/classes/{{$class->id}}/addUser" role="button">Assign Instructor</a>
                    <a class="w3-button w3-block w3-dark-grey" href="/classes/{{$class->id}}/addStudent" role="button">Assign Student</a>
                @endif

                <a class="w3-button w3-block w3-blue" href="/classes/{{$class->id}}" role="button">View Class</a>
                </div>
            @endforeach
    {{$classes->links()}}
    @else
        <p>No classes found</p>
    @endif
@endsection