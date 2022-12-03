@extends('layout.master')

@section('word_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Word</h4>                        
                    </div>
                    <div class="card-body">

                        <form action="{{ url('updatew/'.$word->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for=""> Category Name</label>
                                    <select class="form-control" id="category_id" name="category_id" class="form-control">
                                        {{-- <option >select category</option> --}}
                                        @foreach ($categories as $category )
                                        @if($word->category_id == $category->id)
                                        <option selected="selected" value="{{$category->id}}">{{$category->catname}}</option> 
                                        @else
                                        <option value="{{$category->id}}">{{$category->catname}}</option> 
                                        @endif
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Word Name</label>
                                <input type="text" name="wordname" value="{{ $word->wordname }}" class="form-control">
                            </div>
                           
                             
                    
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ url('word') }}" class="btn btn-danger float-end">BACK</a>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
