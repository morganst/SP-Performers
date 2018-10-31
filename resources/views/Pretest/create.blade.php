@extends('layouts.app')

@section('content')
    <h1>{{$stu->firstName}} {{$stu->lastName}}</h1>
    <p>Please complete the pretest form</p>


    {!! Form::open(['action' => 'PretestController@store', 'method' => 'POST']->with($stu->id) !!}
        <form>
            <div class="form-row">
                {!! Form::label('Q1', "Here's question 1", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q1', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q2', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q2', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q3', "Here's question 3", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q3', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q4', "Here's question 4", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q4', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q5', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q5', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q6', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q6', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q7', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q7', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q8', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q8', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q9', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q9', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q10', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q10', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q11', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q11', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q12', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q12', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q13', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q13', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q14', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q14', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q15', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q15', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q16', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q16', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q17', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q17', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q18', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q18', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q19', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('Q19', '', ['class' => 'form-control'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('Q20', "Here's question 2", ['class' => 'col-lg-2 control-label'] )  !!}
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