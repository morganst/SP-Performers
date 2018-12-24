@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->role==1)
                        You are logged in as an Administrator.
                    @else
                        You are logged in as an Instructor.
                    @endif
                    <hr>
                    Your Classes
                    <br><br>
                    @foreach(Auth::user()->classes as $class)
                    <div class="class-layout-row">
                        <div>
                            {{$class->name}}:
                            <br>
                                <div class="btn-group">
                                    <a class="btn btn-secondary" href="/classes/{{$class->id}}" role="button">View</a>
                                    @if(Auth::user()->role==1)
                                        <a class="btn btn-primary active" href="/classes/{{$class->id}}/edit" role="button">Edit</a>
                                        <a class="btn btn-primary active" href="/classes/{{$class->id}}/addUser" role="button">Assign Instructor</a>
                                        <a class="btn btn-primary active" href="/classes/{{$class->id}}/addStudent" role="button">Assign Student</a>
                                        {!!Form::open(['action' => ['ClassController@destroy', $class->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                        {!!Form::close()!!}
                                    @endif
                                </div>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
