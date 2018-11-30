<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Student; 
use App\Classes;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*         $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'DOB' => 'required',
            'notes' => 'nullable',
            'gender' => 'required',
            'primaryClass' => 'required',
            'reference' => 'nullable',
        ]); */
        $classes = $request->input('cla');
        $stu = $request->input('stu');
        $attend = $request->input('attend');
        $i = 0;
        foreach($stu as $student)
        {
            $attendance = new Attendance;
            $attendance->date = $request->input('date');
            $attendance->attend = $attend[$i];
            $attendance->student_id = $student;
            $attendance->classes_id = $classes;
            $attendance->save();
            $i++;
        }
        
        return redirect('/classes')->with('success', 'Student Created!');
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
