@extends('layouts.app')

@section('content')
    <h1>{{$student->firstName}} {{$student->lastName}}</h1>
    <p>Please edit the Post-test form</p>

    {!! Form::open(['action' => ['PosttestController@update', $student->id], 'method' => 'POST']) !!}
        <form>
        {{ Form::hidden('student_id', $student->id) }}
        <table style="width:100%">
                <thead>
                        <tr>
                            <th></th>
                            <th>1&nbsp&nbsp&nbsp</th>
                            <th>2&nbsp&nbsp&nbsp</th>
                            <th>3&nbsp&nbsp&nbsp</th>
                            <th>4&nbsp&nbsp&nbsp</th>
                            <th>5&nbsp&nbsp&nbsp</th>
                        </tr>
                    </thead>
                <tr>
                <td>{!! Form::label('Q1', $questions[0], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{!! Form::radio('Q1', '1')  !!}</td>
                <td>{!! Form::radio('Q1', '2')  !!}</td>
                <td>{!! Form::radio('Q1', '3')  !!}</td>
                <td>{!! Form::radio('Q1', '4')  !!}</td>
                <td>{!! Form::radio('Q1', '5')  !!}</td> 
                </tr>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q2', $questions[1], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{!! Form::radio('Q2', '1')  !!}</td>
                <td>{!! Form::radio('Q2', '2')  !!}</td>
                <td>{!! Form::radio('Q2', '3')  !!}</td>
                <td>{!! Form::radio('Q2', '4')  !!}</td>
                <td>{!! Form::radio('Q2', '5')  !!}</td> 
                </tr>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q3', $questions[2], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{!! Form::radio('Q3', '1')  !!}</td>
                <td>{!! Form::radio('Q3', '2')  !!}</td>
                <td>{!! Form::radio('Q3', '3')  !!}</td>
                <td>{!! Form::radio('Q3', '4')  !!}</td>
                <td>{!! Form::radio('Q3', '5')  !!}</td>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q4', $questions[3], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{!! Form::radio('Q4', '1')  !!}</td>
                <td>{!! Form::radio('Q4', '2')  !!}</td>
                <td>{!! Form::radio('Q4', '3')  !!}</td>
                <td>{!! Form::radio('Q4', '4')  !!}</td>
                <td>{!! Form::radio('Q4', '5')  !!}</td>
                </tr>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q5', $questions[4], ['class' => 'col-lg-2 control-label'] )  !!}</td>              
                <td>{!! Form::radio('Q5', '1')  !!}</td>
                <td>{!! Form::radio('Q5', '2')  !!}</td>
                <td>{!! Form::radio('Q5', '3')  !!}</td>
                <td>{!! Form::radio('Q5', '4')  !!}</td>
                <td>{!! Form::radio('Q5', '5')  !!}</td>
                </tr>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q6', $questions[5], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{!! Form::radio('Q6', '1')  !!}</td>
                <td>{!! Form::radio('Q6', '2')  !!}</td>
                <td>{!! Form::radio('Q6', '3')  !!}</td>
                <td>{!! Form::radio('Q6', '4')  !!}</td>
                <td>{!! Form::radio('Q6', '5')  !!}</td> 
                </tr>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q7', $questions[6], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{!! Form::radio('Q7', '1')  !!}</td>
                <td>{!! Form::radio('Q7', '2')  !!}</td>
                <td>{!! Form::radio('Q7', '3')  !!}</td>
                <td>{!! Form::radio('Q7', '4')  !!}</td>
                <td>{!! Form::radio('Q7', '5')  !!}</td>    
                </tr>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q8', $questions[7], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{!! Form::radio('Q8', '1')  !!}</td>
                <td>{!! Form::radio('Q8', '2')  !!}</td>
                <td>{!! Form::radio('Q8', '3')  !!}</td>
                <td>{!! Form::radio('Q8', '4')  !!}</td>
                <td>{!! Form::radio('Q8', '5')  !!}</td>                 
                </tr>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q9', $questions[8], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                <td>{!! Form::radio('Q9', '1')  !!}</td>
                <td>{!! Form::radio('Q9', '2')  !!}</td>
                <td>{!! Form::radio('Q9', '3')  !!}</td>
                <td>{!! Form::radio('Q9', '4')  !!}</td>
                <td>{!! Form::radio('Q9', '5')  !!}</td>
                </tr>
                &nbsp;
                <tr>
                <td>{!! Form::label('Q10', $questions[9], ['class' => 'col-lg-2 control-label'] )  !!}</td>
              
                <td>{!! Form::radio('Q10', '1')  !!}</td>
                <td>{!! Form::radio('Q10', '2')  !!}</td>
                <td>{!! Form::radio('Q10', '3')  !!}</td>
                <td>{!! Form::radio('Q10', '4')  !!}</td>
                <td>{!! Form::radio('Q10', '5')  !!}</td>  
                </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q11', $questions[10], ['class' => 'col-lg-2 control-label'] )  !!}</td>
               
                <td>{!! Form::radio('Q11', '1')  !!}</td>
                <td>{!! Form::radio('Q11', '2')  !!}</td>
                <td>{!! Form::radio('Q11', '3')  !!}</td>
                <td>{!! Form::radio('Q11', '4')  !!}</td>
                <td>{!! Form::radio('Q11', '5')  !!}</td>     
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q12', $questions[11], ['class' => 'col-lg-2 control-label'] )  !!}</td>
               
                <td>{!! Form::radio('Q12', '1')  !!}</td>
                <td>{!! Form::radio('Q12', '2')  !!}</td>
                <td>{!! Form::radio('Q12', '3')  !!}</td>
                <td>{!! Form::radio('Q12', '4')  !!}</td>
                <td>{!! Form::radio('Q12', '5')  !!}</td>     
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q13', $questions[12], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q13', '1')  !!}</td>
                <td>{!! Form::radio('Q13', '2')  !!}</td>
                <td>{!! Form::radio('Q13', '3')  !!}</td>
                <td>{!! Form::radio('Q13', '4')  !!}</td>
                <td>{!! Form::radio('Q13', '5')  !!}</td>      
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q14', $questions[13], ['class' => 'col-lg-2 control-label'] )  !!}</td>
            
                <td>{!! Form::radio('Q14', '1')  !!}</td>
                <td>{!! Form::radio('Q14', '2')  !!}</td>
                <td>{!! Form::radio('Q14', '3')  !!}</td>
                <td>{!! Form::radio('Q14', '4')  !!}</td>
                <td>{!! Form::radio('Q14', '5')  !!}</td>      
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q15', $questions[14], ['class' => 'col-lg-2 control-label'] )  !!}</td>
            
                <td>{!! Form::radio('Q15', '1')  !!}</td>
                <td>{!! Form::radio('Q15', '2')  !!}</td>
                <td>{!! Form::radio('Q15', '3')  !!}</td>
                <td>{!! Form::radio('Q15', '4')  !!}</td>
                <td>{!! Form::radio('Q15', '5')  !!}</td>       
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q16', $questions[15], ['class' => 'col-lg-2 control-label'] )  !!}</td>
             
                <td>{!! Form::radio('Q16', '1')  !!}</td>
                <td>{!! Form::radio('Q16', '2')  !!}</td>
                <td>{!! Form::radio('Q16', '3')  !!}</td>
                <td>{!! Form::radio('Q16', '4')  !!}</td>
                <td>{!! Form::radio('Q16', '5')  !!}</td>          
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q17', $questions[16], ['class' => 'col-lg-2 control-label'] )  !!}</td>
              
                <td>{!! Form::radio('Q17', '1')  !!}</td>
                <td>{!! Form::radio('Q17', '2')  !!}</td>
                <td>{!! Form::radio('Q17', '3')  !!}</td>
                <td>{!! Form::radio('Q17', '4')  !!}</td>
                <td>{!! Form::radio('Q17', '5')  !!}</td>         
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q18', $questions[17], ['class' => 'col-lg-2 control-label'] )  !!}</td>
              
                <td>{!! Form::radio('Q18', '1')  !!}</td>
                <td>{!! Form::radio('Q18', '2')  !!}</td>
                <td>{!! Form::radio('Q18', '3')  !!}</td>
                <td>{!! Form::radio('Q18', '4')  !!}</td>
                <td>{!! Form::radio('Q18', '5')  !!}</td>        
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q19', $questions[18], ['class' => 'col-lg-2 control-label'] )  !!}</td>
            
                <td>{!! Form::radio('Q19', '1')  !!}</td>
                <td>{!! Form::radio('Q19', '2')  !!}</td>
                <td>{!! Form::radio('Q19', '3')  !!}</td>
                <td>{!! Form::radio('Q19', '4')  !!}</td>
                <td>{!! Form::radio('Q19', '5')  !!}</td>          
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q20', $questions[19], ['class' => 'col-lg-2 control-label'] )  !!}</td>
             
                <td>{!! Form::radio('Q20', '1')  !!}</td>
                <td>{!! Form::radio('Q20', '2')  !!}</td>
                <td>{!! Form::radio('Q20', '3')  !!}</td>
                <td>{!! Form::radio('Q20', '4')  !!}</td>
                <td>{!! Form::radio('Q20', '5')  !!}</td>         
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q21', $questions[20], ['class' => 'col-lg-2 control-label'] )  !!}</td>
               
                <td>{!! Form::radio('Q21', '1')  !!}</td>
                <td>{!! Form::radio('Q21', '2')  !!}</td>
                <td>{!! Form::radio('Q21', '3')  !!}</td>
                <td>{!! Form::radio('Q21', '4')  !!}</td>
                <td>{!! Form::radio('Q21', '5')  !!}</td>          
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q22', $questions[21], ['class' => 'col-lg-2 control-label'] )  !!}</td>
            
                <td>{!! Form::radio('Q22', '1')  !!}</td>
                <td>{!! Form::radio('Q22', '2')  !!}</td>
                <td>{!! Form::radio('Q22', '3')  !!}</td>
                <td>{!! Form::radio('Q22', '4')  !!}</td>
                <td>{!! Form::radio('Q22', '5')  !!}</td>          
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q23', $questions[22], ['class' => 'col-lg-2 control-label'] )  !!}</td>
               
                <td>{!! Form::radio('Q23', '1')  !!}</td>
                <td>{!! Form::radio('Q23', '2')  !!}</td>
                <td>{!! Form::radio('Q23', '3')  !!}</td>
                <td>{!! Form::radio('Q23', '4')  !!}</td>
                <td>{!! Form::radio('Q23', '5')  !!}</td>       
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q24', $questions[23], ['class' => 'col-lg-2 control-label'] )  !!}</td>
               
                <td>{!! Form::radio('Q24', '1')  !!}</td>
                <td>{!! Form::radio('Q24', '2')  !!}</td>
                <td>{!! Form::radio('Q24', '3')  !!}</td>
                <td>{!! Form::radio('Q24', '4')  !!}</td>
                <td>{!! Form::radio('Q24', '5')  !!}</td>        
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q25', $questions[24], ['class' => 'col-lg-2 control-label'] )  !!}</td>
             
                <td>{!! Form::radio('Q25', '1')  !!}</td>
                <td>{!! Form::radio('Q25', '2')  !!}</td>
                <td>{!! Form::radio('Q25', '3')  !!}</td>
                <td>{!! Form::radio('Q25', '4')  !!}</td>
                <td>{!! Form::radio('Q25', '5')  !!}</td>         
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q26', $questions[25], ['class' => 'col-lg-2 control-label'] )  !!}</td>
                
                <td>{!! Form::radio('Q26', '1')  !!}</td>
                <td>{!! Form::radio('Q26', '2')  !!}</td>
                <td>{!! Form::radio('Q26', '3')  !!}</td>
                <td>{!! Form::radio('Q26', '4')  !!}</td>
                <td>{!! Form::radio('Q26', '5')  !!}</td>        
            </tr>
                &nbsp;
            <tr>
                <td>{!! Form::label('Q27', $questions[26], ['class' => 'col-lg-2 control-label'] )  !!}</td>
            </tr>
            <tr>
                <td colspan="6">{{ Form::textarea('Q27', '', ['class' => 'form-control-text', 'placeholder' => 'Write benefits here'])}}</td>        
            </tr>
        </table>
                &nbsp;
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