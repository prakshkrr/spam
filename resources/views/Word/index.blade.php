@extends('layout.master')
@section('word_content')
    <div class="container-fluid">
        <h1>Spam Checker Words</h1>
        <div class="btn theme-bg-color btn-labeled float-right">
            <a class="btn btn-outline-success" href="{{ route('Word.create') }}">Add</a>
        </div>
        <div class="container">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Category Name</th>
                        <th>Word Name</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    
 <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('Word.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'catname', name: 'catname'},
            {data: 'wordname', name: 'wordname'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
@endsection
