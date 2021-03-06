{{-- @if(isset($notes) && Auth::user()->role==0)
@foreach($notes as $note)
    
    @php 
        $class = "";
        if($note['Type'] == "Breakthrough")
            $class = "breakthrough-search";
        else if($note['Type'] == "Note")
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
@if(isset($allNotes))
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
            $class = "severe-note-search";
    @endphp
            <tr style="text-align: center;" class="{{$class}}">
                <td style="border-top-left-radius: 25px;">{{$note->Type}}!</td>
                <td>{{$note->Instructor}}</td>
                <td>{{$note->student["fullName"]}}</td>
                <td>{{$note->Class}}</td>       
                <td>{{$note['created_at']->toFormattedDateString()}}</td>
                <td style="border-top-right-radius: 25px;"><a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a></td>
            </tr>
            <tr class="{{$class}}">
                <td style="padding-left: 25px;padding-bottom:10px;border-bottom-right-radius: 25px;border-bottom-left-radius: 25px;" colspan="6">{{$note->Text}}</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>  
</tr>
    @endforeach
    @else
<tr>
    <td>No results found</td>
</tr>
    @endif
    <tr>
            <td colspan="5" align="center">
                {!! $allNotes->links() !!}
            </td>
            <td>
                    <div class="text-right">
                            <a href="/" class="button" role="button" aria-pressed="true">Back</a>
                        </div>
            </td>
        </tr>

