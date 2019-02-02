<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use DB;

class PaginationController extends Controller
{
    function index($id)
    {
     $data = Attendance::with('student')->where('classes_id', '=', $id)->orderBy('id', 'asc')->paginate(8);
     return view('DailySurveys.pagination', compact('data', 'id'));
    }

    function fetch_data(Request $request, $id)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = Attendance::where('classes_id', '=', $id)->whereHas('student', function ($request) use ($query) {
                $request->where('fullName', 'like', '%'.$query.'%');
/*             })->orWhereHas('classes', function ($request) use ($query) {
                $request->where('name', 'like', '%'.$query.'%'); */
            })->orWhere('date', 'like', '%'.$query.'%')->where('classes_id', '=', $id)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(8);
      return view('DailySurveys.pagination_data', compact('data'))->render();
     }
    }
}
?>