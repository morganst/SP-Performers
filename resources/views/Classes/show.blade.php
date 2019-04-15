@extends('layouts.app')

@section('content')
    <h2>{{$cla->name}}</h2>
    <div class="">Classes Information:</div>
        @if(Auth::user()->role==1)
            <div class="text-right">
                <a href="/classes/{{$cla->id}}/edit" class="new-btn edit-button" role="button">Edit</a>
                {!!Form::open(['action' => ['ClassController@destroy', $cla->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0', 'onsubmit' => 'return ConfirmDelete()'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
                {!!Form::close()!!}
            </div>
        @endif
        <hr>
        <div><b>Name:</b> {{$cla->name}}</div>
        <div><b>Class Size Limit:</b> {{$cla->limit}}</div>
        <div><b>Class Time:</b> {{$cla->time}}</div>
        <div><b>Class Location:</b> {{$cla->location}}</div>
        <br>
        <div>Instructors: </div>
        @foreach($cla->user as $user)
        <div class="row">
            <div class="col-3 col-lg-3">{{$user->firstName}} {{$user->lastName}}</div>
        </div>
        <br>
    @endforeach
    <hr>
<small>Created: {{$cla->created_at}}</small>
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="button" role="button" aria-pressed="true">Back</a>
        </div>

        <script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>
        <div>ASLKDJFLKSJJ DFLKJFS</div>

@endsection