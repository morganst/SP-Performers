<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructor;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $instructors = Instructor::orderBy('created_at', 'des')->paginate(10);
        return view('instructors.index')->with('instructors', $instructors);
    }

    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'center' => 'required',
            'guitar' => 'nullable',
            'piano' => 'nullable',
            'dance' => 'nullable',
            'summerCamp' => 'nullable',
            'proProject' => 'nullable',
        ]);

        $instructor = new Instructor;
        $instructor->firstName = $request->input('firstName');
        $instructor->lastName = $request->input('lastName');
        $instructor->DOB = $request->input('DOB');
        $instructor->class = $request->input('class');
        $instructor->notes = $request->input('notes');
        $instructor->gender = $request->input('gender');
        $instructor->primaryClass = $request->input('primaryClass');
        $instructor->reference = $request->input('reference');
       
        $instructor->user_id = auth()->user()->id;
        $instructor->save();

        return redirect('/instructors')->with('success', 'Instructor Created!');
    }

    public function show($id)
    {
        $ins = Instructor::find($id);
        return view('instructors.show')->with('ins', $ins);
    }

    public function edit($id)
    {
        $ins = Instructor::find($id);

        if(auth()->user()->id !== $ins->user_id) {
            return redirect('instructors')->with('error', 'Unauthorized page');
        }

        return view('instructors.edit')->with('ins', $ins);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'center' => 'required',
            'guitar' => 'nullable',
            'piano' => 'nullable',
            'dance' => 'nullable',
            'summerCamp' => 'nullable',
            'proProject' => 'nullable',
        ]);

        $instructor = Instructor::find($id);
        $instructor->firstName = $request->input('firstName');
        $instructor->lastName = $request->input('lastName');
        $instructor->DOB = $request->input('DOB');
        $instructor->class = $request->input('class');
        $instructor->notes = $request->input('notes');
        $instructor->gender = $request->input('gender');
        $instructor->primaryClass = $request->input('primaryClass');
        $instructor->reference = $request->input('reference');
       
        $instructor->save();

        return redirect('/instructors')->with('success', 'Instructor Updated!');
    }

    public function destroy($id)
    {
        $ins = Instructor::find($id);

        if(auth()->user()->id !== $ins->user_id) {
            return redirect('instructors')->with('error', 'Unauthorized page');
        }

        $ins->delete();

        return redirect('/instructors')->with('success', 'Instructor Deleted!');
    }
}
