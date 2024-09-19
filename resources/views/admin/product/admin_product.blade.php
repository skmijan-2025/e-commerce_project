@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products List</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12" grid-margin stretch-card>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between allign-items-center mb-4">
                    <h6 card="card-title mb-0">Products Lists</h6>
                    <a href="" class="btn btn-primary"><i class="fas fa-plus"></i>Add Product</a>
                </div>

                <!-- Product Categories

                <div class="mb-4">
                    <h6 class="card-title">Product Categories</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($categories as $category)
                        <div class="p-2 bg-light border rounded">
                            {{ $category->category_name }}
                            <span class="badge bg-primary">{{ $category->products->count() }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            Product Table -->

            <div class="table-responsive">
                <table id="dataTableExample" class="table table-hover text-center">
                    <thead class="table-primary">
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Iamge</th>
                              <th class="text-center">Name</th>
                              <th class="text-center">Category</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Stock</th>
                              <th class="text-center">Action</th>  
                            </tr>
                    </thead>
                    <!-- <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <img src="" alt="Product Image" style="width: 50px; height: 50px">
                            </td>
                            <td class="text-center">{{ $product->name }}</td>
                            <td class="text-center">{{ $product->category->category_name }}</td>
                            <td class="text-center">{{ $product->price }}</td>
                            <td class="text-center">{{ $product->stock }}</td>
                            <td class="text-center">
                                <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Edit</a>
                                <form action="" class="d-inline-block" method="post" onsubmit="return confirm('Are you sure?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> -->
                </table>
            </div>
            <!-- End of product table -->
            </div>
        </div>
    </div>
</div>



</div>

@endsection