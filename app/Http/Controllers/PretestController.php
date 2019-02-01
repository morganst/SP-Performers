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
        $questions = ['this is one', 'this is two'];
        $student = Student::find($id);
        return view('Pretest.create')->with('student', $student)
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
            'Q20' => 'required'
        ]);

        $pretest = new Pretest;

        $pretest->student_id = $request->input('student_id');

        $student = Student::find($pretest->student_id);
        
        $pretest->Q1 = $request->input('Q1');
        $pretest->Q2 = $request->input('Q2');
        $pretest->Q3 = $request->input('Q3');
        $pretest->Q4 = (int)$request->input('Q4');
        $pretest->Q5 = (int)$request->input('Q5');
        $pretest->Q6 = (int)$request->input('Q6');
        $pretest->Q7 = (int)$request->input('Q7');
        $pretest->Q8 = (int)$request->input('Q8');
        $pretest->Q9 = (int)$request->input('Q9');
        $pretest->Q10 = (int)$request->input('Q10');
        $pretest->Q11 = $request->input('Q11');
        $pretest->Q12 = (int)$request->input('Q12');
        $pretest->Q13 = (int)$request->input('Q13');
        $pretest->Q14 = (int)$request->input('Q14');
        $pretest->Q15 = (int)$request->input('Q15');
        $pretest->Q16 = (int)$request->input('Q16');
        $pretest->Q17 = (int)$request->input('Q17');
        $pretest->Q18 = (int)$request->input('Q18');
        $pretest->Q19 = (int)$request->input('Q19');
        $pretest->Q20 = (int)$request->input('Q20');

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


}
