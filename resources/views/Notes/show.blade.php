@extends('layouts.app')
@section('content')
@if(count($notes) > 0)
@foreach($notes as $row)
<div>
    <ul>
        <li>Daily survey ID: {{$row['NId']}}</li>
       
      
       <div>First Name: {{$row->Text}}</div>
       <a href="/notes/{{$row->NId}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
      
        <hr>
    </ul>
</div>
@endforeach
@else
        <p>No notes found</p>
@endif

@endsection