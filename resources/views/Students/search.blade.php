@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
    <h1>Student Index</h1>
    <div style="padding-bottom: 1em">Here you can view and edit students</div>
    <div>
    <span><a href="/students/past" class="button">Previous Students</a></span>
    <span style="float:right"><a href="/students/create" class="button">Add New</a></span>
    </div>
    <hr>
    <form class="form-inline my-2 my-md-2 nav" role="search" method="get" action="{{url("/searchStudent")}}">
            <div class="input-group">
                <input type="text" class="form-control mr-sm-0" placeholder="Search" name="title">
                <div class="input-group-append">
                    <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="glyphicon glyphicon-search"></i>Search</button>
                </div>
            </div>
    </form> 
    @if(count($students) > 0)
        <div class="row">
            <div class="col-lg-3">Student Name:</div>
        </div>
        <div class="flex-container">
            @foreach($students as $student)
                <div class="container">
                    <div class="col-lg-3">{{$student->firstName}} {{$student->lastName}}
                        <br>
                        <div class="btn-group">
                            <a class="btn btn-secondary" href="/students/{{$student->id}}" role="button">View</a>
                            @if(Auth::user()->role==1)
                            <a class="btn btn-primary active" href="/students/{{$student->id}}/edit" role="button">Edit</a>
                                {!!Form::open(['action' => ['StudentController@destroy', $student->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger', 'onsubmit' => 'return ConfirmDelete()'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                {!!Form::close()!!}
                            @endif
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    {{$students->links()}}
    @else
        <p>No students found</p>
    @endif

            <a href="/" class="button" role="button" aria-pressed="true">Back</a>

    <script>

        function ConfirmDelete()
        {
        var del = confirm("Are you sure you want to delete?");
        if (del)
          return true;
        else
          return false;
        }

      </script>
@endsection

