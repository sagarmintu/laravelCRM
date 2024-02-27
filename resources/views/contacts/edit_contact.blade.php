@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Edit Contact</h1>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h4 class="text-black">Edit Contact</h4>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                            <table class="table">
                                <tr>
                                    <td class="text-right">Contact Name<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="contact_name" class="form-control"
                                                value="{{ $contact_details->contact_name }}">
                                            @error('contact_name')
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
                                                <option value="">Select Account</option>
                                                @foreach ($account_data as $account)
                                                    @if ($account->id == $contact_details->account_id)
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
                                    <td class="text-right">Phone<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="phone" class="form-control" value="{{ $contact_details->phone }}">
                                            @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Email</td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="email" class="form-control" value="{{ $contact_details->email }}">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm" name="submit" value="submit">Save</button>
                    <a href="{{ url('/contacts/manage-contacts') }}" class="btn btn-danger btn-sm ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection