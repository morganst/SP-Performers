@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <h2>{{$stu->firstName}} {{$stu->lastName}}</h2>
        <div>
            <a href="/notes/{{$stu->id}}" class="new-btn edit-button" style="" role="button">Instructor Notes</a>
            {{-- <a href="/notes/createnew/{{$stu->id}}" class="new-btn edit-button" style="" role="button">Add Note</a> --}}
            @if(Auth::user()->role==1)
                {{-- <a href="/dailysurvey/{{$stu->id}}" class="new-btn edit-button" style="" role="button">View Daily Surveys</a> --}}
                <a href="/students/{{$stu->id}}/edit" class="new-btn edit-button" role="button">Edit</a>
                <br /><br />
            @endif
        </div>
        <div>Student's Information:</div>
        <hr>
        <h1 class="hidden">  {{$var=$stu->notes}}</h1> 
        <div>
            <div><b>Student ID:</b> {{$stu->id}}</div>
            <div><b>First Name:</b> {{$stu->firstName}}</div>
            <div><b>Last Name:</b> {{$stu->lastName}}</div>
            <div><b>Date of Birth:</b> {{date("m-d-Y", strtotime($stu->DOB))}}</div>
            <div><b>Age:</b> {{$age->y}}</div>
            <div><b>Gender:</b> {{$stu->gender}}</div>
            <div><b>Primary Class:</b> {{$stu->primaryClass}}</div>
            <div><b>Referral:</b> {{$stu->reference}}</div>
            @if($stu->enrolled == 0)
                <div><b>Currently Enrolled:</b> Yes</div>
            @else
                <div><b>Currently Enrolled:</b> No</div>
            @endif
            @if(is_null($var) || $var->isEmpty())
                <div><b>Notes Available:</b> No</div>
            @else
                <div><b>Notes Available:</b> Yes</div>
            @endif
        </div>
        <hr>
        @foreach($stu->classes as $class)
            <div class="w3-card-4 w3-light-blue" style="width:80%; max-width: 350px; display: inline-block">
                <div class="w3-container w3-sand">
                    <h3>{{$class->name}}</h3>
                </div>
                <div class="w3-container">
                    <p>Time: {{$class->time}}</p>
                    <p>Location: {{$class->location}}</p>
                </div>
                    <a class="w3-button w3-block w3-blue" href="/classes/{{$class->id}}" role="button">View Class</a>
            </div>
        @endforeach
    <hr>
        <p>
        @if($pretest->isEmpty())
            <a href ="/pretest/{{$stu->id}}" class="new-btn primary-button" role="button">Complete Pre-Test</a>
        @else
        <a href ="/students/pretest/{{$stu->id}}" class="new-btn edit-button" role="button">View Pre-Test results</a>
        <br />
            @if($posttest->isEmpty())
                <a href ="/posttest/{{$stu->id}}" class="new-btn primary-button" role="button">Complete Post-Test</a>
            @else
            <a href ="/students/posttest/{{$stu->id}}" class="new-btn edit-button" role="button">View Post-Test results</a>
            @endif
        @endif
        </p>
        <small>Created: {{$stu->created_at}}</small>
        <a href="/students" class="button" role="button" aria-pressed="true" style="float:right;">Back</a>
@endsection