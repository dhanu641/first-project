@extends('admin_panel')
@section('content')
@extends('common')
@include('nav_bar')
<body>
    @yield('nav_bar')
<div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
    <h3 class="mb-3">Products</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            
          @foreach($products as $key => $product)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $product->title }}</td>
                <td>
                    <img src="{{ asset($product->image) }}" alt="no img" class="img-fluid" style="max-height: 300px; max-width:200px;">
                </td>
                <td>
                    <a href="{{route('products.edit',$product->id)}}">edit</a>
                    <a href="{{route('products.delete',$product->id)}}">delete</a>
                
                @if(in_array($product->id, $cart))
                    <a href="">
                        <button style="background-color: green;border:none;border-radius:5px;color:aliceblue" disabled>added</button>
                    </a>
                @else
                    <a href="{{ route('add_to_cart', $product->id) }}">
                        <button style="background-color:green;border:none;border-radius:5px;color:aliceblue">Add to cart</button>
                    </a>
                @endif
                
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection
    
</body>
    
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush