@extends('layouts.app')
@section('content')
@if(count($notes) > 0)
@foreach($notes as $row)
<div>
    <ul>
        <li>Daily survey ID: {{$row['NId']}}</li>
       
      
       <div>First Name: {{$row->Text}}</div>
       <a href="/notes/{{$row->NId}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
       {!!Form::open(['action' => ['NotesController@destroy', $row->NId], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
       {{Form::hidden('_method', 'DELETE')}}
       {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
   {!!Form::close()!!}
      
        <hr>
    </ul>
</div>
@endforeach
@else
        <p>No notes found</p>
@endif

@endsection