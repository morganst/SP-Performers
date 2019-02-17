@extends('layouts.app')

@section('content')
    <h1>{{$student->firstName}} {{$student->lastName}}</h1>
    <p>Please complete the pretest form</p>

    {!! Form::open(['action' => 'PretestController@store', 'method' => 'POST']) !!}
        <form>
        {{ Form::hidden('student_id', $student->id) }}
        <table style="width:100%">
            <tr>
                <td>{!! Form::label('Q1', "How long have you been living in Jacksonville?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{{ Form::select('Q1', array('1' => '1 year', '2' => '2 years', '3' => '3 years', '4' => '4 years', '5' => '5+ years'), null, ['class' => 'form-control-right']) }}</td>
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q2', "Are you attending school?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{{ Form::select('Q2', array('Yes' => 'Yes', 'No' => 'No'), null, ['class' => 'form-control-right']) }}</td>
            </tr>
            &nbsp;
            <tr>
                <td>{!! Form::label('Q3', "How many siblings do you have?", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{{ Form::select('Q3', array('0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => '4+'), null, ['class' => 'form-control-right']) }}</td>
            </tr>
        </table>
            &nbsp;
            <table style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>1&nbsp&nbsp</th>
                        <th>2&nbsp&nbsp</th>
                        <th>3&nbsp&nbsp</th>
                        <th>4&nbsp&nbsp</th>
                        <th>5&nbsp&nbsp</th>
                    </tr>
                </thead>
            <tr>
                <td>{!! Form::label('Q4', "How open are you about your feelings? 1=Not open at all, 5=Very open", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                    <td>{!! Form::radio('Q4', '1')  !!}</td>
                    <td>{!! Form::radio('Q4', '2')  !!}</td>
                    <td>{!! Form::radio('Q4', '3')  !!}</td>
                    <td>{!! Form::radio('Q4', '4')  !!}</td>
                    <td>{!! Form::radio('Q4', '5')  !!}</td>   
            </tr>         
             
            &nbsp;
            <tr>
                <td>{!! Form::label('Q5', "How positive do you feel about your future? 1=Not very positive, 5=Very positive", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                    <td>{!! Form::radio('Q5', '1')  !!}</td>
                    <td>{!! Form::radio('Q5', '2')  !!}</td>
                    <td>{!! Form::radio('Q5', '3')  !!}</td>
                    <td>{!! Form::radio('Q5', '4')  !!}</td>
                    <td>{!! Form::radio('Q5', '5')  !!}</td>   
            </tr>         
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q6', "I am not sure I can trust the adults in my life? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                    <td>{!! Form::radio('Q6', '1')  !!}</td>
                    <td>{!! Form::radio('Q6', '2')  !!}</td>
                    <td>{!! Form::radio('Q6', '3')  !!}</td>
                    <td>{!! Form::radio('Q6', '4')  !!}</td>
                    <td>{!! Form::radio('Q6', '5')  !!}</td>  
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q7', "I am not sure adults in my life trust me? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                    <td>{!! Form::radio('Q7', '1')  !!}</td>
                    <td>{!! Form::radio('Q7', '2')  !!}</td>
                    <td>{!! Form::radio('Q7', '3')  !!}</td>
                    <td>{!! Form::radio('Q7', '4')  !!}</td>
                    <td>{!! Form::radio('Q7', '5')  !!}</td> 
            </tr>         
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q8', "How comfortable do you feel talking about your past? 1=Very uncomfortable, 5=Comfortable", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                    <td>{!! Form::radio('Q8', '1')  !!}</td>
                    <td>{!! Form::radio('Q8', '2')  !!}</td>
                    <td>{!! Form::radio('Q8', '3')  !!}</td>
                    <td>{!! Form::radio('Q8', '4')  !!}</td>
                    <td>{!! Form::radio('Q8', '5')  !!}</td>
            </tr>            
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q9', "How likely are you to set goals for the next year? 1=Not likely at all, 5=Very likely", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                    <td>{!! Form::radio('Q9', '1')  !!}</td>
                    <td>{!! Form::radio('Q9', '2')  !!}</td>
                    <td>{!! Form::radio('Q9', '3')  !!}</td>
                    <td>{!! Form::radio('Q9', '4')  !!}</td>
                    <td>{!! Form::radio('Q9', '5')  !!}</td> 
            </tr>          
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q10', "I feel like I can put myself in others shoes? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                    <td>{!! Form::radio('Q10', '1')  !!}</td>
                    <td>{!! Form::radio('Q10', '2')  !!}</td>
                    <td>{!! Form::radio('Q10', '3')  !!}</td>
                    <td>{!! Form::radio('Q10', '4')  !!}</td>
                    <td>{!! Form::radio('Q10', '5')  !!}</td> 
            </tr>        
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q11', "I can understand other people's feelings/pain? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q11', '1')  !!}</td>
                <td>{!! Form::radio('Q11', '2')  !!}</td>
                <td>{!! Form::radio('Q11', '3')  !!}</td>
                <td>{!! Form::radio('Q11', '4')  !!}</td>
                <td>{!! Form::radio('Q11', '5')  !!}</td>  
            </tr>         
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q12', "My friends and I share the same values? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q12', '1')  !!}</td>
                <td>{!! Form::radio('Q12', '2')  !!}</td>
                <td>{!! Form::radio('Q12', '3')  !!}</td>
                <td>{!! Form::radio('Q12', '4')  !!}</td>
                <td>{!! Form::radio('Q12', '5')  !!}</td> 
            </tr>            
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q13', "I am happy with my friendships? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q13', '1')  !!}</td>
                <td>{!! Form::radio('Q13', '2')  !!}</td>
                <td>{!! Form::radio('Q13', '3')  !!}</td>
                <td>{!! Form::radio('Q13', '4')  !!}</td>
                <td>{!! Form::radio('Q13', '5')  !!}</td>  
            </tr>           
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q14', "I am good at forgiving others for small mistakes? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q14', '1')  !!}</td>
                <td>{!! Form::radio('Q14', '2')  !!}</td>
                <td>{!! Form::radio('Q14', '3')  !!}</td>
                <td>{!! Form::radio('Q14', '4')  !!}</td>
                <td>{!! Form::radio('Q14', '5')  !!}</td> 
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q15', "I have at least one hobby that I enjoy? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q15', '1')  !!}</td>
                <td>{!! Form::radio('Q15', '2')  !!}</td>
                <td>{!! Form::radio('Q15', '3')  !!}</td>
                <td>{!! Form::radio('Q15', '4')  !!}</td>
                <td>{!! Form::radio('Q15', '5')  !!}</td>  
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q16', "I am satisfied with the honest conversations I can have with those that are important to me? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q16', '1')  !!}</td>
                <td>{!! Form::radio('Q16', '2')  !!}</td>
                <td>{!! Form::radio('Q16', '3')  !!}</td>
                <td>{!! Form::radio('Q16', '4')  !!}</td>
                <td>{!! Form::radio('Q16', '5')  !!}</td>     
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q17', "When I am emotional, I feel comfortable turning to someone I know for help. 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q17', '1')  !!}</td>
                <td>{!! Form::radio('Q17', '2')  !!}</td>
                <td>{!! Form::radio('Q17', '3')  !!}</td>
                <td>{!! Form::radio('Q17', '4')  !!}</td>
                <td>{!! Form::radio('Q17', '5')  !!}</td>    
            </tr>         
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q18', "I am part of a community that I can express myself in? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q18', '1')  !!}</td>
                <td>{!! Form::radio('Q18', '2')  !!}</td>
                <td>{!! Form::radio('Q18', '3')  !!}</td>
                <td>{!! Form::radio('Q18', '4')  !!}</td>
                <td>{!! Form::radio('Q18', '5')  !!}</td> 
            </tr>       
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q19', "I enjoy spending time with talented people. 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q19', '1')  !!}</td>
                <td>{!! Form::radio('Q19', '2')  !!}</td>
                <td>{!! Form::radio('Q19', '3')  !!}</td>
                <td>{!! Form::radio('Q19', '4')  !!}</td>
                <td>{!! Form::radio('Q19', '5')  !!}</td>
             
            &nbsp;
            <tr>
            <td>{!! Form::label('Q20', "How likely would you be to use an art form as a way of expressing life’s difficulties? 1=Not at all likely, 5=Extremely likely", ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q20', '1')  !!}</td>
                <td>{!! Form::radio('Q20', '2')  !!}</td>
                <td>{!! Form::radio('Q20', '3')  !!}</td>
                <td>{!! Form::radio('Q20', '4')  !!}</td>
                <td>{!! Form::radio('Q20', '5')  !!}</td>  
            </tr>          
             
            &nbsp;
        </table>
            <div class="form-row-inline" style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 40px;'])}}
                <a class="form-control-right button" href="/students" role="button">Cancel</a>
            </div>
        </form>
    {!! Form::close() !!}

    
@endsection