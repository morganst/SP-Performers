@php
use App\ClassAndStudents;
use App\Student;
@endphp

@extends('layouts.app')

@section('content')

    <h1 class="page-title">This is the Class page for: {{$cla->name}} </h1>

    <div class="inner-nav">

        <button><a href="/dailysurvey/create">Start Surveys</a></button>
    </div>

    {{$classandstudents = ClassAndStudents::orderBy('created_at','des')->paginate(10)}}
    {{$students = Student::orderBy('created_at','des')->paginate(10)}}
    <div>
        <h2>All Students in Class: {{$cla->id}}</h2>
        @foreach ($classandstudents as $row)
            @if ($row['classID'] == $cla->id)
            <div>
                <ul>
                    <li>Student ID: {{$lookupID = $row['studentID']}}</li>
                    <li>Student: {{DB::table('students')->where('id', $lookupID)->value('firstName')}}
                        {{DB::table('students')->where('id', $lookupID)->value('lastName')}}</li>
                </ul>
            </div>
            @endif
        @endforeach

    </div>

    <div>
        <h2>dropdown here</h2>
        <select name="class-selector">
            <option value="dance">dance</option>
            <option value="art">art</option>
            <option value="music">music</option>
        </select>

    </div>

    <div class="class-layout">

        <div class="class-layout-left">
            <h2>Student Name</h2>
        </div>

        <div class="class-layout-right">
            <div class="class-layout-right-inner">
                <button>Present</button>
                <button>Absent</button>
                <button>Individual Survey</button>
            </div>

        </div>

    </div>

    <hr>
    <div class="all-surveys">
    <h2 >All Surveys in DB</h2>
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