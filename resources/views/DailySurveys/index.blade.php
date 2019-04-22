
@extends('layouts.app')

@section('content')
<div class="container-fluid">
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
    <h2>{{$cla->name}}
        @if(count($cla->user)>0)with {{$cla->user[0]->firstName}} {{$cla->user[0]->lastName}}@endif
    </h2>
    
    @if(Auth::user()->role==1)
            <div style="float: right">
                <a href="/classes/{{$cla->id}}/edit" class="new-btn edit-button" role="button">Edit</a>
            </div>
    @endif
    <div ><a href="/{{$cla->id}}/pagination" class="new-btn back">Past Attendance</a></div><br>
    <div>
        {!! Form::open(['action' => 'AttendanceController@store', 'method' => 'POST']) !!}
        <div style="float:right;">{{Form::date('date', \Carbon\Carbon::now('America/New_York'))}}</div><br>
        @php
        $i = 0;
        @endphp
        Students:
        @foreach ($cla->student as $student)
        @php
        $att = DB::table('attendances')->where('date', '=', (\Carbon\Carbon::now('America/New_York'))->toDateString())->where('student_id','=',$student->id)->where('classes_id','=',$cla->id)->first();
        @endphp 
                <div style="background-color:#265778;padding:8px;border-radius: 15px;border: 1px solid black;" class="class-layout-row">
                <div><a href="/students/{{$student->id}}" style="color: white; width:100%;border-bottom: 1px solid white; font-size: 16pt">{{$student->firstName}} {{$student->lastName}}</a></div>
                <span style="vertical-align: middle">
                    <a href="/dailysurvey/create/{{$cla->id}}/{{$student->id}}" style="float: right; margin-top:10px"class="new-btn edit-button" role="button" aria-pressed="true">Start Survey</a>
                    <br>
                    @if($att)
                        {{Form::label('present'.$i.'', 'Present', array('class' => 'class-page-form-label'))}}
                        {{Form::radio('attend['.$i.']', '1',$student->attendance->where('classes_id', $cla->id)->first()->attend == 1, array('id'=>'present'.$i.'', 'class' => 'class-page-form-radio'))}}
                        {{Form::label('absent'.$i.'', 'Absent', array('class' => 'class-page-form-label'))}}
                        {{Form::radio('attend['.$i.']', '0',$student->attendance->where('classes_id', $cla->id)->first()->attend == 0, array('id'=>'absent'.$i.'', 'class' => 'class-page-form-radio'))}}
                    @else
                        {{Form::label('present'.$i.'', 'Present', array('class' => 'class-page-form-label'))}}
                        {{Form::radio('attend['.$i.']', '1', false, array('id'=>'present'.$i.'', 'class' => 'class-page-form-radio'))}}
                        {{Form::label('absent'.$i.'', 'Absent', array('class' => 'class-page-form-label'))}}
                        {{Form::radio('attend['.$i.']', '0', false, array('id'=>'absent'.$i.'', 'class' => 'class-page-form-radio'))}}
                    @endif
                </span>
        </div>
        <input type="hidden" name="stu[]" value="<?php echo $student->id; ?>"/>
        <input type="hidden" name="cla" value="<?php echo $cla->id; ?>"/>
        @php
        $i++;
        @endphp
        @endforeach
        <br>
        <div class="text-right">
            {{Form::submit('Submit', ['class' => 'button'])}}
            <a href="/classes" class="button" role="button" aria-pressed="true">Back</a>
        </div>
        {!! Form::close() !!}
    </div>

    <hr>
    <div id="react-render2"></div>
    <script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>
    </div>
</div>
@endsection