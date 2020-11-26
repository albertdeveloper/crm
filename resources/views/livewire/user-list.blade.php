<div class="col-md-12">
    <div>
        <a href="{{ route('admin.users.process') }}" class="btn btn-primary">Add User</a>
        <div class="mt-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Roles List</h5>
                </div>
                <div class="card-body">
                    @can('list_filters')
                        @include('livewire.list-filters')
                    @endcan
                    @if(sizeOf($users) > 0)
                        <div class="mt-5">
                            <table class="table shadow-sm table-striped table-valign-middle mt-2">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc px-3 py-3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        <span class="ml-4">User</span>
                                    </th>
                                    <th class="sorting_asc px-3 py-3" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        <span class="ml-4">Roles</span>
                                    </th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr role="row">
                                        <td tabindex="0" class="sorting_1 px-3 py-3">
                                            <input type="checkbox" class="mt-1" name="permission[]"
                                                   wire:click.lazy="setForAction({{$user->id}})"/> <span
                                                class="ml-2">{{$user->name}}</span>
                                        </td>
                                        <td class="px-3 py-3">
                                            <button class="btn btn-primary btn-sm">{{$user->roles[0]->title}}</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$users->links()}}
                        </div>
                    @else
                        <div class="alert alert-danger mt-3">
                            No user found
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>
