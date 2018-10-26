@extends('layouts.app')

@section('content')
    <h1>Instructor Index</h1>
    <div style="padding-bottom: 1em">Here you can view and edit instructors</div> 
    <br>
    <div class="text-right"><a href="/instructors/create" class="btn btn-md btn-primary">Add New</a></div>
    <hr>
    @if(count($instructors) > 0)
        <div class="row">
            <div class="col-3 col-lg-3">Name</div>
        </div>
        <br />
        @foreach($instructors as $instructor)
            <div class="row">
                <div class="col-3 col-lg-3">{{$instructor->firstName}} {{$instructor->lastName}}</div>
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="/instructors/{{$instructor->id}}" role="button">View</a>
                        
                            <a class="btn btn-primary active" href="/instructors/{{$instructor->id}}/edit" role="button">Edit</a>
                            {!!Form::open(['action' => ['InstructorController@destroy', $instructor->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
    {{$instructors->links()}}
    @else
        <p>No instructors found</p>
    @endif
@endsection