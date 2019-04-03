@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    <span style="background-color:palegreen">{{ session()->get('success') }}</span>
</div>
@endif
    <h1>Student Index</h1> 
    <h3>Total Students: {{count($count)}}</h3>
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
        <div class="student-index-container">
            @foreach($students as $student)
                    <div class="student">
                        <a class="student-name" href="/students/{{$student->id}}" role="button">{{$student->firstName}} {{$student->lastName}}</a>
                    </div>
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

