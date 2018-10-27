<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class InstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'des')->paginate(10);
        return view('instructors.index')->with('users', $users);
    }
    /*
    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'center' => 'required',
        ]);

        $user = new User;
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->center = $request->input('center');
       
        //$user->user_id = auth()->user()->id;
        $user->save();

        return redirect('/instructors')->with('success', 'User Created!');
    }
    */
    public function show($id)
    {
        $ins = User::find($id);
        return view('instructors.show')->with('ins', $ins);
    }

    public function edit($id)
    {
        $ins = User::find($id);

        /*if(auth()->user()->id !== $ins->user_id) {
            return redirect('instructors')->with('error', 'Unauthorized page');
        }
        */
        return view('instructors.edit')->with('ins', $ins);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'center' => 'required',
        ]);

        $user = User::find($id);
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->center = $request->input('center');
       
        $user->save();

        return redirect('/instructors')->with('success', 'User Updated!');
    }

    public function destroy($id)
    {
        $ins = User::find($id);

        /*if(auth()->user()->id !== $ins->user_id) {
            return redirect('instructors')->with('error', 'Unauthorized page');
        }
        */
        $ins->delete();

        return redirect('/instructors')->with('success', 'User Deleted!');
    }
}
