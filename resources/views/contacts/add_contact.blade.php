@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Add Contact</h1>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h4 class="text-black">Add Contact</h4>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                            <table class="table">
                                <tr>
                                    <td class="text-right">Contact Name<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="contact_name" class="form-control"
                                                value="{{ old('contact_name') }}">
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
                                    <td class="text-right">Phone<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone') }}">
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
                                            <input type="text" name="email" class="form-control"
                                                value="{{ old('email') }}">
                                            @error('email')
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