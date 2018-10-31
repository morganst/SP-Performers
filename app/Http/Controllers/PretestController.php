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
        $student = Student::find($id);
        return view('pretest.create')->with('student', $student);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
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

        $pretest = new Pretest;

        $pretest->student_id = $request->input('student_id');

        $student = Student::find($pretest->student_id);
        
        $pretest->q1 = $request->input('Q1');
        $pretest->q2 = (int)$request->input('Q2');
        $pretest->q3 = (int)$request->input('Q3');
        $pretest->q4 = (int)$request->input('Q4');
        $pretest->q5 = (int)$request->input('Q5');
        $pretest->q6 = (int)$request->input('Q6');
        $pretest->q7 = (int)$request->input('Q7');
        $pretest->q8 = (int)$request->input('Q8');
        $pretest->q9 = (int)$request->input('Q9');
        $pretest->q10 = (int)$request->input('Q10');
        $pretest->q11 = $request->input('Q11');
        $pretest->q12 = (int)$request->input('Q12');
        $pretest->q13 = (int)$request->input('Q13');
        $pretest->q14 = (int)$request->input('Q14');
        $pretest->q15 = (int)$request->input('Q15');
        $pretest->q16 = (int)$request->input('Q16');
        $pretest->q17 = (int)$request->input('Q17');
        $pretest->q18 = (int)$request->input('Q18');
        $pretest->q19 = (int)$request->input('Q19');
        $pretest->q20 = (int)$request->input('Q20');

        $student->pretest()->save($pretest);


        return redirect('/students')->with('success', 'Pretest completed!');
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
