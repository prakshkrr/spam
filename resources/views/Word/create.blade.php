@extends('layout.master')
 
@section('word_content')

<style type="text/css">
  .error {
      color: red;
  }
</style>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Add Word
    </div>
    <div class="card-body">
      <label>Category</label>
      <form name="create" id="create" method="post" action="{{url('store_word')}}">
       @csrf

       <select name="category_id" id="category_id" class="form-control">
        <option value="">Select Category</option>
        @if (!empty($categories))
            @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->catname}}</option>
            @endforeach
        @endif
       </select>
        <div class="form-group">
          <label for="exampleInputEmail1">Word Name</label>
          <input type="text" id="wordname" name="wordname" class="form-control" placeholder="Enter Name">
        </div>
      
        <button type="submit" class="btn btn-outline-primary">Submit</button>
        <a href="{{url('word')}}" class="btn btn-outline-success float-end">Cancel</a> 

      </form>
    </div>
  </div>
</div>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#create').validate({
                rules: {
                   wordname: "required",
                   category_id: "required",
                },
                message: {
                  wordname: "Word Name is required",
                  category_id: "Category is required",
                }

            });
        });
    </script>
@endsection