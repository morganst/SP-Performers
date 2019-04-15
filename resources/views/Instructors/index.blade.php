@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success">
        <span style="background-color:palegreen">{{ session()->get('success') }}</span>
    </div>
    @endif
    <h1>Instructor Index</h1>
    <h3>Total Instructors: {{count($count)}}</h3>
    @if(Auth::user()->role==1)
        <div class="new-btn primary-button"><a href="instructors/create">Add New</a></div>
    @endif

    <hr>
    <form class="form-inline my-2 my-md-2 nav" role="search" method="get" action="{{url("/searchInstructors")}}">
            <div class="input-group">
                <input type="text" class="form-control mr-sm-0" placeholder="Search" name="title">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="glyphicon glyphicon-search"></i>Search</button>
            </div>
    </form>
    @if(count($admin) > 0)
        <div class="row">
        <h3>Admins</h3>
        </div>

        @foreach($admin as $admin)
            <div class="w3-card-4 w3-pale-blue" style="width:80%; max-width:350px; display: inline-block; margin: 10px;">
                <div class="w3-container w3-sand">
                    <h3><a href="/instructors/{{$admin->id}}" role="button">{{$admin->firstName}} {{$admin->lastName}}</a></h3>
                </div>
                @if(Auth::user()->role==1)
                <div class="w3-container">
                    &nbsp;
                </div>
                    <a class="new-btn edit-button" href="/instructors/{{$admin->id}}/edit" style="float: right;margin-right:10px" role="button">Edit</a>
                @endif
                    <a class="w3-button w3-block w3-blue" href="/instructors/{{$admin->id}}" role="button">View Admin</a>
            </div>
        @endforeach
    @else
        <p>No admins found</p>
    @endif
    <hr>
    @if(count($users) > 0)
        <div class="row">
        <h3>Instructors</h3>
        </div>

        @foreach($users as $user)
        <div class="w3-card-4 w3-pale-blue" style="width:80%; max-width:350px; display: inline-block; margin: 10px;">
            <div class="w3-container w3-sand">
                <h3><a href="/instructors/{{$user->id}}" role="button">{{$user->firstName}} {{$user->lastName}}</a></h3>
            </div>
            @if(Auth::user()->role==1)
                <div class="w3-container">
                    &nbsp;
                </div>
                    <a class="new-btn edit-button" href="/instructors/{{$user->id}}/edit" style="float: right;margin-right:10px" role="button">Edit</a>
                @endif
                    <a class="w3-button w3-block w3-blue" href="/instructors/{{$user->id}}" role="button">View Instructor</a>
            </div>
        @endforeach

    {{$users->links()}}
    @else
        <p>No instructors found</p>
    @endif

@endsection