@extends('layouts.app')

@section('content')

<h1>Edit Student Survey for {{$cla->name}}</h1>
    <div class="live-container">
        @if(session()->has('success'))
        <div class="alert alert-success">
            <span style="background-color:palegreen">{{ session()->get('success') }}</span>
        </div>
        @endif
    <h1>
        {{$stu->fullName}}
    </h1>

        {!! Form::open(['action' => ['DailySurveyController@update',  $survey->id ],'method' => 'POST']) !!}
            {{ Form::hidden('ClassID', $survey->ClassID) }}
            {{ Form::hidden('cla', $cla) }}
            {{ Form::hidden('StudentID', $survey->StudentID)}}
         &nbsp;
 <div style="float:right;">{{Form::date('date', $survey->date)}}</div><br><br>
            <table style="width:100%">
            <tr>
                <td></td>
                <td></td>
                <td>&nbsp <b>1</b></td>
                <td>&nbsp <b>2</b></td>
                <td>&nbsp <b>3</b></td>
                <td>&nbsp <b>4</b></td>
                <td>&nbsp <b>5</b></td>
            </tr>
            <tr>
                <td>{!! Form::label('Q1', 'Rate your mood before class started.')  !!}</td>
                <td>{!! Form::label('Q1', '1=Very Negative, 5=Very Positive')  !!}</td>
                    <td>{!! Form::radio('Q1', '1', $survey->Q1 == '1')  !!}</td>
                    <td>{!! Form::radio('Q1', '2', $survey->Q1 == '2')  !!}</td>
                    <td>{!! Form::radio('Q1', '3', $survey->Q1 == '3')  !!}</td>
                    <td>{!! Form::radio('Q1', '4', $survey->Q1 == '4')  !!}</td>
                    <td>{!! Form::radio('Q1', '5', $survey->Q1 == '5')  !!}</td>
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q2', 'Rate your mood during classtime.' )  !!}</td>
                <td>{!! Form::label('Q2', '1=Very Negative, 5=Very Positive')  !!}</td>
                    <td>{!! Form::radio('Q2', '1', $survey->Q2 == '1')  !!}</td>
                    <td>{!! Form::radio('Q2', '2', $survey->Q2 == '2')  !!}</td>
                    <td>{!! Form::radio('Q2', '3', $survey->Q2 == '3')  !!}</td>
                    <td>{!! Form::radio('Q2', '4', $survey->Q2 == '4')  !!}</td>
                    <td>{!! Form::radio('Q2', '5', $survey->Q2 == '5')  !!}</td>
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q3', 'Rate your mood now that class is over.')  !!}</td>
                <td>{!! Form::label('Q3', '1=Very Negative, 5=Very Positive')  !!}</td>
                    <td>{!! Form::radio('Q3', '1', $survey->Q3 == '1')  !!}</td>
                    <td>{!! Form::radio('Q3', '2', $survey->Q3 == '2')  !!}</td>
                    <td>{!! Form::radio('Q3', '3', $survey->Q3 == '3')  !!}</td>
                    <td>{!! Form::radio('Q3', '4', $survey->Q3 == '4')  !!}</td>
                    <td>{!! Form::radio('Q3', '5', $survey->Q3 == '5')  !!}</td>
            </tr>
            <tr height="10"><td></td></tr>
            <tr>
                <td>{!! Form::label('Q4', 'Did you experience an breakthrough?')  !!}</td>
                    <td></td>
                    <td></td>
                    <td>{{Form::label('yes4', 'Yes')}}</td><td>{!! Form::radio('Q4', '0', $survey->Q4 == '0', array('id'=>'yes4'))  !!}</td>
                    <td>{{Form::label('no4', 'No')}}</td><td>{!! Form::radio('Q4', '1', $survey->Q4 == '1', array('id'=>'no4'))  !!}</td>
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q5', 'Did you experience an incident?')  !!}</td>
                    <td></td>
                    <td></td>
                    <td>{{Form::label('yes5', 'Yes')}}</td><td>{!! Form::radio('Q5', '0', $survey->Q5 == '0', array('id'=>'yes5'))  !!}</td>
                    <td>{{Form::label('no5', 'No')}}</td><td>{!! Form::radio('Q5', '1', $survey->Q5 == '1', array('id'=>'no5'))  !!}</td>
            </tr>
            </table>
            <br>
            <a href="/notes/createnew/{{$stu->id}}" class="new-btn edit-button" style="float:right" role="button">Add Note</a>
            <table width="100%">
                <th colspan="4">
                {!! Form::label('Mood', 'Mood')  !!}
                </th>
                <tr>
                    <td style="text-align:left;">{!! Form::radio('Mood', '1', $survey->mood == '1')  !!}<span>happy</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '2', $survey->mood == '2')  !!}<span>proud</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '3', $survey->mood == '3')  !!}<span>peaceful</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '4', $survey->mood == '4')  !!}<span>optimistic</span></td>
                </tr>
                <tr>
                    <td style="text-align:left;">{!! Form::radio('Mood', '5', $survey->mood == '5')  !!}<span>accepted</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '6', $survey->mood == '6')  !!}<span>appreciated</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '7', $survey->mood == '7')  !!}<span>respected</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '8', $survey->mood == '8')  !!}<span>sad</span></td>
                </tr>
                <tr>
                    <td style="text-align:left;">{!! Form::radio('Mood', '9', $survey->mood == '9')  !!}<span>lonely</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '10', $survey->mood == '10')  !!}<span>guilty</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '11', $survey->mood == '11')  !!}<span>scared</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '12', $survey->mood == '12')  !!}<span>helpless</span></td>
                </tr>
                <tr>
                    <td style="text-align:left;">{!! Form::radio('Mood', '13', $survey->mood == '13')  !!}<span>insecure</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '14', $survey->mood == '14')  !!}<span>anxious</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '15', $survey->mood == '15')  !!}<span>angry</span></td>
                    <td style="text-align:left;">{!! Form::radio('Mood', '16', $survey->mood == '16')  !!}<span>hurt</span></td>
                </tr>
        </table>
        <br>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit',['class' => 'form-control-right new-btn primary-button'])}}
                <input style="float:right;" type="button" class="form-control-right button" onclick="myFunction()" value="Reset">
                {!! Form::close() !!}
        <br>
    </div>
    <br>
    <a href="/dailysurvey/{{$stu->id}}" class="form-control-right button" role="button" aria-pressed="true" style="float:right;">Back</a>
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