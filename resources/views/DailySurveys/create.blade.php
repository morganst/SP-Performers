@extends('layouts.app')

@section('content')

<h2>This is the Student Survey Page for {{$cla->name}}</h2>
    <div class="live-container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            <span style="background-color:palegreen">{{ session()->get('success') }}</span>
        </div>
        @endif
    <h1>
        {{DB::table('students')->where('id', $lookupID)->value('fullName')}}
    </h1>

        {!! Form::open(['action' => 'DailySurveyController@store', 'method' => 'POST','id' => 'myForm']) !!}
            {{ Form::hidden('ClassID', $cla->id) }}
            {{ Form::hidden('cla', $cla) }}
            {{ Form::hidden('StudentID', $lookupID)}}
         &nbsp;
 <div style="float:right;">{{Form::date('date', \Carbon\Carbon::now('America/New_York'))}}</div><br><br>
            <table style="width:100%">
            <tr>
                <td>{!! Form::label('Q1', 'Rate your mood before class started.')  !!}</td>
                <td>{!! Form::label('Q1', '1=Very Negative, 5=Very Positive')  !!}</td>
                    <td>{!! Form::radio('Q1', '1')  !!}</td>
                    <td>{!! Form::radio('Q1', '2')  !!}</td>
                    <td>{!! Form::radio('Q1', '3')  !!}</td>
                    <td>{!! Form::radio('Q1', '4')  !!}</td>
                    <td>{!! Form::radio('Q1', '5')  !!}</td>
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q2', 'Rate your mood during classtime.' )  !!}</td>
                <td>{!! Form::label('Q2', '1=Very Negative, 5=Very Positive')  !!}</td>
                    <td>{!! Form::radio('Q2', '1')  !!}</td>
                    <td>{!! Form::radio('Q2', '2')  !!}</td>
                    <td>{!! Form::radio('Q2', '3')  !!}</td>
                    <td>{!! Form::radio('Q2', '4')  !!}</td>
                    <td>{!! Form::radio('Q2', '5')  !!}</td>
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q3', 'Rate your mood now that class is over.')  !!}</td>
                <td>{!! Form::label('Q3', '1=Very Negative, 5=Very Positive')  !!}</td>
                    <td>{!! Form::radio('Q3', '1')  !!}</td>
                    <td>{!! Form::radio('Q3', '2')  !!}</td>
                    <td>{!! Form::radio('Q3', '3')  !!}</td>
                    <td>{!! Form::radio('Q3', '4')  !!}</td>
                    <td>{!! Form::radio('Q3', '5')  !!}</td>
            </tr>
            <tr height="10"><td></td></tr>
            <tr>
                <td>{!! Form::label('Q4', 'Did you experience an breakthrough?')  !!}</td>
                    <td></td>
                    <td></td>
                    <td>{{Form::label('yes4', 'Yes')}}</td><td>{!! Form::radio('Q4', '0', false, array('id'=>'yes4'))  !!}</td>
                    <td>{{Form::label('no4', 'No')}}</td><td>{!! Form::radio('Q4', '1', false, array('id'=>'no4'))  !!}</td>
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q5', 'Did you experience an incident?')  !!}</td>
                    <td></td>
                    <td></td>
                    <td>{{Form::label('yes5', 'Yes')}}</td><td>{!! Form::radio('Q5', '0', false, array('id'=>'yes5'))  !!}</td>
                    <td>{{Form::label('no5', 'No')}}</td><td>{!! Form::radio('Q5', '1', false, array('id'=>'no5'))  !!}</td>
            </tr>
            </table>
            <br>
            <a href="/notes/createnew/{{DB::table('students')->where('id', $lookupID)->value('id')}}" class="new-btn edit-button w3-green" style="float:right" role="button">Add Note</a>
            <table width="100%">
                <th colspan="4">
                {!! Form::label('Mood', 'Mood')  !!}
                </th>
                <tr>
                    <td style="text-align:left;">{!! Form::radio('Mood', '1')  !!}<span>happy</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '2')  !!}<span>proud</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '3')  !!}<span>peaceful</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '4')  !!}<span>optimistic</span></td>
                </tr>
                <tr>
                    <td style="text-align:left;">{!! Form::radio('Mood', '5')  !!}<span>accepted</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '6')  !!}<span>appreciated</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '7')  !!}<span>respected</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '8')  !!}<span>sad</span></td>
                </tr>
                <tr>
                    <td style="text-align:left;">{!! Form::radio('Mood', '9')  !!}<span>lonely</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '10')  !!}<span>guilty</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '11')  !!}<span>scared</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '12')  !!}<span>helpless</span></td>
                </tr>
                <tr>
                    <td style="text-align:left;">{!! Form::radio('Mood', '13')  !!}<span>insecure</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '14')  !!}<span>anxious</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '15')  !!}<span>angry</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '16')  !!}<span>hurt</span></td>
                </tr>
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
                <a href="/classes/show/{{$cla->id}}" class="button">Back</a>
                <input style="float:right;" type="button" class="button" onclick="myFunction()" value="Reset">
                {!! Form::close() !!}
        <br>
    </div>
    <script>
            function myFunction() {
                     document.getElementById("myForm").reset();
                                }
    </script>
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