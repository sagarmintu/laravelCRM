<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lead;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Deal;

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

            // Create Accounts
            
            $accounts = new Account;
            $accounts->account_name = $lead->company;
            $accounts->phone = $lead->phone;
            $accounts->save();
            
            $account_id = $accounts->id;

            // Create Contact

            $contact = new Contact;
            $contact->contact_name = $lead->first_name.' '.$lead->last_name;
            $contact->account_id = $account_id;
            $contact->email = $lead->email;
            $contact->phone = $lead->phone;
            $contact->save();

            $contact_id = $contact->id;

            // Create Deal

            $deal = new Deal;
            $deal->amount = $request['amount'];
            $deal->deal_name = $request['deal'];
            $deal->closing_date = $request['closing_date'];
            $deal->deal_stage = $request['lead_stage'];
            $deal->account_id  = $account_id;
            $deal->contact_id = $contact_id;
            $deal->save();

            // Delete Old Lead

            $lead->delete();            

            return redirect('/deals/manage-deals')->with('message','Data Added Successfully');

        }

        return view('leads.convert-lead', compact('lead'));
    }

    public function manage_accounts()
    {
        $accounts = Account::all();
        return view('accounts.manage-accounts', compact('accounts'));
    }

    public function manage_contacts()
    {
        $contacts = Contact::with('getAccountDetails')->get();
        return view('contacts.manage-contacts', compact('contacts'));
    }

    public function manage_deals()
    {
        $deals = Deal::with('get_account_details')->with('get_contact_details')->get();
        return view('deals.manage-deals', compact('deals'));
    }

    public function add_account(Request $request)
    {
        $submit = $request['submit'];
        if($submit == "submit")
        {
            $request->validate([
                'account_name' => 'required',
                'phone' => 'required',
            ]);

            $accounts = new Account;
            $accounts->account_name = $request->account_name;
            $accounts->phone = $request->phone;
            $accounts->website = $request->website;
            $accounts->save();
            return redirect('/accounts/manage-accounts')->with('message','Accounts Details Added Successfully');
        }
        return view('accounts.add_account');
    }

    public function edit_accounts($id, Request $request)
    {
        $account = Account::findOrFail($id);
        if($account == '')
        {
            return redirect('/accounts/manage-accounts');
        }

        $submit = $request['submit'];
        if($submit == "submit")
        {
            $request->validate([
                'account_name' => 'required',
                'phone' => 'required',
            ]);

            $account->account_name = $request->account_name;
            $account->phone = $request->phone;
            $account->website = $request->website;
            $account->save();
            return redirect('/accounts/manage-accounts')->with('message','Accounts Details Added Successfully');
        }

        return view('accounts.edit_account', compact('account'));
    }

    public function delete_account($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();            
        return redirect('/accounts/manage-accounts')->with('message','Accounts Details Deleted');
    }

    public function add_contact(Request $request)
    {
        $submit = $request['submit'];
        if($submit == "submit")
        {
            $request->validate([
                'contact_name' => 'required',
                'account_id' => 'required',
                'phone' => 'required',
            ]);

            $contact = new Contact;
            $contact->contact_name = $request->contact_name;
            $contact->account_id = $request->account_id;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->save();
            return redirect('/contacts/manage-contacts')->with('message','Accounts Details Added Successfully');
        }

        $account_data = Account::all();

        return view('contacts.add_contact', compact('account_data'));
    }
}
