@extends('layouts.app')

@section('content')
<h1>THis is the Student Survey Page for the {{$cla->name}}class</h1>
    <a href="/classes/show/{{$cla->id}}">back</a>
    <div class="daily-survey-container">
        <!--GET STUDENTID -->
    <h1>
        {{DB::table('students')->where('id', $lookupID)->value('firstName')}}
        {{DB::table('students')->where('id', $lookupID)->value('lastName')}}
    </h1>
    <h1>Student ID: {{$lookupID}}</h1>

        {!! Form::open(['action' => 'DailySurveyController@store', 'method' => 'POST']) !!}
        <form>
            {{ Form::hidden('ClassID', $cla->id) }}
            {{ Form::hidden('cla', $cla) }}
            {{ Form::hidden('StudentID', $lookupID)}}
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q1', 'Rate your experience about something question 1?')  !!}
                <div class="radio-btn-spread">
                    {!! Form::radio('Q1', '1')  !!}
                    {!! Form::radio('Q1', '2')  !!}
                    {!! Form::radio('Q1', '3')  !!}
                    {!! Form::radio('Q1', '4')  !!}
                    {!! Form::radio('Q1', '5')  !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q2', 'Rate your experience about something question 2?' )  !!}
                <div class="radio-btn-spread">
                    {!! Form::radio('Q2', '1')  !!}
                    {!! Form::radio('Q2', '2')  !!}
                    {!! Form::radio('Q2', '3')  !!}
                    {!! Form::radio('Q2', '4')  !!}
                    {!! Form::radio('Q2', '5')  !!}
                </div>

            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q3', 'Rate your experience about something question 3?')  !!}
                <div class="radio-btn-spread">
                    {!! Form::radio('Q3', '1')  !!}
                    {!! Form::radio('Q3', '2')  !!}
                    {!! Form::radio('Q3', '3')  !!}
                    {!! Form::radio('Q3', '4')  !!}
                    {!! Form::radio('Q3', '5')  !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q4', 'Rate your experience about something question 4?')  !!}
                <div class="radio-btn-spread">
                    {!! Form::radio('Q4', '1')  !!}
                    {!! Form::radio('Q4', '2')  !!}
                    {!! Form::radio('Q4', '3')  !!}
                    {!! Form::radio('Q4', '4')  !!}
                    {!! Form::radio('Q4', '5')  !!}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q5', 'Rate your experience about something question 5?')  !!}
                <div class="radio-btn-spread">
                    {!! Form::radio('Q5', '1')  !!}
                    {!! Form::radio('Q5', '2')  !!}
                    {!! Form::radio('Q5', '3')  !!}
                    {!! Form::radio('Q5', '4')  !!}
                    {!! Form::radio('Q5', '5')  !!}
                </div>
            </div>
            &nbsp;
            <div class="mood-row">
                <div class="div-center">{!! Form::label('Mood', 'Mood')  !!}</div>
                <div class="radio-btn-spread-mood div-center">
                    {!! Form::radio('Mood', '1')  !!}
                    {!! Form::radio('Mood', '2')  !!}
                    {!! Form::radio('Mood', '3')  !!}
                    {!! Form::radio('Mood', '4')  !!}
                </div>
                <div class="radio-btn-spread-mood div-center">
                    {!! Form::radio('Mood', '5')  !!}
                    {!! Form::radio('Mood', '6')  !!}
                    {!! Form::radio('Mood', '7')  !!}
                    {!! Form::radio('Mood', '8')  !!}
                </div>
                <div class="radio-btn-spread-mood div-center">
                    {!! Form::radio('Mood', '9')  !!}
                    {!! Form::radio('Mood', '10')  !!}
                    {!! Form::radio('Mood', '11')  !!}
                    {!! Form::radio('Mood', '12')  !!}
                </div>
                <div class="radio-btn-spread-mood div-center">
                    {!! Form::radio('Mood', '13')  !!}
                    {!! Form::radio('Mood', '14')  !!}
                    {!! Form::radio('Mood', '15')  !!}
                    {!! Form::radio('Mood', '16')  !!}
                </div>
            </div>
            &nbsp;
            <div>
                {{Form::submit('Submit')}}

            </div>
        </form>
    {!! Form::close() !!}



        @foreach($dailySurveys as $row)
        <div>
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

@endsection