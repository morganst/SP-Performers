@extends('layouts.app')

@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <h1>Instructor Index</h1>
    <div style="padding-bottom: 1em">Here you can view and edit instructors</div>
    @if(Auth::user()->role==1)
        <div class="text-right"><a href="instructors/create" class="btn btn-md btn-primary">Add New</a></div>
    @endif
    <hr>
    <form class="form-inline my-2 my-md-2 nav" role="search" method="get" action="{{url("/searchInstructors")}}">
            <div class="input-group">
                <input type="text" class="form-control mr-sm-0" placeholder="Search" name="title">
                <div class="input-group-append">
                    <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="glyphicon glyphicon-search"></i>Search</button>
                </div>
            </div>
    </form> 
    @if(count($users) > 0)
        <div class="row">
        Instructor Name:
        </div>
        <br>

        @foreach($users as $user)
            @if($user->role==1)
                @continue
            @endif
            <div class="class-layout-row">
                <div>{{$user->firstName}} {{$user->lastName}}
                    <br>
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="/instructors/{{$user->id}}" role="button">View</a>
                        @if(Auth::user()->role==1)
                            <a class="btn btn-primary active" href="/instructors/{{$user->id}}/edit" role="button">Edit</a>
                            {!!Form::open(['action' => ['InstructorController@destroy', $user->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
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
    <div class="text-right">
            <a href="/" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
    </div>
@endsection