<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Note;
use App\Classes;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = [];
        $allArray = [];
        $i=0;
        $k=0;

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
                        $row->firstName = $students->firstName;
                        $row->lastName = $students->lastName;
                        $notes[] = $row;
                    }
                }
            }
        }
        if(isset($notes))
        {
            $notes = array_reverse(array_sort($notes, function ($value) {
                return $value['created_at'];
            }));
        }
        $stu = Student::get();
        foreach($stu as $stu)
        {
            foreach($stu->notes as $row)
            {
                if(!in_array($row['NId'], $allArray))
                {
                    $allArray[$k] = $row['NId'];
                    $k++;
                    $row->firstName = $stu->firstName;
                    $row->lastName = $stu->lastName;
                    $allNotes[] = $row;
                }
            }
        }
        if(isset($allNotes))
        {
            $allNotes = array_reverse(array_sort($allNotes, function ($value) {
                return $value['created_at'];
            }));
        }
        return view('Notes.index',compact(['notes','allNotes']));
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
            'I/B' => 'nullable',
            'Text' => 'required',
            'SID'=>'required',
            'Hide'=>'nullable'
        ]);

        $var="I/B";

        $notes = new Note;
        $notes->Class = $request->input('Class');
        $notes->Instructor= $request->input('Instructor');
        $notes->$var= $request->input('I/B');
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
        'I/B' => 'nullable',
        'Text' => 'required',
        'Hide' => 'required'
    ]);
    
    $var="I/B";
    $notes = Note::find($NId);
    $notes->Class = $request->input('Class');
    $notes->Instructor= $request->input('Instructor');
    $notes->$var= $request->input('I/B');
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
