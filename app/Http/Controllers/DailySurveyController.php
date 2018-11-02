<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
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
        //
        $dailySurveys = DailySurvey::orderBy('created_at','des')->paginate(10);
        $cla = Classes::find($id);
        return view('DailySurveys.create')->with('cla', $cla)->with('lookupID',$lookupID)->with('dailySurveys',$dailySurveys);
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

        ]);

        $dailySurvey = new DailySurvey;
        $dailySurvey->StudentID = $request->get('StudentID');
        $dailySurvey->ClassID = $request->get('ClassID');
        $dailySurvey->Q1 = $request->get('Q1');
        $dailySurvey->Q2 = $request->get('Q2');
        $dailySurvey->Q3 = $request->get('Q3');
        $dailySurvey->Q4 = $request->get('Q4');
        $dailySurvey->Q5 = $request->get('Q5');
        $dailySurvey->Mood = $request->get('Mood');

        $dailySurvey->save();

        $dailySurvey->cla = $request->input('cla');
        $dailySurvey->id = $request->input('ClassID');

        $id = $dailySurvey->id;
        $cla = Classes::find($id);
        $dailySurveys = DailySurvey::orderBy('created_at','des')->paginate(10);
        return view('DailySurveys.index')->with('cla',$cla)->with('dailySurveys',$dailySurveys);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
