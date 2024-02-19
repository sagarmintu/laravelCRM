@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Leads</h1>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <h4 class="text-black">All Leads</h4>
                <div>
                    <a href="{{ url('/leads/add-lead') }}" class="btn btn-primary btn-sm" style="float: inline-end; margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                </div>
                <div class="table-responsive">
                    <table id="lead-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Lead Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Lead Source</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                            <tr>
                                <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                                <td>{{ $lead->company }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->lead_source }}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <tfoot>
                        <tr>
                            <th>Lead Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Lead Source</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection