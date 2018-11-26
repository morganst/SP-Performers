@extends('layouts.app')

@section('content')
    <h1>Class Index</h1>
    <div style="padding-bottom: 1em">Here you can view and edit classes</div> 
    <br>
    @if(Auth::user()->role==1)
    <div class="text-right"><a href="/classes/create" class="btn btn-md btn-primary">Add New</a></div>
    @endif
    <hr>
    @if(count($classes) > 0)
        <div class="row">
            <div class="col-3 col-lg-3">Class Name</div>
        </div>
        <br>
            @foreach($classes as $class)
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
                <div class="row">&nbsp;</div>
            @endforeach
    {{$classes->links()}}
    @else
        <p>No classes found</p>
    @endif
    <div class="text-right">
            <a href="/" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
    </div>
@endsection