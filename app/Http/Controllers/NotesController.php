<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Note;
use App\Classes;
use App\DB;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* if(Auth::user()->role==0)
        {
            $array = [];
            $i=0;
            foreach(Auth::user()->classes as $classes)
            {
                foreach($classes->student as $students)
                {
                    foreach($students->notes as $row)
                    {
                        if(!in_array($row['NId'], $array))
                        {
                            $array[$i] = $row['NId'];
                            $i++;
                            $note[] = $row->NId;
                        }
                    }
                }
            }
            $notes = Note::whereIn('NId',$note)->orderBy('Nid', 'asc')->paginate(5);
            return view('Notes.index',compact('notes','note'));
        } */
        $allNotes = Note::orderBy('Nid', 'asc')->paginate(8);
        return view('Notes.index',compact('allNotes'));
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $allNotes = Note::whereHas('student', function ($request) use ($query) 
            {
                $request->where('fullName', 'like', '%'.$query.'%');
            })
            ->orWhere('Class', 'like', '%'.$query.'%')
            ->orWhere('Type', 'like', '%'.$query.'%')
            ->orWhere('Instructor', 'like', '%'.$query.'%')
            ->orWhere('created_at', 'like', '%'.$query.'%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(8);

            /* $array = [];
            $i=0;
            foreach(Auth::user()->classes as $classes)
            {
                foreach($classes->student as $students)
                {
                    foreach($students->notes as $row)
                    {
                        if(!in_array($row['NId'], $array))
                        {
                            $array[$i] = $row['NId'];
                            $i++;
                            $notes[] = $row->NId;
                        }
                    }
                }
            }
            
            $notes = Note::whereIn('NId',$notes)->whereHas('student', function ($request) use ($query) 
            {
                $request->where('fullName', 'like', '%'.$query.'%');
            })
            ->orWhere('Class', 'like', '%'.$query.'%')
            ->orWhere('Type', 'like', '%'.$query.'%')
            ->orWhere('Instructor', 'like', '%'.$query.'%')
            ->orWhere('created_at', 'like', '%'.$query.'%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(8); */
    
      return view('Notes.index_data', compact('allNotes'))->render();
     }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createfor($SID)
    {
        $notes = Note::where('SID', '=', $SID)->get();
      //  return view('Notes.create');
        return view('Notes.createfor')->with('notes', $notes);
    } // check with is not empty 
    public function createnew($SID)
    {
        $stu = Student::find($SID);

      //  return view('Notes.create');
        return view('Notes.createnew')->with('stu', $stu);
    } // check with is not empty 
    public function create()
    {
      
        
        return view('Notes.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Class' => 'required',
            'Instructor' => 'required',
            'Type' => 'nullable',
            'Text' => 'required',
            'SID'=>'required',
            'Hide'=>'nullable'
        ]);

        $var="Type";

        $notes = new Note;
        $notes->Class = $request->input('Class');
        $notes->Instructor= $request->input('Instructor');
        $notes->$var= $request->input('Type');
        $notes->Text= $request->input('Text');
        $notes->SID= $request->input('SID');
        $notes->Hide= $request->input('Hide');
        $notes->save();

        $url = $request->input('url');
        return redirect($url)->with('success', 'Note Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($SID)
    {
        $notes = Note::where('SID', '=', $SID)->orderBy('created_at', 'des')->get();
        return view('Notes.show')->with('notes', $notes)
                                ->with('SID', $SID);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($NId)
    
    {
        $notes = Note::find($NId);
        return view('Notes.edit')->with('notes', $notes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $NId)
    { 
        $this->validate($request, [
        'Class' => 'required',
        'Instructor' => 'required',
        'Type' => 'nullable',
        'Text' => 'required',
        'Hide' => 'required'
    ]);
    
    $var="Type";
    $notes = Note::find($NId);
    $notes->Class = $request->input('Class');
    $notes->Instructor= $request->input('Instructor');
    $notes->$var= $request->input('Type');
    $notes->Text= $request->input('Text');
    $notes->Hide = $request->input('Hide');
    $notes->save();

    $url = $request->input('url');
    return redirect($url)->with('success', 'Note Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Note::find($id);

        /*if(auth()->user()->id !== $user->user_id) {
            return redirect('instructors')->with('error', 'Unauthorized page');
        }
        */
        $post->delete();

        return redirect('/students')->with('success', 'Note Deleted!');
    }
}
