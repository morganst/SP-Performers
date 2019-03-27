@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
    <h1>Student Index</h1> 
    <h3>Total Students: {{count($count)}}</h3>
    <div style="padding-bottom: 1em">Here you can view and edit students</div> 
    <div>
    <span><a href="/students" class="button">Current Students</a></span>
    </div>
    <hr>
    <form class="form-inline my-2 my-md-2 nav" role="search" method="get" action="{{url("/searchPastStudent")}}">
            <div class="input-group">
                <input type="text" class="form-control mr-sm-0" placeholder="Search" name="title">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="glyphicon glyphicon-search"></i>Search</button>
            </div>
            <br>
    </form> 
    @if(count($students) > 0)
        <div>
            @foreach($students as $student)
                    <div class="student">
                        <a class="student-name" href="/students/{{$student->id}}" role="button">{{$student->fullName}}</a>
                    </div>
            @endforeach
        </div>
    {{$students->links()}}
    @else
        <p>No students found</p>
    @endif
    <br>
    <a href="/" class="button" role="button" aria-pressed="true">Back</a>
@endsection

