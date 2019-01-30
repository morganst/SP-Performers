@extends('layouts.app')
@section('content')
  
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xs-12">
                    <div class="card">
                        <div class="card-header">All Notes for Your Students</div>
                            <div class="card-body">
                                {{-- For instructor --}}
                                @if(isset($notes) && Auth::user()->role==0)
                                @foreach($notes as $note)
                                    @php 
                                        $class = "";
                                        if($note['I/B'] == "Breakthrough")
                                            $class = "breakthrough-note-card";
                                        else if($note['I/B'] == "None")
                                            $class = "note-note-card";
                                        else if($note['I/B'] == "Incident")
                                            $class = "incident-note-card";
                                        else
                                            $class = "severe-note-card";
                                    @endphp

                                    <div class="dashboard-note">
                                        <div class="{{$class}}">
                                            <h2>{{$note['I/B']}}!</h2>
                                            <h3>Created By: {{$note->Instructor}}</h3>
                                            <h3>Class: {{$note->Class}}</h3>       
                                            
                                            <div class='note-card-text'> {{$note->Text}}</div>

                                            <h5>Created: {{$note['created_at']->toFormattedDateString()}}</h5>
                                            <a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a>
                                    </div>
                                </div>
                                @endforeach
                                <div>
                                <a style="float:right;" href="/notes" role="button">View More</a>
                                </div>
                            @endif
                            {{-- For admin --}}
                            @if(isset($allNotes) && Auth::user()->role==1)
                            @foreach($allNotes as $note)
                                
                                    @php 
                                        $class = "";
                                        if($note['I/B'] == "Breakthrough")
                                            $class = "breakthrough-note-card";
                                        else if($note['I/B'] == "None")
                                            $class = "note-note-card";
                                        else if($note['I/B'] == "Incident")
                                            $class = "incident-note-card";
                                        else
                                            $class = "severe-note-card";
                                    @endphp

                                    <div class="dashboard-note">
                                        <div class="{{$class}}">
                                            <h2>{{$note['I/B']}}!</h2>
                                            <h3>Created By: {{$note->Instructor}}</h3>
                                            <h3>Class: {{$note->Class}}</h3>       
                                            
                                            <div class='note-card-text'> {{$note->Text}}</div>

                                            <h5>Created: {{$note['created_at']->toFormattedDateString()}}</h5>
                                            <a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection