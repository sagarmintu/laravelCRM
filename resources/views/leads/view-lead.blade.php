@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>View Lead</h1>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <h4 class="text-black">Lead Information</h4>
                <div>
                    <a href="{{ url('/leads/manage-leads') }}" class="btn btn-primary btn-sm"
                        style="float: inline-end; margin-bottom: 10px;"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i> Back</a>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <table class="table">
                            <tr>
                                <td class="text-right">First Name</td>
                                <td class="text-dark">{{ $lead->first_name }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Titile</td>
                                <td class="text-dark">{{ $lead->title }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Phone</td>
                                <td class="text-dark">{{ $lead->phone }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Lead Source</td>
                                <td class="text-dark">{{ $lead->lead_source }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-5">
                        <table class="table">
                            <tr>
                                <td class="text-right">Last Name</td>
                                <td class="text-dark">{{ $lead->last_name }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Company</td>
                                <td class="text-dark">{{ $lead->company }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Email</td>
                                <td class="text-dark">{{ $lead->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Lead Status</td>
                                <td class="text-dark">{{ $lead->lead_status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <h4 class="text-black">Address Information</h4>
                <div class="row">
                    <div class="col-lg-5">
                        <table class="table">
                            <tr>
                                <td class="text-right">Street</td>
                                <td class="text-dark">{{ $lead->street }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">State</td>
                                <td class="text-dark">{{ $lead->state }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Country</td>
                                <td class="text-dark">{{ $lead->country }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">City</td>
                                <td class="text-dark">{{ $lead->city }}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Zip Code</td>
                                <td class="text-dark">{{ $lead->zip_code }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4 class="text-black">Description Information</h4>
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table">
                            <tr>
                                <td class="text-right">Description</td>
                                <td class="text-dark">{{ $lead->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="{{ url('/leads/convert-lead/'.$lead->id) }}" class="btn btn-primary btn-sm">Convert</a>
                <a href="{{ url('/leads/edit-lead/'.$lead->id) }}" class="btn btn-success btn-sm">Edit</a>
            </div>
        </div>
    </div>
</div>

@endsection