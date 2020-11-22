<div>
    <div>
        <a href="{{ route('admin.userManagement.processUsers') }}" class="btn btn-primary">Add User</a>
        <div class="mt-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Roles List</h5>
                </div>
                <div class="card-body">
                    @if(sizeOf($users) > 0)
                        <div class="float-left">
                            <button class="btn btn-xs btn-primary mr-1"
                                    {{ ($actionId && sizeof($actionId) == 1) ? '' : 'disabled'}}  wire:click="view()"><i
                                    class="fas fa-eye"></i> View
                            </button>
                            <button class="btn btn-xs btn-info mr-1" {{ ($actionId && sizeof($actionId) == 1) ? '' : 'disabled'}}  wire:click="update()">
                                <i
                                    class="fas fa-pencil-alt"></i> Update
                            </button>
                            <button class="btn btn-xs btn-danger" {{$actionId ? ' ' : 'disabled'}}  wire:click="delete()" ><i
                                    class="fas fa-trash"></i>
                                Delete
                            </button>
                        </div>
                        <div class="float-right">
                            <input type="text" class="form-control" wire:model="search"/>
                        </div>
                        <div class="mt-5">
                            <table class="table table-bordered table-hove" role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc " tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        <span class="ml-4">User</span>
                                    </th>
                                    <th class="sorting_asc   " tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        <span class="ml-4">Roles</span>
                                    </th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr role="row">
                                        <td tabindex="0" class="sorting_1">
                                            <input type="checkbox" class="mt-1" name="permission[]"
                                                   wire:click.lazy="setForAction({{$user->id}})"/> <span
                                                class="ml-2">{{$user->name}}</span>
                                        </td>
                                        <td>

                                            @foreach($user->roles as $role)
                                                <button class="btn btn-primary btn-sm">{{$role->title}}</button>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$users->links()}}
                        </div>
                    @else
                        <div class="alert alert-danger">
                            No roles found
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>