@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Contact</h1>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <h4 class="text-black">All Contact</h4>
                <div>
                    <a href="{{ url('/leads/add-account') }}" class="btn btn-primary btn-sm" style="float: inline-end; margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                </div>
                <div class="table-responsive">
                    <table id="lead-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Contact Name</th>
                                <th>Account Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->contact_name }}</td>
                                <td>{{ $contact->getAccountDetails->account_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>
                                    <a href="{{ url('/contacts/edit-contacts/'.$contact->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a href="{{ url('/contacts/delete-contacts/'.$contact->id) }}" onclick="return confirm('Are You Sure, You want To Delete This Lead?')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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