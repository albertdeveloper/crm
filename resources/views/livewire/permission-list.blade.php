<div>
    <a href="{{ route('admin.permissions.process') }}" class="btn btn-primary">Add Permission</a>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Permission List</h5>
            </div>

            <div class="card-body">
                <div class="float-right">
                    <input type="text" class="form-control" wire:model="search"/>
                </div>
                @if(sizeOf($permissions) > 0)
                    @can('list_filters')
                        @include('livewire.list-filters')
                    @endcan
                    <div class="mt-5">
                        <table class="table table-bordered table-hove" role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    <span class="ml-4">Title</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($permissions as $permission)
                                <tr role="row">
                                    <td tabindex="0" class="sorting_1">
                                        <input type="checkbox" class="mt-1 actionBox"  name="permission[]"
                                               wire:click.lazy="setForAction({{$permission->id}})"/> <span
                                            class="ml-2">{{$permission->title}}</span>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$permissions->links()}}
                    </div>
                @else
                    <div class="alert alert-danger">
                        No permission found
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
