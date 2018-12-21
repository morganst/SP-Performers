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
      if($query != '')
      {
         $data = Attendance::whereHas('student', function ($request) use ($query) {
            $request->where('firstName', 'like', ''.$query.'%');
        })->orWhereHas('student', function ($request) use ($query) {
            $request->where('lastName', 'like', ''.$query.'%');
        })->orWhere('date', 'like', '%'.$query.'%')
        ->orderBy('id', 'desc')->get();
      }
      else
      {
       $data = Attendance::orderBy('id', 'desc')->get();
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
         <td>'.date("m-d-Y", strtotime($row->date)).'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
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