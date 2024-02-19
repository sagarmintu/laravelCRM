@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Add Lead</h1>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h4 class="text-black">Lead Information</h4>
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1">
                            <fieldset class="form-group">
                                <label>First Name<span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Phone<span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            @php
                                $lead_source = array('Advertising', 'Socail Media', 'Direct Call', 'Search');
                            @endphp
                            <fieldset class="form-group">
                                <label>Lead Source</label>
                                <select name="lead_source" class="form-control">
                                    @foreach($lead_source as $single)
                                        <option value="{{ $single }}">{{ $single }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-lg-5">
                            <fieldset class="form-group">
                                <label>Last Name<span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Company<span class="text-danger">*</span></label>
                                <input type="text" name="company" class="form-control" placeholder="Enter Company" value="{{ old('company') }}">
                                @error('company')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                            </fieldset>

                            @php
                                $lead_status = array('Qualifications', 'Needs Analysis', 'Proposal/Price Quote', 'Negotiation', 'Closed Won', 'Closed Lost');
                            @endphp
                            <fieldset class="form-group">
                                <label>Lead Status</label>
                                <select name="lead_status" class="form-control">
                                    @foreach($lead_status as $single)
                                        <option value="{{ $single }}">{{ $single }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <br>
                    </div>
                    <h4 class="text-black">Address Information</h4>
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1">
                            <fieldset class="form-group">
                                <label>Street</label>
                                <input type="text" name="street" class="form-control" placeholder="Enter Street">
                            </fieldset>

                            <fieldset class="form-group">
                                <label>State</label>
                                <input type="text" name="state" class="form-control" placeholder="Enter State">
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control" placeholder="Enter Country">
                            </fieldset>
                        </div>
                        <div class="col-lg-5">
                            <fieldset class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter City">
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Zip Code</label>
                                <input type="text" name="zip_code" class="form-control" placeholder="Enter Zip Code">
                            </fieldset>
                        </div>
                    </div>
                    <br />

                    <h4 class="text-black">Address Information</h4>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-1">
                            <fieldset class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </fieldset>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit" value="submit">Save</button>
                    <button class="btn btn-info btn-sm">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection