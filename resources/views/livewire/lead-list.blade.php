<div>
    <a href="{{ route('admin.leads.process') }}" class="btn btn-primary">Add New Lead</a>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Leads List</h5>
            </div>

            <div class="card-body">
                <div class="float-right">
                    <input type="text" class="form-control" wire:model="search"/>
                </div>
                @if(sizeOf($leads) > 0)
                    <div class="float-left">

                        @can('leads_add_contact')
                            <button class="btn btn-xs btn-success mr-1"
                                    {{ ($actionId && sizeof($actionId) == 1)  ? '' : 'disabled'}}  wire:click="contacts()">
                                <i
                                    class="fas fa-users"></i>
                                Contacts
                            </button>
                        @endcan


                        <button class="btn btn-xs btn-primary mr-1"
                                {{ ($actionId && sizeof($actionId) == 1)  ? '' : 'disabled'}}  wire:click="show()"><i
                                class="fas fa-eye"></i> View
                        </button>
                        @can('leads_process')
                            <button class="btn btn-xs btn-info mr-1"
                                    {{($actionId && sizeof($actionId) == 1) ? '' : 'disabled'}}   wire:click="update()">
                                <i
                                    class="fas fa-pencil-alt"></i> Update
                            </button>
                        @endcan
                        @can('leads_destroy')
                            <button class="btn btn-xs btn-danger"
                                    {{$actionId ? ' ' : 'disabled'}}  wire:click="delete()"><i
                                    class="fas fa-trash"></i>
                                Delete
                            </button>
                        @endcan

                    </div>

                    <div class="mt-5">
                        <table class="table table-bordered table-hove" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    <span class="ml-4">Company</span>
                                </th>

                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    <span class="ml-4">Email-Address</span>
                                </th>

                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    <span class="ml-4">Phone</span>
                                </th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($leads as $lead)
                                <tr role="row">
                                    <td tabindex="0" class="sorting_1">
                                        <input type="checkbox"  class="mt-1 actionBox"  name="permission[]"
                                               wire:click.lazy="setForAction({{$lead->id}})"/> <span
                                            class="ml-2">{{$lead->company}}</span>
                                    </td>

                                    <td tabindex="0" class="sorting_1">
                                        <span class="ml-2">{{$lead->email}}</span>
                                    </td>

                                    <td tabindex="0" class="sorting_1">
                                        <span class="ml-2">{{$lead->phone}}</span>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$leads->links()}}
                    </div>
                @else
                    <div class="alert alert-danger">
                        No Leads found
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
