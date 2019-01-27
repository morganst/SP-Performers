<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Note;
use App\Classes;
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
        $allArray = [];
        $i=0;
        $k=0;

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
        $stu = Student::get();
        foreach($stu as $stu)
        {
            foreach($stu->notes as $row)
            {
                if(!in_array($row['NId'], $allArray))
                {
                    $allArray[$k] = $row['NId'];
                    $k++;
                    $row->firstName = $stu->firstName;
                    $row->lastName = $stu->lastName;
                    $allNotes[] = $row;
                }
            }
        }
        if(isset($allNotes))
        {
            $allNotes = array_reverse(array_sort($allNotes, function ($value) {
                return $value['created_at'];
            }));
        }
        return view('welcome',compact(['notes','allNotes']));
    }

    public function logout () 
    {
        auth()->logout();
        return redirect('/login');
    }
}
