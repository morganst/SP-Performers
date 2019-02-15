@foreach($allNotes as $note)
    {{-- @if(isset($notes) && Auth::user()->role==0)
        Recent Activity: 
        @php
        $i = 0
        @endphp
        @foreach($notes as $note)
        @if($note['Hide'] != 'Yes')
            @php 
                $class = "";
                if($note['Type'] == "Breakthrough")
                    $class = "breakthrough-note-card";
                else if($note['Type'] == "None")
                    $class = "note-note-card";
                else if($note['Type'] == "Incident")
                    $class = "incident-note-card";
                else
                    $class = "severe-note-card";
            @endphp

            <div class="dashboard-note">
                <div class="{{$class}}">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <h2>{{$note['Type']}}!</h2>
                    <h3>Created By: {{$note->Instructor}}</h3>
                    <h3>Student: {{$note->firstName}} {{$note->lastName}}</h3>
                    <h3>Class: {{$note->Class}}</h3>       
                    
                    <div class='note-card-text'> {{$note->Text}}</div>

                    <h5>Created: {{$note['created_at']->toFormattedDateString()}}</h5>
                    <a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a>
            </div>
        </div>
        @endif
        @php 
        if (++$i == 4) 
            break;
        @endphp
    @endforeach

        <div>
        <a style="float:right;" href="/notes" role="button">View More</a>
        </div>
    @endif --}}
    {{-- For admin --}}
    @if(isset($allNotes) && Auth::user()->role==1)
        @if($note['Hide'] != 'Yes')
            <tr>
                <td>{{$note['Type']}}!</td>
                <td>{{$note->Instructor}}</td>
                <td>{{$note->firstName}} {{$note->lastName}}</td>
                <td>{{$note->Class}}</td>       
                <td>{{$note->Text}}</td>
                <td>{{$note['created_at']->toFormattedDateString()}}</td>
                <td><a href="/notes/{{$note->NId}}/edit" class="new-btn clear-button" role="button">Edit</a></td>
            </tr>
        @endif
    @endif
</tr>
    @endforeach
<tr>

</tr>