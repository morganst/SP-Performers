@extends('layouts.app')

@section('content')
    <h1>{{$student->firstName}} {{$student->lastName}}</h1>
    <p>Please complete the pretest form</p>


    {!! Form::open(['action' => 'PretestController@store', 'method' => 'POST']) !!}
        <form>
        {{ Form::hidden('student_id', $student->id) }}
            <div class="form-row">
                {!! Form::label('Q1', "How long have you been living in Jacksonville?", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q1', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q2', "Are you attending school?", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q2', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q3', "How many siblings do you have?", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q3', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q4', "How open are you about your feelings? 1=Not open at all, 5=Very open", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q4', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q5', "How positive do you feel about your future? 1=Not very positive, 5=Very positive", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q5', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q6', "I am not sure I can trust the adults in my life? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q6', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q7', "I am not sure adults in my life trust me? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q7', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q8', "How comfortable do you feel talking about your past? 1=Very uncomfortable, 5=Comfortable", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q8', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q9', "How likely are you to set goals for the next year? 1=Not likely at all, 5=Very likely", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q9', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q10', "I feel like I can put myself in others shoes? 1=No, 5=Yes", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q10', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q11', "I can understand other people's feelings/pain?", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q11', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q12', "My friends and I share the same values? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q12', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q13', "I am happy with my friendships? 1=Strongly disagree, 5=Strongly agre", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q13', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q14', "I am good at forgiving others for small mistakes? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q14', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q15', "I have at least one hobby that I enjoy? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q15', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q16', "I am satisfied with the honest conversations I can have with those that are important to me? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q16', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q17', "When I am emotional, I feel comfortable turning to someone I know for help 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q17', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q18', "I am part of a community that I can express myself in? 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q18', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q19', "I enjoy spending time with talented people 1=Strongly disagree, 5=Strongly agree", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q19', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q20', "How likely would you be to use an art form as a way of expressing life’s difficulties? 1=Not at all likely, 5=Extremely likely", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q20', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a class="btn btn-secondary" href="/students" role="button">Back</a>
            </div>
        </form>
    {!! Form::close() !!}

    
@endsection