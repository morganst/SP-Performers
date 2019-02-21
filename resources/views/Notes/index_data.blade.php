{{-- @if(isset($notes) && Auth::user()->role==0)
@foreach($notes as $note)
    
    @php 
        $class = "";
        if($note['Type'] == "Breakthrough")
            $class = "breakthrough-search";
        else if($note['Type'] == "None")
            $class = "none-search";
        else if($note['Type'] == "Incident")
            $class = "incident-search";
        else
            $class = "severe-note-card";
    @endphp
        @if($note['Hide'] != 'Yes')
            <tr class="{{$class}}">
                <td>{{$note->Type}}!</td>
                <td>{{$note->Instructor}}</td>
                <td>{{$note->student["fullName"]}}</td>
                <td>{{$note->Class}}</td>       
                <td>{{$note['created_at']->toFormattedDateString()}}</td>
                <td><a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a></td>
            </tr>
            <tr class="{{$class}}">
                <td colspan="6">{{$note->Text}}</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
        @endif
    
</tr>
    @endforeach
    <tr>
        <td colspan="4" align="center">
            {!! $notes->links() !!}
        </td>
    </tr>
    @endif --}}
{{-- For admin --}}
@if(isset($allNotes) && Auth::user()->role==1)
@foreach($allNotes as $note)
    
    @php 
        $class = "";
        if($note['Type'] == "Breakthrough")
            $class = "breakthrough-search";
        else if($note['Type'] == "None")
            $class = "none-search";
        else if($note['Type'] == "Incident")
            $class = "incident-search";
        else
            $class = "severe-note-card";
    @endphp
        @if($note['Hide'] != 'Yes')
            <tr class="{{$class}}">
                <td>{{$note->Type}}!</td>
                <td>{{$note->Instructor}}</td>
                <td>{{$note->student["fullName"]}}</td>
                <td>{{$note->Class}}</td>       
                <td>{{$note['created_at']->toFormattedDateString()}}</td>
                <td><a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a></td>
            </tr>
            <tr class="{{$class}}">
                <td colspan="6">{{$note->Text}}</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
        @endif
    
</tr>
    @endforeach
    <tr>
            <td colspan="5" align="center">
                {!! $allNotes->links() !!}
            </td>
            <td>
                    <div class="text-right">
                            <a href="{{ URL::previous() }}" class="button" role="button" aria-pressed="true">Back</a>
                        </div>
            </td>
        </tr>
    @endif
