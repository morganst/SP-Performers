@if(count($data)>0)
@foreach($data as $row)
<tr>
    <td style="text-align: center;">{{$row->student['fullName']}}</td>
    @if($row->attend == 1)
        <td style="border-radius: 25px; text-align: center;" bgcolor="7CFF82">Present</td>
    @else
        <td style="border-radius: 25px; text-align: center;" bgcolor="FF3F3F">Absent</td>
    @endif
    <td style="text-align: center;">{{date("m-d-Y", strtotime($row->date))}}</td>
    <td>{!!Form::open(['action' => ['AttendanceController@destroy', $row->id], 'method' => 'POST', 'style' => 'padding: 0;text-align:center', 'onsubmit' => 'return ConfirmDelete()'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'new-btn error-button', 'role' => 'button'])}}
        {!!Form::close()!!}</td>
</tr>
    @endforeach
@else
<tr>
    <td>No results found</td>
</tr>
@endif
<tr>
    <td colspan="4" align="left">
        {!! $data->links() !!}
    </td>
</tr>
