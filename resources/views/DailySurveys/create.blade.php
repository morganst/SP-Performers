@extends('layouts.app')

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
            {{ Form::hidden('ClassID', $cla->id) }}
            {{ Form::hidden('cla', $cla) }}
            {{ Form::hidden('StudentID', $lookupID)}}
         &nbsp;
 <div style="float:right;">{{Form::date('date', \Carbon\Carbon::now('America/New_York'))}}</div><br><br>
            <table style="width:100%">
            <tr>
                <td>{!! Form::label('Q1', 'Rate your mood before class started.')  !!}</td>
                <td>{!! Form::label('Q1', '1=Very Negative, 5=Very Positive')  !!}</td>
                @if(isset(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date)&&(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date== date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York')))))
                    <td>{!! Form::radio('Q1', '1', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q1 == 1)  !!}</td>
                    <td>{!! Form::radio('Q1', '2', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q1 == 2)  !!}</td>
                    <td>{!! Form::radio('Q1', '3', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q1 == 3)  !!}</td>
                    <td>{!! Form::radio('Q1', '4', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q1 == 4)  !!}</td>
                    <td>{!! Form::radio('Q1', '5', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q1 == 5)  !!}</td>
                @else
                    <td>{!! Form::radio('Q1', '1')  !!}</td>
                    <td>{!! Form::radio('Q1', '2')  !!}</td>
                    <td>{!! Form::radio('Q1', '3')  !!}</td>
                    <td>{!! Form::radio('Q1', '4')  !!}</td>
                    <td>{!! Form::radio('Q1', '5')  !!}</td>
                @endif
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q2', 'Rate your mood during classtime.' )  !!}</td>
                <td>{!! Form::label('Q2', '1=Very Negative, 5=Very Positive')  !!}</td>
                @if(isset(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date)&&(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date== date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York')))))
                    <td>{!! Form::radio('Q2', '1', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q2 == 1)  !!}</td>
                    <td>{!! Form::radio('Q2', '2', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q2 == 2)  !!}</td>
                    <td>{!! Form::radio('Q2', '3', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q2 == 3)  !!}</td>
                    <td>{!! Form::radio('Q2', '4', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q2 == 4)  !!}</td>
                    <td>{!! Form::radio('Q2', '5', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q2 == 5)  !!}</td>
                @else
                    <td>{!! Form::radio('Q2', '1')  !!}</td>
                    <td>{!! Form::radio('Q2', '2')  !!}</td>
                    <td>{!! Form::radio('Q2', '3')  !!}</td>
                    <td>{!! Form::radio('Q2', '4')  !!}</td>
                    <td>{!! Form::radio('Q2', '5')  !!}</td>
                @endif
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q3', 'Rate your mood now that class is over.')  !!}</td>
                <td>{!! Form::label('Q3', '1=Very Negative, 5=Very Positive')  !!}</td>
                @if(isset(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date)&&(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date== date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York')))))
                    <td>{!! Form::radio('Q3', '1', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q3 == 1)  !!}</td>
                    <td>{!! Form::radio('Q3', '2', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q3 == 2)  !!}</td>
                    <td>{!! Form::radio('Q3', '3', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q3 == 3)  !!}</td>
                    <td>{!! Form::radio('Q3', '4', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q3 == 4)  !!}</td>
                    <td>{!! Form::radio('Q3', '5', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q3 == 5)  !!}</td>
                @else
                <td>{!! Form::radio('Q3', '1')  !!}</td>
                <td>{!! Form::radio('Q3', '2')  !!}</td>
                <td>{!! Form::radio('Q3', '3')  !!}</td>
                <td>{!! Form::radio('Q3', '4')  !!}</td>
                <td>{!! Form::radio('Q3', '5')  !!}</td>
                @endif
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q4', 'Rate your experience about something question 4?')  !!}</td>
                <td>{!! Form::label('Q4', '1=Very Negative, 5=Very Positive')  !!}</td>
                @if(isset(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date)&&(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date== date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York')))))
                    <td>{!! Form::radio('Q4', '1', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q4 == 1)  !!}</td>
                    <td>{!! Form::radio('Q4', '2', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q4 == 2)  !!}</td>
                    <td>{!! Form::radio('Q4', '3', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q4 == 3)  !!}</td>
                    <td>{!! Form::radio('Q4', '4', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q4 == 4)  !!}</td>
                    <td>{!! Form::radio('Q4', '5', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q4 == 5)  !!}</td>
                @else
                    <td>{!! Form::radio('Q4', '1')  !!}</td>
                    <td>{!! Form::radio('Q4', '2')  !!}</td>
                    <td>{!! Form::radio('Q4', '3')  !!}</td>
                    <td>{!! Form::radio('Q4', '4')  !!}</td>
                    <td>{!! Form::radio('Q4', '5')  !!}</td>
                @endif
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q5', 'Rate your experience about something question 5?')  !!}</td>
                <td>{!! Form::label('Q5', '1=Very Negative, 5=Very Positive')  !!}</td>
                @if(isset(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date)&&(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date== date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York')))))
                    <td>{!! Form::radio('Q5', '1', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q5 == 1)  !!}</td>
                    <td>{!! Form::radio('Q5', '2', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q5 == 2)  !!}</td>
                    <td>{!! Form::radio('Q5', '3', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q5 == 3)  !!}</td>
                    <td>{!! Form::radio('Q5', '4', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q5 == 4)  !!}</td>
                    <td>{!! Form::radio('Q5', '5', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->Q5 == 5)  !!}</td>
                @else
                    <td>{!! Form::radio('Q5', '1')  !!}</td>
                    <td>{!! Form::radio('Q5', '2')  !!}</td>
                    <td>{!! Form::radio('Q5', '3')  !!}</td>
                    <td>{!! Form::radio('Q5', '4')  !!}</td>
                    <td>{!! Form::radio('Q5', '5')  !!}</td>
                @endif
            </tr>
            </table>
            &nbsp;
            <table style="width:100%">
                <th colspan="4">
                {!! Form::label('Mood', 'Mood')  !!}
                </th>
                @if(isset(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date)&&(DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->date== date("Y-m-d", strtotime(\Carbon\Carbon::now('America/New_York')))))
            <tr>
                    <td>{!! Form::radio('Mood', '1', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 1) !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '2', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 2)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '3', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 3)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '4', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 4)  !!}<span>happy</span></td>
            </tr>
            <tr>
                    <td>{!! Form::radio('Mood', '5', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 5)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '6', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 6)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '7', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 7)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '8', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 8)  !!}<span>happy</span></td>
            </tr>
            <tr>
                    <td>{!! Form::radio('Mood', '9', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 9)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '10', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 10)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '11', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 11)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '12', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 12)  !!}<span>happy</span></td>
            </tr>
            <tr>
                    <td>{!! Form::radio('Mood', '13', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 13)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '14', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 14)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '15', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 15)  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '16', DB::table('dailySurveys')->where('StudentID', $lookupID)->orderBy('updated_at', 'desc')->first()->mood == 16)  !!}<span>happy</span></td>
            </tr>
                @else
                <tr>
                    <td>{!! Form::radio('Mood', '1')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '2')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '3')  !!}<span>happy</span></td>
                    <td> {!! Form::radio('Mood', '4')  !!}<span>happy</span></td>
                </tr>
                <tr>
                    <td>{!! Form::radio('Mood', '5')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '6')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '7')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '8')  !!}<span>happy</span></td>
                </tr>
                <tr>
                    <td>{!! Form::radio('Mood', '9')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '10')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '11')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '12')  !!}<span>happy</span></td>
                </tr>
                <tr>
                    <td>{!! Form::radio('Mood', '13')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '14')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '15')  !!}<span>happy</span></td>
                    <td>{!! Form::radio('Mood', '16')  !!}<span>happy</span></td>
                </tr>
                @endif
            &nbsp;
        </table>
        <br>
                {{Form::submit('Submit',['class' => 'button'])}}
                @if($next < count($array) && $prev == -1)
                <a href="/dailysurvey/create/{{$cla->id}}/{{$array[$next]}}" class="button" role="button" aria-pressed="true">Next</a>
                <a class="button" role="button" aria-pressed="true" style="background-color:transparent; color:grey">Previous</a>
                @elseif($next < count($array) && $prev > -1)
                <a href="/dailysurvey/create/{{$cla->id}}/{{$array[$next]}}" class="button" role="button" aria-pressed="true">Next</a>
                <a href="/dailysurvey/create/{{$cla->id}}/{{$array[$prev]}}" class="button" role="button" aria-pressed="true">Previous</a>
                @elseif($prev > -1 && $next == count($array))
                <a class="button" role="button" aria-pressed="true" style="background-color:transparent; color:grey">Next</a>
                <a href="/dailysurvey/create/{{$cla->id}}/{{$array[$prev]}}" class="button" role="button" aria-pressed="true">Previous</a>
                @endif
                <a href="/classes/show/{{$cla->id}}" class="button">back</a>
    {!! Form::close() !!}
    <br>
    </div>
    {{-- <script>
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
      </script> --}}
@endsection