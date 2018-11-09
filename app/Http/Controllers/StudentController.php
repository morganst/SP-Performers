<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Pretest;
use App\Posttest;


class StudentController extends Controller
{
    /*
    public function index()
    {
        return Student::all();
    }
 
    public function show(Student $student)
    {
        return $student;
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
        'firstName' => 'required',
        'lastName' => 'required',
        'age' => 'integer'
    ]);
        $student = Student::create($request->all());
 
        return response()->json($student, 201);
    }
 
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
 
        return response()->json($student, 200);
    }
 
    public function delete(Student $student)
    {
        $student->delete();
 
        return response()->json(null, 204);
    }
    */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::orderBy('created_at', 'des')->paginate(10);
        return view('students.index')->with('students', $students);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'DOB' => 'required',
            'notes' => 'nullable',
            'gender' => 'required',
            'primaryClass' => 'required',
            'reference' => 'nullable',
            'guitar' => 'nullable',
            'piano' => 'nullable',
            'dance' => 'nullable',
            'summerCamp' => 'nullable',
            'proProject' => 'nullable',
        ]);

        $student = new Student;
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->DOB = $request->input('DOB');
        $student->notes = $request->input('notes');
        $student->gender = $request->input('gender');
        $student->primaryClass = $request->input('primaryClass');
        $student->reference = $request->input('reference');
       
        //$student->user_id = auth()->user()->id;
        $student->save();

        return redirect('/students')->with('success', 'Student Created!');
    }

    public function show($id)
    {
        $stu = Student::find($id);
        //query to find the pretest 
        $pretest = Pretest::where('student_id', '=', $id)->get();

        $posttest = Posttest::where('student_id', '=', $id)->get();

        return view('students.show')
            ->with('stu', $stu)
            ->with('pretest', $pretest)
            ->with('posttest', $posttest);
    }

    public function pretest($id) 
    {
        $stu = Student::find($id);
        //query to find the pretest 
        $pretest = Pretest::where('student_id', '=', $id) ->get();
        return view('students.pretest')->with('stu', $stu)->with('pretest', $pretest);
    }

    public function posttest($id) 
    {
        $stu = Student::find($id);
        //query to find the posttest 
        $posttest = Posttest::where('student_id', '=', $id) ->get();
        return view('students.posttest')->with('stu', $stu)->with('posttest', $posttest);
    }

    public function edit($id)
    {
        $stu = Student::find($id);

        /*if(auth()->user()->id !== $stu->user_id) {
            return redirect('students')->with('error', 'Unauthorized page');
        }*/

        return view('students.edit')->with('stu', $stu);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'DOB' => 'required',
            'notes' => 'nullable',
            'gender' => 'required',
            'primaryClass' => 'required',
            'reference' => 'nullable',
            'guitar' => 'nullable',
            'piano' => 'nullable',
            'dance' => 'nullable',
            'summerCamp' => 'nullable',
            'proProject' => 'nullable',
        ]);

        $student = Student::find($id);
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->DOB = $request->input('DOB');
        $student->notes = $request->input('notes');
        $student->gender = $request->input('gender');
        $student->primaryClass = $request->input('primaryClass');
        $student->reference = $request->input('reference');
       
        $student->save();

        return redirect('/students')->with('success', 'Student Updated!');
    }

    public function destroy($id)
    {
        $stu = Student::find($id);

        /*if(auth()->user()->id !== $stu->user_id) {
            return redirect('students')->with('error', 'Unauthorized page');
        }*/

        $stu->delete();

        return redirect('/students')->with('success', 'Student Deleted!');
    }
}
