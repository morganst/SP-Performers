@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'AttendanceController@search', 'method' => 'POST']) !!}
    <div align="right">{{Form::date('date', \Carbon\Carbon::now('America/New_York'))}} <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i>Search Date</button></div><br>
    <input type="hidden" name="cla" value="<?php echo $cla->id; ?>"/>
    {!! Form::close() !!}
    @if(count($attend) > 0)
    <div class="row">
        <div class="col-3 col-lg-3">Student Name:</div>
    </div>
    <br>
        @foreach($cla->attendance as $att)
            <div class="class-layout-row">
                <div>
                    {{$att->student['firstName']}} {{$att->student['lastName']}}:
                    <br>
                    @if($att->attend==1)
                    Present on {{date("m-d-Y", strtotime($att->date))}}
                    @else
                    Absent on {{date("m-d-Y", strtotime($att->date))}}
                    @endif
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
    {{$attend->links()}}
    @else
    <p>No classes found</p>
    @endif
    <div class="text-right">
        <a href="/" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
    </div>
@endsection