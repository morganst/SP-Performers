<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
class FilterController extends Controller
{
    public function filter(){
        $searchkey = \Request::get('title');
        $classes =  Classes::where('location', 'like', '' .$searchkey. '')->orderBy('created_at', 'des')->paginate(10);
        return view('Classes/search', ['classes' => $classes]);
    }
}
