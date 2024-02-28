@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Edit Deal</h1>
        <div>
            <a href="{{ url('/deals/manage-deals') }}" class="btn btn-primary btn-sm" style="float: inline-end; margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h4 class="text-black">Edit Deal</h4>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                            <table class="table">
                                <tr>
                                    <td class="text-right">Amount</td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="amount" class="form-control" value="{{ $deal_details->amount }}">
                                            @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Deal Name<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="deal_name" class="form-control" value="{{ $deal_details->deal_name }}">
                                            @error('deal_name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Closing Date<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="date" name="closing_date" class="form-control" value="{{ $deal_details->closing_date }}">
                                            @error('closing_date')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Deal Stage</td>
                                    <td>
                                    @php
                                        $lead_status = array('Qualifications', 'Needs Analysis', 'Proposal/Price Quote', 'Negotiation', 'Closed Won', 'Closed Lost');
                                    @endphp
                                        <fieldset class="form-group">
                                            <select name="deal_stage" class="form-control">
                                                @foreach($lead_status as $single)
                                                    @if ($single == $deal_details->deal_stage)
                                                        <option value="{{ $single }}" selected>{{ $single }}</option>
                                                    @else
                                                        <option value="{{ $single }}">{{ $single }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('deal_stage')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Account Name<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <select name="account_id" class="form-control">
                                                @foreach ($account_data as $account)
                                                @if ($account->id == $deal_details->account_id)
                                                    <option value="{{ $account->id }}" selected>{{ $account->account_name }}</option>
                                                @else
                                                    <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('account_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Contact Name<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <select name="contact_id" class="form-control">
                                                @foreach ($contact_data as $contact)
                                                @if ($contact->id == $deal_details->contact_id)
                                                    <option value="{{ $contact->id }}" selected>{{ $contact->contact_name }}</option>
                                                @else
                                                    <option value="{{ $contact->id }}">{{ $contact->contact_name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('contact_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm" name="submit" value="submit">Update</button>
                    <a href="" class="btn btn-danger btn-sm ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection