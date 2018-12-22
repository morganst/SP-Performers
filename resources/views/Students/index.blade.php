@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
    <h1>Student Index</h1>
    <div style="padding-bottom: 1em">Here you can view and edit students</div> 
    <div class="text-right"><a href="/students/create" class="btn btn-md btn-primary">Add New</a></div>
    <hr>
    @if(count($students) > 0)
        <div class="row">
            <div class="col-lg-3">Student Name:</div>
        </div>
        <br>
        @foreach($students as $student)
            <div class="row">
                <div class="col-lg-3">{{$student->firstName}} {{$student->lastName}}
                    <br>
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="/students/{{$student->id}}" role="button">View</a>
                        <a class="btn btn-primary active" href="/students/{{$student->id}}/edit" role="button">Edit</a>
                            {!!Form::open(['action' => ['StudentController@destroy', $student->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    {{$students->links()}}
    @else
        <p>No students found</p>
    @endif
    <div class="text-right">
            <a href="/" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
    </div>
@endsection