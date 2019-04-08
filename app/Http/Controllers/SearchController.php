<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Student;
use App\User;
use App\Classes;

class SearchController extends Controller
{
    public function searchStudent(){
        $searchkey = \Request::get('title');
        $count = Student::where('enrolled', '0')->get();
        $students =  Student::where('enrolled', '0')->whereRaw('lower(students.fullName) like "%' . strtolower($searchkey) . '%"')->orderBy('created_at', 'des')->paginate(16);
        return view('Students.index', compact(['students', 'count']));
    }

    public function searchPastStudent(){
        $searchkey = \Request::get('title');
        $count = Student::where('enrolled', '1')->get();
        $students =  Student::where('enrolled', '1')->where('fullName', 'like', '%' .$searchkey. '%')->orderBy('created_at', 'des')->paginate(16);
        return view('Students.past', compact(['students', 'count']));
    }

    public function searchClasses(){
        $searchkey = \Request::get('title');
        $classes = Classes::where('name', 'like', '' .$searchkey. '%')->orderBy('created_at', 'des')->paginate(10);
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
    public function searchInstructors(){
        $searchkey = \Request::get('title');
        $users = User::where('role', '0')->where('firstName', 'like', '' .$searchkey. '%')->orderBy('created_at', 'des')->paginate(10);
        $count = User::where('role', '0')->get();
        $admin = User::where('role', '1')->orderBy('created_at', 'des')->get();
        return view('Instructors.search', compact(['users','admin', 'count']));
    }
    function index()
    {
     return view('live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      $query = strtolower($query);
      if($query != '')
      {
        if($query == 'present')
        {
            $data = Attendance::where('attend', '=', '1')
            ->orderBy('id', 'desc')->get();
        }
        elseif($query == 'absent')
        {
            $data = Attendance::where('attend', '=', '0')
            ->orderBy('id', 'desc')->get();
        }
        else
        {
            $data = Attendance::whereHas('student', function ($request) use ($query) {
                $request->where('firstName', 'like', ''.$query.'%');
            })->orWhereHas('student', function ($request) use ($query) {
                $request->where('lastName', 'like', ''.$query.'%');
            })->orWhereHas('student', function ($request) use ($query) {
                $request->where('fullName', 'like', ''.$query.'%');
            })->orWhereHas('classes', function ($request) use ($query) {
                $request->where('name', 'like', ''.$query.'%');
            })->orWhere('date', 'like', '%'.$query.'%')
            ->orderBy('id', 'desc')->get();
        }
      }
      else
      {
       $data = Attendance::orderBy('id', 'asc')->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->student['firstName'].'</td>
        <td>'.$row->student['lastName'].'</td>';

        if($row->attend == 1)
            $output .= '<td bgcolor="7CFF82">Present</td>';
        else
            $output .= '<td bgcolor="FF3F3F">Absent</td>';

         $output .= '
         <td>'.$row->classes['name'].'</td>
         <td>'.date("m-d-Y", strtotime($row->date)).'</td>
         <td><a href = "delete/'.$row->id.'">Delete</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="6">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}