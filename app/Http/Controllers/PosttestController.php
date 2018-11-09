<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posttest;
use App\Student;

class PosttestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $questions = ['this is one', 'this is two'];
        $student = Student::find($id);
        return view('posttest.create')
            ->with('student', $student)
            ->with('questions', $questions);
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
            'Q20' => 'required',
            'Q21' => 'required',
            'Q22' => 'required',
            'Q23' => 'required',
            'Q24' => 'required',
            'Q25' => 'required',
            'Q26' => 'required',
            'Q27' => 'required'
        ]);

        $posttest = new Posttest;

        $posttest->student_id = $request->input('student_id');

        $student = Student::find($posttest->student_id);
        
        $posttest->q1 = (int)$request->input('Q1');
        $posttest->q2 = (int)$request->input('Q2');
        $posttest->q3 = (int)$request->input('Q3');
        $posttest->q4 = (int)$request->input('Q4');
        $posttest->q5 = (int)$request->input('Q5');
        $posttest->q6 = (int)$request->input('Q6');
        $posttest->q7 = (int)$request->input('Q7');
        $posttest->q8 = (int)$request->input('Q8');
        $posttest->q9 = (int)$request->input('Q9');
        $posttest->q10 = (int)$request->input('Q10');
        $posttest->q11 = (int)$request->input('Q11');
        $posttest->q12 = (int)$request->input('Q12');
        $posttest->q13 = (int)$request->input('Q13');
        $posttest->q14 = (int)$request->input('Q14');
        $posttest->q15 = (int)$request->input('Q15');
        $posttest->q16 = (int)$request->input('Q16');
        $posttest->q17 = (int)$request->input('Q17');
        $posttest->q18 = (int)$request->input('Q18');
        $posttest->q19 = (int)$request->input('Q19');
        $posttest->q20 = (int)$request->input('Q20');
        $posttest->q21 = (int)$request->input('Q21');
        $posttest->q22 = (int)$request->input('Q22');
        $posttest->q23 = (int)$request->input('Q23');
        $posttest->q24 = (int)$request->input('Q24');
        $posttest->q25 = (int)$request->input('Q25');
        $posttest->q26 = (int)$request->input('Q26');
        $posttest->q27 = $request->input('Q27');

        $student->posttest()->save($posttest);


        return redirect('/students')->with('success', 'Post-Test completed!');
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
            'Q20' => 'required',
            'Q21' => 'required',
            'Q22' => 'required',
            'Q23' => 'required',
            'Q24' => 'required',
            'Q25' => 'required',
            'Q26' => 'required',
            'Q27' => 'required'
        ]);

        $posttest = Posttest::find($id);
        $posttest->q1 = (int)$request->input('Q1');
        $posttest->q2 = (int)$request->input('Q2');
        $posttest->q3 = (int)$request->input('Q3');
        $posttest->q4 = (int)$request->input('Q4');
        $posttest->q5 = (int)$request->input('Q5');
        $posttest->q6 = (int)$request->input('Q6');
        $posttest->q7 = (int)$request->input('Q7');
        $posttest->q8 = (int)$request->input('Q8');
        $posttest->q9 = (int)$request->input('Q9');
        $posttest->q10 = (int)$request->input('Q10');
        $posttest->q11 = (int)$request->input('Q11');
        $posttest->q12 = (int)$request->input('Q12');
        $posttest->q13 = (int)$request->input('Q13');
        $posttest->q14 = (int)$request->input('Q14');
        $posttest->q15 = (int)$request->input('Q15');
        $posttest->q16 = (int)$request->input('Q16');
        $posttest->q17 = (int)$request->input('Q17');
        $posttest->q18 = (int)$request->input('Q18');
        $posttest->q19 = (int)$request->input('Q19');
        $posttest->q20 = (int)$request->input('Q20');
        $posttest->q21 = (int)$request->input('Q21');
        $posttest->q22 = (int)$request->input('Q22');
        $posttest->q23 = (int)$request->input('Q23');
        $posttest->q24 = (int)$request->input('Q24');
        $posttest->q25 = (int)$request->input('Q25');
        $posttest->q26 = (int)$request->input('Q26');
        $posttest->q27 = $request->input('Q27');
       
        $posttest->save();

        return redirect('/students')->with('success', 'Student Updated!');
    }
}
