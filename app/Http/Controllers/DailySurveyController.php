<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Student;
use App\DailySurvey;
class DailySurveyController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$dailySurveys = DailySurvey::orderBy('created_at','des')->paginate(10);
        //return view('DailySurveys.index',compact('dailySurveys'));

        // $dailySurveys = DailySurvey::orderBy('created_at','des')->paginate(10);
        // $cla = Classes::find($id);
        // //return view('classes.show')->with('cla', $cla);
        // return view('DailySurveys.index')->with('cla', $cla)->with('dailySurveys',$dailySurveys);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $lookupID)
    {
        $cla = Classes::find($id);
        for($i=0;$i<count($cla->student);$i++)
        {
            $array[$i] = $cla->student[$i]->id;
        }
        $key = array_search($lookupID, $array);
        $next = $key + 1;
        $prev = $key - 1;
        return view('DailySurveys.create',compact(['cla','lookupID','next','prev','array']));
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
            'StudentID'=>'required',
            'ClassID'=>'required',
            'Q1'=>'required',
            'Q2'=>'required',
            'Q3'=>'required',
            'Q4'=>'required',
            'Q4'=>'required',
            'Q5'=>'required',
            'Mood'=>'required',
            'date'=>'required'

        ]); 

        $dailySurveys = new DailySurvey;
        $dailySurveys->StudentID = $request->get('StudentID');
        $dailySurveys->date = $request->input('date');
        $dailySurveys->ClassID = $request->get('ClassID');
        $dailySurveys->Q1 = $request->input('Q1');
        $dailySurveys->Q2 = $request->input('Q2');
        $dailySurveys->Q3 = $request->input('Q3');
        $dailySurveys->Q4 = $request->input('Q4');
        $dailySurveys->Q5 = $request->input('Q5');
        $dailySurveys->mood = $request->input('Mood');
        
        $dailySurveys->save();

        return redirect()->back()->with('success', 'Survey Submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dailySurvey = DailySurvey::where('StudentID',$id)->orderBy('created_at', 'des')->paginate(2);
        return view('DailySurveys.show', compact(['dailySurvey']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = DailySurvey::find($id);
        $cla = Classes::find($survey->ClassID);
        $stu = Student::find($survey->StudentID);
        return view('DailySurveys.edit', compact(['survey','cla','stu']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'StudentID'=>'required',
            'ClassID'=>'required',
            'Q1'=>'required',
            'Q2'=>'required',
            'Q3'=>'required',
            'Q4'=>'required',
            'Q4'=>'required',
            'Q5'=>'required',
            'Mood'=>'required',
            'date'=>'required'

        ]); 

        $dailySurveys = DailySurvey::find($id);
        $dailySurveys->StudentID = $request->get('StudentID');
        $dailySurveys->date = $request->input('date');
        $dailySurveys->ClassID = $request->get('ClassID');
        $dailySurveys->Q1 = $request->input('Q1');
        $dailySurveys->Q2 = $request->input('Q2');
        $dailySurveys->Q3 = $request->input('Q3');
        $dailySurveys->Q4 = $request->input('Q4');
        $dailySurveys->Q5 = $request->input('Q5');
        $dailySurveys->mood = $request->input('Mood');
        
        $dailySurveys->save();

        return redirect()->back()->with('success', 'Survey Submitted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = DailySurvey::find($id);

        /*if(auth()->user()->id !== $stu->user_id) {
            return redirect('students')->with('error', 'Unauthorized page');
        }*/

        $survey->delete();

        return back()->with('success', 'Daily Survey Deleted!');
    }
}
