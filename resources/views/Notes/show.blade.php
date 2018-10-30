@extends('layouts.app')
@section('content')
  
@foreach($notes as $row)
<div>
    <ul>
        <li>Daily survey ID: {{$row['NId']}}</li>
       
      
       <div>First Name: {{$row->Text}}</div>
      
        <hr>
    </ul>
</div>
@endforeach

@endsection