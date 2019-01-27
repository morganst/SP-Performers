@extends('layouts.app')
@section('content')
  
        {{-- <div class="hika-container">

          <span class="all-surveys">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
     
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
        @foreach($notes as $row)
        <div>
            <ul>
                <li>Daily survey ID: {{$row['NId']}}</li>
               
               @if ($row->SID==12)
               <div>First Name: {{$row->Instructor}}</div>
                @endif
                <hr>
            </ul>
        </div>
        
        @endforeach --}}
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xs-12">
                    <div class="card">
                        <div class="card-header">All Notes for Your Students</div>
                            <div class="card-body">
                                {{-- For instructor --}}
                                @if(isset($notes) && Auth::user()->role==0)
                                @php
                                $i=0
                                @endphp
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
                                @endforeach
                                <div>
                                <a style="float:right;" href="/notes" role="button">View More</a>
                                </div>
                            @endif
                            {{-- For admin --}}
                            @if(isset($notes) && Auth::user()->role==1)
                                @php
                                $i=0
                                @endphp
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
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection