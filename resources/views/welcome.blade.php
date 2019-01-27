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

        <br /><br />
        <div class="dashboard-note">
            @if(isset($allNotes))
                @foreach($allNotes as $note)
                    @if($note['I/B'] === "Severe Incident" && $note['Hide'] == 'No')
                    <div class="severe-note-card">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <a href="/notes/{{$note->SID}}" class="severe-note">
                        <span class="severe">
                            <strong>{{$note['I/B']}}!</strong>
                        </span>
                        <br /> 
                        Date: {{$note['created_at']->toFormattedDateString()}}
                        <br />
                        Instructor: {{$note['Instructor']}}
                        <br />
                        Class: {{$note['Class']}}
                        <br />
                        Student:
                        {{$note->firstName}} {{$note->lastName}}
                        <br /><br />
                    </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>

    @else
        You are logged in as an Instructor.
    <hr>
    Your Classes
    @endif

    


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
                        <a class="btn btn-primary active" href="/classes/{{$class->id}}/addUser" role="button">Assign Instructor</a>
                        <a class="btn btn-primary active" href="/classes/{{$class->id}}/addStudent" role="button">Assign Student</a>
                    @endif
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    {{-- For instructor --}}
    @if(isset($notes) && Auth::user()->role==0)
        Recent Notes:
<<<<<<< HEAD
        @php
        $i=0
        @endphp
=======

>>>>>>> 3dfc61b80b7ab18a0c12c1ecb19d9cf209529f82
        @foreach($notes as $row)
            @if($row['I/B'] == 'Incident')
            <div style='background-color: #FF3F3F; border: .1px solid; padding-left: 5px;'>
                {{$row->firstName}} {{$row->lastName}}
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
<<<<<<< HEAD
        @php
        if (++$i == 4) break;
        @endphp
=======
>>>>>>> 3dfc61b80b7ab18a0c12c1ecb19d9cf209529f82
        @endforeach
        <div>
        <a style="float:right;" href="/notes" role="button">View More</a>
        </div>
    @endif
    {{-- For admin --}}
    @if(isset($allNotes) && Auth::user()->role==1)
        Recent Notes:
<<<<<<< HEAD
        @php
        $i=0
        @endphp
=======
>>>>>>> 3dfc61b80b7ab18a0c12c1ecb19d9cf209529f82
        @foreach($allNotes as $row)
            @if($row['I/B'] == 'Incident')
            <div style='background-color: #FF3F3F; border: .1px solid; padding-left: 5px;'>
                {{$row->firstName}} {{$row->lastName}}
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
<<<<<<< HEAD
        @php
        if (++$i == 4) break;
        @endphp
=======
>>>>>>> 3dfc61b80b7ab18a0c12c1ecb19d9cf209529f82
        @endforeach
        <div>
        <a style="float:right;" href="/notes" role="button">View More</a>
        </div>
    @endif
</div>

@endsection
