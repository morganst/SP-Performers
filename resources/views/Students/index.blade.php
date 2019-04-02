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
    <span><a href="/students/past" class="button">Previous Students</a></span>
    <span style="float:right"><a href="/students/create" class="button">Add New</a></span>
    </div>
    <hr>
    <form class="form-inline my-2 my-md-2 nav" role="search" method="get" action="{{url("/searchStudent")}}">
            <div class="input-group">
                <input type="text" class="form-control mr-sm-0" placeholder="Search" name="title">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="glyphicon glyphicon-search"></i>Search</button>
            </div>
            <br>
    </form> 
    @if(count($students) > 0)
        <div>
            @foreach($students as $student)
                <div class="w3-card-4" style="width:80%; max-width:350px; display: inline-block; margin: 10px;">
                    <div class="w3-container w3-light-grey">
                        <h3>{{$student->fullName}}</h3>
                    </div>
                    @if(Auth::user()->role==1)
                    <div class="w3-container">
                        &nbsp;
                    </div>
                        <a class="new-btn edit-button" href="/students/{{$student->id}}/edit" style="float: right;margin-right:10px" role="button">Edit</a>
                        <a class="w3-button w3-block w3-dark-grey" href="/dailysurvey/{{$student->id}}" role="button">View Daily Surveys</a>
                    @endif
                    <a class="w3-button w3-block w3-dark-grey" href="/notes/createnew/{{$student->id}}" role="button">Add Note</a>
                    <a class="w3-button w3-block w3-blue" href="/students/{{$student->id}}" role="button">View Student</a>
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

