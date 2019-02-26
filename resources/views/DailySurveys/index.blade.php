
@extends('layouts.app')

@section('content')
<div class="container-fluid">
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
    <h2>All Students in Class: {{$cla->name}}</h2>

    <div class="text-right"><a href="/live_search" class="button">Past Attendance</a></div><br>
    <div>
        {!! Form::open(['action' => 'AttendanceController@store', 'method' => 'POST']) !!}
        <div style="float:right;">{{Form::date('date', \Carbon\Carbon::now('America/New_York'))}}</div><br>
        <?php
        $i = 0;
        ?>
        <h2><?php $num = array();?></h2>
        Students:
        @foreach ($cla->student as $student)
            <div style="border:1px solid black;padding:8px;" class="class-layout-row">
                <a href="/students/{{$student->id}}" style="color: black">{{$student->firstName}} {{$student->lastName}}</a>
                <span style="float:right;">
                    <a href="/dailysurvey/create/{{$cla->id}}/{{$student->id}}" class="btn btn-primary" role="button" aria-pressed="true">Start Survey</a>&nbsp;&nbsp;
                    @if(isset($student->attendance->where('date',date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York'))))->first()->attend)&&isset($student->attendance->where('classes_id', $cla->id)->first()->attend))
                    {{Form::label('present'.$i.'', 'Present')}}
                    {{Form::radio('attend['.$i.']', '1',$student->attendance->where('classes_id', $cla->id)->first()->attend == 1, array('id'=>'present'.$i.''))}}
                    {{Form::label('absent'.$i.'', 'Absent')}}
                    {{Form::radio('attend['.$i.']', '0',$student->attendance->where('classes_id', $cla->id)->first()->attend == 0, array('id'=>'absent'.$i.''))}}
                    @else
                    {{Form::label('present'.$i.'', 'Present')}}
                    {{Form::radio('attend['.$i.']', '1', false, array('id'=>'present'.$i.''))}}
                    {{Form::label('absent'.$i.'', 'Absent')}}
                    {{Form::radio('attend['.$i.']', '0', false, array('id'=>'absent'.$i.''))}}
                    @endif
                </span>
            </div>

            <input type="hidden" name="stu[]" value="<?php echo $student->id; ?>"/>
            <input type="hidden" name="cla" value="<?php echo $cla->id; ?>"/>

            <?php $num[$i] = $i;$i++; ?>

        @endforeach
        <br>
        <div class="text-right">
            {{Form::submit('Submit', ['class' => 'button'])}}
            <a href="/classes" class="button" role="button" aria-pressed="true">Back</a>
        </div>
        {!! Form::close() !!}
    </div>

    <hr>
    <h2>Graph:</h2>

    <div id="chart2">
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
        var options = {
            chart: {
                height: 350,
                type: 'radar',
                width: '50%',
            },
            series: [{
                name: 'Series 1',
                data: [80, 50, 30, 40, 100, 20],
            }],
            title: {
                text: 'Basic Radar Chart'
            },
            labels: ['January', 'February', 'March', 'April', 'May', 'June']
            };
        // Initialize Chart
        var chart = new ApexCharts(document.querySelector('#chart2'), options);
        //Render Chart
        chart.render();
        </script>
    </div>

    <div id="chart3">
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var options = {
                chart: {
                    type: 'donut',
                    width: '50%',
                },
                series: [44, 55, 41, 17, 15],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            }

        var chart = new ApexCharts(
                document.querySelector("#chart3"),
                options
            );

            chart.render();
        </script>

    </div>

    <div id="chart">
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var num = <?php echo '["' . implode('","', $num) . '"]' ?>;
                options = {
                chart: {
                    height: 450,
                    width: '50%',
                    type: 'bar',
                    background: '#f4f4f4',
                    foreColor: '333'
                },
                series: [{
                    name: 'Student Survey Score',
                    data: [
                        num[0],
                        num[1], num[2],
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
                    colors: ['#3ad622']
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
            chart = new ApexCharts(document.querySelector('#chart'), options);
            //Render Chart
            chart.render();
        </script>
    </div>
</div>
@endsection