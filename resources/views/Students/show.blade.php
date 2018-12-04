@extends('layouts.app')
<?php
$d1 = new DateTime($stu->DOB);
$d2 = new DateTime(date("Y-m-d"));

$age = $d2->diff($d1);
?>
@section('content')
    <h2>{{$stu->firstName}} {{$stu->lastName}}</h2>
    <div class="">Students Information:</div>

        <div class="text-right">
             
            <a href="/students/{{$stu->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            <a href="/notes/{{$stu->id}}" class="btn btn-secondary" style="color: #F2F2F2" role="button">Instructor Notes</a>
            <a href="/sendemail" class="btn btn-secondary" style="color: #F2F2F2" role="button">Send Report</a>
            
            {!!Form::open(['action' => ['StudentController@destroy', $stu->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
        </div>

        <hr>
        <h1 class="hidden">  {{$var=$stu->notes}}</h1> 
        <div class="center-this-div">
                <div>StudnetID: {{$stu->id}}</div>
            <div>First Name: {{$stu->firstName}}</div>
            <div>Last Name: {{$stu->lastName}}</div>
            <div>Date of Birth: {{$stu->DOB}}</div>
            <div>Age: {{$age->y}}</div>
            <div>Gender: {{$stu->gender}}</div>
            <div>Primary Class: {{$stu->primaryClass}}</div>
            @if(is_null($var) || $var->isEmpty())
            <div>Notes:no </div>
            <a href="/notes/createnew/{{$stu->id}}" class="btn btn-secondary" style="color: #F2F2F2; float:right;" role="button">Crseate Note</a>
            @else
            <div>Notes:yes </div>
            
            @endif
            <div>Reference: {{$stu->reference}}</div>
        </div>
    <hr>
<small>Created: {{$stu->created_at}}</small>
        <div class="text-right">
        <a href="/students" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection