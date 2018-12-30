@extends('layouts.app')
<?php
$array=array();
$k = 0;
?>
@for($i=0;$i<count($allNotes);$i++)
    <?php 
    if(!in_array($allNotes[$i]->SID, $array))
    {
        $array[$k] = $allNotes[$i]->SID;
        $k++;
    }
    ?>
@endfor
    <?php
    $key = array_search($SID, $array);
    $next = $key + 1;
    $prev = $key - 1;
    ?>
@section('content')
<h1 class="hidden">{{$var="I/B"}}</h1> 
<h2>Notes for {{$notes[0]->student()->first()->firstName}} {{$notes[0]->student()->first()->lastName}}</h2><br>
       
@if(count($notes) > 0)

@foreach($notes as $row)
<div>
    <h1 class="hidden"> {{$var2=$row->student()->first()}}</h1> 
     
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
        <hr>
    </ul>
</div>
@endforeach
@if($next < count($array))
    <a href="/notes/{{$array[$next]}}" class="btn btn-primary" role="button" aria-pressed="true">Next Student</a>
    @endif
    @if($prev > -1)
    <a href="/notes/{{$array[$prev]}}" class="btn btn-primary" role="button" aria-pressed="true">Previous Student</a>
    @endif
<div class="text-right">
        <a href="/notes/createnew/{{$var2['id']}}" class="btn btn-secondary" style="color: #F2F2F2" role="button">Create</a>
        <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
    </div>
@else
        <p>No notes found</p>
        <div class="text-right">
                <a href="/notes/createfor/{{$var2['id']}}" class="btn btn-secondary" style="color: #F2F2F2" role="button">Create</a>
                <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
            </div>
@endif

@endsection