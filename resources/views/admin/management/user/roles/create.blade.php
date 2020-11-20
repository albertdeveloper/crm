<x-app-layout>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Create Roles</h3>
        </div>


        <form method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    @if($errors->has('title'))
                        <div class="float-right">{{$errors->first('title')}}</div> @endif
                    <x-input type="text" name="title" id="title" class="form-control" value="{!! old('title') !!}"/>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label>Permissions</label>
                        <span class="ml-4"><input type="checkbox" id="all" name="set_all"/> <label for="all">Set all</label></span>
                        <select class="select2bs4" multiple="multiple" data-placeholder="Select a State" name="permissions[]"
                                style="width: 100%;">
                            @foreach($permissions as $permission)
                                <option value="{{$permission->id}}">{{$permission->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create role</button>
            </div>
        </form>
    </div>

    @push('scripts')

        <script
            src="{{ asset('AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <script>
            $(function () {
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
            });

        </script>
    @endpush
</x-app-layout>

