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
                    @if($note['Type'] === "Severe Incident" && $note['Hide'] != 'Yes')
                    <div class="severe-note-card">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <a style="color:white" href="/notes/{{$note->SID}}" class="severe-note">
                            <span class="severe">
                                <strong>{{$note['Type']}}!</strong>
                            </span>
                            <br />
                            Date: {{$note['created_at']->toFormattedDateString()}}
                            <br />
                            Instructor: {{$note['Instructor']}}
                            <br />
                            Class: {{$note['Class']}}
                            <br />
                            Student:
                            {{$note->student["fullName"]}}
                            <br /><br />
                        </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>

    @else
        You are logged in as an Instructor.
        <div class="dashboard-note">
            @if(isset($notes))
                @foreach($notes as $note)
                    @if($note['Type'] === "Severe Incident" && $note['Hide'] != 'Yes')
                    <div class="severe-note-card">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <a style="color:white" href="/notes/{{$note->SID}}" class="severe-note">
                            <span class="severe">
                                <strong>{{$note['Type']}}!</strong>
                            </span>
                            <br />
                            Date: {{$note['created_at']->toFormattedDateString()}}
                            <br />
                            Instructor: {{$note['Instructor']}}
                            <br />
                            Class: {{$note['Class']}}
                            <br />
                            Student:
                            {{$note->student["fullName"]}}
                            <br /><br />
                        </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    <hr>
    @endif





        @foreach(Auth::user()->classes as $class)
        <div class="w3-card-4" style="width:80%; max-width: 350px; display: inline-block">
                <div class="w3-container w3-light-grey">
                    <h3>{{$class->name}}</h3>
                </div>

                <div class="w3-container">
                    <p>Time: {{$class->time}}</p>
                    <p>Location: {{$class->location}}</p>
                    <hr>
                </div>

                @if(Auth::user()->role==1)
                    <a class="new-btn edit-button" href="/classes/{{$class->id}}/edit" style="float: right" role="button">Edit</a>
                @endif

                @if(Auth::user()->role==1)
                    <a class="w3-button w3-block w3-dark-grey" href="/classes/{{$class->id}}/addUser" role="button">Assign Instructor</a>
                    <a class="w3-button w3-block w3-dark-grey" href="/classes/{{$class->id}}/addStudent" role="button">Assign Student</a>
                @endif

                <a class="w3-button w3-block w3-blue" href="/classes/{{$class->id}}" role="button">View Class</a>
           </div>
            @endforeach
    <hr>
    {{-- For instructor --}}
    @if(isset($notes) && Auth::user()->role==0)
        Recent Activity:
        @foreach($notes as $note)
        @if($note['Hide'] != 'Yes')
            @php
                $class = "";
                if($note['Type'] == "Breakthrough")
                    $class = "breakthrough-note-card";
                else if($note['Type'] == "None")
                    $class = "note-note-card";
                else if($note['Type'] == "Incident")
                    $class = "incident-note-card";
                else
                    $class = "severe-note-card";
            @endphp

            <div class="dashboard-note">
                <div class="{{$class}}">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <h2>{{$note['Type']}}!</h2>
                    <h3>Created By: {{$note->Instructor}}</h3>
                    <h3>Student: {{$note->firstName}} {{$note->lastName}}</h3>
                    <h3>Class: {{$note->Class}}</h3>

                    <div class='note-card-text'> {{$note->Text}}</div>

                    <h5>Created: {{$note['created_at']->toFormattedDateString()}}</h5>
                    <a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a>
                </div>
            </div>
            @if (++$i == 4)
            @break
            @endif
        @endif
        
    @endforeach

        <div>
            <a class="new-btn primary-button" style="float:right;" href="/notes" role="button">View All</a>
        </div>
    @endif
    {{-- For admin --}}
    @if(isset($allNotes) && Auth::user()->role==1)
        Recent Activity:
        @foreach($allNotes as $note)
        @if($note['Hide'] != 'Yes')
            @php
                $class = "";
                if($note['Type'] == "Breakthrough")
                    $class = "breakthrough-note-card";
                else if($note['Type'] == "None")
                    $class = "note-note-card";
                else if($note['Type'] == "Incident")
                    $class = "incident-note-card";
                else
                    $class = "severe-note-card";
            @endphp

            <div class="dashboard-note">
                <div class="{{$class}}">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <a href="/notes/{{$note->SID}}"><h2>{{$note['Type']}}!</h2></a>
                    <h3>Created By: {{$note->Instructor}}</h3>
                    <h3>Student: {{$note->student["fullName"]}}</h3>
                    <h3>Class: {{$note->Class}}</h3>

                    <div class='note-card-text'> {{$note->Text}}</div>

                    <h5>Created: {{$note['created_at']->toFormattedDateString()}}</h5>
                    <a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a>
                </div>
            </div>
        @endif
        @endforeach
        <div>
            <a class="new-btn primary-button" style="float: right" href="/notes" role="button">View All</a>
        </div>
    @endif

    <div id="react-render"></div>

    <script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>

</div>

@endsection
