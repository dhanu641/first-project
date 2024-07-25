@extends('admin_panel')
@section('content')
@extends('common')
@include('nav_bar')
<body>
    @yield('nav_bar')
<div class="container mt-5">
    <h3 class="mb-3">cart</h3>
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
                    <a href="{{route('products.delete',$product->id)}}">delete</a>
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