@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Add Account</h1>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h4 class="text-black">Add Account</h4>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                            <table class="table">
                                <tr>
                                    <td class="text-right">Account Name<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="account_name" class="form-control"
                                                value="{{ old('account_name') }}">
                                            @error('account_name')
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
                                    <td class="text-right">Website</td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" name="website" class="form-control">
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