@extends('admin_panel')
@section('content')
@include('common')
@include('nav_bar')
<body>
  @yield('nav_bar')
<div class="container mt-5">
    <div id="success-alert" class="alert  alert-dismissible"></div>
    <h3 class="mb-3">categories</h3>
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Create</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $key => $category)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <img src="{{ asset($category->image) }}" alt="no img" class="img-fluid" style="max-height: 300px; max-width:200px;">
                </td>
                <td>
                    <a href="{{route('category.edit',$category->id)}}">edit</a>
                    {{-- <a href="{{route('category.delete',$category->id)}}">delete</a> --}}
                    
                    <button onclick="ajaxCall('<?php echo $category->id; ?>',this)">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function ajaxCall(Id, element){
        $.ajax({
        url: `/admin/category/delete/${Id}`,
        method: "GET",
        dataType: "json",
        // data: {
        //     param1: "value1",
        //     param2: "value2"
        // },
        success: function(response) {
            // Handle successful response
            console.log(response);
            if(response.success){,
                $(element).closest('tr').html('');
                $('#success-alert').addClass('alert-success');
                $('#success-alert').text('category deleted succesfully...');
                // document.getElementById('success-alert').innerHTML = 'category deleted succesfully...';
            }
            setTimeout(() => {
                $('#success-alert').removeClass('alert-success');
                $('#success-alert').text('');
            }, 5000);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(status, error); 
        }
        });

    }
</script>
@endpush

</body>