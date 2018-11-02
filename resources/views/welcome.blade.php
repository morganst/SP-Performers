@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <a class="btn btn-secondary" href="/classes" role="button">Classes</a>
                <a class="btn btn-secondary" href="/students" role="button">Students</a>
                <a class="btn btn-secondary" href="/instructors" role="button">Instructors</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->role==1)
                        You are logged in as an Administrator.
                    @else
                        You are logged in as an Instructor.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
