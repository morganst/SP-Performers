@if(count($students)>0)
@foreach($students as $row)
@if(!in_array($row->id,$array))    
    <tr>
        <td>{{$row->fullName}}</td>
        @if(count($cla->student)<$cla->limit)
        <td style="display: block;width: 110px">
            {!!Form::open(['action' => ['ClassController@attachStudent', $cla->id, $row->id], 'method' => 'POST', 'class' => ''])!!}
                    {{Form::submit('Add to Class', ['class' => 'form-control-right button', 'style' => 'height: 30px; padding: 5px'])}}
            {!!Form::close()!!}
        </td>
        @else
        <td>
            Class Full
        </td>
        @endif
    </tr>
    @endif
@endforeach
@else
<tr>
    <td>No results found</td>
</tr>
@endif

<tr>
    <td colspan="4" align="center">
        {!! $students->links() !!}
    </td>
</tr>
