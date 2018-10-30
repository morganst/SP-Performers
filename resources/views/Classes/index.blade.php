@extends('layouts.app')

@section('content')
    <h1>Class Index</h1>
    <div style="padding-bottom: 1em">Here you can view and edit classes</div> 
    <br>
    <div class="text-right"><a href="/classes/create" class="btn btn-md btn-primary">Add New</a></div>
    <hr>
    @if(count($classes) > 0)
        <div class="row">
            <div class="col-3 col-lg-3">Name</div>
        </div>
        <br />
        @foreach($classes as $class)
            <div class="row">
                <div class="col-3 col-lg-3">{{$class->name}}</div>
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="/classes/{{$class->id}}" role="button">View</a>
                        
                            <a class="btn btn-primary active" href="/classes/{{$class->id}}/edit" role="button">Edit</a>
                            {!!Form::open(['action' => ['ClassController@destroy', $class->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
    {{$classes->links()}}
    @else
        <p>No classes found</p>
    @endif
@endsection