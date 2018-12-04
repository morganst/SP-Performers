@php
use App\ClassAndStudents;
use App\Student;
use App\Classes;
@endphp

@extends('layouts.app')

@section('content')

    <h1 class="page-title">This is the Class page for: {{$cla->name}} </h1>

    <div class="inner-nav">

    <!--<button><a href="/dailysurvey/create/{{$cla->id}}/1">Start Surveys</a></button>-->
    </div>

    @php
    $classandstudents = ClassAndStudents::all();
    $students = Student::all();
    @endphp

    <h2>Class ID: {{$cla->id}}</h2>
    <div class="class-layout">
        @foreach ($classandstudents as $row)
        @if ($row['classID'] == $cla->id)
        <div class="class-layout-row">
            <div >
                ID: {{$lookupID = $row['studentID']}}
                Student: {{DB::table('students')->where('id', $lookupID)->value('firstName')}}
                    {{DB::table('students')->where('id', $lookupID)->value('lastName')}}
                <div style="float:right;">
                    <button>Present</button>
                    <button>Absent</button>
                <button><a href="/dailysurvey/create/{{$cla->id}}/{{$lookupID}}">Start Survey</a></button>
                </div>
            </div>
        </div>
        @endif
        @endforeach

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
    <hr>
    <div class="all-surveys"><!--
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
    </div>
    -->
@endsection