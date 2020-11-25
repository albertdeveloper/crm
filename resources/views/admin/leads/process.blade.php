<x-app-layout>
    <div class="card card-default">
        <div class="card-header py-3 px-4">
            <h4>Lead Information </h4>
        </div>

        <form method="POST">
            @csrf
            <div class="card-body py-3 px-4">
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
                                <option value="{{$source->id}}" @if($leadInfo->lead_source_id ?? old('lead_source') == $source->id) selected="true" @endif >{{$source->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Lead Status</label>
                        <x-input type="text" name="lead_status" id="lead_status" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->lead_status : old('lead_status') !!}"/>
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
                            <input type="number" class="form-control">

                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">Rating</label>
                        <x-input type="number" name="rating" id="rating" class="form-control"
                                 value="{!! ($leadInfo) ? $leadInfo->rating : old('rating') !!}"/>
                    </div>
                </div>


            </div>

            <div class="card-footer  py-3 px-4">
                <button type="submit" class="btn btn-primary">{{($leadInfo) ? 'Update' : 'Create'}} lead</button>
            </div>
        </form>
    </div>
</x-app-layout>
