@extends('layouts.app')

@section('content')
    <h1>{{$student->firstName}} {{$student->lastName}}</h1>
    <p>Please complete the Post-test form</p>

    {!! Form::open(['action' => 'PosttestController@store', 'method' => 'POST']) !!}
        <form>
        {{ Form::hidden('student_id', $student->id) }}
            <div class="form-row-uncentered">
                {!! Form::label('Q1', $questions[0], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                {{ Form::select('Q1', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), null, ['class' => 'form-control', 'style' => 'float: right']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q2', $questions[1], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                {{ Form::select('Q2', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q3', $questions[2], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q3', array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => '5'), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q4', $questions[3], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q4', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q5', $questions[4], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q5', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q6', $questions[5], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q6', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q7', $questions[6], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q7', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q8', $questions[7], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q8', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q9', $questions[8], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q9', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q10', $questions[9], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q10', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q11', $questions[10], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q11', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q12', $questions[11], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q12', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q13', $questions[12], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q13', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q14', $questions[13], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q14', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q15', $questions[14], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q15', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q16', $questions[15], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q16', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q17', $questions[16], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q17', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q18', $questions[17], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q18', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q19', $questions[18], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q19', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q20', $questions[19], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q20', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q21', $questions[20], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q21', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q22', $questions[21], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q22', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q23', $questions[22], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q23', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q24', $questions[23], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q24', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q25', $questions[24], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q25', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q26', $questions[25], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::select('Q26', array('1' => '1', '2' => '2', '3' => 3, '4' => 4, '5' => 5), null, ['class' => 'form-control']) }}
                </div>
            </div>
            &nbsp;
            <div class="form-row-uncentered">
                {!! Form::label('Q27', $questions[26], ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{ Form::text('Q27', '', ['class' => 'form-control', 'placeholder' => ''])}}
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