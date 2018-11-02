@extends('layouts.app')
@section('content')
<h1 class="hidden">{{$var="I/B"}}</h1> 
<h2>Notes</h2>

@if(count($notes) > 0)

@foreach($notes as $row)
<div>
        <br> <br> 
    <ul>
            <h5> Date:{{$row['created_at']}}</h5>
        <h6>Instructor:{{$row['Instructor']}} Class:{{$row['Class']}}</h6>
       
        
       
       <div class='hika-container'> {{$row->Text}}</div>
       @if($row->$var=="Breakthrough")
       <input type="text" class="hika-input2" name="country" value={{$row->$var}} readonly> 
       @elseif ($row->$var=="Incident")
       <input type="text" class="hika-input1" name="country" value={{$row->$var}} readonly>
       @else
       <input type="text" name="country" value={{$row->$var}} readonly>
       @endif
       
       <a href="/notes/{{$row->NId}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
       {!!Form::open(['action' => ['NotesController@destroy', $row->NId], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
       {{Form::hidden('_method', 'DELETE')}}
       {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
   {!!Form::close()!!}
      <br> <br> 
        <hr>
    </ul>
</div>
@endforeach
<div class="text-right">
        <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
    </div>
@else
        <p>No notes found</p>
        <div class="text-right">
                <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
            </div>
@endif

@endsection