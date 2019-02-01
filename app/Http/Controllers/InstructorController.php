<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class InstructorController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth'); 
        //$this->middleware('admin', ['only' => ['create']]);
    }

    public function index()
    {
        $count = User::where('role', '0')->get();
        $users = User::where('role', '0')->orderBy('created_at', 'des')->paginate(10);
        return view('Instructors.index', compact(['users', 'count']));
    }
    
    public function show($id)
    {
        $user = User::find($id);
        return view('Instructors.show')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);

        /*if(auth()->user()->id !== $user->user_id) {
            return redirect('instructors')->with('error', 'Unauthorized page');
        }
        */
        return view('Instructors.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'center' => 'nullable',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'role' => 'required',
            'password' => 'nullable|string|min:6|confirmed',
            'password_confirmation' => 'nullable|string|min:6'
        ]);

        $user = User::find($id);
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->center = $request->input('center');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        if ((null !== $request->input('password')) && (($request->input('password') == $request->input('password_confirmation'))))
        {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect('/instructors')->with('success', 'User Updated!');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        /*if(auth()->user()->id !== $user->user_id) {
            return redirect('instructors')->with('error', 'Unauthorized page');
        }
        */
        $user->delete();

        return redirect('/instructors')->with('success', 'User Deleted!');
    }

    public function create()
    {
       
        return view('Instructors.create');
    }

    public function showChangePasswordForm(){
        return view('Instructors.changepassword');
    }
    public function changePassword(Request $request){
        // Search for a user matching the email address
        $user = User::where('email', $email)->first();

        // Go ahead if a user matching that email was found
        if ( ! is_null($user))
        {
            // Check if the password and password confirmation match
            // NOTE: you can do additional validations here if needed
            if ($password == $passwordConfirmation)
            {
                $user->password = Hash::make($password);
                $user->save();
            }
            return redirect()->back()->with("success","Password changed successfully !");
        }
        return redirect()->back()->with("success","Password failed!");
    }
}
