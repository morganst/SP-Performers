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
            <table width=100% style="float:center">
            <tr>
                <th colspan="3">Responses</th>
            </tr>
            <tr>
                <td width=50% style="text-align:right;"><b>Q1 - Rate your mood before class started: </b></td>
                <td></td>
                <td width=50% style="text-align:left;">&nbsp; {{$survey->Q1}}</td>
            </tr>
            <tr>
                <td style="text-align:right;"><b>Q2 - Rate your mood during classtime: </b></td>
                <td></td>
                <td style="text-align:left;">&nbsp; {{$survey->Q2}}</td>
            </tr>
            <tr>
                <td style="text-align:right;"><b>Q3 - Rate your mood now that class is over: </b></td>
                <td></td>
                <td style="text-align:left;">&nbsp; {{$survey->Q3}}</td>
            </tr>
            <tr>
                <td style="text-align:right;"><b>Q4 - Did you experience an breakthrough? </b></td>
                <td></td>
                <td style="text-align:left;">@if($survey->Q4 == 0)&nbsp; Yes @else &nbsp; No @endif</td>
            </tr>
           <tr>
                <td style="text-align:right;"><b>Q5 - Did you experience an Incident? </b></td>
                <td></td>
                <td style="text-align:left;">@if($survey->Q5 == 0)&nbsp; Yes @else &nbsp; No @endif</td>
            </tr>
            <tr width=25%>
                <td style="text-align:right;"><b>Mood: </b></td>
                <td></td>
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
            <tr>
                <td></td>
                <td></td>
                <td style="text-align:right;display:inline-flex"><a href="/dailysurvey/edit/{{$survey->id}}" class="new-btn edit-button" role="button">Edit</a>
                        {!!Form::open(['action' => ['DailySurveyController@destroy', $survey->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'new-btn error-button', 'role' => 'button'])}}
                        {!!Form::close()!!}</td>
            </tr>
            </table>
        </div>
        <br>
    @endforeach
    {!! $dailySurvey->links() !!}
@else
    <p>No Surveys Taken</p>
@endif
    <a href="{{ URL::previous() }}" class="button" role="button" aria-pressed="true" style="float:right;">Back</a>
@endsection