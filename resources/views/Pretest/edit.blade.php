@extends('layouts.app')

@section('content')
    <h1>{{$student->firstName}} {{$student->lastName}}</h1>
    <p>Please edit the pretest form</p>

    {!! Form::open(['action' => ['PretestController@update', $student->id], 'method' => 'POST']) !!}
        <form>
        {{ Form::hidden('student_id', $student->id) }}
        <table style="width:100%">
                <tr>
                    <td width="55%">{!! Form::label('Q1', "How long have you been living in Jacksonville?", ['class' => 'col-lg-2 control-label'])!!}</td>
                    <td align="right">{{Form::label('year-1', '1 Year')}} {!! Form::radio('Q1', '1 Year', $student->pretest['Q1'] == '1 Year', array('id'=>'year-1'))!!}</td>
                    <td align="right">{{Form::label('year-2', '2 Years')}} {!! Form::radio('Q1', '2 Years', $student->pretest['Q1'] == '2 Years', array('id'=>'year-2'))!!}</td>
                    <td align="right">{{Form::label('year-3', '3 Years')}} {!! Form::radio('Q1', '3 Years', $student->pretest['Q1'] == '3 Years', array('id'=>'year-3'))!!}</td>
                    <td align="right">{{Form::label('year-4', '4 Years')}} {!! Form::radio('Q1', '4 Years', $student->pretest['Q1'] == '4 Years', array('id'=>'year-4'))!!}</td>
                    <td align="right">{{Form::label('year-5', '5+ Years')}} {!! Form::radio('Q1', '5+ Years', $student->pretest['Q1'] == '5+ Years', array('id'=>'year-5'))!!}</td>
                </tr>
                &nbsp;
                <tr>
                    <td>{!! Form::label('Q2', "Are you attending school?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="right">{{Form::label('yes', 'Yes ')}}{!! Form::radio('Q2', 'Yes', $student->pretest['Q2'] == 'Yes', array('id'=>'yes'))  !!}</td>
                    <td align="right">{{Form::label('no', 'No ')}}{!! Form::radio('Q2', 'No', $student->pretest['Q2'] == 'No', array('id'=>'no'))  !!}</td>
                </tr>
                &nbsp;
                <tr>
                    <td>{!! Form::label('Q3', "How many siblings do you have?", ['class' => 'col-lg-2 control-label'])!!}</td>
                    <td align="right">{{Form::label('sib', 'None ')}}{!! Form::radio('Q3', '0', $student->pretest['Q3'] == '0', array('id'=>'sib'))  !!}</td>
                    <td align="right">{{Form::label('sib-1', '1 ')}}{!! Form::radio('Q3', '1', $student->pretest['Q3'] == '1', array('id'=>'sib-1'))  !!}</td>
                    <td align="right">{{Form::label('sib-2', '2 ')}}{!! Form::radio('Q3', '2', $student->pretest['Q3'] == '2', array('id'=>'sib-2'))  !!}</td>
                    <td align="right">{{Form::label('sib-3', '3 ')}}{!! Form::radio('Q3', '3', $student->pretest['Q3'] == '3', array('id'=>'sib-3'))  !!}</td>
                    <td align="right">{{Form::label('sib-4', '4+ ')}}{!! Form::radio('Q3', '4+', $student->pretest['Q3'] == '4+', array('id'=>'sib-4'))  !!}</td>
                </tr>
            </table>
            &nbsp;
            <table style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>1&nbsp&nbsp</th>
                        <th>2&nbsp&nbsp</th>
                        <th>3&nbsp&nbsp</th>
                        <th>4&nbsp&nbsp</th>
                        <th>5&nbsp&nbsp</th>
                    </tr>
                </thead>
            <tr>
                <td>{!! Form::label('Q4', "How open are you about your feelings?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Not open at all, 5=Very open</td>
                <td>{!! Form::radio('Q4', '1', $student->pretest['Q4'] == 1)!!}</td>
                <td>{!! Form::radio('Q4', '2', $student->pretest['Q4'] == 2)!!}</td>
                <td>{!! Form::radio('Q4', '3', $student->pretest['Q4'] == 3)!!}</td>
                <td>{!! Form::radio('Q4', '4', $student->pretest['Q4'] == 4)!!}</td>
                <td>{!! Form::radio('Q4', '5', $student->pretest['Q4'] == 5)!!}</td>    
            </tr>         
             
            &nbsp;
            <tr>
                <td>{!! Form::label('Q5', "How positive do you feel about your future?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                    <td>1=Not very positive, 5=Very positive</td>
                    <td>{!! Form::radio('Q5', '1', $student->pretest['Q5'] == 1)!!}</td>
                <td>{!! Form::radio('Q5', '2', $student->pretest['Q5'] == 2)!!}</td>
                <td>{!! Form::radio('Q5', '3', $student->pretest['Q5'] == 3)!!}</td>
                <td>{!! Form::radio('Q5', '4', $student->pretest['Q5'] == 4)!!}</td>
                <td>{!! Form::radio('Q5', '5', $student->pretest['Q5'] == 5)!!}</td>  
            </tr>         
             
            &nbsp;
            <tr>
                <td>{!! Form::label('Q6', "I am not sure I can trust the adults in my life?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q6', '1', $student->pretest['Q6'] == 1)!!}</td>
                <td>{!! Form::radio('Q6', '2', $student->pretest['Q6'] == 2)!!}</td>
                <td>{!! Form::radio('Q6', '3', $student->pretest['Q6'] == 3)!!}</td>
                <td>{!! Form::radio('Q6', '4', $student->pretest['Q6'] == 4)!!}</td>
                <td>{!! Form::radio('Q6', '5', $student->pretest['Q6'] == 5)!!}</td>  
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q7', "I am not sure adults in my life trust me?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q7', '1', $student->pretest['Q7'] == 1)!!}</td>
                <td>{!! Form::radio('Q7', '2', $student->pretest['Q7'] == 2)!!}</td>
                <td>{!! Form::radio('Q7', '3', $student->pretest['Q7'] == 3)!!}</td>
                <td>{!! Form::radio('Q7', '4', $student->pretest['Q7'] == 4)!!}</td>
                <td>{!! Form::radio('Q7', '5', $student->pretest['Q7'] == 5)!!}</td>  
            </tr>         
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q8', "How comfortable do you feel talking about your past?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Very uncomfortable, 5=Comfortable</td>
                <td>{!! Form::radio('Q8', '1', $student->pretest['Q8'] == 1)!!}</td>
                <td>{!! Form::radio('Q8', '2', $student->pretest['Q8'] == 2)!!}</td>
                <td>{!! Form::radio('Q8', '3', $student->pretest['Q8'] == 3)!!}</td>
                <td>{!! Form::radio('Q8', '4', $student->pretest['Q8'] == 4)!!}</td>
                <td>{!! Form::radio('Q8', '5', $student->pretest['Q8'] == 5)!!}</td> 
            </tr>            
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q9', "How likely are you to set goals for the next year?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Not likely at all, 5=Very likely</td>
                <td>{!! Form::radio('Q9', '1', $student->pretest['Q9'] == 1)!!}</td>
                <td>{!! Form::radio('Q9', '2', $student->pretest['Q9'] == 2)!!}</td>
                <td>{!! Form::radio('Q9', '3', $student->pretest['Q9'] == 3)!!}</td>
                <td>{!! Form::radio('Q9', '4', $student->pretest['Q9'] == 4)!!}</td>
                <td>{!! Form::radio('Q9', '5', $student->pretest['Q9'] == 5)!!}</td> 
            </tr>          
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q10', "I feel like I can put myself in others shoes?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q10', '1', $student->pretest['Q10'] == 1)!!}</td>
                <td>{!! Form::radio('Q10', '2', $student->pretest['Q10'] == 2)!!}</td>
                <td>{!! Form::radio('Q10', '3', $student->pretest['Q10'] == 3)!!}</td>
                <td>{!! Form::radio('Q10', '4', $student->pretest['Q10'] == 4)!!}</td>
                <td>{!! Form::radio('Q10', '5', $student->pretest['Q10'] == 5)!!}</td> 
            </tr>        
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q11', "I can understand other people's feelings/pain?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q11', '1', $student->pretest['Q11'] == 1)!!}</td>
                <td>{!! Form::radio('Q11', '2', $student->pretest['Q11'] == 2)!!}</td>
                <td>{!! Form::radio('Q11', '3', $student->pretest['Q11'] == 3)!!}</td>
                <td>{!! Form::radio('Q11', '4', $student->pretest['Q11'] == 4)!!}</td>
                <td>{!! Form::radio('Q11', '5', $student->pretest['Q11'] == 5)!!}</td>  
            </tr>         
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q12', "My friends and I share the same values?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q12', '1', $student->pretest['Q12'] == 1)!!}</td>
                <td>{!! Form::radio('Q12', '2', $student->pretest['Q12'] == 2)!!}</td>
                <td>{!! Form::radio('Q12', '3', $student->pretest['Q12'] == 3)!!}</td>
                <td>{!! Form::radio('Q12', '4', $student->pretest['Q12'] == 4)!!}</td>
                <td>{!! Form::radio('Q12', '5', $student->pretest['Q12'] == 5)!!}</td>  
            </tr>            
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q13', "I am happy with my friendships?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q13', '1', $student->pretest['Q13'] == 1)!!}</td>
                <td>{!! Form::radio('Q13', '2', $student->pretest['Q13'] == 2)!!}</td>
                <td>{!! Form::radio('Q13', '3', $student->pretest['Q13'] == 3)!!}</td>
                <td>{!! Form::radio('Q13', '4', $student->pretest['Q13'] == 4)!!}</td>
                <td>{!! Form::radio('Q13', '5', $student->pretest['Q13'] == 5)!!}</td> 
            </tr>           
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q14', "I am good at forgiving others for small mistakes?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q14', '1', $student->pretest['Q14'] == 1)!!}</td>
                <td>{!! Form::radio('Q14', '2', $student->pretest['Q14'] == 2)!!}</td>
                <td>{!! Form::radio('Q14', '3', $student->pretest['Q14'] == 3)!!}</td>
                <td>{!! Form::radio('Q14', '4', $student->pretest['Q14'] == 4)!!}</td>
                <td>{!! Form::radio('Q14', '5', $student->pretest['Q14'] == 5)!!}</td> 
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q15', "I have at least one hobby that I enjoy?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q15', '1', $student->pretest['Q15'] == 1)!!}</td>
                <td>{!! Form::radio('Q15', '2', $student->pretest['Q15'] == 2)!!}</td>
                <td>{!! Form::radio('Q15', '3', $student->pretest['Q15'] == 3)!!}</td>
                <td>{!! Form::radio('Q15', '4', $student->pretest['Q15'] == 4)!!}</td>
                <td>{!! Form::radio('Q15', '5', $student->pretest['Q15'] == 5)!!}</td>  
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q16', "I am satisfied with the honest conversations I can have with those that are important to me?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q16', '1', $student->pretest['Q16'] == 1)!!}</td>
                <td>{!! Form::radio('Q16', '2', $student->pretest['Q16'] == 2)!!}</td>
                <td>{!! Form::radio('Q16', '3', $student->pretest['Q16'] == 3)!!}</td>
                <td>{!! Form::radio('Q16', '4', $student->pretest['Q16'] == 4)!!}</td>
                <td>{!! Form::radio('Q16', '5', $student->pretest['Q16'] == 5)!!}</td>      
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q17', "When I am emotional, I feel comfortable turning to someone I know for help.", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q17', '1', $student->pretest['Q17'] == 1)!!}</td>
                <td>{!! Form::radio('Q17', '2', $student->pretest['Q17'] == 2)!!}</td>
                <td>{!! Form::radio('Q17', '3', $student->pretest['Q17'] == 3)!!}</td>
                <td>{!! Form::radio('Q17', '4', $student->pretest['Q17'] == 4)!!}</td>
                <td>{!! Form::radio('Q17', '5', $student->pretest['Q17'] == 5)!!}</td>  
            </tr>         
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q18', "I am part of a community that I can express myself in?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q18', '1', $student->pretest['Q18'] == 1)!!}</td>
                <td>{!! Form::radio('Q18', '2', $student->pretest['Q18'] == 2)!!}</td>
                <td>{!! Form::radio('Q18', '3', $student->pretest['Q18'] == 3)!!}</td>
                <td>{!! Form::radio('Q18', '4', $student->pretest['Q18'] == 4)!!}</td>
                <td>{!! Form::radio('Q18', '5', $student->pretest['Q18'] == 5)!!}</td> 
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q19', "I enjoy spending time with talented people.", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Strongly disagree, 5=Strongly agree</td>
                <td>{!! Form::radio('Q19', '1', $student->pretest['Q19'] == 1)!!}</td>
                <td>{!! Form::radio('Q19', '2', $student->pretest['Q19'] == 2)!!}</td>
                <td>{!! Form::radio('Q19', '3', $student->pretest['Q19'] == 3)!!}</td>
                <td>{!! Form::radio('Q19', '4', $student->pretest['Q19'] == 4)!!}</td>
                <td>{!! Form::radio('Q19', '5', $student->pretest['Q19'] == 5)!!}</td> 
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q20', "How likely would you be to use an art form as a way of expressing life’s difficulties?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>1=Not at all likely, 5=Extremely likely</td>
                <td>{!! Form::radio('Q20', '1', $student->pretest['Q20'] == 1)!!}</td>
                <td>{!! Form::radio('Q20', '2', $student->pretest['Q20'] == 2)!!}</td>
                <td>{!! Form::radio('Q20', '3', $student->pretest['Q20'] == 3)!!}</td>
                <td>{!! Form::radio('Q20', '4', $student->pretest['Q20'] == 4)!!}</td>
                <td>{!! Form::radio('Q20', '5', $student->pretest['Q20'] == 5)!!}</td> 
            </tr>          
             
            &nbsp;
        </table>
        <br>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Save', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 41px;'])}}
                <a href="{{ URL::previous() }}" class="form-control-right button">Cancel</a>
        </form>
    {!! Form::close() !!}
            {!!Form::open(['action' => ['PretestController@destroy', $student->id], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete Pretest', ['class' => 'form-control-left new-btn error-button', 'role' => 'button', 'style' => 'padding-top: 10px'])}}
            {!!Form::close()!!}    
@endsection