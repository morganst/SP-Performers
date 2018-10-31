@extends('layouts.app')

@section('content')
    <h2>{{$stu->firstName}} {{$stu->lastName}}</h2>
    <div class="">Pretest Information:</div>

        <div class="text-right">
             
            <a href="/students/{{$stu->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            
            {!!Form::open(['action' => ['StudentController@destroy', $stu->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
        </div>

        <hr>
            <div>First Name: {{$stu->firstName}}</div>
            <div>Last Name: {{$stu->lastName}}</div>
            <div>Date of Birth: {{$stu->DOB}}</div>
            <div>Gender: {{$stu->gender}}</div>
            <div>Primary Class: {{$stu->primaryClass}}</div>
            <div>Notes: {{$stu->notes}}</div>
            <div>Reference: {{$stu->reference}}</div>
        <hr>
        <p>
        @if($pretest->isEmpty())
            <a href ="/pretest/{{$stu->id}}" class="" role="button">Complete Pre-Test</a>
        @else
        <a href ="/students/{{$stu->id}}" class="" role="button">View Pre-Test results</a>
        @endif
        
        </p>
<small>Created: {{$stu->created_at}}</small>
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection