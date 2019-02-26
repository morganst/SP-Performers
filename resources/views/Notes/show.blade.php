@extends('layouts.app')
@section('content')

@if(count($notes) > 0)
    <h2>Notes for {{$notes[0]->student()->first()->firstName}} {{$notes[0]->student()->first()->lastName}}</h2>
    
    <div><a href="/notes/createnew/{{$SID}}" class="new-btn primary-button" style="color: #F2F2F2" role="button">Create New Note</a><br /><br />

    @foreach($notes as $note)
        @php 
            $class = "";
            if($note['Type'] == "Breakthrough")
                $class = "breakthrough-note-card";
            else if($note['Type'] == "Note")
                $class = "note-note-card";
            else if($note['Type'] == "Incident")
                $class = "incident-note-card";
            else
                $class = "severe-note-card";
        @endphp

        <div class="dashboard-note">
            <div class="{{$class}}">
                <h2>{{$note['Type']}}!</h2>
                <h3>Created By: {{$note->Instructor}}</h3>
                <h3>Class: {{$note->Class}}</h3>       
                
                <div class='note-card-text'> {{$note->Text}}</div>

                <h5>Created: {{$note['created_at']->toFormattedDateString()}}</h5>
                <a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a>
        </div>
    </div>
    @endforeach

    <div class="text-right">
        <a href="{{ URL::previous() }}" class="new-btn back" role="button" aria-pressed="true"><- Back</a>
    </div>
@else
    <p>No notes found</p>
    <div>
        <a href="/notes/createnew/{{$SID}}" class="new-btn primary-button" style="color: #F2F2F2" role="button">Create New Note</a>
        <a href="{{ URL::previous() }}" class="new-btn back" role="button" aria-pressed="true"><- Back</a>
    </div>
@endif

@endsection