@extends('admin_panel')
@section('content')
@extends('common')
@include('nav_bar')
<body>
  @yield('nav_bar')
    <div class="container mt-5">
    
      <h2>edit Item</h2>
      <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" value="{{$products->title}}" placeholder="Enter title" required>
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" name="quantity" class="form-control" id="quantity" value="{{$products->quantity}}" placeholder="Enter quantity" required>

          <div class="form-group">
            <label for=" == ">Category ID</label>
            <select name="category_id" id="" class="form-control ">
              <option value="" selected>--select category--</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" @if($products->category_id == $category->id) selected @endif>{{ $category->title }}</option>

              @endforeach
            </select>
          </div>
             
        <div class="form-group">
          <label for="original_price">Original Price</label>
          <input type="number" name="original_price" class="form-control" id="original_price" value="{{$products->original_price}}" placeholder="Enter original price" step="0.01" required>
        </div>
        <div class="form-group">
          <label for="selling_price">Selling Price</label>
          <input type="number" name="seling_price" class="form-control" id="selling_price" value="{{$products->selling_price}}" placeholder="Enter selling price" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">image:</label>
            <input type="file" class="form-control" id="image" value={{$products->image}} name="image">
            <div>
              <img src="{{ asset($products->image) }}" alt="" style="height:100px; width:100px">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    @endsection
      
</body>
    
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endpush