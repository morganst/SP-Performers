@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <h1>Instructor Index</h1>
    <h3>Total Instructors: {{count($count)}}</h3>
    <div style="padding-bottom: 1em">Here you can view and edit instructors</div>
    @if(Auth::user()->role==1)
        <div class="text-right"><a href="instructors/create" class="button">Add New</a></div>
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
        Admin Name:
        </div>
        <br>

        @foreach($admin as $admin)
            <div class="class-layout-row">
                <div>{{$admin->firstName}} {{$admin->lastName}}
                    <br>
                    <div class="btn-group">
                        <a class="button" href="/instructors/{{$admin->id}}" role="button">View</a>
                        @if(Auth::user()->role==1)
                            <a class="button" href="/instructors/{{$admin->id}}/edit" role="button">Edit</a>                       
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
    @else
        <p>No admins found</p>
    @endif
    <hr>
    @if(count($users) > 0)
        <div class="row">
        Instructor Name:
        </div>
        <br>

        @foreach($users as $user)
            <div class="class-layout-row">
                <div>{{$user->firstName}} {{$user->lastName}}
                    <br>
                    <div class="btn-group">
                        <a class="button" href="/instructors/{{$user->id}}" role="button">View</a>
                        @if((Auth::user()->role==1)||(Auth::user()->role == 0 && Auth::user()->id == $user->id))
                            <a class="button" href="/instructors/{{$user->id}}/edit" role="button">Edit</a>                       
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach

    {{$users->links()}}
    @else
        <p>No instructors found</p>
    @endif

@endsection