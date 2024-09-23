@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Product Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product Categories List</li>
    </ol>
</nav>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between allign-items-center mb-4">
                <h6 class="card-title">Product Category List</h6>
                <a href="{{Route('add.category')}}" class="btn btn-primary">Add Product Category</a>
            </div>

        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                            
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">
                            <img src="{{ asset('upload/admin_images/' . $category->photo) }}" alt="Category Image"
                            style="width: 50px; height: 50px;">

                                
                            </td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <a href="{{route ('admin.edit.category', $category->id) }}"
                                class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('admin.delete.category', $category->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>


                                </form>
                            </td>
                        </tr>
                        @endforeach

                </tbody>
            </table>
        </div>

        </div>
    </div>
</div>

</div>


@endsection