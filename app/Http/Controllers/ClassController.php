<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\User;
use App\Student;
use DB;
use App\DailySurvey;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    
    {
        
        $classes = Classes::orderBy('created_at', 'des')->paginate(9);
        $search=Classes::all();

       
        $filter = array("");
        $check = "";
       
    

    
    
     foreach($search as $class){
     
                    $size=sizeof($filter);
                    for ($i = 0; $i < $size; $i++){
                        if($class->location==$filter[$i]){
                            $check="yes";
                            break;
                        }
                        else{
                            $check="no";
                        }
                    
    
  
                        
                     
                      }
                      
                    if( $check=="no"){
                        array_push($filter,$class->location);
                        }
                    }
                         
                         
        return view('Classes.index',compact(['filter', 'classes']));
    }

    public function create()
    {
        return view('Classes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'limit' => 'required|integer',
            'time' => 'required|string',
            'location' => 'required|string',
        ]);

        $class = new Classes;
        $class->name = $request->input('name');
        $class->limit = $request->input('limit');
        $class->time = $request->input('time');
        $class->location = $request->input('location');
        //$class->user_id = auth()->user()->id;
        $class->save();

        return redirect('/classes')->with('success', 'Class Created!');
    }

    public function show($id)
    {
        $dailySurveys = DailySurvey::get();
        $cla = Classes::find($id);
        $students = Student::get();
        return view('DailySurveys.index', compact(['cla', 'students', 'dailySurveys']));
        //return view('classes.show')->with('cla', $cla);
    }

    public function edit($id)
    {
        $cla = Classes::find($id);

        /*if(auth()->user()->id !== $cla->user_id) {
            return redirect('classes')->with('error', 'Unauthorized page');
        }*/

        return view('Classes.edit')->with('cla', $cla);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'limit' => 'required|integer',
            'time' => 'required|string',
            'location' => 'required|string',
        ]);

        $class = Classes::find($id);
        $class->name = $request->input('name');
        $class->limit = $request->input('limit');
        $class->time = $request->input('time');
        $class->location = $request->input('location');

        $class->save();

        return redirect('/classes')->with('success', 'Class Updated!');
    }

    public function destroy($id)
    {
        $cla = Classes::find($id);

        /*if(auth()->user()->id !== $cla->user_id) {
            return redirect('classes')->with('error', 'Unauthorized page');
        }*/

        $cla->delete();

        return redirect('/classes')->with('success', 'Class Deleted!');
    }

    public function addUser($id)
    {
        $cla = Classes::find($id);
        $users = User::where('role', '0')->get();
        return view('Classes.addUser', compact(['cla', 'users']));
    }

    public function attachUser($class_id,$user_id)
    {
        $cla = Classes::find($class_id);
        $cla->user()->sync($user_id, false);
        return back()->with('success', 'Class Deleted!');
    }

    public function detachUser($class_id,$user_id)
    {
        $cla = Classes::find($class_id);
        $cla->user()->detach($user_id);
        return back()->with('success', 'Class Deleted!');
    }

    public function addStudent($id)
    {
        $array = array();
        $cla = Classes::find($id);
        $students = Student::paginate(10);
        for($i=0;$i<count($cla->student);$i++)
            $array[$i] = $cla->student[$i]->pivot['student_id'];
        return view('Classes.addStudent', compact(['students','id','cla','array']));
    }

    public function attachStudent($class_id,$student_id)
    {
        $cla = Classes::find($class_id);
        $cla->student()->sync($student_id, false);
        return back()->with('success', 'Student added to class!');
    }

    public function detachStudent($class_id,$student_id)
    {
        $cla = Classes::find($class_id);
        $cla->student()->detach($student_id);
        return back()->with('success', 'Student Removed!');
    }
    function fetch_data(Request $request, $id)
    {
        if($request->ajax())
     {
      $array = array();
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $students = Student::where('fullName', 'like', '%'.$query.'%')->orderBy($sort_by, $sort_type)
            ->paginate(10);
            $cla = Classes::find($id);
            for($i=0;$i<count($cla->student);$i++)
            $array[$i] = $cla->student[$i]->pivot['student_id'];
      return view('Classes.addStudentData', compact('students','cla','array'))->render();
     }
    }
}
