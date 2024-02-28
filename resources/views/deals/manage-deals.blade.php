@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Deals</h1>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <h4 class="text-black">All Deals</h4>
                <div>
                    <a href="{{ url('/deals/add-deal') }}" class="btn btn-primary btn-sm" style="float: inline-end; margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                </div>
                <div class="table-responsive">
                    <table id="lead-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Deal Name</th>
                                <th>Amount</th>
                                <th>Stage</th>
                                <th>Closing Date</th>
                                <th>Account Name</th>
                                <th>Contact Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deals as $deal)
                            <tr>
                                <td>{{ $deal->deal_name }}</td>
                                <td>{{ $deal->amount }}</td>
                                <td>{{ $deal->deal_stage }}</td>
                                <td>{{ $deal->closing_date }}</td>
                                <td>{{ $deal->get_account_details->account_name }}</td>
                                <td>{{ $deal->get_contact_details->contact_name }}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a href="{{ url('/deals/delete-deals/'.$deal->id) }}" onclick="return confirm('Are You Sure, You want To Delete This Lead?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')

<script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#lead-table').DataTable();
    });
</script>

@endpush