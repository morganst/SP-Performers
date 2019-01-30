@extends('layouts.app')

@section('content')
    <h1>{{$student->firstName}} {{$student->lastName}}</h1>
    <p>Please complete the Post-test form</p>

    {!! Form::open(['action' => 'PosttestController@store', 'method' => 'POST']) !!}
        <form>
        {{ Form::hidden('student_id', $student->id) }}
            <div class="form-row-inline">
                {!! Form::label('Q1', $questions[0], ['class' => 'col-lg-2 control-label'] )  !!}
               
                {{ Form::select('Q1', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q2', $questions[1], ['class' => 'col-lg-2 control-label'] )  !!}
              
                {{ Form::select('Q2', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), null, ['class' => 'form-control-right']) }}
          
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q3', $questions[2], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q3', array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => '5'), null, ['class' => 'form-control-right']) }}
               
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q4', $questions[3], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q4', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q5', $questions[4], ['class' => 'col-lg-2 control-label'] )  !!}
              
                    {{ Form::select('Q5', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
               
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q6', $questions[5], ['class' => 'col-lg-2 control-label'] )  !!}
          
                    {{ Form::select('Q6', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
            
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q7', $questions[6], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q7', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
              
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q8', $questions[7], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q8', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
              
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q9', $questions[8], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q9', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q10', $questions[9], ['class' => 'col-lg-2 control-label'] )  !!}
              
                    {{ Form::select('Q10', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q11', $questions[10], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q11', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
              
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q12', $questions[11], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q12', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q13', $questions[12], ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q13', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q14', $questions[13], ['class' => 'col-lg-2 control-label'] )  !!}
            
                    {{ Form::select('Q14', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q15', $questions[14], ['class' => 'col-lg-2 control-label'] )  !!}
            
                    {{ Form::select('Q15', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q16', $questions[15], ['class' => 'col-lg-2 control-label'] )  !!}
             
                    {{ Form::select('Q16', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q17', $questions[16], ['class' => 'col-lg-2 control-label'] )  !!}
              
                    {{ Form::select('Q17', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
               
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q18', $questions[17], ['class' => 'col-lg-2 control-label'] )  !!}
              
                    {{ Form::select('Q18', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q19', $questions[18], ['class' => 'col-lg-2 control-label'] )  !!}
            
                    {{ Form::select('Q19', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
            
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q20', $questions[19], ['class' => 'col-lg-2 control-label'] )  !!}
             
                    {{ Form::select('Q20', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
                
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q21', $questions[20], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q21', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q22', $questions[21], ['class' => 'col-lg-2 control-label'] )  !!}
            
                    {{ Form::select('Q22', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q23', $questions[22], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q23', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q24', $questions[23], ['class' => 'col-lg-2 control-label'] )  !!}
               
                    {{ Form::select('Q24', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q25', $questions[24], ['class' => 'col-lg-2 control-label'] )  !!}
             
                    {{ Form::select('Q25', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
              
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q26', $questions[25], ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q26', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
            
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q27', $questions[26], ['class' => 'col-lg-2 control-label'] )  !!}
            
                    {{ Form::textarea('Q27', '', ['class' => 'form-control-text', 'placeholder' => ''])}}
      
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline" style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'form-control-right new-btn primary-button', 'style' => 'width: 75px; height: 40px;'])}}
                <a class="form-control-right button" href="/students" role="button">Cancel</a>
            </div>
        </form>
    {!! Form::close() !!}

    
@endsection