@extends('layouts.app')

@section('content')
    <h2>{{$stu->firstName}} {{$stu->lastName}}</h2>
    <div class="">Students Information:</div>

        <div class="text-right">
             
            <a href="/students/{{$stu->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            <a href="/notes/{{$stu->id}}" class="btn btn-secondary" style="color: #F2F2F2" role="button">Instructor Notes</a>
            
            {!!Form::open(['action' => ['StudentController@destroy', $stu->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
        </div>

        <hr>
        <h1 class="hidden">  {{$var=$stu->notes}}</h1> 
     
        <div>First Name: {{$stu->firstName}}</div>
        <div>Last Name: {{$stu->lastName}}</div>
        <div>Date of Birth: {{$stu->DOB}}</div>
        <div>Gender: {{$stu->gender}}</div>
        <div>Primary Class: {{$stu->primaryClass}}</div>
        @if($var->isEmpty())
        <div>Notes:no </div>
        @else
        <div>Notes:yes </div>
        @endif
        <div>Refernce: {{$stu->reference}}</div>
    <hr>
<small>Created: {{$stu->created_at}}</small>
        <div class="text-right">
            <a href="/students" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection