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
                return redirect('/home')->with('message','Welcome To Dashboard');
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
        return view('dashboard');
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('/login')->with('message','Please Login For Dashboard !!!');
    }

    public function add_lead(Request $request)
    {
        $submit = $request['submit'];
        if($submit == "submit")
        {
            $request->validate([
                'first_name' => 'required',
                'title' => 'required',
                'phone' => 'required|min:10',
                'last_name' => 'required',
                'company' => 'required',
            ]);
        }
        return view('leads.add_lead');
    }
}
