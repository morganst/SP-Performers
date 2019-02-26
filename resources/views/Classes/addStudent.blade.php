@extends('layouts.app')

@section('content')
    <h2>{{$cla->name}}</h2>
        <hr>
        <div>Name: {{$cla->name}}</div>
        <div>Class Size Limit: {{$cla->limit}}</div>
        @if(count($students) > 0)
            <div class="row">
            </div>
            <br />
            @php
            $array = array();
            @endphp
            @for($i=0;$i<count($cla->student);$i++)
                @php
                $array[$i] = $cla->student[$i]->pivot['student_id'];
                @endphp
            @endfor
                <table>
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </thead>
                    <tbody>
                @foreach($students as $student)
                        @if(!in_array($student->id,$array))
                                    <tr>
                                        <td>{{$student->firstName}}</td>
                                        <td>{{$student->lastName}} </td>
                                        @if(count($cla->student)<$cla->limit)
                                            <td>
                                                        {!!Form::open(['action' => ['ClassController@attachStudent', $cla->id, $student->id], 'method' => 'POST', 'class' => ''])!!}
                                                                {{Form::submit('Add to Class', ['class' => 'form-control-right button', 'style' => 'height: 30px; padding: 5px'])}}
                                                        {!!Form::close()!!}
                                            </td>
                                        @endif
                                    </tr>
                        @endif
                @endforeach
                    </tbody>
                </table>
                <br>
                {{ $students->links() }}
        @else
        <p>No students found</p>
        @endif
        <div class="row">
                <div class="col-3 col-lg-3">Students enrolled to class:</div>
            </div>
            <br>
            <table>
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </thead>
                    <tbody>
            @foreach($cla->student as $student)
                <tr>
                        <td>{{$student->firstName}}</td>
                        <td>{{$student->lastName}} </td>
                        <td>{!!Form::open(['action' => ['ClassController@detachStudent', $cla->id, $student->id], 'method' => 'POST', 'class' => ''])!!}
                                    {{Form::submit('Remove from Class', ['class' => 'form-control-right button', 'style' => 'height: 30px; padding: 5px'])}}
                            {!!Form::close()!!}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
    <hr>
        <div class="text-right">
            <a href="/classes" class="button" role="button" aria-pressed="true">Back</a>
        </div>
@endsection