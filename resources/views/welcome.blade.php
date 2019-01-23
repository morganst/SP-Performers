@extends('layouts.app')

@section('content')

<div><h2>Dashboard</h2></div>
<div>
    @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if(Auth::user()->role==1)
        You are logged in as an Administrator.
    @else
        You are logged in as an Instructor.
    @endif
    <hr>
    Your Classes
    <div class="flex-container">
        @foreach(Auth::user()->classes as $class)
        <div class="container">
            {{$class->name}}:
            <div class="btn-group">
                <a class="button" href="/classes/{{$class->id}}" role="button">View</a>
                @if(Auth::user()->role==1)
                    <a class="btn btn-primary active" href="/classes/{{$class->id}}/edit" role="button">Edit</a>
                    {!!Form::open(['action' => ['ClassController@destroy', $class->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                    {!!Form::close()!!}
                @endif
            </div>

            <div class="btn-group">
                    @if(Auth::user()->role==1)
                        You are logged in as an Administrator.
                    @else
                        You are logged in as an Instructor.
                    @endif
                    <hr>
                    Your Classes
                    <br><br>
                    @foreach(Auth::user()->classes as $class)
                    <div class="class-layout-row">
                        <div>
                            {{$class->name}}:
                            <br>
                                <div class="btn-group">
                                    <a class="btn btn-secondary" href="/classes/{{$class->id}}" role="button">View</a>
                                    @if(Auth::user()->role==1)
                                        <a class="btn btn-primary active" href="/classes/{{$class->id}}/edit" role="button">Edit</a>
                                        {!!Form::open(['action' => ['ClassController@destroy', $class->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                        {!!Form::close()!!}
                                    @endif
                                </div>
                                <br><br>
                                <div class="btn-group">
                                        @if(Auth::user()->role==1)
                                            <a class="btn btn-primary active" href="/classes/{{$class->id}}/addUser" role="button">Assign Instructor</a>
                                            <a class="btn btn-primary active" href="/classes/{{$class->id}}/addStudent" role="button">Assign Student</a>
                                        @endif
                                </div>
                        </div>
                    </div>
                    <br>
                    @endforeach
                    <hr>
                    @if(isset($notes))
                        Recent Notes:
                        <?php
                        $i=0
                        ?>
                        @foreach($notes as $row)
                            @if($row['I/B'] == 'Incident')
                            <div style='background-color: #FF3F3F; border: .1px solid; padding-left: 5px;'>
                                <a href="/students/{{$row->SID}}" style="color: black">{{$row->firstName}} {{$row->lastName}}</a>
                                <h6><b>Date: </b>{{$row['created_at']->toDateString()}} <b>Instructor: </b>{{$row['Instructor']}} <b>Class:</b> {{$row['Class']}}</h6>
                                <div style="font-weight:normal">{{$row->Text}}</div>
                            </div>
                            @elseif($row['I/B'] == 'Severe Incident')
                            <div style='background-color: #ff772d; border: .1px solid; padding-left: 5px;'>
                                <a href="/students/{{$row->SID}}" style="color: black">{{$row->firstName}} {{$row->lastName}}</a>
                                <h6><b>Date: </b>{{$row['created_at']->toDateString()}} <b>Instructor: </b>{{$row['Instructor']}} <b>Class:</b> {{$row['Class']}}</h6>
                                <div style="font-weight:normal">{{$row->Text}}</div>
                            </div>
                            @elseif($row['I/B'] == 'Breakthrough')
                            <div style='background-color: #7CFF82; border: .1px solid; padding-left: 5px;'>
                                <a href="/students/{{$row->SID}}" style="color: black">{{$row->firstName}} {{$row->lastName}}</a>
                                <h6><b>Date: </b>{{$row['created_at']->toDateString()}} <b>Instructor: </b>{{$row['Instructor']}} <b>Class:</b> {{$row['Class']}}</h6>
                                <div style="font-weight:normal">{{$row->Text}}</div>
                            </div>
                            @else
                            <div style='background-color: lightgrey;  border: .1px solid; padding-left: 5px;'>
                                <a href="/students/{{$row->SID}}" style="color: black">{{$row->firstName}} {{$row->lastName}}</a>
                                <h6><b>Date: </b>{{$row['created_at']->toDateString()}} <b>Instructor: </b>{{$row['Instructor']}} <b>Class:</b> {{$row['Class']}}</h6>
                                <div style="font-weight:normal">{{$row->Text}}</div>
                            </div>
                            @endif
                        <?php
                        if (++$i == 4) break;
                        ?>
                        @endforeach
                        <div>
                        <a style="float:right;" href="/notes" role="button">View More</a>
                        </div>
                    @endif
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    @if(isset($notes))
        Recent Notes:
        <?php
        $i=0
        ?>
        @foreach($notes as $row)
            @if($row['I/B'] == 'Incident')
            <div style='background-color: #FF3F3F; border: .1px solid; padding-left: 5px;'>
                {{$row->firstName}} {{$row->lastName}}
                <h6><b>Date: </b>{{$row['created_at']->toDateString()}} <b>Instructor: </b>{{$row['Instructor']}} <b>Class:</b> {{$row['Class']}}</h6>
                <div style="font-weight:normal">{{$row->Text}}</div>
            </div>
            @elseif($row['I/B'] == 'Breakthrough')
            <div style='background-color: #7CFF82; border: .1px solid; padding-left: 5px;'>
                {{$row->firstName}} {{$row->lastName}}
                <h6><b>Date: </b>{{$row['created_at']->toDateString()}} <b>Instructor: </b>{{$row['Instructor']}} <b>Class:</b> {{$row['Class']}}</h6>
                <div style="font-weight:normal">{{$row->Text}}</div>
            </div>
            @else
            <div style='background-color: lightgrey;  border: .1px solid; padding-left: 5px;'>
                {{$row->firstName}} {{$row->lastName}}
                <h6><b>Date: </b>{{$row['created_at']->toDateString()}} <b>Instructor: </b>{{$row['Instructor']}} <b>Class:</b> {{$row['Class']}}</h6>
                <div style="font-weight:normal">{{$row->Text}}</div>
            </div>
            @endif
        <?php
        if (++$i == 4) break;
        ?>
        @endforeach
        <div>
        <a style="float:right;" href="/notes" role="button">View More</a>
        </div>
    @endif
</div>

@endsection
