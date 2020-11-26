<div class="col-md-12">
    <a href="{{ route('admin.leads.process') }}" class="btn btn-primary">Add New Lead</a>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Leads List</h5>
            </div>
            <div class="col-md-8 mt-3 px-4">
                <div class="float-right">
{{--                    <input type="checkbox" class="ml-2" id="my_leads"> <label for="my_leads"> My leads </label>--}}
                </div>
            </div>
            <div class="card-body">
                @can('list_filters')
                    @include('livewire.list-filters')
                @endcan

                @if(sizeOf($leads) > 0)
                        <div class="col-md-12">
                            <table class="table shadow-sm table-striped table-valign-middle mt-2">
                                <thead>

                            <tr role="row">
                                <th class="sorting_asc px-3 py-3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    <span class="ml-4">Company</span>
                                </th>

                                <th class="sorting_asc px-3 py-3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    <span class="ml-4">Email-Address</span>
                                </th>

                                <th class="sorting_asc px-3 py-3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    <span class="ml-4">Phone</span>
                                </th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($leads as $lead)
                                <tr role="row">
                                    <td tabindex="0" class="sorting_1 px-3 py-3">
                                        <input type="checkbox"  class="mt-1 actionBox"  name="permission[]"
                                               wire:click.lazy="setForAction({{$lead->id}})"/> <span
                                            class="ml-2">{{$lead->company}}</span>
                                    </td>

                                    <td tabindex="0" class="sorting_1 px-3 py-3">
                                        <span class="ml-2">{{$lead->email}}</span>
                                    </td>

                                    <td tabindex="0" class="sorting_1 px-3 py-3">
                                        <span class="ml-2">{{$lead->phone}}</span>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        {{$leads->links()}}
                    </div>
                @else
                    <div class="alert alert-danger mt-3">
                        No Leads found
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
