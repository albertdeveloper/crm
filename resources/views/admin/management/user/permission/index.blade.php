<x-app-layout>
    <a href="{{ route('admin.userManagement.createPermission') }}" class="btn btn-primary">Add Permission</a>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Permission List</h5>
            </div>
            <div class="card-body">
                <div>
                    <button class="btn btn-xs btn-primary mr-1"><i class="fas fa-eye"></i> View</button>
                    <button class="btn btn-xs btn-info mr-1"><i class="fas fa-pencil-alt"></i> Update</button>
                    <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </div>
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                       aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            <span class="ml-4">Permission</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($permissions as $permission)
                        <tr role="row">
                            <td tabindex="0" class="sorting_1">
                                <input type="checkbox" class="mt-1"/> <span class="ml-2">{{$permission->title}}</span>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>
    </div>
    @push('styles')
        <link rel="stylesheet"
              href="{{ asset('AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script
            src="{{ asset('AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script
            src="{{ asset('AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script>
            $(function () {
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endpush
</x-app-layout>


