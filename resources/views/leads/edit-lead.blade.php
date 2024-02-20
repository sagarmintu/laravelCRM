@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Edit Lead</h1>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h4 class="text-black">Update Lead Information</h4>
                    <div>
                        <a href="{{ url('/leads/manage-leads') }}" class="btn btn-primary btn-sm" style="float: inline-end; margin-bottom: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1">
                            <fieldset class="form-group">
                                <label>First Name<span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ $lead->first_name }}">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $lead->title }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Phone<span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Phone" value="{{ $lead->phone }}">
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
                                    @if($single == $lead->lead_source)
                                            <option value="{{ $single }}" selected>{{ $single }}</option>
                                        @else
                                            <option value="{{ $single }}">{{ $single }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-lg-5">
                            <fieldset class="form-group">
                                <label>Last Name<span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ $lead->last_name }}">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Company<span class="text-danger">*</span></label>
                                <input type="text" name="company" class="form-control" placeholder="Enter Company" value="{{ $lead->company }}">
                                @error('company')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $lead->email }}">
                            </fieldset>

                            @php
                                $lead_status = array('Qualifications', 'Needs Analysis', 'Proposal/Price Quote', 'Negotiation', 'Closed Won', 'Closed Lost');
                            @endphp
                            <fieldset class="form-group">
                                <label>Lead Status</label>
                                <select name="lead_status" class="form-control">
                                    @foreach($lead_status as $single)
                                        @if($single == $lead->lead_status)
                                            <option value="{{ $single }}" selected>{{ $single }}</option>
                                        @else
                                            <option value="{{ $single }}">{{ $single }}</option>
                                        @endif
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
                                <input type="text" name="street" class="form-control" placeholder="Enter Street" value="{{ $lead->street }}">
                            </fieldset>

                            <fieldset class="form-group">
                                <label>State</label>
                                <input type="text" name="state" class="form-control" placeholder="Enter State" value="{{ $lead->state }}">
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control" placeholder="Enter Country" value="{{ $lead->country }}">
                            </fieldset>
                        </div>
                        <div class="col-lg-5">
                            <fieldset class="form-group">
                                <label>City</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter City" value="{{ $lead->city }}">
                            </fieldset>

                            <fieldset class="form-group">
                                <label>Zip Code</label>
                                <input type="text" name="zip_code" class="form-control" placeholder="Enter Zip Code"  value="{{ $lead->zip_code }}">
                            </fieldset>
                        </div>
                    </div>
                    <br />

                    <h4 class="text-black">Address Information</h4>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-1">
                            <fieldset class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $lead->description }}</textarea>
                            </fieldset>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm" name="submit" value="submit">Update</button>
                    <button class="btn btn-info btn-sm">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection