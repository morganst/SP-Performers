@extends('layouts.app')

@section('content')

@if(count($dailySurvey) > 0)
    <h2>
        Daily Survey Results for 
        {{DB::table('students')->where('id', $dailySurvey[0]->StudentID)->value('fullName')}}
    </h2>
    @foreach($dailySurvey as $survey)
        <div class="live-container">
            <p>Date Taken: {{date("m-d-Y", strtotime($survey->date))}}</p>
            <p>Class: {{DB::table('classes')->where('id', $dailySurvey[0]->ClassID)->value('name')}}</p>
            <table width=100% style="float:center; padding-bottom: 20px;">
            <tr>
                <th colspan="3">Responses</th>
            </tr>
            <tr>
                <td><b>Rate your mood before class started: </b></td>
                <td style="text-align:left;">&nbsp; {{$survey->Q1}}</td>
            </tr>
            <tr>
                <td><b>Rate your mood during classtime: </b></td>
                <td style="text-align:left;">&nbsp; {{$survey->Q2}}</td>
            </tr>
            <tr>
                <td><b>Rate your mood now that class is over: </b></td>
                <td style="text-align:left;">&nbsp; {{$survey->Q3}}</td>
            </tr>
            <tr>
                <td><b>Did you experience an breakthrough? </b></td>
                <td style="text-align:left;">@if($survey->Q4 == 0)&nbsp; Yes @else &nbsp; No @endif</td>
            </tr>
           <tr>
                <td><b>Did you experience an Incident? </b></td>
                <td style="text-align:left;">@if($survey->Q5 == 0)&nbsp; Yes @else &nbsp; No @endif</td>
            </tr>
            <tr width=25%>
                <td><b>Mood: </b></td>
                <td style="text-align:left;">&nbsp;
                @if($survey->mood == 1) Happy
                @elseif($survey->mood == 2) Proud
                @elseif($survey->mood == 3) Peaceful
                @elseif($survey->mood == 4) Optimistic
                @elseif($survey->mood == 5) Accepted
                @elseif($survey->mood == 6) Appriciated
                @elseif($survey->mood == 7) Respected
                @elseif($survey->mood == 8) Sad
                @elseif($survey->mood == 9) Lonely
                @elseif($survey->mood == 10) Guilty
                @elseif($survey->mood == 11) Scared
                @elseif($survey->mood == 12) Helpless
                @elseif($survey->mood == 13) Insecure
                @elseif($survey->mood == 14) Anxious
                @elseif($survey->mood == 15) Angry
                @else Hurt
                @endif</td>
            </tr>
            </table>
                {!!Form::open(['action' => ['DailySurveyController@destroy', $survey->id], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'form-control-right new-btn error-button', 'role' => 'button'])}}
                {!!Form::close()!!}
                <a href="/dailysurvey/{{$survey->id}}/edit" class="form-control-right new-btn edit-button" role="button">Edit</a>

            <br />
        </div>
        <br />
    @endforeach
    {!! $dailySurvey->links() !!}
@else
    <p>No Surveys Taken</p>
@endif
    <a href="{{ URL::previous() }}" class="form-control-right button" role="button" aria-pressed="true" style="float:right;">Back</a>
@endsection