@extends('layouts.app')

@section('content')
    <h1 class="headliner">Student Index</h1>
    <div class="page-info">Here you can view and edit students</div>
    <br>
    <div class="text-right"><a href="/students/create" class="btn btn-md btn-primary">Create New</a></div>
    <hr>
    <div class="list">
    @if(count($students) > 0)
        <br />
        @foreach($students as $student)
            <div class="list-item">
                <div class="col-3 col-lg-3">{{$student->firstName}} {{$student->lastName}}</div>
                    <div class="button-row">
                        <a class="btn btn-secondary" href="/students/{{$student->id}}" role="button">View</a>

                            <a class="btn btn-primary active" href="/students/{{$student->id}}/edit" role="button">Edit</a>
                            {!!Form::open(['action' => ['StudentController@destroy', $student->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                    </div>
                </div>
            <div class="row">&nbsp;</div>
        @endforeach
    {{$students->links()}}
    @else
        <p>No students found</p>
    @endif
    </div>
@endsection