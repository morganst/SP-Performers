@if(count($users)>0)
@foreach($users as $user)
@if(!in_array($user->id,$array))    
    <tr>
        <td>{{$user->firstName}} {{$user->lastName}}</td>
        <td style="display: block; margin: auto; width: 110px">
                {!!Form::open(['action' => ['ClassController@attachUser', $cla->id, $user->id], 'method' => 'POST', 'class' => ''])!!}
                {{Form::submit('Add to Class', ['class' => 'form-control-right button', 'style' => 'height: 30px; padding: 5px'])}}
                {!!Form::close()!!}
        </td>
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
        {!! $users->links() !!}
    </td>
</tr>