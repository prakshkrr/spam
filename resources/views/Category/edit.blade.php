@extends('layout.master')

@section('category_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Category</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update/' . $categories->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="">Name</label>
                                <input type="text" name="catname" value="{{ $categories->catname }}" class="form-control">
                            </div>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="">image</label>
                                <br>
                                <img src="{{ asset('uploads/word/'.$categories->image) }}" width="80px" height="50px" alt="image">
                                <br>
                                <input type="file" name="image" value="{{ $categories->image }}" class="form-control">
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="">Color</label>
                                <input type="text" name="color" value="{{ $categories->color }}" class="form-control">
                            </div>

                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ url('category') }}" class="btn btn-danger float-end">BACK</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
