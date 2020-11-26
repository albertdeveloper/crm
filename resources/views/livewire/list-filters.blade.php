<div class="row mb-5">
    <div class="col-md-8">
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
    <div  class="col-md-4">
        <input type="text" class="form-control float-right" wire:model.debounce.500ms="search"/>
    </div>
</div>
