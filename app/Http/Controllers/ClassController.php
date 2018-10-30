<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\User;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = Classes::orderBy('created_at', 'des')->paginate(10);
        return view('classes.index')->with('classes', $classes);
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'limit' => 'required|integer',
        ]);

        $class = new Classes;
        $class->name = $request->input('name');
        $class->limit = $request->input('limit');
        //$class->user_id = auth()->user()->id;
        $class->save();

        return redirect('/classes')->with('success', 'Class Created!');
    }

    public function show($id)
    {
        $cla = Classes::find($id);
        return view('classes.show')->with('cla', $cla);
    }

    public function edit($id)
    {
        $cla = Classes::find($id);

        /*if(auth()->user()->id !== $cla->user_id) {
            return redirect('classes')->with('error', 'Unauthorized page');
        }*/

        return view('classes.edit')->with('cla', $cla);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'limit' => 'required|integer',
        ]);

        $class = Classes::find($id);
        $class->name = $request->input('name');
        $class->limit = $request->input('limit');
       
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

    public function add($id)
    {
        $cla = Classes::find($id);
        $users = User::all();
        return view('classes.add', compact(['cla', 'users']));    
    }

    public function attach($id)
    {
        $cla = Classes::find($id);
        $cla->user()->attach($user_id);
        return redirect('/classes')->with('success', 'Class Deleted!');
    }
}
