@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Add Deal</h1>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h4 class="text-black">Add Deal</h4>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                            <table class="table">
                                <tr>
                                    <td class="text-right">Account</td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="amount" class="form-control" value="{{ old('amount') }}">
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
                                            <input type="text" name="deal_name" class="form-control" value="{{ old('deal_name') }}">
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
                                            <input type="date" name="closing_date" class="form-control" value="{{ old('closing_date') }}">
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
                                                    <option value="" disabled>Select Deal</option>
                                                    <option value="{{ $single }}">{{ $single }}</option>
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
                                                    <option value="" disabled>Select Account</option>
                                                    <option value="{{ $account->id }}">{{ $account->account_name }}</option>
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
                                                    <option value="" disabled>Select Contact</option>
                                                    <option value="{{ $contact->id }}">{{ $contact->contact_name }}</option>
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
                    <button type="submit" class="btn btn-primary btn-sm" name="submit" value="submit">Save</button>
                    <a href="" class="btn btn-danger btn-sm ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection