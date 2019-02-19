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
        $questions = [
            'How open are you about your feelings?', 
            'How positive do you feel about your future?', 
            'I am not sure I can trust the adults in my life?', 
            'I am not sure adults in my life trust me?', 
            'How comfortable do you feel talking about your past?', 
            'How likely are you to set goals for the next year?', 
            'I feel like I can put myself in others shoes?', 
            'I can understand other people\'s feelings/pain?', 
            'My friends and I share the same values?', 
            'I am happy with my friendships?', 
            'I am good at forgiving others for small mistakes?', 
            'I have at least one hobby that I enjoy?', 
            'I am satisfied with the honest conversations I can have with those that are important to me?', 
            'When I am emotional, I feel comfortable turning to someone I know for help', 
            'I am part of a community that I can express myself in?', 
            'I enjoy spending time with talented people', 
            'As a result of this program, I can: Better express my feelings', 
            'As a result of this program, I can: More comfortably talk about my past', 
            'As a result of this program, I can: Trust others more', 
            'As a result of this program, I can: Better develop friendships', 
            'As a result of this program, I can: Use art as a tool to express my feelings', 
            'As a result of this program, I can: Better express my feelings', 
            'As a result of this program, I can: More comfortably talk about my past', 
            'As a result of this program, I can: Trust others more', 
            'As a result of this program, I can: Better develop friendships', 
            'As a result of this program, I can: Use art as a tool to express my feelings', 
            'What other benefits have you gained from this program?'
        ];
        $rank = [
            '1=Not open at all, 5=Very open', 
            '1=Not very positive, 5=Very positive', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Very uncomfortable, 5=Comfortable', 
            '1=Not likely at all, 5=Very likely', 
            '1=No, 5=Yes', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
        ];

        $student = Student::find($id);
        return view('Posttest.create', compact(['student','questions','rank']));

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
        
        $posttest->Q1 = (int)$request->input('Q1');
        $posttest->Q2 = (int)$request->input('Q2');
        $posttest->Q3 = (int)$request->input('Q3');
        $posttest->Q4 = (int)$request->input('Q4');
        $posttest->Q5 = (int)$request->input('Q5');
        $posttest->Q6 = (int)$request->input('Q6');
        $posttest->Q7 = (int)$request->input('Q7');
        $posttest->Q8 = (int)$request->input('Q8');
        $posttest->Q9 = (int)$request->input('Q9');
        $posttest->Q10 = (int)$request->input('Q10');
        $posttest->Q11 = (int)$request->input('Q11');
        $posttest->Q12 = (int)$request->input('Q12');
        $posttest->Q13 = (int)$request->input('Q13');
        $posttest->Q14 = (int)$request->input('Q14');
        $posttest->Q15 = (int)$request->input('Q15');
        $posttest->Q16 = (int)$request->input('Q16');
        $posttest->Q17 = (int)$request->input('Q17');
        $posttest->Q18 = (int)$request->input('Q18');
        $posttest->Q19 = (int)$request->input('Q19');
        $posttest->Q20 = (int)$request->input('Q20');
        $posttest->Q21 = (int)$request->input('Q21');
        $posttest->Q22 = (int)$request->input('Q22');
        $posttest->Q23 = (int)$request->input('Q23');
        $posttest->Q24 = (int)$request->input('Q24');
        $posttest->Q25 = (int)$request->input('Q25');
        $posttest->Q26 = (int)$request->input('Q26');
        $posttest->Q27 = $request->input('Q27');

        $student->posttest()->save($posttest);


        return redirect('/students')->with('success', 'Post-Test completed!');
    }

    public function edit($id)
    {
        $questions = [
            'How open are you about your feelings?', 
            'How positive do you feel about your future?', 
            'I am not sure I can trust the adults in my life?', 
            'I am not sure adults in my life trust me?', 
            'How comfortable do you feel talking about your past?', 
            'How likely are you to set goals for the next year?', 
            'I feel like I can put myself in others shoes?', 
            'I can understand other people\'s feelings/pain?', 
            'My friends and I share the same values?', 
            'I am happy with my friendships?', 
            'I am good at forgiving others for small mistakes?', 
            'I have at least one hobby that I enjoy?', 
            'I am satisfied with the honest conversations I can have with those that are important to me?', 
            'When I am emotional, I feel comfortable turning to someone I know for help', 
            'I am part of a community that I can express myself in?', 
            'I enjoy spending time with talented people', 
            'As a result of this program, I can: Better express my feelings', 
            'As a result of this program, I can: More comfortably talk about my past', 
            'As a result of this program, I can: Trust others more', 
            'As a result of this program, I can: Better develop friendships', 
            'As a result of this program, I can: Use art as a tool to express my feelings', 
            'As a result of this program, I can: Better express my feelings', 
            'As a result of this program, I can: More comfortably talk about my past', 
            'As a result of this program, I can: Trust others more', 
            'As a result of this program, I can: Better develop friendships', 
            'As a result of this program, I can: Use art as a tool to express my feelings', 
            'What other benefits have you gained from this program?'
        ];
        $rank = [
            '1=Not open at all, 5=Very open', 
            '1=Not very positive, 5=Very positive', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Very uncomfortable, 5=Comfortable', 
            '1=Not likely at all, 5=Very likely', 
            '1=No, 5=Yes', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
            '1=Strongly disagree, 5=Strongly agree', 
        ];

        $student = Student::find($id);
        return view('Posttest.edit', compact(['student','questions','rank']));
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

        $posttest = Posttest::where('student_id', '=', $id)->first();
        $posttest->Q1 = (int)$request->input('Q1');
        $posttest->Q2 = (int)$request->input('Q2');
        $posttest->Q3 = (int)$request->input('Q3');
        $posttest->Q4 = (int)$request->input('Q4');
        $posttest->Q5 = (int)$request->input('Q5');
        $posttest->Q6 = (int)$request->input('Q6');
        $posttest->Q7 = (int)$request->input('Q7');
        $posttest->Q8 = (int)$request->input('Q8');
        $posttest->Q9 = (int)$request->input('Q9');
        $posttest->Q10 = (int)$request->input('Q10');
        $posttest->Q11 = (int)$request->input('Q11');
        $posttest->Q12 = (int)$request->input('Q12');
        $posttest->Q13 = (int)$request->input('Q13');
        $posttest->Q14 = (int)$request->input('Q14');
        $posttest->Q15 = (int)$request->input('Q15');
        $posttest->Q16 = (int)$request->input('Q16');
        $posttest->Q17 = (int)$request->input('Q17');
        $posttest->Q18 = (int)$request->input('Q18');
        $posttest->Q19 = (int)$request->input('Q19');
        $posttest->Q20 = (int)$request->input('Q20');
        $posttest->Q21 = (int)$request->input('Q21');
        $posttest->Q22 = (int)$request->input('Q22');
        $posttest->Q23 = (int)$request->input('Q23');
        $posttest->Q24 = (int)$request->input('Q24');
        $posttest->Q25 = (int)$request->input('Q25');
        $posttest->Q26 = (int)$request->input('Q26');
        $posttest->Q27 = $request->input('Q27');
       
        $posttest->save();

        return redirect('/students')->with('success', 'Student Updated!');
    }

    public function destroy($id)
    {
        $posttest = Posttest::where('student_id', '=', $id)->first();

        $posttest->delete();

        return redirect('/students')->with('success', 'Posttest Deleted!');
    }
}
