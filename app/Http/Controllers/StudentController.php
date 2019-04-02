<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Classes;
use App\Pretest;
use App\Posttest;
use DateTime;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count = Student::where('enrolled', '0')->get();
        $students = Student::where('enrolled', '0')->orderBy('created_at', 'des')->paginate(15);
        return view('Students.index', compact(['students', 'count']));
    }

    public function create()
    {
        $array = Classes::select('name')->distinct()->pluck('name','name');
        return view('Students.create', compact(['array']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'fullName' => 'nullable',
            'DOB' => 'required',
            'notes' => 'nullable',
            'gender' => 'required',
            'primaryClass' => 'required',
            'reference' => 'nullable',
            'enrolled' => 'nullable',
        ]);

        $student = new Student;
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->fullName = $request->input('firstName') . " " . $request->input('lastName');
        $student->DOB = $request->input('DOB');
        $student->gender = $request->input('gender');
        $student->primaryClass = $request->input('primaryClass');
        $student->reference = $request->input('reference');
        //$student->enrolled = $request->input('enrolled');
       
        //$student->user_id = auth()->user()->id;
        $student->save();

        return redirect('/students')->with('success', 'Student Created!');
    }

    public function show($id)
    {
        $stu = Student::find($id);
        $pretest = Pretest::where('student_id', '=', $id)->get();

        $posttest = Posttest::where('student_id', '=', $id)->get();

        $d1 = new DateTime($stu->DOB);
        $d2 = new DateTime(date("Y-m-d"));

        $age = $d2->diff($d1);

        return view('Students.show')
            ->with('stu', $stu)
            ->with('pretest', $pretest)
            ->with('posttest', $posttest)
            ->with('age', $age);
    }

    public function pretest($id) 
    {
        $stu = Student::find($id);
        //query to find the pretest 
        $pretest = Pretest::where('student_id', '=', $id) ->get();
        return view('Students.pretest')->with('stu', $stu)->with('pretest', $pretest);
    }

    public function posttest($id) 
    {
        $stu = Student::find($id);
        //query to find the posttest 
        $posttest = Posttest::where('student_id', '=', $id) ->get();
        return view('Students.posttest')->with('stu', $stu)->with('posttest', $posttest);
    }

    public function edit($id)
    {
        $stu = Student::find($id);
        $array = Classes::select('name')->distinct()->pluck('name','name');
        /*if(auth()->user()->id !== $stu->user_id) {
            return redirect('students')->with('error', 'Unauthorized page');
        }*/

        return view('Students.edit', compact(['array','stu']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'fullName' => 'nullable',
            'DOB' => 'required',
            'notes' => 'nullable',
            'gender' => 'required',
            'primaryClass' => 'required',
            'reference' => 'nullable',
            'enrolled' => 'nullable',
        ]);

        $student = Student::find($id);
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->fullName = $request->input('firstName') . " " . $request->input('lastName');
        $student->DOB = $request->input('DOB');
        $student->gender = $request->input('gender');
        $student->primaryClass = $request->input('primaryClass');
        $student->reference = $request->input('reference');
        $student->enrolled = $request->input('enrolled');
       
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

    public function past()
    {
        $count = Student::where('enrolled', '1')->get();
        $students = Student::where('enrolled', '1')->orderBy('created_at', 'des')->paginate(15);
        return view('Students.past', compact(['students', 'count']));
    }
}
