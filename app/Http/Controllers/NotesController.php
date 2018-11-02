<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Note;
class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::orderBy('created_at', 'des')->paginate(10);
        $notes = Note::all();
        
    //   return $notes;
        return view('Notes.index')-> with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($SID)
    {
        $notes = Note::where('SID', '=', $SID)->get();
        return view('Notes.show')->with('notes', $notes);
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
       
    ]);
    $var="I/B";
    $notes = Note::find($NId);
    $notes->Class = $request->input('Class');
    $notes->Instructor= $request->input('Instructor');
    $notes->$var= $request->input('I/B');
    $notes->Text= $request->input('Text');
    $notes->save();
  return redirect('/notes')->with('success', 'User Updated!');
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

        return redirect('/students')->with('success', 'User Deleted!');
    }
}
