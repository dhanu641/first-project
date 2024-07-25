@include('common')
@include('nav_bar')
<body>
  @yield('nav_bar')
<div>
  
    <div class="container">
     
        <h2>products</h2>
      <div class="d-flex flex-wrap gap-3">
        @foreach ($data as $key => $product)
        <a href="{{route("products",$product->id)}}">
        <div class="card " style="height:300px; width:300px">
            <img src="{{asset($product->image)}}" alt="not found" style="height:200px;width:300px;">
            <div class="card-body">
              <h5 class="card-title">{{$product->title}}</h5>
              <h5 class="card-title">{{$product->description}}</h5>
          </div>
        </div>
      </a>
      @endforeach
      </div>
     
    </div>
  </div>
    
</body>






{{-- @foreach ($data as $key => $product)
<tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $product->title }}</td>
    <td>
        <img src="{{ asset($product->image) }}" alt="no img" class="img-fluid" style="max-height: 300px; max-width:300px;">
    </td>
</tr>
@endforeach --}}