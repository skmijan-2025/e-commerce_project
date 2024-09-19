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
                <a href="{{route ('')}}" class="btn btn-primary">Add Product Category</a>
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
                            <img src="" alt="Category Image" style="width:50px; height:50px;">
                        </td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">Edit</a>
                            <form action="" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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