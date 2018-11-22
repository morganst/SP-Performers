@extends('layouts.app')

@section('content')
    <h2>{{$cla->name}}</h2>
        <hr>
        <div>Name: {{$cla->name}}</div>
        <div>Class Size Limit: {{$cla->limit}}</div>
        @if(count($students) > 0)
            <div class="row">
                <div class="col-3 col-lg-3">Name:</div>
            </div>
            <br />
            <?php
            $array = array();
            ?>
            @for($i=0;$i<count($cla->student);$i++)
                <?php
                $array[$i] = $cla->student[$i]->pivot['student_id'];
                ?>
            @endfor
                @foreach($students as $student)
                        @if(!in_array($student->id,$array))
                                <div class="row">
                                    <div class="col-3 col-lg-3">{{$student->firstName}} {{$student->lastName}} </div>
                                            @if(count($cla->student)<$cla->limit)
                                                <div class="btn-group">
                                                        {!!Form::open(['action' => ['ClassController@attachStudent', $cla->id, $student->id], 'method' => 'POST', 'class' => ''])!!}
                                                                {{Form::submit('Add to Class', ['class' => 'btn btn-sm btn-danger'])}}
                                                        {!!Form::close()!!}
                                                </div>
                                            @endif
                                    </div>
                                </div>
                            @endif
                    <br>
                @endforeach
        @else
        <p>No students found</p>
        @endif
        <div class="row">
                <div class="col-3 col-lg-3">Instructors assigned to class:</div>
            </div>
            <br />
            @foreach($cla->student as $student)
                <div class="row">
                    <div class="col-3 col-lg-3">{{$student->firstName}} {{$student->lastName}}</div>
                        <div class="btn-group">
                            {!!Form::open(['action' => ['ClassController@detachStudent', $cla->id, $student->id], 'method' => 'POST', 'class' => ''])!!}
                                    {{Form::submit('Remove from Class', ['class' => 'btn btn-sm btn-danger'])}}
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
                <br>
            @endforeach

    <hr>
        <div class="text-right">
            <a href="/classes" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>
@endsection