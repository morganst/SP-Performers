@extends('layouts.app')

@section('content')
    <h1>THis is the DAILY SURVEY INDEX PAGE</h1>

    <div class="daily-survey-container">
        <div>
            <h3>Question 1</h3>
            <input class ="radio" type="radio" name="radio" value="1">
            <input class ="radio" type="radio" name="radio" value="2">
            <input class ="radio" type="radio" name="radio" value="3">
            <input class ="radio" type="radio" name="radio" value="4">
            <input class ="radio" type="radio" name="radio" value="5">
        </div>

        {!! Form::open(['action' => 'DailySurveyController@store', 'method' => 'POST']) !!}
        <form>
            <div class="form-row">
                {!! Form::label('StudentID', 'StudentID')  !!}
                {!! Form::text('StudentID', '4')  !!}
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('ClassID', 'ClassID')  !!}
                {!! Form::text('ClassID', '4')  !!}
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q1', 'Q1')  !!}
                {!! Form::radio('Q1', '1')  !!}
                {!! Form::radio('Q1', '2')  !!}
                {!! Form::radio('Q1', '3')  !!}
                {!! Form::radio('Q1', '4')  !!}
                {!! Form::radio('Q1', '5')  !!}
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q2', 'Q2' )  !!}
                {!! Form::radio('Q2', '1')  !!}
                {!! Form::radio('Q2', '2')  !!}
                {!! Form::radio('Q2', '3')  !!}
                {!! Form::radio('Q2', '4')  !!}
                {!! Form::radio('Q2', '5')  !!}
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q3', 'Q3')  !!}
                {!! Form::radio('Q3', '1')  !!}
                {!! Form::radio('Q3', '2')  !!}
                {!! Form::radio('Q3', '3')  !!}
                {!! Form::radio('Q3', '4')  !!}
                {!! Form::radio('Q3', '5')  !!}
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q4', 'Q4')  !!}
                {!! Form::radio('Q4', '1')  !!}
                {!! Form::radio('Q4', '2')  !!}
                {!! Form::radio('Q4', '3')  !!}
                {!! Form::radio('Q4', '4')  !!}
                {!! Form::radio('Q4', '5')  !!}
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q5', 'Q5')  !!}
                {!! Form::radio('Q5', '1')  !!}
                {!! Form::radio('Q5', '2')  !!}
                {!! Form::radio('Q5', '3')  !!}
                {!! Form::radio('Q5', '4')  !!}
                {!! Form::radio('Q5', '5')  !!}
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Mood', 'Mood')  !!}
                {!! Form::radio('Mood', '1')  !!}
                {!! Form::radio('Mood', '2')  !!}
                {!! Form::radio('Mood', '3')  !!}
                {!! Form::radio('Mood', '4')  !!}
                {!! Form::radio('Mood', '5')  !!}
                {!! Form::radio('Mood', '6')  !!}
                {!! Form::radio('Mood', '7')  !!}
                {!! Form::radio('Mood', '8')  !!}
                {!! Form::radio('Mood', '9')  !!}
                {!! Form::radio('Mood', '10')  !!}
                {!! Form::radio('Mood', '11')  !!}
                {!! Form::radio('Mood', '12')  !!}
                {!! Form::radio('Mood', '13')  !!}
                {!! Form::radio('Mood', '14')  !!}
                {!! Form::radio('Mood', '15')  !!}
                {!! Form::radio('Mood', '16')  !!}
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