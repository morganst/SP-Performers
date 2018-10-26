<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pretest;
use App\Student;

class PretestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $stu = Student::find($id);
        return view('pretest.create')->with('stu', $stu);
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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Q1' => 'required',
            'Q2' => 'required',
            'Q3' => 'required',
            'Q4' => 'required',
            'Q5' => 'required',
            'Q6' => 'required',
            'Q7' => 'required',
            'Q8' => 'required',
            'Q9' => 'required',
            'Q10' => 'required',
            'Q11' => 'required',
            'Q12' => 'required',
            'Q13' => 'required',
            'Q14' => 'required',
            'Q15' => 'required',
            'Q16' => 'required',
            'Q17' => 'required',
            'Q18' => 'required',
            'Q19' => 'required',
            'Q20' => 'required'
        ]);

        $pretest = Pretest::find($id);
        $pretest->Q1 = $request->input('Q1');
        $pretest->Q2 = $request->input('Q1');
        $pretest->Q3 = $request->input('Q1');
        $pretest->Q4 = $request->input('Q1');
        $pretest->Q5 = $request->input('Q1');
        $pretest->Q6 = $request->input('Q1');
        $pretest->Q7 = $request->input('Q1');
        $pretest->Q8 = $request->input('Q1');
        $pretest->Q9 = $request->input('Q1');
        $pretest->Q10 = $request->input('Q1');
        $pretest->Q11 = $request->input('Q1');
        $pretest->Q12 = $request->input('Q1');
        $pretest->Q13 = $request->input('Q1');
        $pretest->Q14 = $request->input('Q1');
        $pretest->Q15 = $request->input('Q1');
        $pretest->Q16 = $request->input('Q1');
        $pretest->Q17 = $request->input('Q1');
        $pretest->Q18 = $request->input('Q1');
        $pretest->Q19 = $request->input('Q1');
        $pretest->Q20 = $request->input('Q1');

       
        $pretest->save();

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
