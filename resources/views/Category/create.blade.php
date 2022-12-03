@extends('layout.master')

@section('category_content')
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
    <div class="container mt-4">
        @if (session('response'))
            <div class="alert alert-success">
                {{ session('response') }}
            </div>
        @endif
        
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Add Category
            </div>
            <div class="card-body">
                <form action="{{ url('store_category') }}" method="post" id="create" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" id="catname" name="catname" class="form-control">
                    </div>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="exampleInputEmail1">Color</label>
                        <input type="text" id="color" name="color" class="form-control">
                    </div>

                    <br>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <a href="{{ url('category') }}" class="btn btn-outline-success float-end">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#create').validate({
                rules: {
                    catname: {
                        required: true
                    },
                    image: {
                        required: true
                    },
                    color: {
                        required: true
                    },
                },
                message: {
                    catname: {
                        required: "name is required",
                    },
                    image: {
                        required: "image is required",
                    },
                    color: {
                        required: "color is required",
                    },
                }

            });
        });
    </script>
@endsection
