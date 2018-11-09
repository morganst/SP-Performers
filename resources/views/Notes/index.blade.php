@extends('layouts.app')
@section('content')
  
        <div class="hika-container">

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
        
        @endforeach

@endsection