@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
    <h1>Past Student Index</h1>
    <h3>Total Students: {{count($count)}}</h3>
    <div style="padding-bottom: 1em">Here you can view and edit students</div> 
    <div>
        <span><a href="/students" class="button">Current Students</a></span>
    </div>
    <hr>
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
    <br>
    <a href="/" class="button" role="button" aria-pressed="true">Back</a>
{{--     <script>

        function ConfirmDelete()
        {
        var del = confirm("Are you sure you want to delete?");
        if (del)
          return true;
        else
          return false;
        }
      
      </script> --}}
@endsection

