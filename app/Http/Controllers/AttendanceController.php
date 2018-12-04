<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Classes;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cla = Classes::find($id);
        $attend = Attendance::orderBy('created_at', 'des')->paginate(10);
        return view('Attendances.index', compact(['cla', 'attend']));
    }

    public function search(Request $request){
        $searchDate = $request->input('date');
        $search;
        $cla = Classes::find($request->input('cla'));
        $attend = Attendance::orderBy('created_at', 'des')->paginate(10);
        return view('Attendances.search', compact(['cla', 'attend', 'searchDate']));
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
        if($stu>0)
        {
            foreach($stu as $student)
            {
                $attendance = Attendance::updateOrCreate(
                    ['date' => $request->input('date'), 'student_id' => $student, 'classes_id' => $classes],
                    ['attend' => $attend[$i]]
                );
                $i++;
            }
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
