@foreach($data as $row)
<tr>
 <td>{{$row->student['fullName']}}</td>
@if($row->attend == 1)
<td bgcolor="7CFF82">Present</td>
@else
<td bgcolor="FF3F3F">Absent</td>
@endif
{{--  <td>{{$row->classes['name']}}</td> --}}
 <td>{{$row->date}}</td>
</tr>
@endforeach
<tr>
 <td colspan="5" align="center">
  {!! $data->links() !!}
 </td>
</tr>