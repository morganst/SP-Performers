<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotescreateController extends Controller
{
    public function createfor($SID)
    {
        $notes = Note::where('SID', '=', $SID)->get();
      //  return view('Notes.create');
        return view('notes.createfor')->with('notes', $notes);
    }
    public function index()
    {
        $notes = Note::where('SID', '=', $SID)->get();
      //  return view('Notes.create');
        return view('notes.createfor')->with('notes', $notes);
    }
}
