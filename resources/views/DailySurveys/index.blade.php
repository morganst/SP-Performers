
@extends('layouts.app')

@section('content')
<h1 class="page-title">This is the Class page for: {{$cla->name}} </h1>

    <div class="inner-nav">

    <!--<button><a href="/dailysurvey/create/{{$cla->id}}/1">Start Surveys</a></button>-->
    </div>
    <div class="text-right"><a href="/attendances/{{$cla->id}}" class="btn btn-md btn-primary">Past Attendance</a></div>
    <h2>All Students in Class: {{$cla->id}}</h2>
    <div class="class-layout">
        {!! Form::open(['action' => 'AttendanceController@store', 'method' => 'POST']) !!}
        <div align="right">{{Form::date('date', \Carbon\Carbon::now('America/New_York'))}}</div><br>
        <?php
        $i = 0;
        ?>
        @foreach ($cla->student as $student)
        <div style="border:1px solid black;padding:8px;" class="class-layout-row">
            <div >
                Student: {{$student->firstName}} {{$student->lastName}}
                <div><a href="/dailysurvey/create/{{$cla->id}}/{{$student->id}}" class="btn btn-primary" role="button" aria-pressed="true">Start Survey</a></div>
                <div style="float:right;">
                @if(isset($student->attendance->where('date',date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York'))))->first()->attend))
                {{Form::label('present'.$i.'', 'Present')}}
                {{Form::radio('attend['.$i.']', '1',$student->attendance->where('date',date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York'))))->first()->attend == 1, array('id'=>'present'.$i.''))}}
                {{Form::label('absent'.$i.'', 'Absent')}}
                {{Form::radio('attend['.$i.']', '0',$student->attendance->where('date',date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York'))))->first()->attend == 0, array('id'=>'absent'.$i.''))}}
                @else
                {{Form::label('present'.$i.'', 'Present')}}
                {{Form::radio('attend['.$i.']', '1', true, array('id'=>'present'.$i.''))}}
                {{Form::label('absent'.$i.'', 'Absent')}}
                {{Form::radio('attend['.$i.']', '0', false, array('id'=>'absent'.$i.''))}}
                @endif
                </div>
            </div>
        </div>
        <input type="hidden" name="stu[]" value="<?php echo $student->id; ?>"/>
        <input type="hidden" name="cla" value="<?php echo $cla->id; ?>"/>
        <?php
        $i++;
        ?>
        @endforeach
        <div class="text-right">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>
        {!! Form::close() !!}
    </div>

    <hr>
    <div id="chart">
        <h2>Graph:</h2>
     </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
                const options = {
                chart: {
                    height: 450,
                    width: '100%',
                    type: 'bar',
                    background: '#f4f4f4',
                    foreColor: '333'
                },
                series: [{
                    name: 'Student Survey Score',
                    data: [
                        9, 7, 12,
                        8, 16, 4,
                        8, 11, 10,
                        9
                    ]
                }],
                xaxis: {
                    categories: [
                        'Student 1', 'Student 2', 'Student 3', 'Student 4', 'Student 5', 'Student 6', 'Student 7', 'Student 8', 'Student 9', 'Student 10'
                    ]
                },
                plotOptions: {
                    bar: {
                        horizontal: false
                    }
                },
                fill: {
                    colors: ['#f44336']
                },
                dataLabels: {
                    enabled: false
                },
                title: {
                    text: "Student Survey",
                    align: "center",
                    margin: 20,
                    offsetY: 20,
                    style: {
                        fontSize: "25px"
                    }
                }
             };
             // Initialize Chart
            const chart = new ApexCharts(document.querySelector('#chart'), options);
             //Render Chart
            chart.render();
             //Event Method Example
            document.querySelector("button").addEventListener("click", () => chart.updateOptions({
                plotOptions: {
                    bar: {
                        horizontal: true
                    }
                }
            }))
        </script>

    {{-- <hr>
    <div class="all-surveys">
    <h2 >All Surveys in DB (for demo only)</h2>
    @foreach($dailySurveys as $row)
        <div >
            <ul>
                <li>Daily survey ID: {{$row['id']}}</li>
                <li>StudentID: {{$row['StudentID']}}</li>
                <li>ClassID: {{$row['ClassID']}}</li>
                <li>Updated at: {{$row['updated_at']}}</li>
                <li>Q1 answer: {{$row['Q1']}}</li>
                <li>Q2 answer: {{$row['Q2']}}</li>
                <li>Q3 answer: {{$row['Q3']}}</li>
                <li>Q4 answer: {{$row['Q4']}}</li>
                <li>Q5 answer: {{$row['Q5']}}</li>
                <li>Mood: {{$row['mood']}}</li>
                <hr>
            </ul>
        </div>
        @endforeach
    </div> --}}
@endsection