@extends('layouts.app')

@section('content')
    <h1>Student Index</h1>
    <div style="padding-bottom: 1em">Here you can view and edit students</div> 
    <br>
    <div class="text-right"><a href="/students/create" class="btn btn-md btn-primary">Add New</a></div>
    <hr>
    @if(count($students) > 0)
        <div class="row">
            <div class="col-3 col-lg-3">Name</div>
        </div>
        <br />
        @foreach($students as $student)
            <div class="row">
                <div class="col-3 col-lg-3">{{$student->firstName}} {{$student->lastName}}</div>
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="/students/{{$student->id}}" role="button">View</a>
                        
                            <a class="btn btn-primary active" href="/students/{{$student->id}}/edit" role="button">Edit</a>
                            {!!Form::open(['action' => ['StudentController@destroy', $student->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
    {{$students->links()}}
    @else
        <p>No students found</p>
    @endif
@endsection