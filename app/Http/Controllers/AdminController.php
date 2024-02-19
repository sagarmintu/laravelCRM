<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $submit = $request['submit'];
        if($submit == "submit")
        {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if(\Auth::attempt($request->only('email','password')))
            {
                return redirect('/home');
            }
            else
            {
                return redirect('login')->withError('Incorrect Email Or Password');
            }
        }
        return view('login');
    }

    public function dashboard()
    {
        return view('main');
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('/login');
    }
}
