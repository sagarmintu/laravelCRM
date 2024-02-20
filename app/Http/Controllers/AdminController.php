<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lead;

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

            $lead = new Lead;
            $lead->first_name = $request['first_name'];
            $lead->title = $request['title'];
            $lead->phone = $request['phone'];
            $lead->lead_source = $request['lead_source'];
            $lead->last_name = $request['last_name'];
            $lead->company = $request['company'];
            $lead->email = $request['email'];
            $lead->lead_status = $request['lead_status'];
            $lead->street = $request['street'];
            $lead->state = $request['state'];
            $lead->country = $request['country'];
            $lead->city = $request['city'];
            $lead->zip_code = $request['zip_code'];
            $lead->description = $request['description'];
            $lead->save();
            return redirect('/leads/manage-leads')->with('message','Leads Data Added Successfully');
        }
        return view('leads.add_lead');
    }

    public function manage_leads()
    {
        $leads = Lead::all();
        return view('leads.manage-leads', compact('leads'));
    }

    public function delete_lead($id)
    {
        $lead = Lead::findOrFail($id);
        if($lead == '')
        {
            return redirect('/leads/manage-leads');
        }
        else
        {
            $lead->delete();
            return redirect('/leads/manage-leads')->with('message','Leads Data Deleted');
        }
    }

    public function edit_lead($id, Request $request)
    {
        $lead = Lead::findOrFail($id);
        if($lead == '')
        {
            return redirect('/leads/manage-leads');
        }

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

            $lead->first_name = $request['first_name'];
            $lead->title = $request['title'];
            $lead->phone = $request['phone'];
            $lead->lead_source = $request['lead_source'];
            $lead->last_name = $request['last_name'];
            $lead->company = $request['company'];
            $lead->email = $request['email'];
            $lead->lead_status = $request['lead_status'];
            $lead->street = $request['street'];
            $lead->state = $request['state'];
            $lead->country = $request['country'];
            $lead->city = $request['city'];
            $lead->zip_code = $request['zip_code'];
            $lead->description = $request['description'];
            $lead->save();
            return redirect('/leads/manage-leads')->with('message','Leads Data Updated Successfully');
        }
        return view('leads.edit-lead', compact('lead'));
    }

    public function view_lead($id)
    {
        $lead = Lead::findOrFail($id);
        if($lead == '')
        {
            return redirect('/leads/manage-leads');
        }
        return view('leads.view-lead', compact('lead'));
    }

    public function convert_lead($id, Request $request)
    {
        $lead = Lead::findOrFail($id);
        if($lead == '')
        {
            return redirect('/leads/manage-leads');
        }

        $submit = $request['submit'];
        if($submit == "submit")
        {
            $request->validate([
                'deal' => 'required',
                'closing_date' => 'required',
                'lead_stage' => 'required'
            ]);
        }

        return view('leads.convert-lead', compact('lead'));
    }
}
