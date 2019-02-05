<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;

class SearchController extends Controller
{
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