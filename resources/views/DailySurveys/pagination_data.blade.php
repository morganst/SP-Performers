@foreach($data as $row)
<tr>
    <td>{{$row->student['fullName']}}</td>
    @if($row->attend == 1)
        <td bgcolor="7CFF82">Present</td>
    @else
        <td bgcolor="FF3F3F">Absent</td>
    @endif
    <td>{{date("m-d-Y", strtotime($row->date))}}</td>
    <td>{!!Form::open(['action' => ['AttendanceController@destroy', $row->id], 'method' => 'POST', 'style' => 'padding: 0'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete')}}
        {!!Form::close()!!}</td>
</tr>
    @endforeach
<tr>
    <td colspan="4" align="center">
        {!! $data->links() !!}
    </td>
</tr>