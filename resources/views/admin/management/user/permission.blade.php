<x-app-layout>

    <button class="btn btn-primary">Add Permission</button>
    <div class="mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Permission List</h5>
            </div>
            <div class="card-body">
                {{--            <h6 class="card-title">Special title treatment</h6>--}}

                {{--            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                {{--            <a href="#" class="btn btn-primary">Go somewhere</a>--}}


                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                       aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            Permission
                        </th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>


                    <tr role="row" class="odd">
                        <td tabindex="0" class="sorting_1">Gecko</td>
                        <td>Firefox 1.0</td>
                    </tr>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
@push('styles')
<link rel="stylesheet" href="{{ asset('AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
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


