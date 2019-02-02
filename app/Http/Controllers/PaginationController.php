<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use DB;

class PaginationController extends Controller
{
    function index()
    {
     $data = Attendance::with('student')->orderBy('id', 'asc')->paginate(8);
     return view('pagination', compact('data'));
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = Attendance::whereHas('student', function ($request) use ($query) {
                $request->where('fullName', 'like', '%'.$query.'%');
/*             })->orWhereHas('classes', function ($request) use ($query) {
                $request->where('name', 'like', '%'.$query.'%'); */
            })->orWhere('date', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(8);
      return view('pagination_data', compact('data'))->render();
     }
    }
}
?>