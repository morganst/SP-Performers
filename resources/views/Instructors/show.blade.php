@extends('layouts.app')

@section('content')
    <h2>{{$ins->firstName}} {{$ins->lastName}}</h2>
    <div class="">Instructors Information:</div>
    @if(Auth::user()->role==1)
        <div class="text-right">
            <a href="/instructors/{{$ins->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            {!!Form::open(['action' => ['InstructorController@destroy', $ins->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
        </div>
    @endif
        <hr>
        <div>First Name: {{$ins->firstName}}</div>
        <div>Last Name: {{$ins->lastName}}</div>
        <div>Center: {{$ins->center}}</div>
    <hr>
<small>Created: {{$ins->created_at}}</small>
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection