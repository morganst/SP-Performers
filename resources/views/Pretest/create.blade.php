@extends('layouts.app')

@section('content')
    <h1>{{$student->firstName}} {{$student->lastName}}</h1>
    <p>Please complete the pretest form</p>

    {!! Form::open(['action' => 'PretestController@store', 'method' => 'POST']) !!}
        <form>
        {{ Form::hidden('student_id', $student->id) }}
            <div class="form-row-inline">
                {!! Form::label('Q1', "How long have you been living in Jacksonville?", ['class' => 'col-lg-2 control-label'] )  !!}
                
                {{ Form::select('Q1', array('1' => '1 year', '2' => '2 years', '3' => '3 years', '4' => '4 years', '5' => '5+ years'), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q2', "Are you attending school?", ['class' => 'col-lg-2 control-label'] )  !!}
                
                {{ Form::select('Q2', array('Yes' => 'Yes', 'No' => 'No'), null, ['class' => 'form-control-right']) }}
            
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q3', "How many siblings do you have?", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q3', array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => '5+'), null, ['class' => 'form-control-right']) }}
          
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q4', "How open are you about your feelings? 1=Not open at all, 5=Very open", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q4', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
            
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q5', "How positive do you feel about your future? 1=Not very positive, 5=Very positive", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q5', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
            
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q6', "I am not sure I can trust the adults in my life? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q6', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
         
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q7', "I am not sure adults in my life trust me? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q7', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
          
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q8', "How comfortable do you feel talking about your past? 1=Very uncomfortable, 5=Comfortable", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q8', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
            
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q9', "How likely are you to set goals for the next year? 1=Not likely at all, 5=Very likely", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q9', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q10', "I feel like I can put myself in others shoes? 1=No, 5=Yes", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q10', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
         
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q11', "I can understand other people's feelings/pain?", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q11', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
           
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q12', "My friends and I share the same values? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q12', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q13', "I am happy with my friendships? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q13', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q14', "I am good at forgiving others for small mistakes? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q14', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
        
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q15', "I have at least one hobby that I enjoy? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q15', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
         
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q16', "I am satisfied with the honest conversations I can have with those that are important to me? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q16', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
            
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q17', "When I am emotional, I feel comfortable turning to someone I know for help 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q17', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
             
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q18', "I am part of a community that I can express myself in? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q18', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
        
            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q19', "I enjoy spending time with talented people 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q19', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}

            </div>
            <hr>
            &nbsp;
            <div class="form-row-inline">
                {!! Form::label('Q20', "How likely would you be to use an art form as a way of expressing life’s difficulties? 1=Not at all likely, 5=Extremely likely", ['class' => 'col-lg-2 control-label'] )  !!}
                
                    {{ Form::select('Q20', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control-right']) }}
            </div>
            <hr>
            &nbsp;
            <div style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a class="btn btn-secondary" href="/students" role="button">Back</a>
            </div>
        </form>
    {!! Form::close() !!}

    
@endsection