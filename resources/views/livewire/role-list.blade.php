<div class="col-md-12">
    <div>
        <a href="{{ route('admin.roles.process') }}" class="btn btn-primary">Add Role</a>
        <div class="mt-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Roles List</h5>
                </div>
                <div class="card-body">

                    @can('list_filters')
                        @include('livewire.list-filters')
                    @endcan
                    @if(sizeOf($roles) > 0)

                            <table class="table shadow-sm table-striped table-valign-middle mt-2">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc px-3 py-3 " tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        <span class="ml-4">Title</span>
                                    </th>
                                    <th class="sorting_asc   " tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        <span class="ml-4">Permissions</span>
                                    </th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($roles as $role)
                                    <tr role="row">
                                        <td tabindex="0" class="sorting_1 w-50 px-3 py-3">
                                            <input type="checkbox" class="mt-1 actionBox" name="permission[]"
                                                   wire:click.lazy="setForAction({{$role->id}})"/> <span
                                                class="ml-2">{{$role->title}}</span>
                                        </td>
                                        <td class="px-3 py-3">
                                            @foreach($role->permissions as $permission)
                                                <button
                                                    class="btn btn-primary btn-sm mt-1 ml-1">{{$permission->title}}</button>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$roles->links()}}
                        </div>
                    @else
                        <div class="alert alert-danger mt-4">
                            No roles found
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

