@extends('layouts.app')

@section('content')
    <h2>{{$cla->name}}</h2>
        <hr>
        <div>Name: {{$cla->name}}</div>
        <div>Class Size Limit: {{$cla->limit}}</div>
        @if(count($users) > 0)
            <div class="row">
                <div class="col-3 col-lg-3">Name:</div>
            </div>
            <br />
            @php
            $array = array();
            @endphp
            @for($i=0;$i<count($cla->user);$i++)
                @php
                $array[$i] = $cla->user[$i]->pivot['user_id'];
                @endphp
            @endfor
                @foreach($users as $user)
                        @if(!in_array($user->id,$array))
                            <div class="row">
                                <div class="col-3 col-lg-3">{{$user->firstName}} {{$user->lastName}}</div>
                                    <div class="btn-group">
                                            {!!Form::open(['action' => ['ClassController@attachUser', $cla->id, $user->id], 'method' => 'POST', 'class' => ''])!!}
                                                    {{Form::submit('Add to Class', ['class' => 'btn btn-sm btn-danger'])}}
                                            {!!Form::close()!!}
                                    </div>
                            </div>
                        @endif
                    <br>
                @endforeach
        @else
        <p>No users found</p>
        @endif
            <div class="row">
                <div class="col-3 col-lg-3">Instructors assigned to class:</div>
            </div>
            <br />
            @foreach($cla->user as $user)
                <div class="row">
                    <div class="col-3 col-lg-3">{{$user->firstName}} {{$user->lastName}}</div>
                        <div class="btn-group">
                            {!!Form::open(['action' => ['ClassController@detachUser', $cla->id, $user->id], 'method' => 'POST', 'class' => ''])!!}
                                    {{Form::submit('Remove from Class', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                        </div>
                </div>
                <br>
            @endforeach
            
    <hr>
    <div class="text-right">
        <a href="/classes" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
    </div>
@endsection