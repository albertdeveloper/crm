<x-app-layout>
    <form method="POST">

        @csrf
        <div class="col-md-12">

            <div class="px-2 py-3">
                <div class="pull-right text-right">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.leads.index') }}">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-sm btn-primary ml-3">{{($leadInfo) ? 'Update' : 'Create'}} Lead
                    </button>
                </div>
            </div>


            <div class="ml-5">
                <h4>Lead Information </h4>
            </div>
            <br/>
            <div class="col-md-8 offset-2">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Lead Owner</label>
                        <x-input type="text" name="owner" id="owner"
                                 class="form-control {{$errors->has('owner') ? 'is-invalid' : ''}}"
                                 value="{!! ($leadInfo) ? $leadInfo->company : old('owner') !!}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Company</label>
                        <x-input type="text" name="company" id="company"
                                 class="form-control {{$errors->has('company') ? 'is-invalid' : ''}}"
                                 value="{!! ($leadInfo) ? $leadInfo->company : old('company') !!}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">First Name</label>

                        <x-input type="text" name="first_name" id="first_name"
                                 class="form-control {{$errors->has('first_name') ? 'is-invalid' : ''}}"
                                 value="{!! ($leadInfo) ? $leadInfo->company : old('first_name') !!}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Last Name</label>

                        <x-input type="text" name="last_name" id="last_name"
                                 class="form-control {{$errors->has('last_name') ? 'is-invalid' : ''}}"
                                 value="{!! ($leadInfo) ? $leadInfo->last_name : old('last_name') !!}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Title</label>
                        <x-input type="text" name="title" id="title" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->title : old('title') !!}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Email</label>
                        <x-input type="text" name="email" id="email" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->email : old('email') !!}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Phone</label>
                        <x-input type="text" name="phone" id="phone" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->phone : old('phone') !!}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Fax</label>
                        <x-input type="text" name="fax" id="fax" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->fax : old('fax') !!}"/>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Mobile</label>
                        <x-input type="text" name="mobile" id="mobile" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->mobile : old('mobile') !!}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Website</label>
                        <x-input type="text" name="website" id="website" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->website : old('website') !!}"/>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Lead Source</label>
                        <select class="form-control" name="lead_source">
                            <option></option>
                            @foreach($leadSources as $source)
                                <option value="{{$source->id}}"
                                        @if($leadInfo->lead_source_id ?? old('lead_source') == $source->id) selected="true" @endif >{{$source->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Lead Status</label>
                        <select class="form-control" name="lead_status" id="lead_status">
                            <option></option>
                            @foreach($leadStatus as $status)
                                <option value="{{$status->id}}" @if($leadInfo->lead_status_id ?? old('lead_status') == $status->id) selected="true" @endif>{{$status->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Industry</label>
                        <x-input type="text" name="industry" id="industry" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->industry : old('industry') !!}"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">No. of Employees</label>
                        <x-input type="number" name="no_employees" id="no_employees" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->no_employees : old('no_employees') !!}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="title">Annual Revenue</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" name="annual_revenue" id="annual_revenue"
                                   value="{!! ($leadInfo) ? $leadInfo->annual_revenue : old('annual_revenue')!!}">

                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Rating</label>
                        <x-input type="number" name="rating" id="rating" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->rating : old('rating') !!}"/>
                    </div>
                </div>


            </div>


            <div class="ml-5 mt-5">
                <h4>Lead Address </h4>
            </div>
            <br/>

            <div class="col-md-12">

                <div class="col-md-8 offset-2">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">Street</label>
                            <x-input type="text" name="street" id="street"
                                     class="form-control {{$errors->has('street') ? 'is-invalid' : ''}}"
                                     value="{!! ($leadInfo) ? $leadInfo->street : old('street') !!}"/>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="title">City</label>
                            <x-input type="text" name="city" id="city"
                                     class="form-control {{$errors->has('city') ? 'is-invalid' : ''}}"
                                     value="{!! ($leadInfo) ? $leadInfo->city : old('city') !!}"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">State</label>
                            <x-input type="text" name="state" id="state"
                                     class="form-control {{$errors->has('state') ? 'is-invalid' : ''}}"
                                     value="{!! ($leadInfo) ? $leadInfo->state : old('state') !!}"/>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="title">Zip Code</label>
                            <x-input type="text" name="zipcode" id="zipcode"
                                     class="form-control {{$errors->has('zipcode') ? 'is-invalid' : ''}}"
                                     value="{!! ($leadInfo) ? $leadInfo->zipcode : old('zipcode') !!}"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">Country</label>
                            <x-input type="text" name="country" id="country"
                                     class="form-control {{$errors->has('country') ? 'is-invalid' : ''}}"
                                     value="{!! ($leadInfo) ? $leadInfo->country : old('country') !!}"/>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="px-2 py-3">
            <div class="pull-right text-right">
                <a class="btn btn-info btn-sm" href="{{ route('admin.leads.index') }}">
                    Cancel
                </a>
                <button type="submit" class="btn btn-sm btn-primary ml-3">{{($leadInfo) ? 'Update' : 'Create'}} Lead
                </button>
            </div>
        </div>
    </form>

</x-app-layout>
