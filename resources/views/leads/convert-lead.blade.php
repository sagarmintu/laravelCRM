@extends('main')

@section('dynamic_page')

<div class="content-wrapper">
    <div class="content-header">
        <h1>Convert Lead</h1>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h4 class="text-black">Convert Lead<span style="font-size: 14px;"> ({{ $lead->first_name }} {{
                            $lead->last_name }} - {{ $lead->company }}) </span></h4>
                    <br>
                    <h6>Create New Account <span class="badge badge-primary">{{ $lead->company }}</span></h6>
                    <h6>Create New Contact <span class="badge badge-primary">{{ $lead->first_name }} {{ $lead->last_name
                            }}</span></h6>
                    <br>
                    <h6>Create New Deal For This Account</h6>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-1">
                            <table class="table">
                                <tr>
                                    <td class="text-right">Amount</td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control" id="basicInput" name="amount">
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Deal Name<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="text" class="form-control" id="basicInput" name="deal">
                                            @error('deal')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Closing Date<span class="text-danger">*</span></td>
                                    <td>
                                        <fieldset class="form-group">
                                            <input type="date" class="form-control" id="basicInput" name="closing_date">
                                            @error('closing_date')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Stage<span class="text-danger">*</span></td>
                                    <td>
                                        @php
                                        $lead_status = array('Qualifications', 'Needs Analysis', 'Proposal/Price Quote',
                                        'Negotiation', 'Closed Won', 'Closed Lost');
                                        @endphp
                                        <fieldset class="form-group">
                                            <select name="lead_stage" class="form-control">
                                                @foreach($lead_status as $single)
                                                <option value="{{ $single }}">{{ $single }}</option>
                                                @endforeach
                                            </select>
                                            @error('lead_stage')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit" value="submit">Convert</button>
                    <a href="{{ url('/leads/manage-leads') }}" class="btn btn-danger btn-sm">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection