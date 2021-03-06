<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Classes;

class AttendanceController extends Controller
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
        $cla = Classes::find($id);
        $attend = Attendance::orderBy('created_at', 'des')->paginate(6);
        return view('Attendances.index', compact(['cla', 'attend']));
    }

    public function search(Request $request){
        $searchDate = $request->input('date');
        $cla = Classes::find($request->input('cla'));
        $attend = Attendance::orderBy('created_at', 'des')->get();
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
/*          $this->validate($request, [
            'attend' => 'required',

        ]); */
        $classes = $request->input('cla');
        $stu = $request->input('stu');
        $attend = $request->input('attend');
        $i = 0;
        if($stu>0)
        {
            foreach($stu as $student)
            {
                if(isset($attend[$i]))
                {
                    $attendance = Attendance::updateOrCreate(
                    ['date' => $request->input('date'), 'student_id' => $student, 'classes_id' => $classes],
                    ['attend' => $attend[$i]]
                );
                }
                $i++;
            }
        }
        return redirect()->back()->with('message', 'Attendance Submitted!');
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
        $att = Attendance::find($id);

        /*if(auth()->user()->id !== $stu->user_id) {
            return redirect('students')->with('error', 'Unauthorized page');
        }*/

        $att->delete();

        return redirect()->back()->with('message', 'Record deleted!');
    }
}
