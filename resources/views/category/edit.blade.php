@extends('admin_panel')
@section('content')
@include('common')
@include('nav_bar')
<body>
  @yield('nav_bar')
<div class="container mt-5">
  <h2>etit Item</h2>
  <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("POST")
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{$category->title}}" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description"  rows="3" placeholder="Enter description" required>{{$category->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">image:</label>
            <input type="file" class="form-control" value="{{$category->image}}" id="image" name="image">
            <div>
              <img src="{{ asset($category->image) }}" alt="" style="height:100px; width:100px">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    @endsection
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endpush
</body>