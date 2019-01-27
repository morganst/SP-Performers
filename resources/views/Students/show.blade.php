@extends('layouts.app')
@php
$d1 = new DateTime($stu->DOB);
$d2 = new DateTime(date("Y-m-d"));

$age = $d2->diff($d1);
@endphp
@section('content')
    <h2>{{$stu->firstName}} {{$stu->lastName}}</h2>
        <div class="text-right">
             
            
            <a href="/notes/{{$stu->id}}" class="btn btn-secondary" style="color: #F2F2F2" role="button">Instructor Notes</a>
            <a href="/sendemail" class="btn btn-secondary" style="color: #F2F2F2" role="button">Send Report</a>
            @if(Auth::user()->role==1)
            <a href="/students/{{$stu->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            {!!Form::open(['action' => ['StudentController@destroy', $stu->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
            @endif
        </div>
        <div>Student's Information:</div>
        <hr>
        <h1 class="hidden">  {{$var=$stu->notes}}</h1> 
        <div class="center-this-div">
            <div>Student ID: {{$stu->id}}</div>
            <div>First Name: {{$stu->firstName}}</div>
            <div>Last Name: {{$stu->lastName}}</div>
            <div>Date of Birth: {{date("m-d-Y", strtotime($stu->DOB))}}</div>
            <div>Age: {{$age->y}}</div>
            <div>Gender: {{$stu->gender}}</div>
            <div>Primary Class: {{$stu->primaryClass}}</div>
            <div>Referral: {{$stu->reference}}</div>
            @if($stu->enrolled == 0)
                <div>Currently Enrolled: Yes</div>
            @else
                <div>Currently Enrolled: No</div>
            @endif
            @if(is_null($var) || $var->isEmpty())
            <div>Notes Available: No 
            <a href="/notes/createnew/{{$stu->id}}" class="btn btn-secondary" style="color: #F2F2F2; float:right;" role="button">Create Note</a>
            </div>
            @else
            <div>Notes Available: Yes </div>
            @endif
        </div>
        <hr>
        Classes Assigned:
        @foreach($stu->classes as $class)
                    <div class="class-layout-row">
                        <div>
                            {{$class->name}}:<h6><b>Time:</b> {{$class->time}}  <b>Location: </b>{{$class->location}}</h6>
                                <div class="btn-group">
                                    <a class="btn btn-secondary" href="/classes/{{$class->id}}" role="button">View</a>
                                    @if(Auth::user()->role==1)
                                        <a class="btn btn-primary active" href="/classes/{{$class->id}}/addStudent" role="button">Manage Student</a>
                                    @endif
                                </div>
                        </div>
                    </div>
        @endforeach
    <hr>
        <p>
        @if($pretest->isEmpty())
            <a href ="/pretest/{{$stu->id}}" class="" role="button">Complete Pre-Test</a>
        @else
        <a href ="/students/pretest/{{$stu->id}}" class="" role="button">View Pre-Test results</a>
        <br />
            @if($posttest->isEmpty())
                <a href ="/posttest/{{$stu->id}}" class="" role="button">Complete Post-Test</a>
            @else
            <a href ="/students/posttest/{{$stu->id}}" class="" role="button">View Post-Test results</a>
            @endif
        @endif
        
        </p>
<small>Created: {{$stu->created_at}}</small>
        <div class="text-right">
            <a href="/students" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection