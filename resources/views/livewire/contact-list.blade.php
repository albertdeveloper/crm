<div>
    <a href="{{ route('admin.leads.contact.process') }}" class="btn btn-primary">Add New Contact</a>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Contacts List</h5>
            </div>

            <div class="card-body">
                <div class="float-right">
                    <input type="text" class="form-control" wire:model="search"/>
                </div>
                @if(sizeOf($contacts) > 0)
                    <div class="float-left">


                        <button class="btn btn-xs btn-primary mr-1"
                                {{ ($actionId && sizeof($actionId) == 1)  ? '' : 'disabled'}}  wire:click="view()"><i
                                class="fas fa-eye"></i> View
                        </button>
                        @can('leads_process')
                            <button class="btn btn-xs btn-info mr-1" {{($actionId && sizeof($actionId) == 1) ? '' : 'disabled'}}   wire:click="update()">
                                <i
                                    class="fas fa-pencil-alt"></i> Update
                            </button>
                        @endcan
                        @can('leads_destroy')
                            <button class="btn btn-xs btn-danger" {{$actionId ? ' ' : 'disabled'}}  wire:click="delete()" ><i
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

                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    <span class="ml-4">Primary Contact</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($leads as $lead)
                                <tr role="row">
                                    <td tabindex="0" class="sorting_1">
                                        <input type="checkbox" class="mt-1" name="permission[]"
                                               wire:click.lazy="setForAction({{$lead->id}})"/> <span
                                            class="ml-2">{{$lead->company}}</span>
                                    </td>

                                    <td tabindex="0" class="sorting_1">
                                        <span class="ml-2">{{$lead->email}}</span>
                                    </td>

                                    <td tabindex="0" class="sorting_1">
                                        <span class="ml-2">{{$lead->phone}}</span>
                                    </td>
                                    <td tabindex="0" class="sorting_1">
                                        <span class="ml-2"></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$contacts->links()}}
                    </div>
                @else
                    <div class="alert alert-danger">
                        No contacts found
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

