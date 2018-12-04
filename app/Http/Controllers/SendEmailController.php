<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index()
    {
     return view('email.sendemail');
    }

    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'name2'     =>  'required',
      
      'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message,
            'name2'  => $request->name2
        );

     Mail::to('spperformers@gmail.com')->send(new SendMail($data));
     return back()->with('success', 'Report sent!');

    }
}

?>