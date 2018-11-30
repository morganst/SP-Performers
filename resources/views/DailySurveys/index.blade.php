{{-- @php
use App\ClassAndStudents;
use App\Student;
use App\Classes;
@endphp

@extends('layouts.app')

@section('content')

    <h1 class="page-title">This is the Class page for: {{$cla->name}} </h1>

    <div class="inner-nav">

    </div>

    @php
    $classandstudents = ClassAndStudents::all();
    $students = Student::all();
    @endphp

    <h2>All Students in Class: {{$cla->id}}</h2>
    <div class="class-layout">
        @foreach ($classandstudents as $row)
        @if ($row['classID'] == $cla->id)
        <div class="class-layout-row">
            <div >
                ID: {{$lookupID = $row['studentID']}}
                Student: {{DB::table('students')->where('id', $lookupID)->value('firstName')}}
                    {{DB::table('students')->where('id', $lookupID)->value('lastName')}}
                <div style="float:right;">
                    <button>Present</button>
                    <button>Absent</button>
                <button><a href="/dailysurvey/create/{{$cla->id}}/{{$lookupID}}">Start Survey</a></button>
              
                </div>
            </div>
        </div>
        @endif
        @endforeach

    </div>

    <hr>
    <div class="all-surveys"><!--
    <h2 >All Surveys in DB (for demo only)</h2>
    @foreach($dailySurveys as $row)
        <div >
            <ul>
                <li>Daily survey ID: {{$row['id']}}</li>
                <li>StudentID: {{$row['StudentID']}}</li>
                <li>ClassID: {{$row['ClassID']}}</li>
                <li>Updated at: {{$row['updated_at']}}</li>
                <li>Q1 answer: {{$row['Q1']}}</li>
                <li>Q2 answer: {{$row['Q2']}}</li>
                <li>Q3 answer: {{$row['Q3']}}</li>
                <li>Q4 answer: {{$row['Q4']}}</li>
                <li>Q5 answer: {{$row['Q5']}}</li>
                <li>Mood: {{$row['mood']}}</li>
                <hr>
            </ul>
        </div>
        @endforeach
    </div>
    -->
@endsection --}}

@extends('layouts.app')

@section('content')

<h1 class="page-title">This is the Class page for: {{$cla->name}} </h1>

    <div class="inner-nav">

    <!--<button><a href="/dailysurvey/create/{{$cla->id}}/1">Start Surveys</a></button>-->
    </div>

    <h2>All Students in Class: {{$cla->id}}</h2>
    <div class="class-layout">
        @foreach ($cla->student as $student)
        <div class="class-layout-row">
            <div >
                ID: {{$student->id}} <br>
                Student: {{$student->firstName}} {{$student->lastName}}
                <div style="float:right;">
                    <button>Present</button>
                    <button>Absent</button>
                    <button><a href="/dailysurvey/create/{{$cla->id}}/{{$student->id}}">Start Survey</a></button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <hr>
    <div class="all-surveys">
    <h2 >All Surveys in DB (for demo only)</h2>
    @foreach($dailySurveys as $row)
        <div >
            <ul>
                <li>Daily survey ID: {{$row['id']}}</li>
                <li>StudentID: {{$row['StudentID']}}</li>
                <li>ClassID: {{$row['ClassID']}}</li>
                <li>Updated at: {{$row['updated_at']}}</li>
                <li>Q1 answer: {{$row['Q1']}}</li>
                <li>Q2 answer: {{$row['Q2']}}</li>
                <li>Q3 answer: {{$row['Q3']}}</li>
                <li>Q4 answer: {{$row['Q4']}}</li>
                <li>Q5 answer: {{$row['Q5']}}</li>
                <li>Mood: {{$row['mood']}}</li>
                <hr>
            </ul>
        </div>
        @endforeach
    </div>
@endsection