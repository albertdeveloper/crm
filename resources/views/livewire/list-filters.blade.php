<div class="col-md-12"  >
    <div class="float-left">
        <button class="btn btn-xs btn-primary mr-1"
                {{ ($actionId && sizeof($actionId) == 1)  ? '' : 'disabled'}}  wire:click="show()"><i
                class="fas fa-eye"></i> View
        </button>
            <button class="btn btn-xs btn-info mr-1"
                    {{($actionId && sizeof($actionId) == 1) ? '' : 'disabled'}}   wire:click="update()">
                <i
                    class="fas fa-pencil-alt"></i> Update
            </button>

            <button class="btn btn-xs btn-danger"
                    {{$actionId ? ' ' : 'disabled'}}  wire:click="delete()"><i
                    class="fas fa-trash"></i>
                Delete
            </button>
    </div>
    <div class="float-right">
        <input type="text" class="form-control" wire:model="search"/>
    </div>
</div>
