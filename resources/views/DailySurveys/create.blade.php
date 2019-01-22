@extends('layouts.app')
@for($i=0;$i<count($cla->student);$i++)
    <?php
    $array[$i] = $cla->student[$i]->id;
    ?>
@endfor
    <?php
    $key = array_search($lookupID, $array);
    $next = $key + 1;
    $prev = $key - 1;
    ?>
@section('content')
<h1>This is the Student Survey Page for {{$cla->name}}</h1>
    <div class="daily-survey-container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    <h1>
        {{DB::table('students')->where('id', $lookupID)->value('firstName')}}
        {{DB::table('students')->where('id', $lookupID)->value('lastName')}}
    </h1>

        {!! Form::open(['action' => 'DailySurveyController@store', 'method' => 'POST']) !!}
        <form>
            {{ Form::hidden('ClassID', $cla->id) }}
            {{ Form::hidden('cla', $cla) }}
            {{ Form::hidden('StudentID', $lookupID)}}
{{--             <a href="/notes/createfor/{{$lookupID}}" class="btn btn-secondary" style="color: #F2F2F2; float:right;" role="button">add Note</a>
 --}}            &nbsp;
            <div class="form-row">
                {!! Form::label('Q1', 'Rate your mood before class started.')  !!}
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
                {!! Form::label('Q2', 'Rate your mood during classtime.' )  !!}
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
                {!! Form::label('Q3', 'Rate your mood now that class is over.')  !!}
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
                    <span>{!! Form::radio('Mood', '1')  !!}<span>happy</span></span>
                    {!! Form::radio('Mood', '2')  !!}<span>happy</span>
                    {!! Form::radio('Mood', '3')  !!}<span>happy</span>
                    {!! Form::radio('Mood', '4')  !!}<span>happy</span>
                </div>
                <div class="radio-btn-spread-mood div-center">
                    {!! Form::radio('Mood', '5')  !!}<span>happy</span>
                    {!! Form::radio('Mood', '6')  !!}<span>happy</span>
                    {!! Form::radio('Mood', '7')  !!}<span>happy</span>
                    {!! Form::radio('Mood', '8')  !!}<span>happy</span>
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
                {{Form::submit('Submit',['class' => 'button'])}}
                @if($next < count($array))
            <a href="/dailysurvey/create/{{$cla->id}}/{{$array[$next]}}" class="button" role="button" aria-pressed="true" onclick="return Confirm()">Next</a>
                @endif
                @if($prev > -1)
                <a href="/dailysurvey/create/{{$cla->id}}/{{$array[$prev]}}" class="button" role="button" aria-pressed="true" onclick="return Confirm()">Previous</a>
                @endif
                <a href="/classes/show/{{$cla->id}}" class="button">back</a>
            </div>
        </form>
    {!! Form::close() !!}
    <a href="/notes/createnew/{{$lookupID}}" class="btn btn-secondary" style="color: #F2F2F2; float:right;" role="button">Create Note</a>

        {{-- @foreach($dailySurveys as $row)
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
        @endforeach --}}

    </div>

    <script>
        function Confirm()
        {
            for (var i = 0; i < document.getElementsByName('Q1').length; i++)
            {
                if (document.getElementsByName('Q1')[i].checked || document.getElementsByName('Q2')[i].checked || document.getElementsByName('Q3')[i].checked || document.getElementsByName('Q4')[i].checked || document.getElementsByName('Q5')[i].checked)
                {
                    var x = confirm("Continue without submitting?");
                    if (x)
                    return true;
                    else
                    return false;
                }
            }
            for (var i = 0; i < document.getElementsByName('Mood').length; i++)
            {
                if (document.getElementsByName('Mood')[i].checked)
                {
                    var x = confirm("Continue without submitting?");
                    if (x)
                    return true;
                    else
                    return false;
                }
            }
        }
      </script>
@endsection