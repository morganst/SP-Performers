@extends('layouts.app')

@section('content')
<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
   left: 1px;
    top:-10px;
  position: relative;
  display: inline;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
   
    <h1>Class Index</h1>
    <br>
    
    @if(Auth::user()->role==1)
    <div class="new-btn primary-button"><a href="/classes/create">Add New</a></div>
    @endif
    <hr>
    <form class="form-inline my-2 my-md-2 nav" role="search" method="get" action="{{url("/searchClasses")}}">
            <div class="input-group">
                <input type="text" class="form-control mr-sm-0" placeholder="Search" name="title">
                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="glyphicon glyphicon-search"></i>Search</button>
                <div class="input-group-append">
                <br>
                    
             
            </div>
    </form> 
    <div class="dropdown">
    <button >Filter</button>
    <div class="dropdown-content">

  @php
  $size=sizeof($filter);
  @endphp
@for($i = 0; $i < $size; $i++)

                        <a href="/filter?title={{$filter[$i]}}">{{$filter[$i]}}</a>
                   
                        @endfor
                
                    </div>
</div>
<hr>
</div>
    @if(count($classes) > 0)
            @foreach($classes as $class)
            <div class="w3-card-4" style="width:80%; max-width: 350px; display: inline-block; margin: 10px;">
                <div class="w3-container w3-light-grey">
                    <h3>{{$class->name}}</h3>
                </div>
                <div class="w3-container">
                    <p>Time: {{$class->time}}</p>   
                    <p>Location: {{$class->location}}</p>
                    <hr>
                </div>
                    
                @if(Auth::user()->role==1)
                    <a class="new-btn edit-button" href="/classes/{{$class->id}}/edit" style="float: right;margin-right:10px" role="button">Edit</a>
                @endif
                
                @if(Auth::user()->role==1)
                    <a class="w3-button w3-block w3-dark-grey" href="/classes/{{$class->id}}/addUser" role="button">Assign Instructor</a>
                    <a class="w3-button w3-block w3-dark-grey" href="/classes/{{$class->id}}/addStudent" role="button">Assign Student</a>
                @endif

                <a class="w3-button w3-block w3-blue" href="/classes/{{$class->id}}" role="button">View Class</a>
                </div>
            @endforeach
    {{$classes->links()}}
    @else
        <p>No classes found</p>
    @endif
@endsection