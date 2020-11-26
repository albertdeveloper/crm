<x-app-layout>
        <div class="card">
            <div class="card-header  ">

                <a  href="{{ route('admin.leads.destroy',['id' => $lead_data->id]) }}" class="btn btn-danger btn-xs ml-2 float-right"><i class="fas fa-trash"></i> Delete</a>
                <a  href="{{ route('admin.leads.process',['id' => $lead_data->id]) }}"  href="#" class="btn btn-success btn-xs float-right"><i class="fas fa-edit"></i> Update</a>
                <a  href="{{ route('admin.leads.convert',['id' => $lead_data->id]) }}"  href="#" class="btn btn-success btn-xs float-right mr-2"><i class="fas fa-bars"></i> Convert </a>

                <div class="row">
                    <div class="col-md-1">
                        <div class="imag ml-3"><img src="{{$lead_data->leadDefaultProfilePicture()}}" height="50"></div>
                    </div>
                    <div class="col-md-3">
                        <h5> {{$lead_data->first_name}} {{$lead_data->last_name}} - <small>{{$lead_data->company}}</small></h5>
                    </div>
                </div>


            </div>

            <div class="card-body ">
                <div class="row">
                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Lead Owner</div>
                    <div class="col-md-3">{{$lead_data->owner}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Email</div>
                    <div class="col-md-3">{{$lead_data->email}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Phone</div>
                    <div class="col-md-3">{{$lead_data->phone}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Mobile</div>
                    <div class="col-md-3">{{$lead_data->mobile}}</div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Lead Status</div>
                    <div class="col-md-3">{{$lead_data->leadStatus->title}}</div>
                </div>


                <div class="row mt-5">
                    <div class="col-md-2 offset-1"><a href="#">Show details <i class="fa fa-arrow-circle-left"></i> </a></div>
                </div>
                <div class="details-container" >
                    <div class="row mt-5">
                        <div class="col-md-2 offset-1">Lead Information</div>

                    </div>


                        <div class="row mt-4">
                    <div class="col-md-2 offset-2" style="color: #9e9e9e">Lead Owner</div>
                    <div class="col-md-3">{{$lead_data->owner}}</div>


                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Company</div>
                    <div class="col-md-2">{{$lead_data->company}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-2" style="color: #9e9e9e">First name</div>
                    <div class="col-md-3">{{$lead_data->first_name}}</div>


                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Last name</div>
                    <div class="col-md-2">{{$lead_data->last_name}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-2" style="color: #9e9e9e">Title</div>
                    <div class="col-md-3">{{$lead_data->first_name}}</div>


                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Email</div>
                    <div class="col-md-2">{{$lead_data->email}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-2" style="color: #9e9e9e">Phone</div>
                    <div class="col-md-3">{{$lead_data->phone}}</div>


                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Fax</div>
                    <div class="col-md-2">{{$lead_data->fax}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-2" style="color: #9e9e9e">Mobile</div>
                    <div class="col-md-3">{{$lead_data->mobile}}</div>


                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Website</div>
                    <div class="col-md-2">{{$lead_data->website}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-2" style="color: #9e9e9e">Lead Source</div>
                    <div class="col-md-3">{{$lead_data->leadSource->title}}</div>


                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Lead Status</div>
                    <div class="col-md-2">{{$lead_data->lead_status}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-2" style="color: #9e9e9e">Industry</div>
                    <div class="col-md-3">{{$lead_data->industry}}</div>


                    <div class="col-md-2 offset-1" style="color: #9e9e9e">No. of Employees</div>
                    <div class="col-md-2">{{$lead_data->no_employees}}</div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2 offset-2" style="color: #9e9e9e">Annual Revenue</div>
                    <div class="col-md-3">{{$lead_data->annual_revenue}}</div>


                    <div class="col-md-2 offset-1" style="color: #9e9e9e">Rating</div>
                    <div class="col-md-2">{{$lead_data->rating}}</div>
                </div>

                </div>

            </div>
        </div>
</x-app-layout>
