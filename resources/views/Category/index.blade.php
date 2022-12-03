@extends('layout.master')
@section('category_content')
    <div class="container">
        <h1>Spam Checker categories</h1>
        <div class="btn theme-bg-color btn-labeled float-right">
            <a class="btn btn-outline-success" href="{{ route('Category.create') }}">Add</a>
        </div>
        <div class="container">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Color Code</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('Category.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'id'
                    },
                    {
                        data: 'catname',
                        name: 'name'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function( data, type, full, meta ) {
                        return "<img src=\"/uploads/word/" + data + "\" height=\"40\"/>";
                      }
                    },
                    {
                        data: 'color',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
