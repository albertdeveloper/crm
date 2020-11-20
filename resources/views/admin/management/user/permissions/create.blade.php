<x-app-layout>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Create Permission</h3>
        </div>


        <form method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    @if($errors->has('title')) <div class="float-right">{{$errors->first('title')}}</div> @endif
                    <x-input type="text" name="title" id="title" class="form-control" value="{!! old('title') !!}"/>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
