<div>
    <a href="{{ route('admin.leads.contact.process',['lead_id' => $lead_id ]) }}" class="btn btn-primary">Add New Contact</a>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Contacts List</h5>
            </div>


            <div class="card-body">
                <div class="float-right">
                    <input type="text" class="form-control" wire:model="search"/>
                </div>
                @if(sizeOf($leadContacts) > 0)
                    <div class="float-left">

                        @can('contacts_process')
                        <button class="btn btn-xs btn-success mr-1"
                                {{ ($actionId && sizeof($actionId) == 1)  ? '' : 'disabled'}}  wire:click="setPrimary()"><i
                                class="fas fa-user"></i> Set Primary Contact
                        </button>
                            <button class="btn btn-xs btn-primary mr-1"
                                    {{ ($actionId && sizeof($actionId) == 1)  ? '' : 'disabled'}}  wire:click="view()"><i
                                    class="fas fa-eye"></i> Update
                            </button>

                        @endcan

                        @can('contacts_destroy')
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
                                    <span class="ml-4">Name</span>
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

                            @foreach($leadContacts as $contact)
                                <tr role="row">
                                    <td tabindex="0" class="sorting_1">
                                        <input type="checkbox" class="mt-1" name="permission[]"
                                               wire:click.lazy="setForAction({{$contact->id}})"/> <span
                                            class="ml-2">{{$contact->name}}</span>
                                    </td>

                                    <td tabindex="0" class="sorting_1">
                                        <span class="ml-2">{{$contact->email}}</span>
                                    </td>

                                    <td tabindex="0" class="sorting_1">
                                        <span class="ml-2">{{$contact->phone}}</span>
                                    </td>
                                    <td tabindex="0" class="sorting_1">
                                        <span class="ml-2">{{($contact->is_primary) ? 'Yes' : 'NO'}}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$leadContacts->links()}}
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

