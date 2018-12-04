@extends('layouts.app')

@section('content')
    <h1 class="headliner">Class Index</h1>
    <div class="page-info">Here you can view and edit classes</div>
    <br>
    @if(Auth::user()->role==1)
    <div class="text-right"><a href="/classes/create" class="btn btn-md btn-primary">Add New</a></div>
    @endif
    <hr>
    <div class="list">
    @if(count($classes) > 0)

        <br />
        @foreach($classes as $class)
            <div class="list-item">
                <div >{{$class->name}}</div>
                <div class="button-row">
                    <a  href="/classes/{{$class->id}}" role="button">View</a>

                    @if(Auth::user()->role==1)
                        <a href="/classes/{{$class->id}}/edit" role="button">Edit</a>
                        <a href="/classes/{{$class->id}}/add" role="button">Assign</a>
                        {!!Form::open(['action' => ['ClassController@destroy', $class->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    @endif
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
    {{$classes->links()}}
    @else
        <p>No classes found</p>
    @endif
    </div>
@endsection