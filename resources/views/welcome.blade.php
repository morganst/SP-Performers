@extends('layouts.app')

@section('content')
<h2 class="headliner">Dashboard</h2>
<div class="container">

    <div class="button-row">
        <a href="/classes" role="button">Classes</a>
        <a href="/students" role="button">Students</a>
        <a href="/instructors" role="button">Instructors</a>
    </div>

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if(Auth::user()->role==1)
            <small>You are logged in as an <b>Administrator</b>.</small>
        @else
            <small>You are logged in as an <b>Instructor</b>.</small>
        @endif
    </div>
</div>
@endsection
