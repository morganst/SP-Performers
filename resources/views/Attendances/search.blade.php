@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'AttendanceController@search', 'method' => 'POST']) !!}
    <div align="right">{{Form::date('date', $searchDate)}} <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="glyphicon glyphicon-search"></i>Search Date</button></div><br>
    <input type="hidden" name="cla" value="<?php echo $cla->id; ?>"/>
    {!! Form::close() !!}
    @if(count($attend) > 0)
    <div class="row">
        <div class="col-3 col-lg-3">Student Name:</div>
    </div>
    <br>
    <div>
        @foreach($attend as $att)

                @if($att->date == $searchDate)
                <div>
                    {{$att->student['firstName']}} {{$att->student['lastName']}}:
                    <br>
                    @if($att->attend==1)
                    Present on {{date("m-d-Y", strtotime($att->date))}}
                    @else
                    Absent on {{date("m-d-Y", strtotime($att->date))}}
                    @endif
                </div>
                <br>
                @endif
        @endforeach
    </div>
    @else
    <p>No classes found</p>
    @endif
    <div class="text-right">
        <a href="/classes/{{$cla->id}}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
    </div>
@endsection