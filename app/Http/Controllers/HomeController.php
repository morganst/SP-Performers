<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Note;
use App\Classes;
use App\DailySurvey;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = [];
        $i=0;
        $notes = [];

        foreach(Auth::user()->classes as $classes)
        {
            foreach($classes->student as $students)
            {
                foreach($students->notes as $row)
                {
                    if(!in_array($row['NId'], $array))
                    {
                        $array[$i] = $row['NId'];
                        $i++;
                        $row->firstName = $students->firstName;
                        $row->lastName = $students->lastName;
                        $notes[] = $row;
                    }
                }
            }
        }
        if(isset($notes))
        {
            $notes = array_reverse(array_sort($notes, function ($value) {
                return $value['created_at'];
            }));
        }
        $i = 0;
        $allNotes = Note::orderBy('Nid', 'asc')->paginate(4);
        $dailySurveys = DailySurvey::orderBy('created_at','des')->paginate(10);
        return view('welcome',compact(['notes','allNotes','dailySurveys','i']));
    }

    public function logout () 
    {
        auth()->logout();
        return redirect('/login');
    }
}
